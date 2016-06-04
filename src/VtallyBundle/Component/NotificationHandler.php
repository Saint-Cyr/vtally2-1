<?php

/*
 * This file is part of Components of VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace VtallyBundle\Component; 
use PrBundle\Entity\PrParty;
use PrBundle\Entity\PrPinkSheet;
use PaBundle\Entity\PaPinkSheet;
use PrBundle\Entity\PrVoteCast;
use FOS\RestBundle\View\View;
use PaBundle\Entity\PaVoteCast;
use PaBundle\Entity\PaEditedVoteCast;
use VtallyBundle\Entity\PollingStation;
use VtallyBundle\Entity\Region;
use VtallyBundle\Entity\Constituency;
use Symfony\Component\HttpFoundation\Request;
use PrBundle\Entity\PrEditedVoteCast;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class NotificationHandler
{
    private $em;
    private $factory;
    private $manager;
    private $security;
    private $container;


    public function __construct($em, $user_provider) 
    {
        $this->em = $em;
        $this->user_provider = $user_provider;
    }
    
    
    public function processMatchingVote()
    {
        
    }
    
    public function processMismatchVote()
    {
        
    }
    
    public function processOverVoting()
    {
        
    }
    
    public function processCollationCenter()
    {
        
    }
}