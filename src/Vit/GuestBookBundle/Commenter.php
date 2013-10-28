<?php

namespace Vit\GuestBookBundle;

use Vit\GuestBookBundle\Entity\Comment;


class Commenter {
    protected $message;
    protected $comment;
    protected $doctrineManager;
    protected $datetime;

    function __construct(Comment $comment, $doctrineManager)
    {
        $this->comment = $comment;
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

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    public function saveComment()
    {
        if (empty($this->message)) {
            throw new Exception('Поле "Комментарий" не заполнено');
        }

        $this->comment->setBody($this->message);
        $this->comment->setDate($this->datetime);

        $this->doctrineManager->persist($this->comment);
        $this->doctrineManager->flush();
    }


    public function add($a, $b)
    {
        return $a + $b;
    }
}