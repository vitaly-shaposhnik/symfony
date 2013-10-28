<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vit
 * Date: 28.10.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */

namespace Vit\GuestBookBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
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