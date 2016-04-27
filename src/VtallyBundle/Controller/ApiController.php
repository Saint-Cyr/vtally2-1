<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function postFrontAction(Request $request)
    {
        $_json = array('firstName' => 'Saint-Cyr', 'pollingStation' => 'Pol1');
        
        return $_json;
        
        // get the API handler service from the container
        $apiHandler = $this->get('vtally.api_handler');
        // Process the data 
        //$out = $apiHandler->process($inputData);
        $this->assertEquals(true, false);
    }
    
    
}
