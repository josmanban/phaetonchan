<?php

include_once 'commons/manager/CommentManager.php';
include_once 'security.php';

$page=$_GET['page'];
$comment = clean_tags($_POST['comment']);
$name = clean_tags($_POST['name']);
$subject = clean_tags($_POST['subject']);
$img = clean_tags($_POST['img']);
$idTopic = clean_tags($_POST['idTopic']);
$idComment = clean_tags($_POST['idComment']);

$errorMessage=  validateFields($name, $comment, $img);
// header('location: error.html.php?data=' . $errorMessage);
if (empty($errorMessage)) {
    CommentManager::addComment($name, $subject, $img, $comment, $idTopic, $idComment);
    $message = 'Comentario agregado¡¡¡';
    header('location: topic.php?id=' . $idTopic . '&page='.$page.'&message='.$message.'#message');
} else {
    header('location: error.php?errorMessage=' . $errorMessage);
}

function validateFields($name,$comment,$img) {
    $errorMessage='';
    if (empty($name)) {
        $errorMessage = $errorMessage . '<br>NickName vacio.';
    }
    if (empty($comment)) {
        $errorMessage = $errorMessage . '<br>Comentario vacio.';
    }
    if (!empty($img)) {
        if (!is_array(getimagesize($img))) {
            $errorMessage = $errorMessage . '<br>Link a imagen no valido.';
        }
    }
    return $errorMessage;
}

?>