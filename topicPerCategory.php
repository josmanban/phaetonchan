<?php

include_once 'commons/manager/TopicManager.php';
include_once 'commons/class/Topic.class.php';
include_once 'commons/class/Comment.php';
include_once 'commons/manager/CommentManager.php';
include_once 'commons/manager/CategoryManager.php';

$idCategory = $_GET['idCat'];
$rightCol = false;
$html_of_script = 'templates/topicPerCategory.html.php';
$title = CategoryManager::getCategoryById($idCategory)->getName();

$limit = 20;
$page = $_GET['page'];


if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$topics = TopicManager::getTopicsByCategory($idCategory, $offset, $limit);
$numTopics = TopicManager::countTopic(array('idCategory' => $idCategory));



require_once 'templates/layout.html.php';
?>
