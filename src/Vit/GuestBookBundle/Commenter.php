<?php

namespace Vit\GuestBookBundle;

use Vit\GuestBookBundle\Entity\Comment;


class Commenter {
    protected $message;
    protected $comment;
    protected $doctrineManager;

    function __construct(Comment $comment/*, $doctrineManager*/)
    {
        $this->comment = $comment;
//        $this->doctrineManager = $doctrineManager;
    }

    /**
     * @param mixed $doctrineManager
     */
    public function setDoctrineManager($doctrineManager)
    {
        $this->doctrineManager = $doctrineManager;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = trim($message);
    }

    public function saveComment()
    {
        if (empty($this->message)) {
            throw new \Exception('Поле "Комментарий" не заполнено');
        }

        if (!$this->doctrineManager) {
            throw new \Exception('Не передан doctrineManager');
        }

        $this->comment->setBody($this->message);
        $this->comment->setDate(new \DateTime());

        $this->doctrineManager->persist($this->comment);
    }


    public function add($a, $b)
    {
        return $a + $b;
    }
}