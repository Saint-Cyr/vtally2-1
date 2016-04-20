<?php
/*
 * This file is part of Components of VTALLY2 project
 * contributor(s): Saint-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace PaBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PaPartyTest extends WebTestCase
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
    
    public function testSetSite()
    {
        $paParty = $this->em->getRepository('PaBundle:PaParty')->find(1);
        
        $paParty->increaseSiteNumber();
        $paParty->increaseSiteNumber();
        $paParty->increaseSiteNumber();
        
        $this->assertEquals($paParty->getSiteNumber(), 3);
    }
}
