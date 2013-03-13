<?php

include_once('commons/class/Comment.php');
include_once('commons/manager/CommentManager.php');


$rightCol = false;
$id = $_GET['id'];

$limit = 30;//number of comments per page
$idComment=-1;//father comment
$page = $_GET['page'];
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$array = CommentManager::getCommentsByTopicIdPaginated($id,$offset, $limit);
$allComments = $array[0];
$numComments = $array[1];
require_once 'templates/comment.html.php';
?>
