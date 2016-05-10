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
     *  data structure {"action":3, "transaction_type":"presidential", "pol_id":4, "verifier_token":"ABCD1", "pr_votes":{"NPP":4, "NDC":34, "UFP":77, "CPP":8}}
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
                        
                        //As $onePrVoteCast is return instance of VtallyBundle:PrVoteCast, we can do:
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
        
        //See the API doc for more information 
        if(($this->validatorFactory2($inputData))&&($this->validatorFactory3($inputData))
                &&($this->isPresidentialVoteCastValid($inputData['pr_votes']))){
            
            //Get the polling Station
            $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find($inputData['pol_id']);
            //Make sure $pollingStation exist in the DB and it doesn't yet recieve presidential vote
            if((!$pollingStation) || ($pollingStation->isPresidential())){
                return array('Error: cannot send presidential vote cast.');
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
                case 1: 
                    return $this->login($inputData);
                    break;
                //Sending presidential vote cast
                case 2:
                    return $this->sendPresidentialVoteCast($inputData);
                    return array('Error: the concerned polling station is not activated.');
                    break;
                //Edit presidential vote cast
                case 3:
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
                    if($inputData['transaction_type'] == 'parliamentary'){
                        return $this->getParliamentaryCandidates($inputData);
                        break;
                    }
                    
                //Get the parliamentary vote cast for the first Verifier
                case 8:
                    return $this->getParliamentaryCandidates($inputData);
                    break;
                
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
        if(($file->guessExtension() != 'jpg')&&($file->guessExtension() != 'jpeg')
                &&($this->validatorFactory3($inputData))){
            return array('Error: file Extension non suported.');
        }
        
        //Make sure every request have the key action
        if(((($inputData['action'] == 4 || $inputData['action'] == 5)/*||(condition for parliamentary)*/)
                &&($this->validatorFactory1($inputData))&&($this->validatorFactory3($inputData)))){ 
            
            switch ($inputData['action']){
                //Send presidential pinkSheet
                case 4:
                    //Get the user
                    $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['verifier_token']));
                    //Get the pollingStation 
                    $pollingStation = $user->getPollingStation();
                    
                    if(!$user||!$pollingStation){
                        return array('user or pollingStation not found in the DB.');
                    }
                    //return $pollingStation->getPrPinkSheet()->getName();
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
            }
        }
        
        return array('wrong data structure or validation fall----');
    }
    
    
    /**
     * @param Request $request
     * @return string
     * @dataStructure array('file' => v1, 'verifier_token' => v2,
     *                      'action' => v3, 'transaction_type' => v4);
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
        $directory = __DIR__.'/../../../web/pinkSheet';
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
        $directory = __DIR__.'/../../../web/pinkSheet';
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
        if(((array_key_exists('transaction_type', $inputData))&&(array_key_exists('pol_id', $inputData))
                &&(array_key_exists('verifier_token', $inputData)))
                &&((isset($inputData['transaction_type'])&&(isset($inputData['pol_id'])
                &&(isset($inputData['verifier_token'])))))){
            
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
            if(($inputData['verifier_token'] == $user->getUserToken())&&($user->isUserTokenValid($tokenTime))){
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
            //Check if it's first verifier then add $inputData['vote_cast'] => null
            //else (second verifier) load the $inputData['vote_cast'] value from the DB.
            if($inputData['action'] == 5){
                $data1['vote_cast'] = null;
            }elseif($inputData['action'] == 7){
                $data1['vote_cast'] = 'value from DB';
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
            
            //Check if it's first verifier then add $inputData['vote_cast'] => null
            //else (second verifier) load the $inputData['vote_cast'] value from the DB.
            if($inputData['action'] == 5){
                $data['vote_cast'] = null;
            }elseif($inputData['action'] == 7){
                $data['vote_cast'] = 'value from DB';
            }
            
            $data['name'] = $dep->getFirstName();
            $data['candidacy_number'] = $dep->getCandidacyNumber();
            array_push($data4, $data);
            $data = array();
        }
        
        $candidates[] = $data2;
        $candidates[] = $data4;
        
        return $candidates;
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
            
            
            $dependentParliamentaryVotes = $inputData['pa_votes']['dependent'];
            $independentParliamentaryVotes = $inputData['pa_votes']['independent'];
            
            //Treat dependent candidates
            foreach ($dependentParliamentaryVotes as $depId => $depVoteCast){
                //Get the current Dependent Candidate from the DB.
                $depCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find($depId);
                //Make sure this dependent candidate is in the DB.
                if(!$depCandidate){
                    return array('Error: parliamentary dependent candidate of ID:'.$depId.' not found in the DB.');
                }
                //Instentiate a parliamentary vote cast
                $paVoteCast = new PaVoteCast();
                //Hydrate $paVoteCast with the needed information
                $paVoteCast->setFigureValue($depVoteCast);
                $paVoteCast->setDependentCandidate($depCandidate);
                $paVoteCast->setPollingStation($pollingStation);
                //In the case wordValue functionality is used
                //$wordValue = some API or third party service...($value)
                //$paVoteCast->setWordValue($wordValue);
                //Persist all
                $this->em->persist($paVoteCast);
            }
            
            //Treat independent candidates
            foreach ($independentParliamentaryVotes as $indId => $indVoteCast){
                //Get the current Dependent Candidate from the DB.
                $indCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find($indId);
                //Make sure this dependent candidate is in the DB.
                if(!$indCandidate){
                    return array('Error: parliamentary independent candidate of ID:'.$indId.' not found in the DB.');
                }
                //Instentiate a parliamentary vote cast
                $paVoteCast = new PaVoteCast();
                //Hydrate $paVoteCast with the needed information
                $paVoteCast->setFigureValue($indVoteCast);
                $paVoteCast->setIndependentCandidate($indCandidate);
                $paVoteCast->setPollingStation($pollingStation);
                //In the case wordValue functionality is used
                //$wordValue = some API or third party service...($value)
                //$paVoteCast->setWordValue($wordValue);
                //Persist all
                $this->em->persist($paVoteCast);
            }
            
            //Confirm the persistence in the DB.
            //$this->em->flush();
            
            return array('parliamentary vote cast sent.');
        }
        
    }
    
    public function isParliamentaryVoteCastValid($data)
    {
        return true;
    }
}