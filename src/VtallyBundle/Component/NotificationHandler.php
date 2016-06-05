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
use UserBundle\Entity\User;
use PaBundle\Entity\PaPinkSheet;
use VtallyBundle\Entity\Notification;
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
    
    /**
     * 
     * @param type $votes
     * @param User $user
     * @return null
     */
    public function processNotification($type, $votes, User $user)
    {
        //Get the pollingStation
        $pollingStation = $user->getPollingStation();
        //Get the firstVerifier
        $firstVerifier = $pollingStation->getFirstVerifier();
        //Get second verifier
        $secondVerifier = $pollingStation->getSecondVerifier();
        //create new instance of Notification entity
        $notification = new Notification();
        //Hydrate it with the right information
        $notification->setType($type);
        $notification->setPollingStation($pollingStation->getName());
        $notification->setFirstVerifier($firstVerifier->getPhoneNumber());
        $notification->setSecondVerifier($secondVerifier->getPhoneNumber());
        //Persist $notification in DB
        $this->em->persist($notification);
        //$this->em->flush();
    }
}