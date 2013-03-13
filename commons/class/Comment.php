<?php

class Comment {

    private $id;
    private $img;
    private $subject;
    private $comment;
    private $name;
    private $like;
    private $unlike;
    private $dateTime;
    private $idTopic;
    private $idComment;

    public function __construct($id = -1, $subject = '&nbsp;', $name = 'Anonymous', $comment = null, $img = '&nbsp;', $like = 0, $unlike = 0, $dateTime = null, $idTopic = -1, $idComment = -1) {
        if (func_num_args() == 0) {
            $this->dateTime = date('d:m:Y h:i:S');
        }
        if (func_num_args() > 0 & func_num_args() == 10) {
            $this->id = $id;
            if (isset($subject))
                $this->subject = $subject;
            else
                $this->subject = '&nbsp;';
            $this->name = $name;
            $this->comment = $comment;
            $this->img = $img;
            $this->like = $like;
            $this->unlike = $unlike;
            $this->dateTime = $dateTime;
            $this->idTopic = $idTopic;
            $this->idComment = $idComment;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getImg() {
        return $this->img;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLike() {
        return $this->like;
    }

    public function setLike($like) {
        $this->like = $like;
    }

    public function getUnlike() {
        return $this->unlike;
    }

    public function setUnlike($like) {
        $this->like = $like;
    }

    public function like() {
        $this->like = $like++;
    }

    public function unlike() {
        $this->unlike = $unlike++;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }

    public function setIdTopic($idTopic) {
        $this->idTopic = $idTopic;
    }

    public function getIdTopic() {
        return $this->idTopic;
    }

    public function setIdComment($idComment) {
        $this->idComment = $idComment;
    }

    public function getIdComment() {
        return $this->idComment;
    }

    public function toString() {
        return 'name: ' . $this->name . '\nid: ' . $this->id . '\nsubmit: ' . $this->subject;
    }

}

?>
