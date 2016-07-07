<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function onlineUsersAction($page)
    {
        //Get the list of users from the DB.
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->getOnlineUsers(10, $page);
        
        
        return $this->render('UserBundle:User:online_users.html.twig', array(
            'users' => $users,
            'page' => $page,
            'numberPerPage' => ceil(count($users)/10),
        ));
    }
    
    public function onlineNumberAction()
    {
        //Get the list of users from the DB.
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->getOnlineUsers(10, 1);
        $var = count($users);
        return new Response($var);
    }
    
    public function offlineUsersAction()
    {
        //Get the list of users from the DB.
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findBy(array('active' => false));
        
        return $this->render('UserBundle:User:offline_users.html.twig', array(
            'users' => $users,
            // ...
        ));
    }

}
