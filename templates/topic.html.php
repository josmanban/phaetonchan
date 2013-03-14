<section id="threads">
    <article>
        <header class="article-header"><?php echo $topic->getSubject(); ?> | id: <?php echo $topic->getId()?> | <?php echo $topic->getName() . ' | ' . $topic->getDateTime() . ' | Positivos: ' . $topic->getLike() . ' | Negativos: ' . $topic->getUnlike(); ?></p></header>
        
        <p class="article-text"><img  align="left" src="<?php echo $topic->getImg(); ?>" /><?php echo $topic->getComment(); ?></p>
        <footer class="article-footer"></footer>
    </article>    
</section>
<?php require_once 'templates/message.html.php'; ?>
<?php require_once 'comment.php'; ?>
