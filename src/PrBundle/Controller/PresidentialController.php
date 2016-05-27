<?php
/*
 * This file is part of Components of VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace PrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PresidentialController extends Controller
{
    public function nationalAction()
    {
        return $this->render('PrBundle:VoteCast:national.html.twig', array(
            // ...
        ));
    }

    public function regionAction($id)
    {
        return $this->render('PrBundle:VoteCast:region.html.twig', array(
            // ...
        ));
    }

    public function constituencyAction($id)
    {
        return $this->render('PrBundle:VoteCast:constituency.html.twig', array(
            // ...
        ));
    }

    public function pollingStationAction($id)
    {
        return $this->render('PrBundle:VoteCast:polling_station.html.twig', array(
            // ...
        ));
    }

}
