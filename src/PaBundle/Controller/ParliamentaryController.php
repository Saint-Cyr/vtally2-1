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
        
        //Get all the contituencies related to the region of ID $id
        $region = $em->getRepository('VtallyBundle:Region')->find($id);
        
        if(!$region){
            throw $this->createNotFoundException('Region with ID: '.$id.' not found.');
        }
        
        $constituencies = $region->getConstituencies();
        
        if(count($constituencies)){
            
            foreach ($constituencies as $const){
                $constituencies_array[] = $const;
            }
            //Get the sites 
            $sites = $statisticHandler->getSiteNumber($constituencies_array, $parties, null);
        }else{
            //To avoid any unexpected behaviour
            throw $this->createNotFoundException('Constituencies related to the region with ID: '.$id.' not found.');
        }
        
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
