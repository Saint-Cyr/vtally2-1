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

class NotificationHandlerTest extends WebTestCase
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
    
    public function testProcessNotification()
    {
        //Get the notification handler
        $notificationHandler = $this->application->getKernel()->getContainer()->get('vtally.notification_handler');
        //Get a dummy user from the DB just to help making the method call
        $user = $this->em->getRepository('UserBundle:User')->find(5);
        //Process the call
        $outPut = $notificationHandler->processNotification('default', 'Matching-vote', 777, $user);
        $this->assertEquals(null, $outPut);
    }
    
    public function testGetComplitedCollationCenter()
    {
        //Get the notification handler
        $notificationHandler = $this->application->getKernel()->getContainer()->get('vtally.notification_handler');
        $collationCenter = $notificationHandler->getComplitedCollationCenter();
        $this->assertEquals($collationCenter->getName(),  'Collation Center1');
    }
}