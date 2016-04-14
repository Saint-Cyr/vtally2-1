<?php

namespace PaBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParliamentaryController extends Controller
{
    public function nationalAction()
    {
        return new Response('statistics nationale level for Parliamentary');
    }
    
    public function regionAction($id)
    {
        return new Response('statistics region level for region id: '.$id);
    }
    
    public function constituencyAction($id)
    {
        return new Response('statistics constituency level for constituency id: '.$id);
    }
    
    public function pollingStationAction($id)
    {
        return new Response('statistics polling station level for constituency id: '.$id);
    }
}
