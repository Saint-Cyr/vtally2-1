<?php

/*
 * This file is part of Components of VTALLY2 project
 * contributor(s): Saint-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace VtallyBundle\Tests\Component;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PrBundle\Entity\PrParty;

class StatisticHandlerTest extends WebTestCase
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
    
    /**
     * Test scenario for Parliamentary
     * Contributor: Saint-Cyr MAPOUKA
     */
    public function testGetSiteNumber()
    {   
        //Get a set of constituencies
        $const1 = $this->em->getRepository('VtallyBundle:Constituency')->find(1);
        $const2 = $this->em->getRepository('VtallyBundle:Constituency')->find(2);
        $const3 = $this->em->getRepository('VtallyBundle:Constituency')->find(3);
        $const4 = $this->em->getRepository('VtallyBundle:Constituency')->find(4);
        $const5 = $this->em->getRepository('VtallyBundle:Constituency')->find(5);
        $const6 = $this->em->getRepository('VtallyBundle:Constituency')->find(6);
        
        //Get the set of parties
        $parties = $this->em->getRepository('PaBundle:PaParty')->findAll();
        
        //Get the set of independent
        $indepentCandidates = $this->em->getRepository('PaBundle:independentCandidate')->findAll();
        
        //Gather the constituencies in on array 
        $constituencies = array($const1, $const2, $const3, $const4, $const5, $const6);
        
        //Call the statisticHandler service's methode
        $sites = $this->statisticHandler->getSiteNumber($constituencies, $parties, $indepentCandidates);
        $parties1 = $sites['parties'];
        
        //Test that there are 2 sites for NPP (Dependent Candidate)
        $NPP = $parties[0];
        $this->assertEquals($NPP->getSiteNumber(), 2);
        $this->assertEquals($NPP->getName(), 'NPP');
        
        //Test that there are 0 sites for NDC (Dependent Candidate)
        $NDC = $parties[1];
        $this->assertEquals($NDC->getSiteNumber(), 0);
        $this->assertEquals($NDC->getName(), 'NDC');
        
        //Test that there are 0 sites for UFP (Dependent Candidate)
        $UFP = $parties[2];
        $this->assertEquals($UFP->getSiteNumber(), 1);
        $this->assertEquals($UFP->getName(), 'UFP');
        
        //Test that there are 0 sites for UFP (Dependent Candidate)
        $CPP = $parties[3];
        $this->assertEquals($CPP->getSiteNumber(), 1);
        $this->assertEquals($CPP->getName(), 'CPP');
        
        //Test that there is 1 site for the IC (Independent Candidate)
        $this->assertEquals($sites['IC'], 2);
        
        //Technical verification
        //Check the total number of the parties (defined in the fixtures) involved
        $this->assertEquals(count($parties1), 4);
        
        //Make sure that if non arguments has be given, the output is null
        $site1 = $this->statisticHandler->getSiteNumber($constituencies, null, null);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertEquals($site1, $site2);
        
        //Test when only parties are available
        $site1 = $this->statisticHandler->getSiteNumber($constituencies, $parties, null);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertNotEquals($site1, $site2);
        
        //Test when only indenpendent candidates are available
        $site1 = $this->statisticHandler->getSiteNumber($constituencies, null, $indepentCandidates);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertNotEquals($site1, $site2);
    }
    
    /**
     * Test scenario for Presidential
     * Contributor: Saint-Cyr MAPOUKA
     */
    public function testPresidentialMerge()
    {
        //Collection of a given pollingStation (P1)
        $NPP1 = new PrParty;
        $NDC1 = new PrParty;
        $UFP1 = new PrParty;
        $CPP1 = new PrParty;
        //Collection of a given pollingStation (P2)
        $NPP2 = new PrParty;
        $NDC2 = new PrParty;
        $UFP2 = new PrParty;
        $CPP2 = new PrParty;
        //Merged collection
        $NPP3 = new PrParty;
        $NDC3 = new PrParty;
        $UFP3 = new PrParty;
        $CPP3 = new PrParty;
        $CPP4 = new PrParty;
        
        //Collection of a given pollingStation (P1)
        $NPP1->initializeVoteCast(20);
        $NDC1->initializeVoteCast(15);
        $UFP1->initializeVoteCast(12);
        $CPP1->initializeVoteCast(10);
        $NPP1->setName('NPP');
        $NDC1->setName('NDC');
        $UFP1->setName('UFP');
        $CPP1->setName('CPP');
        $CPP4->setName('CPP');
        //Collection of a given pollingStation (P2)
        $NPP2->initializeVoteCast(1);
        $NDC2->initializeVoteCast(1);
        $UFP2->initializeVoteCast(1);
        $CPP2->initializeVoteCast(0);
        $NPP2->setName('NPP');
        $NDC2->setName('NDC');
        $UFP2->setName('UFP');
        $CPP2->setName('CPP');
        //Merged collection
        $NPP3->initializeVoteCast(21);
        $NDC3->initializeVoteCast(16);
        $UFP3->initializeVoteCast(13);
        $CPP3->initializeVoteCast(10);
        $NPP3->setName('NPP');
        $NDC3->setName('NDC');
        $UFP3->setName('UFP');
        $CPP3->setName('CPP');
        
        $parties1 = array($NPP1, $NDC1, $UFP1, $CPP1);
        $parties2 = array($NPP2, $NDC2, $UFP2, $CPP2, $CPP4);
        $parties3 = array($NPP3, $NDC3, $UFP3, $CPP3);
        
        $mergedOne = $this->statisticHandler->presidentialMerge($parties1, $parties2);
        
        $this->assertEquals($mergedOne, $parties3);
    }
    
    public function testGetPresidentialPollingStation()
    {
        
        //Collection of a given pollingStation (P1)
        $NPP1 = new PrParty;
        $NDC1 = new PrParty;
        $UFP1 = new PrParty;
        $CPP1 = new PrParty;
        //Make sure to have the same data like in the fixture
        $NPP1->initializeVoteCast(0);
        $NDC1->initializeVoteCast(1);
        $UFP1->initializeVoteCast(150);
        $CPP1->initializeVoteCast(25);
        
        $NPP1->setName('NPP');
        $NDC1->setName('NDC');
        
        $parties1 = array($NPP1, $NDC1, $UFP1, $CPP1);
        //Get the polling Station 1
        $pollingStation1 = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        //Get the result from the service
        $parties2 = $this->statisticHandler->getPresidentialPollingStation($pollingStation1);
        //The result ($parties1) should be the same than $parties2
        $this->assertEquals($parties1[0]->getVoteCast(), $parties2[0]->getVoteCast());
        $this->assertEquals($parties1[1]->getVoteCast(), $parties2[1]->getVoteCast());
        $this->assertEquals($parties1[2]->getVoteCast(), $parties2[2]->getVoteCast());
        $this->assertEquals($parties1[3]->getVoteCast(), $parties2[3]->getVoteCast());
        
        $this->assertEquals($parties1[0]->getName(), $parties2[0]->getName());
        $this->assertEquals($parties1[1]->getName(), $parties2[1]->getName());
    }
    
    public function testGetPresidentialConstituency()
    {
        //Collect all the Presidential Parties
        $_parties = $this->em->getRepository('PrBundle:PrParty')->findAll();
        
        foreach ($_parties as $p){
            $parties[] = $p;
        }
        //Test for constituency 1
        $const1 = $this->em->getRepository('VtallyBundle:Constituency')->find(1);
        
        $parties2 = $this->statisticHandler->getPresidentialConstituency($const1);
        $this->assertEquals($parties2[4]->getName(), 'NPP');
        $this->assertEquals($parties2[3]->getName(), 'NDC');
        $this->assertEquals($parties2[7]->getName(), 'UFP');
        $this->assertEquals($parties2[0]->getName(), 'CPP');
        
        $this->assertEquals($parties2[4]->getVoteCast(), 1000);
        $this->assertEquals($parties2[3]->getVoteCast(), 800);
        $this->assertEquals($parties2[7]->getVoteCast(), 500);
        $this->assertEquals($parties2[0]->getVoteCast(), 450);
        
        //test for constituency 2
        $const1 = $this->em->getRepository('VtallyBundle:Constituency')->find(2);
        
        $parties2 = $this->statisticHandler->getPresidentialConstituency($const1);
        $this->assertEquals($parties2[4]->getName(), 'NPP');
        $this->assertEquals($parties2[3]->getName(), 'NDC');
        $this->assertEquals($parties2[7]->getName(), 'UFP');
        $this->assertEquals($parties2[0]->getName(), 'CPP');
        
        $this->assertEquals($parties2[4]->getVoteCast(), 900);
        $this->assertEquals($parties2[3]->getVoteCast(), 950);
        $this->assertEquals($parties2[7]->getVoteCast(), 100);
        $this->assertEquals($parties2[0]->getVoteCast(), 70);
    }
    
    public function testSetPresidentialVoteCast()
    {
        $NPP = new PrParty;
        $NPP->initializeVoteCast(0);
        $NPP->setName('NPP');
        
        $pol1 = $this->em->getRepository('VtallyBundle:PollingStation')->find(1);
        $pol2 = $this->em->getRepository('VtallyBundle:PollingStation')->find(2);
        $pol3 = $this->em->getRepository('VtallyBundle:PollingStation')->find(3);
        
        $pollingStations = array($pol1, $pol2, $pol3);
        
        $this->statisticHandler->setPresidentialVoteCast($NPP, $pollingStations);
        
        $this->assertEquals($NPP->getVoteCast(), 1000);
    }
    
    
}
