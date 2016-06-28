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
        //Get statisticHandler
        $statisticHandler = $this->get('vtally.statistic_handler');
        $region = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:Region')->find($id);
        
        $prVoteCasts = $statisticHandler->getPresidentialRegion($region);
        
        return $this->render('PrBundle:VoteCast:region.html.twig', array(
            'prVoteCasts' => $prVoteCasts,
            'region' => $region,
            // ...
        ));
    }

    public function constituencyAction($id)
    {
        //Get statisticHandler
        $statisticHandler = $this->get('vtally.statistic_handler');
        $constituency = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:Constituency')->find($id);
        
        $prVoteCasts = $statisticHandler->getPresidentialConstituency($constituency);
        
        return $this->render('PrBundle:VoteCast:constituency.html.twig', array(
            'prVoteCasts' => $prVoteCasts,
            'consitutency' => $constituency,
            // ...
        ));
    }

    public function pollingStationAction($id)
    {   
        return $this->render('PrBundle:VoteCast:polling_station.html.twig', array(
            // ...
        ));
    }
    
    public function consituenciesPrModalAction($id = null)
    {
        //Get statisticHandler
        $statisticHandler = $this->get('vtally.statistic_handler');
        $constituency = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:Constituency')->find($id);
        
        $prVoteCasts = $statisticHandler->getPresidentialConstituency($constituency);
        
            return $this->render('PrBundle:VoteCast:constituencies_pr_modal.html.twig', array(
                'prVoteCasts' => $prVoteCasts,
                'constituency' => $constituency,
            // ...
            ));
    }
    
    public function pollingStationsPrModalAction($id, $type)
    {
        if($type == 'presidential'){
            //Get statisticHandler
            $statisticHandler = $this->get('vtally.statistic_handler');
            $pollingStation = $this->getDoctrine()->getManager()->getRepository('VtallyBundle:PollingStation')->find($id);

            $prVoteCasts = $statisticHandler->getPresidentialPollingStation($pollingStation);
            
            return $this->render('PrBundle:VoteCast:polling_stations_pr_modal.html.twig', array(
                'prVoteCasts' => $prVoteCasts,
                'pollingStation' => $pollingStation,
            ));
        }elseif($type == 'parliamentary'){
            return $this->render('PaBundle:VoteCast:polling_stations_pa_modal.html.twig');
        }else {
            return $this->render('PaBundle:Default:polling_stations_pr_pink_sheet.html.twig');
        }
    }
}
