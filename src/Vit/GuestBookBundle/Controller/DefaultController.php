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
     * @return array
     */
    public function indexAction()
    {
        return ['comments' => $this->getAllComments()];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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

        return $this->render('VitGuestBookBundle:Default:index.html.twig', ['comments' => $this->getAllComments()]);
    }

    /**
     * @return array
     */
    public function getAllComments()
    {
        return $this
            ->getDoctrine()
            ->getRepository('VitGuestBookBundle:Comment')
            ->findAll()
        ;
    }
}
