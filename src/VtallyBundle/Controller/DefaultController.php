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
    
    public function nationalAction()
    {
        //Get the statisticHandler service
        $statisticHandler = $this->get('vtally.statistic_handler');
        //Get presidential vote cast for national level
        $presidentialVoteCast = $statisticHandler->getPresidentialNation();
        return $this->render('VtallyBundle:vote:charts.html.twig', array('presidentialVoteCast' => $presidentialVoteCast));
    }

    public function dashboardAction()
    {
        //when logout, goes to the login page
        //Get the authorization checker
        $authChecker = $this->get('security.authorization_checker');
        if(!$authChecker->isGranted("ROLE_SUPER_ADMIN")){
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        //Get the statisticHandler service
        $statisticHandler = $this->get('vtally.statistic_handler');
        //Get presidential vote cast for national level
        $presidentialVoteCast = $statisticHandler->getPresidentialNation();
        return $this->render('VtallyBundle:vote:dashboard.html.twig', array('presidentialVoteCast' => $presidentialVoteCast));
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
    
    public function notificationAction()
    {
        //Get the notification handler
        $notificationHandler = $this->get('vtally.notification_handler');
        $em = $this->get('doctrine')->getManager();
        //Online users
        $onlineUserObjects = $em->getRepository('UserBundle:User')->findByActive(true);
        $onlineUsers = array('number' => count($onlineUserObjects), 'onlineUserObjects' => $onlineUserObjects);
        //Over-voting
        $overVotingObjects = $em->getRepository('VtallyBundle:Notification')->findByType(array('type' => 'over-voting'));
        $overVotings = array('number' => count($overVotingObjects), 'overVotingObjects' => $overVotingObjects);
        //Matching votes
        $matchingVoteObjects = $em->getRepository('VtallyBundle:Notification')->findByType(array('type' => 'matching-vote'));
        $matchingVotes = array('number' => count($matchingVoteObjects), 'matchingVoteObjects' => $matchingVoteObjects);
        //Complited collation centers NB: to be called on the initializer server.
        //$collationCentersObjects = $notificationHandler->getComplitedCollationCenter();
        //Parliamentary vote-cast mismatch
        $paMismatchingVoteObjects = $em->getRepository('PaBundle:PaNotification')->findByType(array('type' => 'mismatching-vote'));
        $paMismatchingVote = array('number' => count($paMismatchingVoteObjects), 'paMismatchingVoteObjects' => $paMismatchingVoteObjects);
        //Presidential vote cast mismatch
        $prMismatchVoteObjects = $em->getRepository('PrBundle:PrNotification')->findByType(array('type' => 'mismatching-vote'));
        $prMismatchVote = array('number' => count($prMismatchVoteObjects), 'prMismatchVoteObjects' => $prMismatchVoteObjects);
        //Parliamentary pink sheet mismatch
        $paPinkSheetObjects = $em->getRepository('PaBundle:PaNotification')->findByType(array('type' => 'pink-sheet mismatch'));
        $paPinkSheet = array('number' => count($paPinkSheetObjects), 'paPinkSheetObjects' => $paPinkSheetObjects);
        //Presidential pink sheet mismatch
        $prPinkSheetObjects = $em->getRepository('PrBundle:PrNotification')->findByType(array('type' => 'pink-sheet mismatch'));
        $prPinkSheet = array('number' => count($prPinkSheetObjects), 'prPinkSheetObjects' => $prPinkSheetObjects);
        //Gether all the default data here
        $default = array('overVotings' => $overVotings, 'matchingVotes' => $matchingVotes,
                         'onlineUsers' => $onlineUsers);
        //Gether all the presidential here
        $prData = array('prPinkSheet' => $prPinkSheet, 'prMismatchVote' => $prMismatchVote);
        //Gether all the parliamentary here
        $paData = array('paPinkSheet' => $paPinkSheet, 'paMismatchVote' => $paMismatchingVote);       
        //Gether all the notifications in an array
        $notifications = array('presidential' => $prData, 'parliamentary' => $paData, 'default' => $default);
        
        //$notifications = array('prPinkSheet' => $prPinkSheet, 'paPinkSheet' => $parPinkSheet, 'prPinkSheetNumber' => count($prPinkSheet));
        return $this->render('VtallyBundle:Default:notification.html.twig', array('notifications' => $notifications)); 
    }
}