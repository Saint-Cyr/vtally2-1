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
        
        //Case where there is a chanaged (NPP changed to be = 3 instead of 0)
        $onePrVoteCast = array('NPP' => 3);
        $out = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        $this->assertEquals(array('NPP' => 0), $out);
        
        //Case where there is not chanage
        $onePrVoteCast = array('NPP' => 0);
        $out = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        $this->assertNotTrue($out);
        
        //Case where there is not chanage
        $onePrVoteCast = array('NDC' => 1);
        $out = $pollingStation->isOnePresidentialVoteCastChanged($onePrVoteCast);
        $this->assertNotTrue($out);
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
}
