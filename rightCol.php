<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/* $html_of_script='templates/rightCol.html.php'; */
include_once 'commons/manager/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

require_once 'templates/rightCol.html.php';
?>
