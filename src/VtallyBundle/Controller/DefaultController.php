<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\ConfigurationRoute;
use Sensio\Bundle\FrameworkExtraBundle\ConfigurationTemplate;
use Ddeboer\DataImport\ValueConverter\StringToObjectConverter;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Component\HttpFoundation\Request;
use VtallyBundle\Component\CSVTypes;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Source\StreamSource;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use ZipArchive;


class DefaultController extends Controller
{
    public function zipAndDownloadAction()
    {
        $files = array();
        $em = $this->getDoctrine()->getManager();
        $doc = $em->getRepository('PrBundle:PrPinkSheet')->findAll();
        //foreach ($_POST as $p) {
            foreach ($doc as $d) {
                array_push($files, getcwd()."/pinkSheet/presidential/".$d->getName());
            }
        //}
        $zip = new \ZipArchive();
        //$zipName = 'Documents-'.time().".zip";
        $zipName = 'Documents.zip';
        $zip->open(getcwd()."/pinkSheet/presidential/".$zipName,  \ZipArchive::CREATE);
        foreach ($files as $f) {
            $zip->addFromString(basename($f),  file_get_contents($f)); 
        }
        $zip->close();
        $response = new Response();
        
        $response->headers->set('Cache-Control', 'private');
        //$response->headers->set('Content-type', mime_content_type($zipName));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($zipName) . '"');
        $response->headers->set('Content-length', filesize(getcwd()."/pinkSheet/presidential/".$zipName));
        $response->sendHeaders();
        $response->setContent(readfile(getcwd()."/pinkSheet/presidential/".$zipName));
        //header('Content-Type', 'application/zip');
        //header('Content-disposition: attachment; filename="' . $zipName . '"');
        //header('Content-Length: ' . filesize($zipName));
        //readfile($zipName);
        return $response;
    }
    
    public function dashboardAction()
    {
        $statisticHandler = $this->get('vtally.statistic_handler');
        //Get presidential vote cast for national level
        $presidentialVoteCast = $statisticHandler->getPresidentialNation();
        return $this->render('VtallyBundle:vote:charts.html.twig', array('presidentialVoteCast' => $presidentialVoteCast));
    }
    
    public function importCSVAction(Request $request) 
    {
        // Get FileId to "import"
        $param = $request->request;
        $fileId = (int)trim($param->get("fileId"));

        $curType=trim($param->get("fileType"));
        $uploadedFile = $request->files->get("csvFile");
        
        //var_dump($uploadedFile->guessExtension());exit;
        
        // if upload was not ok, just redirect to "shortyStatWrongPArameters"
        if (!CSVTypes::existsType($curType) || $uploadedFile==null){
            $this->get('session')->getFlashBag()
                 ->add('sonata_flash_info', 'Sorry... cannot upload the file(s). Check documentation or see super-administrator');
            
            return $this->redirect($this->generateUrl('sonata_admin_dashboard'));
        }
        
        // generate dummy dir
        $dummyImport = getcwd()."/dummyImport";
        $fname= $uploadedFile->getClientOriginalName();
        $filename=$dummyImport."/".$fname;
        @mkdir($dummyImport);
        @unlink($filename);
        
        // move file to dummy filename
        $uploadedFile->move($dummyImport, $fname);            

        echo "Starting to Import file. Type: ".CSVTypes::getNameOfType($curType)."<br />n";
        
        /** By @Saint-Cyr **/
        $file = new \SplFileObject($dummyImport.'/'.$fname);
        $reader = new CsvReader($file);
        //set the hander in order to build an associative array
        $reader->setHeaderRowNumber(0);
        // Create the workflow from the reader
        $workflow = new Workflow($reader);
        //doctrine writer
        $em = $this->getDoctrine()->getManager();
        
        $doctrineWriter = new DoctrineWriter($em, CSVTypes::getEntityClass($curType));
        //disable truncate
        $doctrineWriter->disableTruncate();
        
        try{
            
            $workflow->addWriter($doctrineWriter);
            
            //treat the type separatly
            if(CSVTypes::getNameOfType($curType) == 'Polling Station'){
                $repository = $em->getRepository('VtallyBundle:Constituency');
                $property = 'constituency';
                $route = 'admin_vtally_pollingstation_list';
            }elseif(CSVTypes::getNameOfType($curType) == 'Constituency'){
                $repository = $em->getRepository('VtallyBundle:Region');
                $property = 'region';
                $route = 'admin_vtally_constituency_list';
            }
            
            $converter = new StringToObjectConverter($repository, 'code');
            $workflow->addValueConverter($property, $converter);
            $workflow->process();
            
        }catch (UniqueConstraintViolationException $e){

            $this->get('session')->getFlashBag()
                 ->add('sonata_flash_error', 'Error: cannot import the CSV file because it contains one or many entry that allready '
                         . 'exists in the Data Base');
            return $this->redirect($this->generateUrl('sonata_admin_dashboard'));
        }
    
        
        /** End if code by S@int-Cyr **/
        $this->get('session')->getFlashBag()
             ->add('sonata_flash_success', CSVTypes::getNameOfType($curType)." CSV file uploaded successfully !");
            
        return $this->redirect($this->generateUrl($route));
    }
}
