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
        //Collect some parties from the DB
        $NPP = $this->em->getRepository('PrBundle:PrParty')->find(1);
        $NDC = $this->em->getRepository('PrBundle:PrParty')->find(2);
        $UFP = $this->em->getRepository('PrBundle:PrParty')->find(3);
        $CPP = $this->em->getRepository('PrBundle:PrParty')->find(4);
        //Make sure the fixture is well organized
        $this->assertEquals('NPP', $NPP->getName());
        $this->assertEquals('NDC', $NDC->getName());
        $this->assertEquals('UFP', $UFP->getName());
        $this->assertEquals('CPP', $CPP->getName());
        
        $parties1 = array($NPP, $NDC);
        $parties2 = array($UFP, $CPP);
        
    }
}
