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
    private $statisticHandler;


    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        
        $this->application = new Application(static::$kernel);
        $this->em = $this->application->getKernel()->getContainer()->get('doctrine.orm.entity_manager');
        $this->statisticHandler = $this->application->getKernel()->getContainer()->get('vtally.statistic_handler');
    }
    
   public function testIsDataStructureValid()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //The only valid data structure for action => 1
       $inputData1 = array('action' => 1, 'username' => 'super-admin', 'password' => 'test');
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
       
       //When send the right data
       $inputData = array('action' => 1, 'username' => 'Quinton92', 'password' => 'test');
       $output = $apiHandler->validatorFactory1($inputData);
       //Bacause Pol. Station 1 is not yet activated
       $this->assertNotTrue($output);
       
       //When send the wrong data 
       $inputData = array('action' => 1, 'username' => 'Quinton9', 'password' => 'test');
       $output = $apiHandler->validatorFactory1($inputData);
       $this->assertNotTrue($output);
   }
   
   public function testValidatorFactory2()
   {
       $apiHandler = $this->application->getKernel()->getContainer()->get('vtally.api_handler');
       
       //When send the right data
       $inputData = array('transaction_type' => 'Presidential', 'pol_id' => 1, 'figure_value' => 100, 'verifier_token' => 'AJNN#@NODIFNLSD23oid09++-D');
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
       $inputData = array('transaction_type' => 'Presidential', 'pol_id' => 1, 'figure_value' => 100, 'user_token' => 'ABCD1');
       //Got
   }
}
 