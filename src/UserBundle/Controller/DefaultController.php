<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function onlineUsersAction()
    {
        return $this->render('UserBundle:User:online_users.html.twig', array(
            // ...
        ));
    }

}
