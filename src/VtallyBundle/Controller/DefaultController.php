<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\ConfigurationRoute;
use Sensio\Bundle\FrameworkExtraBundle\ConfigurationTemplate;
use Ddeboer\DataImport\ValueConverter\StringToObjectConverter;
use Symfony\Component\HttpFoundation\Request;
use VtallyBundle\Component\CSVTypes;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Source\StreamSource;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Writer\DoctrineWriter;


class DefaultController extends Controller
{
    public function dashboardAction()
    {
        return new Response('Administration Dashboard');
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
        
        $workflow->addWriter($doctrineWriter);
        $converter = new StringToObjectConverter($repository, 'name');
        $workflow->addValueConverter('input_name', $converter);
        $workflow->process();
        exit;
        
        //loop over each row (one row is like: id;name;active;...)
        foreach ($reader as $row){
            var_dump($row['constituency']);exit;
            $doctrineWriter->prepare()
                       ->writeItem(array(
                                        'name' => $row['name'],
                                        'code' => $row['code'],
                                        'constituency' => $row['constituency'],
                                        ))
                       ->finish();
        }
        /** End @Saint-Cyr **/

        $this->get('session')->getFlashBag()
             ->add('sonata_flash_info', CSVTypes::getNameOfType($curType)." CSV file upload work in progress...");
            
        return $this->redirect($this->generateUrl('sonata_admin_dashboard'));
    }
}
