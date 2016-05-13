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
        
        // get the API handler service from the Dependency Injection Container
        $apiHandler = $this->get('vtally.api_handler');
        
        //If it's a pinkSheet then send $request instead of $inputData
        if($request->get('action') == 4 || $request->get('action') == 5 || $request->get('action') == 603 || $request->get('action') == 605){
            //Notice the API:processPinkSheet() is different of API:process()
            return $result = $apiHandler->processPinkSheet($request);
        }
        
        // Processing...
        $result = $apiHandler->process($inputData);
        
        //Send the result back to the client
        return $result;
    }
}
