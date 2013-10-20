<?php

namespace Vit\GuestBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vit\GuestBookBundle\Entity\Comment;
use Vit\GuestBookBundle\Commenter;

class DefaultController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction()
    {
        $comments = $this
            ->getDoctrine()
            ->getRepository('VitGuestBookBundle:Comment')
            ->findAll()
        ;

        return ['comments' => $comments];
    }


    public function newAction()
    {
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $commenter = new Commenter(new Comment(), $this->getDoctrine()->getManager());
            $commenter->setMessage($request->get('message'));
            $commenter->setDatetime(new \DateTime());
            $commenter->saveComment();

            return $this->redirect($this->generateUrl('vit_guest_book_homepage'));
        }

        $comments = $this
            ->getDoctrine()
            ->getRepository('VitGuestBookBundle:Comment')
            ->findAll()
        ;

        return $this->render('VitGuestBookBundle:Default:index.html.twig', ['comments' => $comments]);
    }
}
