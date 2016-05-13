<?php
/*
 * This file is part of test Components VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Input\ArrayInput;
use Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand;
use Doctrine\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\CreateSchemaDoctrineCommand;

use Doctrine\ORM\EntityManagerInterface;
use Hautelook\AliceBundle\Alice\Fixtures\Loader;
use Nelmio\Alice\Persister\Doctrine as DoctrinePersister;

use Hautelook\AliceBundle\Tests\KernelTestCase;


class PollingStationTest extends WebTestCase
{   
    private $em;
    private $application;
 
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
 
        $this->application = new Application(static::$kernel);
        
        // get the Entity Manager
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }
    
    public function testGetPresidentialVoteCast()
    {
        //Get the pollingStation 
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $polVotes = $pollingStation->getPresidentialVoteCastForAPI();
        //Case where the Data structure is right
        $dataStructure = array('NPP' => 0, 'NDC' => 1, 'UFP' => 150, 'CPP' => 25);
        $this->assertEquals($polVotes, $dataStructure);
        
        //Case where the Data structure is not right
        $dataStructure = array('CCN' => 0, 'NDC' => 1, 'UFP' => 150, 'CPP' => 25);
        $this->assertNotEquals($polVotes, $dataStructure);
        
        //Case where the Data structure is not right
        $dataStructure = array('NPP' => 0, 'NDC' => 2, 'UFP' => 150, 'CPP' => 25);
        $this->assertNotEquals($polVotes, $dataStructure);
    }
    
    public function testIsOnePresidentialChanged()
    {
        //Get the pollingStation 
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        
        //Cases where there is a chanaged (NPP changed to be = 3 instead of 0)
      
        //Case 1: set give to NDC 3 instead of 0
        $onePrVoteCast = array('NDC' => 3);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //Make sure the result return a voteCast before call on it to evoid error
        $this->assertEquals($prVoteCast->getPrParty()->getName(), 'NDC');
        $this->assertEquals($prVoteCast->getFigureValue(), 1);
        //Make sure the this vote cast is linked to the right polling Station
        $this->assertEquals($prVoteCast->getPollingStation()->getName(), 'Pol. Station 1');
        
        //Case 1: set give to NPP 3 instead of 0
        $onePrVoteCast = array('NPP' => 3);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //Make sure the result return a voteCast before call on it to evoid error
        $this->assertEquals($prVoteCast->getPrParty()->getName(), 'NPP');
        $this->assertEquals($prVoteCast->getFigureValue(), 0);
        //Make sure the this vote cast is linked to the right polling Station
        $this->assertEquals($prVoteCast->getPollingStation()->getName(), 'Pol. Station 1');
        
        //Case 1: set give to NPP 3 instead of 0
        $onePrVoteCast = array('UFP' => 145);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //Make sure the result return a voteCast before call on it to evoid error
        $this->assertEquals($prVoteCast->getPrParty()->getName(), 'UFP');
        $this->assertEquals($prVoteCast->getFigureValue(), 150);
        //Make sure the this vote cast is linked to the right polling Station
        $this->assertEquals($prVoteCast->getPollingStation()->getName(), 'Pol. Station 1');
        
        //Cases where there is no change (same value like in the fixtures)
      
        //Case 1: set give to NDC 3 instead of 0
        $onePrVoteCast = array('NDC' => 1);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //When there is not change the output must by false
        $this->assertFalse($prVoteCast);
        
        //Case 1: set give to NPP 3 instead of 0
        $onePrVoteCast = array('NPP' => 0);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //When there is not change the output must by false
        $this->assertFalse($prVoteCast);
        
        //Case 1: set give to NPP 3 instead of 0
        $onePrVoteCast = array('UFP' => 150);
        $prVoteCast = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        //When there is not change the output must by false
        $this->assertFalse($prVoteCast);
    }
    
    public function testIsPresidentialVoteCastsMatch()
    {
        //Get the pollingStation 
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        
        //Case where votes matched
        $dataStructure = array('NPP' => 0, 'NDC' => 1, 'UFP' => 150, 'CPP' => 25);
        //Call the method to test
        $outPut = $pollingStation->isPresidentialVoteCastsMatch($dataStructure);
        $this->assertTrue($outPut);
        
        //Case where votes mismatched (NPP value has changed)
        $dataStructure = array('NPP' => 9999, 'NDC' => 1, 'UFP' => 150, 'CPP' => 25);
        //Call the method to test
        $outPut = $pollingStation->isPresidentialVoteCastsMatch($dataStructure);
        $this->assertNotTrue($outPut);
    }
    
    public function testIsParliamentaryDepVoteCastMatch()
    {   
        //Case of independentCandidate
      
        //Vivien (pol. Station 1)
        $pollingStation1 = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $independateCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find(1);
        $out = $pollingStation1->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Vivien');
        $this->assertEquals($out->getFigureValue(), 100);
        
        //Joella (pol. Station 1)
        $pollingStation1 = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $independateCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find(2);
        $out = $pollingStation1->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Joella');
        $this->assertEquals($out->getFigureValue(), 7);
        
        //Joella (pol. Station 2)
        $pollingStation2 = $this->em->getRepository('VtallyBundle:PollingStation')->find(2);
        $independateCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find(2);
        $out = $pollingStation2->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Joella');
        $this->assertEquals($out->getFigureValue(), 150);
        
        //Sonde (pol. Station 4)
        $pollingStation4 = $this->em->getRepository('VtallyBundle:PollingStation')->find(4);
        $independateCandidate = $this->em->getRepository('PaBundle:IndependentCandidate')->find(4);
        $out = $pollingStation4->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Sonde');
        $this->assertEquals($out->getFigureValue(), 201);
        
        //Case of dependentCandidate
      
        //Jhon (pol. Station 1)
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $independateCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find(1);
        $out = $pollingStation->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Jhon');
        $this->assertEquals($out->getFigureValue(), 100);
        
        //Jhon (pol. Station 2)
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(2);
        $independateCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find(1);
        $out = $pollingStation->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Jhon');
        $this->assertEquals($out->getFigureValue(), 600);
        
        //Jannette (pol. Station 1)
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $independateCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find(7);
        $out = $pollingStation->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Jannette');
        $this->assertEquals($out->getFigureValue(), 280);
        
        //Jannette (pol. Station 4)
        $pollingStation = $this->em->getRepository('VtallyBundle:PollingStation')->find(4);
        $independateCandidate = $this->em->getRepository('PaBundle:DependentCandidate')->find(2);
        $out = $pollingStation->getOneParliamentaryVoteCast($independateCandidate);
        //Make sure guessing on the right fixture
        $this->assertEquals($independateCandidate->getFirstName(), 'Olga');
        $this->assertEquals($out->getFigureValue(), 721);
    }
}
