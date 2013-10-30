<?php

namespace Vit\GuestBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vit\GuestBookBundle\Entity\Comment;
use Vit\GuestBookBundle\Entity\CommentRepository;
use Vit\GuestBookBundle\Commenter;

class DefaultController extends Controller
{
    /**
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return ['comments' => CommentRepository::getAllComments()];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $commenter = $this->get('vit.guest_book.commenter');
            $commenter->setDoctrineManager($this->getDoctrine()->getManager());
            $commenter->setMessage($request->get('message'));
            $commenter->saveComment();
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirect($this->generateUrl('vit_guest_book_homepage'));
    }
}
