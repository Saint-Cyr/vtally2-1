<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function postFrontAction(Request $request)
    {
        //Get the data sent by the client
        $inputData = json_decode($request->getContent(), true);
        
        // get the API handler service from the container
        $apiHandler = $this->get('vtally.api_handler');
        
        // Processing...
        $result = $apiHandler->process($inputData);
        
        //Send the result back to the client
        return $result;
    }
    
    
}
