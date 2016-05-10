<?php

/*
 * This file is part of Components of VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace VtallyBundle\Tests\Component;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PrBundle\Entity\PrParty;

class ApiHandlerTest extends WebTestCase
{
    private $em;
    private $application;


    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        
        $this->application = new Application(static::$kernel);
        $this->em = $this->application->getKernel()->getContainer()->get('doctrine.orm.entity_manager');
    }
    
   public function testLogin()
   {
       //Get the apiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //Case where login successfully
       $inputData = array('action' => 1, 'username' => 'verifier1', 'password' => 'test');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut, array('first_name' => 'VERIFIER 1', 'pol_id' => 'Pol. Station 1'));
       
       $outPut = $apiHandler->process($inputData);
       $this->assertEquals($outPut, array('first_name' => 'VERIFIER 1', 'pol_id' => 'Pol. Station 1'));
       
       //Case login faild: wrong username
       $inputData = array('username' => 'verifier11', 'password' => 'test');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut, array('Bad credentials.'));
       
       //Case login faild: wrong password
       $inputData = array('username' => 'verifier1', 'password' => 'testt');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut, array('Bad credentials.'));
   }
   
   public function testSendPresidentialVoteCast()
   {
       //Get the ApiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       //Refresh the user
       $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('username' => 'verifier1'));
       $user->refreshTokenTime();
       //Case where sending presidential data does succed
       $inputData = array('transaction_type' => 'presidential', 'verifier_token' => 'ABCD1', 'pol_id' => 1,
                          'pr_votes' => array('NPP' => 0, 'NDC' => 0, 'UFP' => 0));
       
       $outPut = $apiHandler->sendPresidentialVoteCast($inputData);
       $this->assertEquals($outPut, array('presidential vote cast sent!'));
       
       //Case where sending presidential data doesn't succed (transation_type => Parliamentary)
       $inputData = array('transaction_type' => 'Parliamentary', 'verifier_token' => 'ABCD1', 'pol_id' => 1,
                          'pr_votes' => array('NPP' => 0, 'NDC' => 0, 'UFP' => 0));
       
       $outPut = $apiHandler->sendPresidentialVoteCast($inputData);
       $this->assertEquals($outPut, array('Invalid data structure.'));
       
       //Case where sending presidential data succed
   }
   
   public function testEditPresidentialVoteCast()
   {
       //Get the apiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       /*Case where sending presidential data does succed
       $inputData = array('action' => 3, 'transaction_type' => 'presidential',
                          'verifier_token' => 'ABCD2', 'votes' => array('NPP' => 0, 'NDC' => 1));
       
       $outPut = $apiHandler->editPresidentialVoteCast($inputData);
       $this->assertEquals($outPut, array('presidential vote cast sent!'));*/
   }
   
  
    
   public function testIsDataStructureValid()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //The only valid data structure for action => 1
       $inputData1 = array('action' => 1, 'username' => 'verifier1', 'password' => 'test');
       //Make sure to set the pollingStation active manually after loading the fixtures
       $this->assertTrue($apiHandler->isDataStructureValid($inputData1));
       
       //All the false Data structure
       $inputData2 = array('action' => 1, 'username' => null, 'password' => 'test');
       $this->assertNotTrue($apiHandler->isDataStructureValid($inputData2));
       
       $inputData3 = array('action' => 1, 'username' => 'super-admin', 'password' => null);
       $this->assertNotTrue($apiHandler->isDataStructureValid($inputData3));
       
       $inputData4 = array('username' => 'super-admin', 'password' => null);
       $this->assertNotTrue($apiHandler->isDataStructureValid($inputData4));
   }
   
   public function testIsAuthentic()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       // Can login
       $output = $apiHandler->isAuthentic('super-admin', 'test'); 
       $this->assertEquals($output->getFirstName(), 'Vladimir');
       // Can not login
       $output = $apiHandler->isAuthentic('super-adminnn', 'testt');
       $this->assertFalse($output);
       
       $output = $apiHandler->isAuthentic('super-admin', 'testt');
       $this->assertFalse($output);
   }
   
   public function testValidatorFactory1()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //When send the right data with username
       $inputData = array('action' => 1, 'username' => 'verifier1', 'password' => 'test');
       $output = $apiHandler->validatorFactory1($inputData);
       //Bacause Pol. Station 1 is activated by the fixtures
       $this->assertTrue($output);
       
       //When send the right data with verifier_token
       $inputData = array('action' => 1, 'verifier_token' => 'ABCD1', 'password' => 'test');
       $output = $apiHandler->validatorFactory1($inputData);
       //Bacause Pol. Station 1 is activated by the fixtures
       $this->assertTrue($output);
       
       //When send the wrong data 
       $inputData = array('action' => 1, 'username' => 'Quinton9', 'password' => 'test');
       $output = $apiHandler->validatorFactory1($inputData);
       $this->assertNotTrue($output);
   }
   
   public function testValidatorFactory2()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //When send the right data
       $inputData = array('transaction_type' => 'Presidential', 'pol_id' => 1, 'verifier_token' => 'AJNN#@NODIFNLSD23oid09++-D');
       $output = $apiHandler->validatorFactory2($inputData);
       $this->assertTrue($output);
       
       //When send the wrong data(absence of the the key transaction_type
       $inputData = array('pol_id' => 1, 'figure_value' => 100, 'verifier_token' => 'AJNN#@NODIFNLSD23oid09++-D');
       $output = $apiHandler->validatorFactory2($inputData);
       $this->assertNotTrue($output);
   }
   
   public function testValidatorFactory3()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //When send the right data
       $inputData = array('verifier_token' => 'ABCD1');
       $outPut = $apiHandler->validatorFactory3($inputData);
       
       $this->assertTrue($outPut);
       
       //When send the right data
       $inputData = array('transaction_type' => 'Presidential', 'pol_id' => 1, 'figure_value' => 100, 'verifier_token' => 'ABCD');
       $outPut = $apiHandler->validatorFactory3($inputData);
       
       $this->assertNotTrue($outPut);
   }
   
   public function testGetParliamentaryCandidates()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       //When send the right data
       //list of independent and dependent candidate of the context pollingStation (For Constituency 1)
       $inputData = array('verifier_token' => 'ABCD1', 'transaction_type' => 'parliamentary');
       $output = $apiHandler->getParliamentaryCandidates($inputData);
       $indCandidates = array(array('Vivien', 1), array('Joella', 2), array('Adde', 5));
       $depCandidates = array(array('Jhon', 1), array('Jannette', 2),  array('Sondra', 2), array('Fadde', 2));
       $this->assertEquals($output, array($indCandidates, $depCandidates));
   }
   
   public function testSendParliamentaryVoteCast()
   {
       //Case where sending parliamentary votes succed
       //Get the api service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       //Refresh the user
       $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('username' => 'verifier1'));
       $user->refreshTokenTime();
       //Set the pollingStation->isParliamentary to true in order for the test to passe because by default the fixture does not so
       $pollingStation = $user->getPollingStation();
       $pollingStation->setParliamentary(false);
       //Gathering all types of candidates (independent and dependent)
       //NB the Data strucutre use key => value like id => voteCast
       //$indCandidates = array(1 => 'Vivien', 'Joella' => 2, 'Adde' => 5);
       $indCandidates = array(1 => 7777, 2 => 8888, 3 => 9999);
       //$depCandidates = array('Jhon' => 1, 'Jannette' => 2,  'Sondra' => 2, 'Fadde' => 2);
       $depCandidates = array(1 => 2222, 7 => 3333,  13 => 4444, 19 => 5555);
       
       $candidates = array('independent' => $indCandidates, 'dependent' => $depCandidates);
       
       $inputData = array('action' => 6, 'transaction_type' => 'parliamentary', 'verifier_token' => 'ABCD1', 'pol_id' => 1,
                          'pa_votes' => $candidates);
       
       $outPut = $apiHandler->process($inputData);
       $this->assertEquals($outPut, array('parliamentary vote cast sent.'));
       
   }
}
  