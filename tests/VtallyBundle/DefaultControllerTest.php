<?php

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
        
        // get the Entity Manager
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
 
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
    
    public function testShowPost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
