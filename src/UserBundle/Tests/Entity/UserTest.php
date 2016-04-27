<?php
/*
 * This file is part of Components of VTALLY2 project
 * contributor(s): Saint-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace UserBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
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
    
    public function testIsUserTokenValid()
    {
        //Case where token is valid
        $user = $this->em->getRepository('UserBundle:User')->findOneBy(array('username' => 'verifier1'));
        //Refresh userToken
        //$user->refreshUserToken();
        $user->setTokenTime(new \DateTime("2 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 2;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertTrue($output);
        
        $user->setTokenTime(new \DateTime("1 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 2;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertTrue($output);
        
        $user->setTokenTime(new \DateTime("3 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 3;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertTrue($output);
        
        $user->setTokenTime(new \DateTime("1 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 1;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertTrue($output);
        
        
        //Case where token is not valid
        $user->setTokenTime(new \DateTime("3 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 2;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertNotTrue($output);
        
        $user->setTokenTime(new \DateTime("1 min ago"));
        //parameter tokenTime suppose to come from VtallyBundle:Setting (express in min)
        $tokenTime = 0;
        $output = $user->isUserTokenValid($tokenTime);
        $this->assertNotTrue($output);
       
    }
}
