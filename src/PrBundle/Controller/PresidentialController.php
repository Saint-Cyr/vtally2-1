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
    
    public function nationalPinkSheetAction()
    {
        return $this->render('PrBundle:PinkSheet:pr_national_pink_sheet.html.twig');
    }
    
    public function consituenciesPrModalAction($id = null)
    {
        if($id == 1){
            return $this->render('PrBundle:VoteCast:constituencies_pr_modal.html.twig', array(
            // ...
            ));
        }elseif($id == 2){
            return $this->render('PaBundle:VoteCast:constituencies_pa_modal.html.twig', array(
            // ...
            ));
        }
    }
    
    public function pollingStationsPrModalAction($id = null)
    {
        if($id == 1){
            return $this->render('PrBundle:VoteCast:polling_stations_pr_modal.html.twig');
        }elseif($id == 2){
            return $this->render('PaBundle:VoteCast:polling_stations_pa_modal.html.twig');
        }elseif ($id == 3) {
            return $this->render('PaBundle:Default:polling_stations_pr_pink_sheet.html.twig');
        }
    }
}
