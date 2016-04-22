<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    public function postFrontAction()
    {
        return array('firstName' => 'Saint-Cyr', 'pollingStation' => 'Pol1');
    }
}
