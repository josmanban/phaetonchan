<?php
require_once 'commons/manager/CommentManager.php';

$rightCol = false;
$idTopic = $_GET['id'];

$limit = 30; //number of comments per page
$idComment = -1; //comment comment

$numComments=  CommentManager::countCommentsPerIdTopic($id);

$page = $_GET['page'];
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

require_once 'templates/comment.html.php';
?>
