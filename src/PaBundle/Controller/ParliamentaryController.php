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
        return $this->render('PaBundle:VoteCast:region.html.twig', array(
            // ...
        ));
    }

    public function constituencyAction($id)
    {
        return $this->render('PaBundle:VoteCast:constituency.html.twig', array(
            // ...
        ));
    }

    public function pollingStationAction($id)
    {
        return $this->render('PaBundle:VoteCast:polling_station.html.twig', array(
            // ...
        ));
    }

}
