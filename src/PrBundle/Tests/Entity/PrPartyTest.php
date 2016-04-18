<?php

/*
 * This file is part of Components of VTALLY2 project
 * contributor(s): Saint-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace PrBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrPartyTest extends WebTestCase
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
    
    public function testIncreaseVoteCast()
    {
        $prParty = $this->em->getRepository('PrBundle:PrParty')->find(1);
        //Initialize the vote caste
        $prParty->initializeVoteCast(0);
        
        $prParty->increaseVoteCast(90);
        $output1 = $prParty->getVoteCast();
        $this->assertEquals(90, $output1);
        
        $prParty->increaseVoteCast(10);
        $output1 = $prParty->getVoteCast();
        $this->assertEquals(100, $output1);
        
        $prParty->increaseVoteCast(0);
        $output1 = $prParty->getVoteCast();
        $this->assertEquals(100, $output1);
        
        $prParty->increaseVoteCast(1);
        $output1 = $prParty->getVoteCast();
        $this->assertEquals(101, $output1);
    }
}
