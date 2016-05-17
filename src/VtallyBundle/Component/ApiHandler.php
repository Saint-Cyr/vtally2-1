<?php

/*
 * This file is part of Components of VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace VtallyBundle\Component; 
use PrBundle\Entity\PrParty;
use PrBundle\Entity\PrPinkSheet;
use PaBundle\Entity\PaPinkSheet;
use PrBundle\Entity\PrVoteCast;
use PaBundle\Entity\PaVoteCast;
use PaBundle\Entity\PaEditedVoteCast;
use VtallyBundle\Entity\PollingStation;
use VtallyBundle\Entity\Region;
use VtallyBundle\Entity\Constituency;
use Symfony\Component\HttpFoundation\Request;
use PrBundle\Entity\PrEditedVoteCast;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class ApiHandler
{
    private $em;
    private $factory;
    private $manager;
    private $security;
    private $container;


    public function __construct($em, $factory, $user_provider, $securityToken, $container) 
    {
        $this->em = $em;
        $this->factory = $factory;
        $this->user_provider = $user_provider;
        $this->security = $securityToken;
        $this->container = $container;
    }
    
    public function login($inputData)
    {
        //if user is authentic then get $user object otherwise, get false;
        $user = $this->isAuthentic($inputData['username'], $inputData['password']);
        
        if($user){
            //Refresh the token time in order to initialize the session time
            $user->refreshTokenTime();
            $this->em->flush();
            
            return array('first_name' => $user->getFirstName(), 'pol_id' => $user->getPollingStation()->getName());
        }
        
        return array('Bad credentials.');
    }
    
    /**
     *  data structure {"action":704, "transaction_type":"presidential", "verifier_token":"ABCD1",
     *  "pr_votes":{"NPP":4, "NDC":34, "UFP":77, "CPP":8}}
     */
    public function editPresidentialVoteCast(array $inputData)
    {
        //Collect the user in order to get his pollingStation
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
        
        //For maintenance perpuse, make sure the system responde well when error occure
        if(!$user){
            return array('user not found in the DB.');
        }
        
        //Get the polling Station
        $pollingStation = $user->getPollingStation();
       
        //See the API documentation to learn more about the constraints
        if(($pollingStation->isPresidential())&&($this->validatorFactory2($inputData))
                &&($this->validatorFactory3($inputData))&&($this->isPresidentialVoteCastValid($inputData))
                &&(array_key_exists('pr_votes', $inputData))){
            //Initialize the statment
            $edited = false;
            
            $votes = $inputData['pr_votes'];
            //Process each one of the votes item
            if(!$pollingStation->isPresidentialVoteCastsMatch($votes)){
                
                foreach ($votes as $p => $v){
                    //Check whether there is change
                    if($onePrVoteCast = $pollingStation->isOnePresidentialVoteCastChanged(array($p => $v))){
                        
                        //Instanciate the editedPrVoteCast
                        $prEditedVoteCast = new PrEditedVoteCast();
                        //Link it to the pollingStation
                        $prEditedVoteCast->setPollingStation($pollingStation);
                        
                        //As $onePrVoteCast is an instance of VtallyBundle:PrVoteCast, we can do:
                        $prEditedVoteCast->setFigureValue($onePrVoteCast->getFigureValue());
                        //Fetch from the DB and update the vote cast related to the pollingStation
                        $prVoteCast = $this->em->getRepository('PrBundle:PrVoteCast')->find($onePrVoteCast->getId());
                        $prVoteCast->setFigureValue($v);
                        //Get the PrParty from the DB in order to link it to the editedPrVoteCast
                        $prParty = $this->em->getRepository('PrBundle:PrParty')
                                    ->findOneBy(array('name' => $onePrVoteCast->getPrParty()->getName()));
                        //Set the prParty
                        $prEditedVoteCast->setPrParty($prParty);
                        
                        $edited = true;
                        $pollingStation->setPresidentialEdited(true);
                        //We have to persist $prEditedVoteCast because it's a new instance
                        $this->em->persist($prEditedVoteCast);
                    }
                }
                
                //In the case where there is a change, then set the apropriate pollingStation property true
                if($edited){
                    //make change in DB.
                    $this->em->flush();
                    $pollingStation->setPresidentialEdited(true);
                    return 'presidential vote cast edited.';
                }
            }
            
            return array('presidential vote cast comfirmed.');
        }
        
        return array('cannot edit presidential vote cast: check data structure or validation rules');
        
    }
    
    public function sendPresidentialVoteCast(array $inputData)
    {
        //make sure vote cast is for Presidential  
        if(!array_key_exists('pr_votes', $inputData)||($inputData['transaction_type'] != 'presidential')){
            
            return array('Invalid data structure.');
        }
        
        //Get the user
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
        //Make sure the user exist in the DB.           
        if(!$user){
            return array('user not found in the DB.');
        }
        //Get the pollingStation 
        $pollingStation = $user->getPollingStation();
        //Make sure the polling station and the user exist in the DB.           
        if(!$user||!$pollingStation){
            return array('user or pollingStation not found in the DB.');
        }
        
        //See the API doc for more information 
        if(($this->validatorFactory2($inputData))&&($this->validatorFactory3($inputData))
                &&($this->isPresidentialVoteCastValid($inputData['pr_votes']))){
            
            
            //Make sure the pollingStation doesn't yet recieve presidential vote cast
            if(($pollingStation->isPresidential())){
                return array('Error: presidential vote cast allready sent.');
            }
            //Save the vote cast one by one in the DB. with theire respective relationship
            $prVotes = $inputData['pr_votes'];
            
            foreach ($prVotes as $partyName => $value){
                //Get the current PrParty from the DB.
                $prParty = $this->em->getRepository('PrBundle:PrParty')->findOneBy(array('name' => $partyName));
                //Instentiate a PrVoteCast
                $prVoteCast = new PrVoteCast();
                //Hydrate it with the right data
                $prVoteCast->setFigureValue($value);
                $prVoteCast->setPrParty($prParty);
                $prVoteCast->setPollingStation($pollingStation);
                //In the case wordValue functionality is used
                //$wordValue = some API or third party service...($value)
                //$prVoteCast->setWordValue($wordValue);
                //Persist all 
                $this->em->persist($prVoteCast);
            }
            
            //Set the PollingStation property presidential to true
            $pollingStation->setPresidential(true);
            //$this->em->flush();
            
            return array('presidential vote cast sent!');
            
        }
        
        return array('Error: cannot send presidential vote cast');
    }
    
    public function isPresidentialVoteCastValid(array $votes)
    {
        return true;
    }
    
    public function process(array $inputData)
    {
        //Make sure every request have the key action
        if((array_key_exists('action', $inputData)&&($this->validatorFactory1($inputData)))){
            
            switch ($inputData['action']){
                //login
                case 600: 
                    return $this->login($inputData);
                    break;
                //Get the presidential parties (1st verifier)
                case 700:
                    return $this->getPresidentialVoteCast($inputData);
                    break;
                //Get the presidential parties (2nd verifier)
                case 701:
                    return $this->getPresidentialVoteCast($inputData);
                    break;
                //Sending presidential vote cast
                case 702:
                    return $this->sendPresidentialVoteCast($inputData);
                    return array('Error: the concerned polling station is not activated.');
                    break;
                //Edit presidential vote cast
                case 704:
                    return $this->editPresidentialVoteCast($inputData);
                    break;
                //Get the parliamentary candidates for the first Verifier
                case 5:
                    return $this->getParliamentaryCandidates($inputData);
                    break;
                //Send Parliamentary vote cast
                case 6:
                    //Make sure the Data structure content the key pa_votes
                    if(array_key_exists('pa_votes', $inputData) && $inputData['transaction_type'] == 'parliamentary'){
                        return $this->sendParliamentaryVoteCast($inputData);
                        break;
                    }
                    
                //Get the parliamentary candidates for the second Verifier
                case 7:
                    //Make sure the Data structure content the key pa_votes
                    if(($inputData['transaction_type'] == 'parliamentary') && ($this->validatorFactory3($inputData))){
                        return $this->getParliamentaryCandidates($inputData);
                        break;
                    }
                
                //Edit Parliamentary vote cast
                case 8:
                    //Make sure the Data structure content the key pa_votes
                    if(array_key_exists('pa_votes', $inputData) &&
                       $inputData['transaction_type'] == 'parliamentary'){
                        return $this->editParliamentaryVoteCast($inputData);
                        break;
                    }
                    
                    return array('Error: wrong data structure or validation faild.');
                    break;
            }
            
            return array('Error: wrong data structure or validation faild.');
        }
        
        return array('Error: wrong data structure or validation faild.');
    }
    
    public function processPinkSheet(Request $request)
    { 
        //Prepare the common inputData structure $inputData
        // (like in login, sendvote...)
        $inputData['action'] = $request->get('action');
        $inputData['verifier_token'] = $request->get('verifier_token');
        $inputData['transaction_type'] = $request->get('transaction_type');
        
        //Warnning !!! Make sure the file extension is only the recommanded one
        $file = $request->files->get('file');
        if(($file->guessExtension() != 'jpg') && ($file->guessExtension() != 'jpeg') && ($file->guessExtension() != 'pdf')){
            return array('Error: file Extension non suported.');
        }
        
        //Make sure every request have the key action
        if(((($inputData['action'] == 703 || $inputData['action'] == 5) || ($inputData['action'] == 603) ||
                ($inputData['action'] == 605))
                &&($this->validatorFactory1($inputData))&&($this->validatorFactory3($inputData)))){ 
            
            switch ($inputData['action']){
                //Send presidential pinkSheet
                case 703:
                    //Get the user
                    $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
                    //Get the pollingStation 
                    $pollingStation = $user->getPollingStation();
                    
                    if(!$user||!$pollingStation){
                        return array('user or pollingStation not found in the DB.');
                    }
                    
                    //Make sure presidential pink sheet has not yet been sent
                    if($pollingStation->isPresidentialPinkSheet()){
                        return array('Error: presidential pinkSheet allready sent.');
                    }
                    return $this->sendPresidentialPinkSheet($request, $inputData);
                    break;
                //Edit presidential pinkSheet
                case 5:
                    //Get the user
                    $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
                    //Get the pollingStation 
                    $pollingStation = $user->getPollingStation();
                    
                    if(!$user||!$pollingStation){
                        return array('user or pollingStation not found in the DB.');
                    }
                    
                    //Make sure presidential pink sheet has been sent allready
                    if(!$pollingStation->isPresidentialPinkSheet()){
                        return array('Error: presidential pinkSheet not yet sent.');
                    }
                    
                    return $this->editPresidentialPinkSheet($request, $inputData);
                    break;
                    
                //Send parliamentary pinkSheet
                case 603:
                    //Get the user
                    $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
                    //Get the pollingStation 
                    $pollingStation = $user->getPollingStation();
                    
                    if(!$user||!$pollingStation){
                        return array('user or pollingStation not found in the DB.');
                    }
                    
                    //Make sure presidential pink sheet has not yet been sent
                    if($pollingStation->isParliamentaryPinkSheet()){
                        return array('Error: parliamentary pinkSheet allready sent.');
                    }
                    return $this->sendParliamentaryPinkSheet($request, $inputData);
                    break;
                    
                //Edit parliamentary pinkSheet
                case 605:
                    //Get the user
                    $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
                    //Get the pollingStation 
                    $pollingStation = $user->getPollingStation();
                    
                    if(!$user||!$pollingStation){
                        return array('user or pollingStation not found in the DB.');
                    }
                    
                    //Make sure parliamentary pink sheet has been allready sent and has not
                    //yet been edited
                    if((!$pollingStation->isParliamentaryPinkSheet()) ||
                       ($pollingStation->isParliamentaryPinkSheetEdited())){
                        
                        return array('Error: parliamentary pinkSheet not yet sent or allready edited');
                    }
                    
                    return $this->editParliamentaryPinkSheet($request, $inputData);
                    break;
            }
        }
        
        return array('wrong data structure or validation faild.');
    }
    
    
    /**
     * @param Request $request
     * @return string
     * @dataStructure array('file' => v1, 'verifier_token' => v2,
     *                      'action' => 703, 'transaction_type' => v4);
     */
    public function sendPresidentialPinkSheet(Request $request, array $inputData)
    {
        //Get the user in order to get the pollingStation
        $user = $this->em->getRepository('UserBundle:User')
                     ->findOneBy(array('userToken' => $inputData['verifier_token']));
        
        //Now get the pollingStation
        $pollingStation = $user->getPollingStation();
        
        //Get the uploaded file
        $uploadedFile = $request->files->get('file');
        
        //Instentiate the prPinkSheet
        $prPinkSheet = new PrPinkSheet();
        //set the pink Sheet name
        $prPinkSheet->setName($uploadedFile->getClientOriginalName());
        //Link the pinkSheet to the pollingStation
        $pollingStation->setPrPinkSheet($prPinkSheet);
        //Set presidentialPinkSheet to true
        $pollingStation->setPresidentialPinkSheet(true);
        //persist $prPinkSheet in the DB.
        $this->em->persist($prPinkSheet);
        $this->em->flush();
        //Get the directory path
        $directory = __DIR__.'/../../../web/pinkSheet/presidential';
        //Move the file in the directory
        $file = $uploadedFile->move($directory, $uploadedFile->getClientOriginalName());
        
        return array('file uploaded.');
    }
    
    public function editPresidentialPinkSheet(Request $request, $inputData)
    {
        //Collect the pinkSheet based on $pinkSheet = $user->getPollingStation()->getPrPinkSheet();
        $user = $this->em->getRepository('UserBundle:User')
                     ->findOneBy(array('userToken' => $inputData['verifier_token']));
        $prPinkSheet = $user->getPollingStation()->getPrPinkSheet();
        //Send the move the edited pink sheet to it location
        
        //Get the uploaded file
        $uploadedFile = $request->files->get('file');
        //Get the directory path
        $directory = __DIR__.'/../../../web/pinkSheet/presidentialEdited';
        //Move the file in the directory
        $file = $uploadedFile->move($directory, $uploadedFile->getClientOriginalName());
        //make sure the edited file have different name than the original one
        if($uploadedFile->getClientOriginalName() == $prPinkSheet->getName()){
            return array('Error: the name of the edited presidential pink sheet must be different of the original:'
                . ' see documentation for naming convention');
        }
        //Set the pinkSheet property edited to true
        $prPinkSheet->setEdited(true);
        //Persist the change
        $this->em->persist($prPinkSheet);
        $this->em->flush();
        //FeedBack
        return array('presidential pink Sheet edited.');
    }
    
    /**
     * @param Request $request
     * @return string
     * @dataStructure array('file' => v1, 'verifier_token' => v2,
     *                      'action' => v3, 'transaction_type' => v4);
     */
    public function sendParliamentaryPinkSheet(Request $request, array $inputData)
    {
        //Get the user in order to get the pollingStation
        $user = $this->em->getRepository('UserBundle:User')
                     ->findOneBy(array('userToken' => $inputData['verifier_token']));
        
        //Now get the pollingStation
        $pollingStation = $user->getPollingStation();
        
        //Get the uploaded file
        $uploadedFile = $request->files->get('file');
        
        //Instentiate the paPinkSheet
        $paPinkSheet = new PaPinkSheet();
        //set the pink Sheet name
        $paPinkSheet->setName($uploadedFile->getClientOriginalName());
        //Link the pinkSheet to the pollingStation
        $pollingStation->setPaPinkSheet($paPinkSheet);
        //Set the property presidentialPinkSheet to true to prevent 
        //additional sending parliamentary pink sheet
        $pollingStation->setParliamentaryPinkSheet(true);
        //persist $paPinkSheet in the DB.
        $this->em->persist($paPinkSheet);
        $this->em->flush();
        //Get the directory path
        $directory = __DIR__.'/../../../web/pinkSheet/parliamentary';
        //Move the file in the directory
        $file = $uploadedFile->move($directory, $uploadedFile->getClientOriginalName());
        
        return array('parliamentary pink sheet file uploaded.');
    }
    
    /**
     * 
     * @param Request $request
     * @param array $inputData
     * @return type
     */
    public function editParliamentaryPinkSheet(Request $request, $inputData)
    {
        //Collect the pinkSheet based on $pinkSheet = $user->getPollingStation()->getPaPinkSheet();
        $user = $this->em->getRepository('UserBundle:User')
                     ->findOneBy(array('userToken' => $inputData['verifier_token']));
        $paPinkSheet = $user->getPollingStation()->getPaPinkSheet();
        //Send the move the edited pink sheet to it location
        
        //Get the uploaded file
        $uploadedFile = $request->files->get('file');
        //Get the directory path
        $directory = __DIR__.'/../../../web/pinkSheet/parliamentaryEdited';
        //Move the file in the directory
        $file = $uploadedFile->move($directory, $uploadedFile->getClientOriginalName());
        //make sure the edited file have different name than the original one
        if($uploadedFile->getClientOriginalName() == $paPinkSheet->getName()){
            return array('Error: the name of the edited parliamentary pink sheet must be different of the original:'
                . ' see documentation for naming convention');
        }
        //Set the pinkSheet property edited to true
        $paPinkSheet->setEdited(true);
        //Set the property parliamentaryPinkSheetEdited to true
        $user->getPollingStation()->setParliamentaryPinkSheetEdited(true);
        //Persist the change
        $this->em->persist($paPinkSheet);
        $this->em->flush();
        //FeedBack
        return array('parliamentary pink Sheet edited.');
    }
    
    public function isDataStructureValid($inputData)
    {
        if(array_key_exists('action', $inputData)&&($this->validatorFactory1($inputData))){
            
            switch ($inputData['action']){
                case 1:
                    if((array_key_exists('username', $inputData))&&(array_key_exists('password', $inputData))&&
                            ((isset($inputData['username'])&&(isset($inputData['password']))))&&($this->validatorFactory1($inputData))){
                        return true;
                    }else{
                        return false;
                    }
                    break;
                case 2:
                    return true;
                    break;
            }
        }
        
        return false;
    }
    
    public function isAuthentic($username, $password)
    {
        /* Validate the User */
        //$user_manager = $this->container->get('fos_user.user_manager');
        $user_manager = $this->manager;
        //$factory = $this->container->get('security.encoder_factory');
        $factory = $this->factory;
        
        //To avoid thrownig an exception by FOSUserBundle in the case where username is wrong
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('username' => $username));
        
        if(!$user){
            return false;
        }
        //The username is right
        $user = $this->user_provider->loadUserByUsername($username);
        
        $encoder = $factory->getEncoder($user);
        $validated = $encoder->isPasswordValid($user->getPassword(),$password,$user->getSalt());
        if (!$validated) {
            
            http_response_code(400);
            return false;
       
        } else {
            
            $token = new UsernamePasswordToken($user, null, "main", $user->getRoles());
            //now the user is logged in
            $this->security->setToken($token);
            //now dispatch the login event
            //$request = $this->container->get("router.request_context");
            //$event = new InteractiveLoginEvent($request, $token);
            //$this->container->get("event_dispatcher")->dispatch("security.interactive_login", $event);

        return $user;
        
        }
    }
    
    public function validatorFactory1($inputData)
    {
        //In the case $inputData does have verifier_token key
        if(array_key_exists('verifier_token', $inputData)){
            
            //Get the user object based on the userToken
            $user = $this->em->getRepository('UserBundle:User')
                    ->findOneBy(array('userToken' => $inputData['verifier_token']));
        }

        //In the case $inputData does have username key when action = 1 (login)
        elseif(array_key_exists('username', $inputData)){
            
            //Get the user object based on the username
            $user = $this->em->getRepository('UserBundle:User')
                    ->findOneBy(array('username' => $inputData['username']));
        }
        
        //Continous only if the user exist in DB
        if(!$user){
            return array('user not found in DB.');
        }
        
        //Get the pollingStation related to $user
        $pollingStation = $user->getPollingStation();
        
        if(!$pollingStation){
            return false;
        }
        
        //The logic of the validation goes here
        if($pollingStation->isActive()){
            return true;
        }
        
        return false;
    }
    
    public function validatorFactory2($inputData)
    {
        if(((array_key_exists('transaction_type', $inputData)))
                &&(array_key_exists('verifier_token', $inputData))
                &&((isset($inputData['transaction_type']))
                &&(isset($inputData['verifier_token'])))){
            
            return true;
        }
        
        return false;
    }
    
    public function validatorFactory3(array $inputData)
    {
        if(array_key_exists('verifier_token', $inputData)){
            //Get the user from the DB in order to compare it token to the sent one
            $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
            
            if(!$user){
                
                return false;
            }
            
            //Get the setting
            $setting = $this->em->getRepository('VtallyBundle:Setting')->findOneBy(array('type' => 'default'));
            
            if(!$setting){
                //to be improved with a throw exception 
                var_dump('Setting not found in DB.');exit;
            }
            //The token must be valid and it age too
            //NB the parameter $tokenTime must be provided by the parameter system
            //$tokenTime (in minute) is the value of the max lapsed time of inactivity
            $tokenTime = $setting->getTokenTime();
            //For test purpose set $tokenTime  to any value
            //$tokenTime = 20;
            if(($inputData['verifier_token'] == $user->getUserToken())&&
               ($user->isUserTokenValid($tokenTime))){
                //Refresh the tokenTime
                $user->refreshTokenTime();
                $this->em->flush();
                return true;
            }
            
            return false;
        }
        
        return false;
    }


    //Parliamentary
    
    /**
     * 
     */
    public function getParliamentaryCandidates(array $inputData)
    {
        
        if($this->validatorFactory3($inputData)){
            //Get the user
            $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
            //Get the pollingStation 
            $pollingStation = $user->getPollingStation();
            //Get the Constituency
            $constituency = $pollingStation->getConstituency();

            if(!$user||!$pollingStation||!$constituency){
                return array('user or pollingStation or consituency not found in the DB.');
            }

            //Get all the independents candidates linked to the contexted pollingStation
            $indCandidates = $constituency->getIndependentCandidates();

            //Get all the dependents candidates linked to the contexted pollingStation
            $depCandidates = $constituency->getDependentCandidates();

            $data1 = array();
            $data2 = array();

            //load independent candidates
            foreach ($indCandidates as $indC){
                //For technical purpose only, we add the key 'id'
                $data1['id'] = $indC->getId();
                //Check if it's first verifier then add $inputData['vote_cast'] => null
                //else (second verifier) load the $inputData['vote_cast'] value from the DB.
                if($inputData['action'] == 5){
                    //Because it's the first verifier request.
                    $data1['vote_cast'] = null;
                    //2nd verifier so, set the key 'vote_cast' with the right value from DB.
                }elseif($inputData['action'] == 7){
                    $_voteCast = $pollingStation->getOneParliamentaryVoteCast($indC);
                    $data1['vote_cast'] = $_voteCast->getFigureValue();
                }
                
                $data1['name'] = $indC->getFirstName();
                $data1['candidacy_number'] = $indC->getCandidacyNumber();
                array_push($data2, $data1);
                $data1 = array();
            }

            //load dependent candidates
            $data = array();
            $data4 = array();
            foreach ($depCandidates as $dep){
                //For technical purpose only, we add the key 'id'
                $data['id'] = $dep->getId();
                //Check if it's first verifier then add $inputData['vote_cast'] => null
                //else (second verifier) load the $inputData['vote_cast'] value from the DB.
                if($inputData['action'] == 5){
                    $data['vote_cast'] = null;
                }elseif($inputData['action'] == 7){
                    $_voteCast = $pollingStation->getOneParliamentaryVoteCast($dep);
                    $data['vote_cast'] = $_voteCast->getFigureValue();
                }
                
                $data['name'] = $dep->getFirstName();
                $data['candidacy_number'] = $dep->getCandidacyNumber();
                array_push($data4, $data);
                $data = array();
            }

            $candidates[] = $data2;
            $candidates[] = $data4;

            return $candidates;
            
        }  else {
            return array('Error: validatorFactory3 faild.');
        }
        
        return array('Error: cannot get parliamentary validatorFactory3 faild.');
    }
    
    public function sendParliamentaryVoteCast(array $inputData)
    {
        //Get the user
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
        //Get the pollingStation 
        $pollingStation = $user->getPollingStation();
                    
        if(!$user||!$pollingStation){
            return array('user or pollingStation not found in the DB.');
        }
        
        //Check the validations rules and the data structure
        if($this->validatorFactory2($inputData) && ($this->validatorFactory3($inputData)) &&
          ($this->isParliamentaryVoteCastValid($inputData['pa_votes']) && 
          (!($pollingStation->isParliamentary())))){
            
            $depCandidates = $inputData['pa_votes']['dependent'];
            $indCandidates = $inputData['pa_votes']['independent'];
            
            // Treat the dependentCandidates
            foreach ($depCandidates as $depC){
                    //Get the current Dependent Candidate from the DB.
                    $depCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find($depC['id']);
                    //Make sure this dependent candidate is in the DB.
                    if(!$depCandidate){
                        return array('Error: parliamentary dependent candidate of ID:'.$depC['id'].' not found in the DB.');
                    }
                    //Instentiate a parliamentary vote cast
                    $paVoteCast = new PaVoteCast();
                    //Hydrate $paVoteCast with the needed information
                    $paVoteCast->setFigureValue($depC['vote_cast']);
                    $paVoteCast->setDependentCandidate($depCandidate);
                    $paVoteCast->setPollingStation($pollingStation);
                    //In the case wordValue functionality is used
                    //$wordValue = some API or third party service...($value)
                    //$paVoteCast->setWordValue($wordValue);
                    //Persist all
                    $this->em->persist($paVoteCast);
                }
            
            //Treat independent candidates
            foreach ($indCandidates as $indC){
                    //Get the current independent Candidate from the DB.
                    $indCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find($indC['id']);
                    //Make sure this independent candidate is in the DB.
                    if(!$indCandidate){
                        return array('Error: parliamentary independent candidate of ID:'.$indC['id'].' not found in the DB.');
                    }
                    //Instentiate a parliamentary vote cast
                    $paVoteCast = new PaVoteCast();
                    //Hydrate $paVoteCast with the needed information
                    $paVoteCast->setFigureValue($indC['vote_cast']);
                    $paVoteCast->setIndependentCandidate($indCandidate);
                    $paVoteCast->setPollingStation($pollingStation);
                    //In the case wordValue functionality is used
                    //$wordValue = some API or third party service...($value)
                    //$paVoteCast->setWordValue($wordValue);
                    //Persist all
                    $this->em->persist($paVoteCast);
            }
            
            //set up the polling station to do not accept the sending of parliamentary vote cast
            $pollingStation->setParliamentary(true);
            //Confirm the persistence in the DB.
            
            //$this->em->flush();
            
            return array('parliamentary vote cast sent.');
        }
        
        return array('Error: wrong data structure and or validation faild.');
        
    }
    
    public function editParliamentaryVoteCast(array $inputData)
    {
        //Get the user
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
        //Get the pollingStation 
        $pollingStation = $user->getPollingStation();
                    
        if(!$user||!$pollingStation){
            return array('user or pollingStation not found in the DB.');
        }
        
        //Check the validations rules and the data structure
        if($this->validatorFactory2($inputData) && ($this->validatorFactory3($inputData)) &&
          ($this->isParliamentaryVoteCastValid($inputData['pa_votes']) && 
          (($pollingStation->isParliamentary()) && (!$pollingStation->isParliamentaryEdited())))){
            //Get the dependentCandidates and the independentCandidate
            $depCandidates = $inputData['pa_votes']['dependent'];
            $indepCandidates = $inputData['pa_votes']['independent'];
            //Define a variable that will help to know whether there is edition or not
            $edited = false;
            
            // Treat the dependentCandidates
            foreach ($depCandidates as $depC){
                //Get the related dependentCandidate instance from the DB.
                $_depCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find($depC['id']);
                //Get the vote cast linked to $_depCandidate in order to compare to the sent one $depC['vote_cast'];
                $_voteCast = $pollingStation->getOneParliamentaryVoteCast($_depCandidate);
                
                //Make sure $_depCandidate exist in DB.
                if(!$_depCandidate){
                    return array('Error: dependent candidate of id: '.$depC['id'].' does not exist in DB.');
                }
                
                //Make the comparaison here
                if($depC['vote_cast'] != $_voteCast->getFigureValue()){
                    //Instentiate a editPaVoteCast
                    $paEditVoteCast = new PaEditedVoteCast();
                    //Set the vote cast values 
                    $paEditVoteCast->setFigureValue($_voteCast->getFigureValue());
                    //link the pollingStation
                    $paEditVoteCast->setPollingStation($pollingStation);
                    //link the dependentCandidate
                    $paEditVoteCast->setDependentCandidate($_depCandidate);
                    //update the the original vote cast sent by the 1st verifier
                    $_voteCast->setFigureValue($depC['vote_cast']);
                    //trigger notification
                    // $notification = $this-> ....service container
                    $edited = true;
                    //persist $paEditedVoteCast
                    $this->em->persist($paEditVoteCast);
                }
            }
            
            // Treat the independent candidates
            foreach ($indepCandidates as $indC){
                //Get the related dependentCandidate instance from the DB.
                $_indCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find($indC['id']);
                //Get the vote cast linked to $_depCandidate in order to compare to the sent one $depC['vote_cast'];
                $_voteCast = $pollingStation->getOneParliamentaryVoteCast($_indCandidate);
                
                //Make sure $_indCandidate exist in DB.
                if(!$_indCandidate){
                    return array('Error: independent candidate of id: '.$indC['id'].' does not exist in DB.');
                }
                
                //Make the comparaison here
                if($indC['vote_cast'] != $_voteCast->getFigureValue()){
                    //Instentiate a editPaVoteCast
                    $paEditVoteCast = new PaEditedVoteCast();
                    //Set the vote cast values 
                    $paEditVoteCast->setFigureValue($_voteCast->getFigureValue());
                    //link the pollingStation
                    $paEditVoteCast->setPollingStation($pollingStation);
                    //link the independentCandidate
                    $paEditVoteCast->setIndependentCandidate($_indCandidate);
                    //update the the original vote cast sent by the 1st verifier
                    $_voteCast->setFigureValue($indC['vote_cast']);
                    //trigger notification
                    // $notification = $this-> ....service container
                    $edited = true;
                    //persist $paEditedVoteCast
                    $this->em->persist($paEditVoteCast);
                }
            }
            
            //lock the pollingStation in order to do not allow an edition of parliamentary votes again
            $pollingStation->setParliamentaryEdited(true);
            //Confirm the persistence of all persisted and loaded objects
            $this->em->flush();
            if($edited){
                return array('parliamentary vote cast edited.');
            }else{
                return array('parliamentary vote cast confirmed.');
            }
        }
        
        return array('Error: wrong data structure or validation faild.');
       
    }
    
    /**
     * @return ['NPP' => null, 'NDC' => null, 'UFP' => null, 'CPP' => null,
                'PPP' => null, 'NCP' => null, 'PCP' => null, 'GFP' => null, ]; for the firstVerfier
     * and for the 2nd verifier with value = v1 (v1 is a PrVoteCast->getFigureValue())
     */
    public function getPresidentialVoteCast(array $inputData)
    {
        if($this->validatorFactory3($inputData)){
            //Get the user
            $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
            //Get the pollingStation 
            $pollingStation = $user->getPollingStation();
            //Get the Constituency
            $constituency = $pollingStation->getConstituency();

            if(!$user||!$pollingStation||!$constituency){
                return array('user or pollingStation or consituency not found in the DB.');
            }
            
            //Fetch all the presidential parties from the DB.
            $prParties = $this->em->getRepository('PrBundle:PrParty')->findAll();
            //Build the data structure.
            $parties = array();
            
            
            foreach ($prParties as $prParty){
                if($inputData['action'] == 701){
                    //When the second verifier request, use the polling station to get the right data
                    $parties = $pollingStation->getPresidentialVoteCastForApi();
                    
                }elseif($inputData['action'] == 700){
                    //When the first verifer($inputData['action'] = 700
                    $parties[$prParty->getName()] = null;
                }
                
            }

            return $parties;
        }
        
        return array('Error: wrong data structure or validation faild.');
    }
    
    public function isParliamentaryVoteCastValid($data)
    {
        return true;
    }
}