<?php

include_once 'commons/manager/TopicManager.php';
include_once 'security.php';

$comment = clean_tags($_POST['comment']);
$name = clean_tags($_POST['name']);
$subject = clean_tags($_POST['subject']);
$img = clean_tags($_POST['img']);
$idCategory = clean_tags($_POST['idCat']);


$errorMessage=  validateFields($name, $comment,$subject, $img);
// header('location: error.html.php?data=' . $errorMessage);
if (empty($errorMessage)) {
    $id=TopicManager::addTopic($name, $subject, $img, $comment, $idCategory);
    
    $message = 'Tema Publicado¡¡';
    header('location: topic.php?id=' . $id. '&page=1&message='.$message.'#message');
} else {
    header('location: error.php?errorMessage=' . $errorMessage);
}

function validateFields($name,$comment,$subject,$img) {
    $errorMessage='';
    if (empty($name)) {
        $errorMessage = $errorMessage . '<br>NickName vacio.';
    }
     if (empty($subject)) {
        $errorMessage = $errorMessage . '<br>Titulo vacio.';
    }
    if (empty($comment)) {
        $errorMessage = $errorMessage . '<br>Contenido vacio.';
    }
    if (!empty($img)) {
        if (!is_array(getimagesize($img))) {
            $errorMessage = $errorMessage . '<br>Link a imagen no valido.';
        }
    }
    return $errorMessage;
}

?>