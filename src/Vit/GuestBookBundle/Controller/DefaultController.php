<?php

namespace Vit\GuestBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VitGuestBookBundle:Default:index.html.twig', array('name' => $name));
    }
}
