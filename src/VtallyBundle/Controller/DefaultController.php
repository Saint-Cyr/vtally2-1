<?php

namespace VtallyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VtallyBundle:Default:index.html.twig');
    }
}
