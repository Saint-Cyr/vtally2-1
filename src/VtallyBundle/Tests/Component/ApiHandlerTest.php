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
       
       //Case where login successfully for 1st verifier
       $inputData = array('action' => 600, 'username' => 'verifier1', 'password' => 'test');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut->getData(), array('first_name' => 'VERIFIER 1', 'pol_id' => 'Pol. Station 1', 'verifier_token' => 'ABCD1'));
       
       //Case where login successfully for 2nd verifier
       $inputData = array('action' => 600, 'username' => 'verifier2', 'password' => 'test');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut->getData(), array('first_name' => 'VERIFIER 2', 'pol_id' => 'Pol. Station 1', 'verifier_token' => 'ABCD2'));
       
       //Case login faild: wrong username
       $inputData = array('username' => 'verifier11', 'password' => 'test');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut->getData(), array('Bad credentials.'));
       
       //Case login faild: wrong password
       $inputData = array('username' => 'verifier1', 'password' => 'testt');
       $outPut = $apiHandler->login($inputData);
       $this->assertEquals($outPut->getData(), array('Bad credentials.'));
   }
   
   public function testEditPresidentialVoteCast()
   {
       //Get the apiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //Case where edit presidential data does succed
       $inputData = array('action' => 704, 'transaction_type' => 'presidential',
                          'verifier_token' => 'ABCD1', 'pr_votes' => array('NPP' => 0, 'NDC' => 1));
       //Set the $pollingStation->isPresidential() to true;
       $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
       $pollingStation->setPresidential(true);
       $outPut = $apiHandler->editPresidentialVoteCast($inputData);
       $this->assertEquals($outPut->getData(), array('info' => 'presidential vote cast comfirmed.', 'verifier_token' => 'ABCD1'));
   }
   
   public function testSendPresidentialVoteCast()
   {
       //Get the ApiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       //Set the $pollingStation->isPresidential() to false;
       $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
       $pollingStation->setPresidential(false);
       //Refresh the user
       $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('username' => 'verifier1'));
       $user->refreshTokenTime();
       //Case where sending presidential data does succed
       $inputData = array('transaction_type' => 'presidential', 'verifier_token' => 'ABCD1', 'action' => 702,
                          'pr_votes' => array('NPP' => 0, 'NDC' => 0, 'UFP' => 0));
       
       $outPut = $apiHandler->process($inputData);
       $this->assertEquals($outPut->getData(), array('info' => 'presidential vote cast sent.', 'verifier_token' => 'ABCD1'));
       
       //Case where sending votes does not succed
       $inputData = array('transaction_type' => 'presidential', 'verifier_token' => 'ABCD####', 'action' => 702,
                          'pr_votes' => array('NPP' => 0, 'NDC' => 0, 'UFP' => 0));
       
       $outPut = $apiHandler->process($inputData);
       $this->assertEquals($outPut->getData(), array('user of verifier_token: ABCD#### not found in the DB'));
       
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
       
       //When request by the 1st Verifier
       //list of independent and dependent candidate of the context pollingStation (For Constituency 1)
       $inputData = array('verifier_token' => 'ABCD1', 'transaction_type' => 'parliamentary', 'action' => 800);
       $output = $apiHandler->process($inputData);
       
       $candidates = ['independent' => [
                            ['id' => 1, 'name' => 'Vivien', 'candidacy_number' => 1, 'vote_cast' => null],
                            ['id' => 2, 'name' => 'Joella', 'candidacy_number' => 2, 'vote_cast' => null],
                            ['id' => 3, 'name' => 'Adde', 'candidacy_number' => 5, 'vote_cast' => null]
                        ],
       
       'dependent' => [
                            ['id' => 1, 'name' => 'Jhon', 'candidacy_number' => 1, 'vote_cast' => null],
                            ['id' => 7, 'name' => 'Jannette', 'candidacy_number' => 2, 'vote_cast' => null],
                            ['id' => 13, 'name' => 'Sondra', 'candidacy_number' => 2, 'vote_cast' => null],
                            ['id' => 19, 'name' => 'Fadde', 'candidacy_number' => 2, 'vote_cast' => null]
                        ], 'verifier_token' => 'ABCD1'];
       
       $this->assertEquals($output->getData(), $candidates);
       //When request by the 2nd verifier     
      $candidates = [
                       //Independent candidates
                    'independent' =>   [
                                            ["id" => 1,"vote_cast" => 100,"name" => "Vivien","candidacy_number" => 1],
                                            ["id" => 2,"vote_cast" => 7,"name" => "Joella","candidacy_number" => 2],
                                            ["id" => 3,"vote_cast" => 2,"name" => "Adde","candidacy_number" => 5]
                                        ],
                       //Dependent candidates
                    'dependent' =>      [
                                            ["id" => 1,"vote_cast" => 100,"name" => "Jhon","candidacy_number" => 1],
                                            ["id" => 7,"vote_cast" => 280,"name" => "Jannette","candidacy_number" => 2],
                                            ["id" => 13,"vote_cast" => 98,"name" => "Sondra","candidacy_number" => 2],
                                            ["id" => 19,"vote_cast" => 0,"name" => "Fadde","candidacy_number" => 2]
                                        ],
                    'verifier_token' => 'ABCD2'
                    ];
       
       $inputData = array('verifier_token' => 'ABCD2', 'transaction_type' => 'parliamentary', 'action' => 801);
       $output = $apiHandler->process($inputData);
       $this->assertEquals($output->getData(), $candidates);
   }
   
   public function testGetPresidentialVoteCast()
   {
       //Case where the data structure is right
       //Get the API handler
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       /***************---When request by the firstVerifier----**********************/
       //list of presidential dependendCandidates and the data structure
       $inputData = array('verifier_token' => 'ABCD1', 'transaction_type' => 'presidential', 'action' => 700);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $presidentialCandidates =['pr_votes' => ['NPP' => null, 'NDC' => null, 'UFP' => null, 'CPP' => null,
                                  'PPP' => null, 'NCP' => null, 'PCP' => null, 'GFP' => null, ], 'verifier_token' => 'ABCD1'];
       
       $this->assertEquals($outPut->getData(), $presidentialCandidates);
       
       //Case where the data structure si not right 
       //Wrong verifier token
       $inputData = array('verifier_token' => 'ABCD900', 'transaction_type' => 'presidential', 'action' => 700);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $presidentialCandidates = array('Error: wrong data structure or validation faild.');
       
       $this->assertEquals($outPut->getData(), $presidentialCandidates);
       
       //Wrong transaction_type
       $inputData = array('verifier_token' => 'ABCD900', 'transaction_type' => 'parliamentary', 'action' => 700);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $response = array('Error: wrong data structure or validation faild.');
       $this->assertEquals($outPut->getData(), $response);
       
       //Wrong action #ID
       $inputData = array('verifier_token' => 'ABCD900', 'transaction_type' => 'parliamentary', 'action' => 777);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $response = array('Error: wrong data structure or validation faild.');
       $this->assertEquals($outPut->getData(), $response);
       
       /***************---When request by the second verifier----**********************/
       //When it successed
       //Data structure is right
       $inputData = array('verifier_token' => 'ABCD2', 'transaction_type' => 'presidential', 'action' => 701);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $presidentialCandidates = ['pr_votes' => ['NPP' => 0, 'NDC' => 1, 'UFP' => 150, 'CPP' => 25, ], 'verifier_token' => 'ABCD2'];
       $this->assertEquals($outPut->getData(), $presidentialCandidates);
       
       //When it faild
       //Data structure is not right (wrong token)
       $inputData = array('verifier_token' => 'ABCD888##!', 'transaction_type' => 'presidential', 'action' => 701);
       //make the request
       $outPut = $apiHandler->process($inputData);
       $response = array('Error: wrong data structure or validation faild.');
       
       $this->assertEquals($response, $outPut->getData());
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
       $indCandidates = array(
                        1 => 
                            [
                              "id" => 1,
                              "vote_cast" => 100,
                              "name" => "Vivien",
                              "candidacy_number" => 1
                            ],
                        2 =>
                            [
                              "id" => 2,
                              "vote_cast" => 7,
                              "name" => "Joella",
                              "candidacy_number" => 2
                            ],
                        3 => 
                            [
                              "id" => 3,
                              "vote_cast" => 2,
                              "name" => "Adde",
                              "candidacy_number" => 5
                            ]
                        );
       $depCandidates = array(
                        1 => 
                            [
                              "id" => 1,
                              "vote_cast" => 100,
                              "name" => "Jhon",
                              "candidacy_number" => 1
                            ],
                        2 =>
                            [
                              "id" => 7,
                              "vote_cast" => 280,
                              "name" => "Jannette",
                              "candidacy_number" => 2
                            ],
                        3 => 
                            [
                              "id" => 13,
                              "vote_cast" => 98,
                              "name" => "Sondra",
                              "candidacy_number" => 2
                            ],
                        4 => 
                            [
                              "id" => 19,
                              "vote_cast" => 0,
                              "name" => "Fadde",
                              "candidacy_number" => 2
                            ]
                        );
       
       
       $candidates = array('independent' => $indCandidates, 'dependent' => $depCandidates);
       
       $inputData = array('action' => 802, 'transaction_type' => 'parliamentary', 'verifier_token' => 'ABCD1', 'pol_id' => 1,
                          'pa_votes' => $candidates);
       
       $outPut = $apiHandler->process($inputData);
       $this->assertEquals($outPut->getData(), array('parliamentary vote cast sent.', 'verifier_token' => 'ABCD1'));
   }
   
   public function testEditParliamentaryVoteCast()
   {
       //Get the apiHandler service
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //Case where edit parliamentary vote cast does not happend
       $inputData = array('action' => 804, 'transaction_type' => 'parliamentary',
                          'verifier_token' => 'ABCD1', 'pa_votes' => array('independent' => array(array('id' => 1, 'vote_cast' => 100, 'name' => 'Vivien', 'candidacy_number' => 1)), 
                                                                            'dependent' => array(array('id' => 1, 'vote_cast' => 100, 'name' => 'Jhon', 'candidacy_number' => 1))));
       //Set the $pollingStation->isPresidential() to true;
       $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
       $pollingStation->setParliamentary(true);
       $outPut = $apiHandler->editParliamentaryVoteCast($inputData);
       $this->assertEquals($outPut->getData(), array('info' => 'parliamentary vote cast confirmed.', 'verifier_token' => 'ABCD1'));
   }
}
  