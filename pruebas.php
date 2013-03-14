<?php

//$array=[1,2,3,65,4];
//
//$array2=[
//    $array[0]=>'alejandor',
//    $array[1]=>'manuel',
//    $array[3]=>'tbanda',
//    $array[4]=>'jose jose'
//];
//
//var_dump($array2);

//echo $_SERVER['REMOTE_ADDR'];
include_once 'commons/manager/CommentManager.php'; 
include_once 'commons/class/Comment.php';

showComments(-1,0,30);

//function showComments($idComment,$indicator){
//    $comments=  CommentManager::getCommentsByFatherComment($idComment);
//    foreach ($comments as $comment){
//        echo '<br>'.$indicator.$comment->toString();        
//        $idComment=$comment->getId();
//        showComments($idComment,$indicator.'-');
//    }
//    
//
//}

function showComments($idComment,$offset,$limit){
    echo '<ul>';
    $comments=  CommentManager::getCommentsByFatherCommentId($idComment,$offset,$limit);
    foreach ($comments as $comment){
        echo '<li>';        
        echo $comment->toString();        
        echo '</li>';
        $idComment=$comment->getId();
        showComments($idComment,null,null);
    }
    echo '</ul>';    
    }





?>