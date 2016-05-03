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


class DefaultControllerTest extends WebTestCase
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
        
        //$this->initialization();  
    }
    
    public function testHomePage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
    
    public function testGetTotalVoteCast()
    {
        //Dependent Candidate
        $depCandidate1 = $this->em->getRepository('PaBundle:DependentCandidate')->find(1);
        $depCandidate2 = $this->em->getRepository('PaBundle:DependentCandidate')->find(2);
        $depCandidate3 = $this->em->getRepository('PaBundle:DependentCandidate')->find(3);
        $depCandidate4 = $this->em->getRepository('PaBundle:DependentCandidate')->find(4);
        $depCandidate5 = $this->em->getRepository('PaBundle:DependentCandidate')->find(5);
        $depCandidate6 = $this->em->getRepository('PaBundle:DependentCandidate')->find(6);
        //...
        $depCandidate13 = $this->em->getRepository('PaBundle:DependentCandidate')->find(13);
        
        //Independent Candidate
        $indepCandidate1 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(1);
        $indepCandidate2 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(2);
        $indepCandidate3 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(3);
        $indepCandidate4 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(4);
        $indepCandidate5 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(5);
        $indepCandidate6 = $this->em->getRepository('PaBundle:IndependentCandidate')->find(6);
        
        //Test whether the test scenario in the documentation is synchronized with the code (dependent candidates)
        $this->assertEquals('Jhon', $depCandidate1->getFirstName());
        $this->assertEquals('Olga', $depCandidate2->getFirstName());
        $this->assertEquals('Jephte', $depCandidate3->getFirstName());
        $this->assertEquals('Bambi', $depCandidate4->getFirstName());
        $this->assertEquals('Joel', $depCandidate5->getFirstName());
        $this->assertEquals('Jehu', $depCandidate6->getFirstName());
        
        //Test whether the test scenario in the documentation is synchronized with the code (independent candidates)
        $this->assertEquals('Vivien', $indepCandidate1->getFirstName());
        $this->assertEquals('Joella', $indepCandidate2->getFirstName());
        $this->assertEquals('Adde', $indepCandidate3->getFirstName());
        $this->assertEquals('Sonde', $indepCandidate4->getFirstName());
        $this->assertEquals('Panda', $indepCandidate5->getFirstName());
        $this->assertEquals('Nadege', $indepCandidate6->getFirstName());
        
        //Test the total vote cast methode for dependentCandidate (only NPP)
        $this->assertEquals(900, $depCandidate1->getTotalVoteCast());
        $this->assertEquals(721, $depCandidate2->getTotalVoteCast());
        $this->assertEquals(595, $depCandidate3->getTotalVoteCast());
        $this->assertEquals(380, $depCandidate4->getTotalVoteCast());
        $this->assertEquals(498, $depCandidate5->getTotalVoteCast());
        $this->assertEquals(150, $depCandidate6->getTotalVoteCast());
        $this->assertEquals(798, $depCandidate13->getTotalVoteCast());
        
        //Test the total vote cast methode for independentCandidate (only 6 first)
        $this->assertEquals(600, $indepCandidate1->getTotalVoteCast());
        $this->assertEquals(307, $indepCandidate2->getTotalVoteCast());
        $this->assertEquals(502, $indepCandidate3->getTotalVoteCast());
        $this->assertEquals(201, $indepCandidate4->getTotalVoteCast());
        $this->assertEquals(290, $indepCandidate5->getTotalVoteCast());
        $this->assertEquals(702, $indepCandidate6->getTotalVoteCast());
    }
    
    public function testGetWinner()
    {
        $cons1 = $this->em->getRepository('VtallyBundle:Constituency')->find(1);
        $cons2 = $this->em->getRepository('VtallyBundle:Constituency')->find(2);
        $cons3 = $this->em->getRepository('VtallyBundle:Constituency')->find(3);
        $cons4 = $this->em->getRepository('VtallyBundle:Constituency')->find(4);
        $cons5 = $this->em->getRepository('VtallyBundle:Constituency')->find(5);
        $cons6 = $this->em->getRepository('VtallyBundle:Constituency')->find(6);
        $cons7 = $this->em->getRepository('VtallyBundle:Constituency')->find(7);
        
        $winner1 = $cons1->getWinner();
        $winner2 = $cons2->getWinner();
        $winner3 = $cons3->getWinner();
        $winner4 = $cons4->getWinner();
        $winner5 = $cons5->getWinner();
        $winner6 = $cons6->getWinner();
        //must be null (election is not yet started or no candidate is link to the related constituency - $cons7)
        $winner7 = $cons7->getWinner();
        
        //The output must be null where nobody is currently winning
        $this->assertEquals($winner7, null);
        
        //Winner of the consituency 1
        $this->assertEquals(900, $winner1->getTotalVoteCast());
        $this->assertEquals('Jhon', $winner1->getFirstName());
        $this->assertNotTrue($winner1->isIndependentCandidate());
        
        //Winner of the consituency 2
        $this->assertEquals(721, $winner2->getTotalVoteCast());
        $this->assertEquals('Olga', $winner2->getFirstName());
        $this->assertNotTrue($winner2->isIndependentCandidate());
        
        //Winner of the consituency 3
        $this->assertEquals(702, $winner3->getTotalVoteCast());
        $this->assertEquals('Nadege', $winner3->getFirstName());
        $this->assertTrue($winner3->isIndependentCandidate());
        
        //Winner of the consituency 4
        $this->assertEquals(800, $winner4->getTotalVoteCast());
        $this->assertEquals('UFP', $winner4->getPaParty());
        $this->assertEquals('Victorien', $winner4->getFirstName());
        $this->assertNotTrue($winner4->isIndependentCandidate());
        
        //Winner of the consituency 5
        $this->assertEquals(900, $winner5->getTotalVoteCast());
        $this->assertEquals('Chancella', $winner5->getFirstName());
        $this->assertNotTrue($winner5->isIndependentCandidate());
        
        //Winner of the consituency 6
        $this->assertEquals(1023, $winner6->getTotalVoteCast());
        $this->assertEquals('Baden', $winner6->getFirstName());
        $this->assertTrue($winner6->isIndependentCandidate());
    }
    
    public function initialization()
    {
        // drop the database
        $command = new DropDatabaseDoctrineCommand();
        $this->application->add($command);
        $input = new ArrayInput(array(
            'command' => 'doctrine:database:drop',
            '--force' => true
        ));
        $command->run($input, new NullOutput());
 
        // we have to close the connection after dropping the database so we don't get "No database selected" error
        $connection = $this->application->getKernel()->getContainer()->get('doctrine')->getConnection();
        if ($connection->isConnected()) {
            $connection->close();
        }
 
        // create the database
        $command = new CreateDatabaseDoctrineCommand();
        $this->application->add($command);
        $input = new ArrayInput(array(
            'command' => 'doctrine:database:create',
        ));
        $command->run($input, new NullOutput());
 
        // create schema
        $command = new CreateSchemaDoctrineCommand();
        $this->application->add($command);
        $input = new ArrayInput(array(
            'command' => 'doctrine:schema:create',
        ));
        $command->run($input, new NullOutput());
        
        
 
        // load fixtures
        $container = static::$kernel->getContainer();
        $kernel =  $container->get('kernel');
        
        $container
            ->get('hautelook_alice.doctrine.executor.fixtures_executor')
            ->execute(
                $this->em,
                $container->get('hautelook_alice.doctrine.orm.loader_generator')->generate(
                $container->get('hautelook_alice.fixtures.loader'),
                $container->get('hautelook_alice.alice.fixtures.loader'),
                $kernel->getBundles(), 'test'),
                $container->get('hautelook_alice.doctrine.orm.fixtures_finder')
                                ->resolveFixtures(
                                                  $kernel, array('@VtallyBundle/DataFixtures/ORM/Vtally.yml', '@PaBundle/DataFixtures/ORM/parliamentary.yml',
                                                                 '@PrBundle/DataFixtures/ORM/presidential.yml')),
                                                  false, //If true, data will not be purged
                                                  function ($message) { }, //Can be used for logging, if needed
                                                  false); //If true, truncates instead of deleting    
    }
    
    public function testOk()
    {
        $this->assertEquals(true, true);
    }
}
