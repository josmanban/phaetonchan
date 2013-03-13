<?php



function clean_tags($tags) {
   
    $tags = htmlspecialchars(trim(nl2br($tags)));
    $tags = addslashes(($tags));
    $tags = strip_tags($tags);
    $tags = stripslashes($tags);
    $tags = htmlentities($tags);
    

    return $tags;
}


?>
