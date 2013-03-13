<?php

include('config.php');
include_once('commons/class/Topic.class.php');
include_once ('commons/manager/TopicManager.php');
include_once ('commons/manager/CommentManager.php');

$html_of_script = 'templates/index.html.php';
$rightCol = true;
$title = 'Phaeton Chan - Another chan...';

$numAllComments= CommentManager::countAllComments();
$numAllTopics=  TopicManager::countTopic(array());

$arr_topics = TopicManager::getAllRecentTopics(0,15);
$arr_popularTopic= TopicManager::getAllPopularTopics(0,15);
//header('location:error.html.php?data='.  count($arr_topics));
require_once 'templates/layout.html.php';
?>