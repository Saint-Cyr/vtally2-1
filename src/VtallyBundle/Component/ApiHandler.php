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
use VtallyBundle\Entity\PollingStation;
use VtallyBundle\Entity\Region;
use VtallyBundle\Entity\Constituency;
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
        $output = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
        return $output;
        
    }
    
    public function isDataStructureValid($inputData)
    {
        if(array_key_exists('action', $inputData)){
            
            switch ($inputData['action']){
                case 1:
                    if((array_key_exists('username', $inputData))&&(array_key_exists('password', $inputData))&&
                            ((isset($inputData['username'])&&(isset($inputData['password']))))){
                        return true;
                    }else{
                        return false;
                    }
                    break;
                case 2:
                    return false;
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
        //Get the user object based on the username
        $user = $this->em->getRepository('UserBundle:User')
                    ->findOneBy(array('username' => $inputData['username']));
        
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
        if(((array_key_exists('transaction_type', $inputData))&&(array_key_exists('pol_id', $inputData))&&
                (array_key_exists('figure_value', $inputData))&&(array_key_exists('verifier_token', $inputData)))
                &&((isset($inputData['transaction_type'])&&(isset($inputData['pol_id'])
                &&(isset($inputData['figure_value'])&&(isset($inputData['verifier_token']))))))){
            
            return true;
        }
        
        return false;
    }
    
    public function validatorFactory3($inputData)
    {
        if(array_key_exists('user_token', $inputData)){
            //Get the user from the DB in order to compare it token to the sent one
            $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('userToken' => $inputData['user_token']));
            
            if(!$user){
                return false;
            }
            
            //Get the setting
            $setting = $this->em->getRepository('VtallyBundle:Setting')->findOneBy(array('type' => 'default'));
            
            if(!$setting){
                //to be improved with a throw exception 
                var_dump('Setting not found in DB.');exit;
            }
            //The token must be valid and the it age too
            //NB the parameter $tokenTime must be provided by the parameter system
            //$tokenTime (in minute) is the value of the max lapsed time of inactivity
            $tokenTime = $setting->getTokenTime();
            
            if(($inputData['user_token'] == $user->getUserToken())&&($user->isUserTokenValid($tokenTime))){

                return true;
            }

            return false;
        }
        
        return false;
    }
}