<?php

namespace PaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParliamentaryController extends Controller
{
    public function nationalAction()
    {
        return $this->render('PaBundle:VoteCast:national.html.twig', array(
            // ...
        ));
    }

    public function regionAction($id)
    {
        $region = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:Region')->find($id);
        $statisticHandler = $this->get('vtally.statistic_handler');
        $paVoteCasts = $statisticHandler->getParliamentaryRegion($region);
        
        return $this->render('PaBundle:VoteCast:region.html.twig', array(
            'region' => $region,
            'paVoteCasts' => $paVoteCasts,
            // ...
        ));
    }

    public function constituencyAction($id)
    {
        //Get the statisticHandler service
        $statisticsHandler = $this->get('vtally.statistic_handler');
        //Get the constituency
        $constituency = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:Constituency')->find($id);
        $candidates = $statisticsHandler->getParliamentaryConstituency($constituency);
        
        return $this->render('PaBundle:VoteCast:constituency.html.twig', array(
            'constituency' => $constituency,
            'candidates' => $candidates,
            // ...
        ));
    }

    public function pollingStationAction($id)
    {
        //Get the Polling Station from the DB.
        $pollingStation = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:PollingStation')->find($id);
        //Get the statistic_handler service
        $statisticsHandler = $this->get('vtally.statistic_handler');
        $candidates = $statisticsHandler->getParliamentaryPollingStation($pollingStation);
        
        return $this->render('PaBundle:VoteCast:polling_station.html.twig', array(
        //return $this->render('VtallyBundle:vote:dashboard.html.twig', array(
            'pollingStation' => $pollingStation,
            'candidates' => $candidates,
            // ...
        ));
    }

}
