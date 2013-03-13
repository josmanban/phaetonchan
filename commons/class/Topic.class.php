<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Topic {

    private $id;
    private $img;
    private $subject;
    private $comment;
    private $name;
    private $like;
    private $unlike;
    private $dateTime;
    private $idCategory;

    public function __construct($id, $subject, $name, $comment, $img, $like, $unlike,$dateTime,$idCategory) {
        if (func_num_args() == 0) {
            $this->id = $id;
            $this->subject = 'la presidenta';
            $this->name = 'Anonimo';
            $this->comment = "sf sfsafsfsfs sfsdf a sf sfs fsfs sfsa sfds saf sf sf sa sf sfsafsfsfs sfsdf a sf sfs fsfs sfsa sfds saf sf sf sa sf sfsafsfsfs sfsdf a sf sfs fsfs sfsa sfds saf sf sf sa sf sfsafsfsfs sfsdf a sf sfs fsfs sfsa sfds saf sf sf sa";
            $this->img = "http://qa.php.net/gfx/testfest_big.png";
            $this->like = 8;
            $this->unlike = -8;
            $this->dateTime=  date('d:m:Y h:i:S');
            $this->$idCategory=2;
        }
        if (func_num_args() > 0 & func_num_args()== 9) {
            $this->id = $id;

            $this->subject = $subject;
            $this->name = $name;
            $this->comment = $comment;
            $this->img = $img;
            $this->like = $like;
            $this->unlike = $unlike;
            $this->dateTime=$dateTime;
            $this->idCategory=$idCategory;
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
    
    public function getDateTime(){
        return $this->dateTime;
    }
    public function setDateTime($dateTime){
        $this->dateTime= $dateTime;      
    }
    
    public function setIdCategory($idCategory){
        $this->idCategory=$idCategory;
    }
    public function getIdCategory(){
        return $this->idCategory;
    }

    public function toString() {
        return 'name: ' . $this->name . '\nid: ' . $this->id . '\nsubmit: ' . $this->subject;
    }

}

?>
