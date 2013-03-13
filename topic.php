<?php

include_once('commons/class/Topic.class.php');
include_once('commons/manager/TopicManager.php');

$html_of_script = 'templates/topic.html.php';
$rightCol = false;
$id=$_GET['id'];
$topic= TopicManager::getTopicById($id);
$title = $topic->getSubject();
require_once 'templates/layout.html.php';

?>
