<?php

include_once'commons/class/Comment.php';
include_once'commons/manager/CommentManager.php';


//showComments($idComment, $idTopic, $offset, $limit);

function showComments($idComment, $idTopic, $offset, $limit) {
    echo '<ul id="list-comments">';
    $comments = CommentManager::getCommentsByFatherCommentId($idComment, $idTopic, $offset, $limit);
    foreach ($comments as $comment) {
        echo '<li><article class="comment">';
        echo '<header class="comment-header">';
        echo $comment->getSubject();
        //echo '<p style="display: inline;float:right">';
        echo $comment->getName() . ' | id: '.$comment->getId().' | ' . $comment->getDateTime() . ' | Positivos: ' . $comment->getLike() . ' | Negativos: ' . $comment->getUnlike();
        echo '</p>';
        echo '</header>';
        echo '<p class="article-text"><img  align="left" src="' . $comment->getImg() . '"/>';
        echo $comment->getComment() . '</p>';
        echo '<footer class="article-footer"><input name="repply" id="'.$comment->getId().'" type="button" value="repply"/></footer></article></li>';
        $idComment = $comment->getId();
        showComments($idComment, null, null, null);
    }
    echo '</ul>';
}
?>
