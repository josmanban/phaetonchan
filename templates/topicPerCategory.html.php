<section>
    <?php
    require_once 'templates/addTopic.html.php';
    require_once 'commons/manager/CommentManager.php';
    require_once 'showComments.php';
    ?>
</section>

<section>
    <article>
        <ul style="padding: 0">
            <? if (count($topics) > 0): ?>
                <?php $ban = false; ?>
                <?php foreach ($topics as $topic): ?>

                    <?php if (isset($topic)): ?>
                        <article>
                             <header class="article-header"><a href="topic.php?id=<?php echo $topic->getId()?>&page=1"><?php echo $topic->getSubject(); ?> | id: <?php echo $topic->getId()?> | <?php echo $topic->getName() . ' | ' . $topic->getDateTime() . ' | Positivos: ' . $topic->getLike() . ' | Negativos: ' . $topic->getUnlike(); ?></p></header></a>
                            <p class="article-text"><img  align="left" src="<?php echo $topic->getImg(); ?>"/><?php echo $topic->getComment(); ?></p>
                            <footer class="article-footer"></footer>
                        </article>    
                        <article>                                    
                            <?php
                            $numComments = CommentManager::countCommentsPerIdTopic($topic->getId());
                            echo '<header class="secundary-section-header" >Comentarios (' . $numComments . '): </header>';
                            $idComment = -1;
                            $idTopic = $topic->getId();

                            


                            showComments($idComment, $idTopic, 0, 3);
                            ?>
                        </article>    
                        <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <li>
                    <article><p class="article-text">No hay temas en esta categoria.<br>Crea un tema¡¡</p>
                        <footer class="article-footer"></footer>
                </li>
<?php endif; ?>
        </ul>
        <footer><?php require_once 'pagerTopic.html.php'; ?></footer>
    </article>
</section>

