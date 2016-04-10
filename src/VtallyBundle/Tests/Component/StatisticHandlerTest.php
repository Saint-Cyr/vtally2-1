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
    
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        
        $this->application = new Application(static::$kernel);
        $this->em = $this->application->getKernel()->getContainer()->get('doctrine.orm.entity_manager');
    }
    
    public function testGetSiteNumber()
    {
        $statisticHandler = $this->application->getKernel()->getContainer()->get('vtally.statistic_handler');
        
        //Get a set of constituencies
        $const1 = $this->em->getRepository('VtallyBundle:Constituency')->find(1);
        $const2 = $this->em->getRepository('VtallyBundle:Constituency')->find(2);
        $const3 = $this->em->getRepository('VtallyBundle:Constituency')->find(3);
        
        //Get the set of parties
        $parties = $this->em->getRepository('PaBundle:PaParty')->findAll();
        
        //Get the set of independent
        $indepentCandidates = $this->em->getRepository('PaBundle:independentCandidate')->findAll();
        
        //Get the 
        $constituencies = array($const1, $const2, $const3);
        
        //Test that there are 2 sites for NPP (Dependent Candidate)
        $sites = $statisticHandler->getSiteNumber($constituencies, $parties, $indepentCandidates);
        $parties1 = $sites['parties'];
        
        $this->assertEquals(count($parties1), 3);
        $NPP = $parties[0];
        $this->assertEquals($NPP->getSiteNumber(), 2);
        $this->assertEquals($NPP->getName(), 'NPP');
        
        //Make sure that if non arguments has be given, the output is null
        $site1 = $statisticHandler->getSiteNumber($constituencies, null, null);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertEquals($site1, $site2);
        
        //Test when only parties are available
        $site1 = $statisticHandler->getSiteNumber($constituencies, $parties, null);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertNotEquals($site1, $site2);
        
        //Test when only indenpendent candidates are available
        $site1 = $statisticHandler->getSiteNumber($constituencies, null, $indepentCandidates);
        $site2 = array('parties' => array(), 'IC' => array());
        $this->assertNotEquals($site1, $site2);
        
        //Test that there is 1 site for the IC (Independent Candidate)
        $site1 = $statisticHandler->getSiteNumber($constituencies, null, $indepentCandidates);
        $this->assertEquals($site1['IC'], 1);
    }
}
