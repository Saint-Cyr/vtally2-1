<?php

namespace PaBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParliamentaryController extends Controller
{
    public function nationalAction()
    {
        //Get the ORM entity manager
        $em = $this->getDoctrine()->getManager();
        //Get the statisticHandler service
        $statisticHandler = $this->get('vtally.statistic_handler');
        //Get all the parliamentary parties
        $parties = $em->getRepository('PaBundle:PaParty')->findAll();
        
        //Get all the contituencies
        $constituencies = $em->getRepository('VtallyBundle:Constituency')->findAll();
        //Get the sites 
        $sites = $statisticHandler->getSiteNumber($constituencies, $parties, null);
        //Get all the parties
        $parties = $sites['parties'];
        
        //Passe the data to the view
        return $this->render('PaBundle:VoteCast:nation.html.twig', array('parties' => $parties));
    }
    
    public function regionAction($id)
    {
        //Get the ORM entity manager
        $em = $this->getDoctrine()->getManager();
        //Get the statisticHandler service
        $statisticHandler = $this->get('vtally.statistic_handler');
        //Get all the parliamentary parties
        $parties = $em->getRepository('PaBundle:PaParty')->findAll();
        
        //Get all the contituencies
        $constituencies = $em->getRepository('VtallyBundle:Constituency')->findAll();
        //Get the sites 
        $sites = $statisticHandler->getSiteNumber($constituencies, $parties, null);
        //Get all the parties
        $parties = $sites['parties'];
        
        //Passe the data to the view
        return $this->render('PaBundle:VoteCast:region.html.twig', array('parties' => $parties));
    }
    
    public function constituencyAction($id)
    {
        return $this->render('PaBundle:VoteCast:constituency.html.twig');
    }
    
    public function pollingStationAction($id)
    {
        return $this->render('PaBundle:VoteCast:polling_station.html.twig');
    }
}
