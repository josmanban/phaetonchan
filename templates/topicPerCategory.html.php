<section>
     <?php
    require_once 'templates/addTopic.html.php';
    ?>
</section>
<section>
    <article>
    <ul style="padding: 0">
        <? if (count($topicCommentSet)>0): ?>
            <?php foreach ($topicCommentSet as $set): ?>
                <?php
                $topic = $set[0];
                $comments = $set[1];
                ?>
                <?php if (isset($topic)): ?>
                    <article>
                        <header class="article-header"><a href="topic.php?id=<?php echo $topic->getId(); ?>&page=1"><?php echo $topic->getSubject(); ?><p style="display: inline;float:right"><?php echo $topic->getName() . ' | ' . $topic->getDateTime() . ' | Positivos: ' . $topic->getLike() . ' | Negativos: ' . $topic->getUnlike(); ?></p></a></header>

                        

                        <p class="article-text"><img  align="left" src="<?php echo $topic->getImg(); ?>"/><?php echo $topic->getComment(); ?></p>
                        <footer class="article-footer"></footer>
                    </article>    

                    <article>
                        <header class="secundary-section-header" >Comentarios:</header>
                        <ul id="list-comments">
                            <?php if (isset($comments) && count($comments) > 0): ?>

                                <?php foreach ($comments as $comment): ?>
                                    <li><article>
                                            <header class="comment-header">
                                            <?php echo $comment->getSubject(); ?><p style="display: inline;float:right"><?php echo $topic->getName() . ' | ' . $topic->getDateTime() . ' | Positivos: ' . $topic->getLike() . ' | Negativos: ' . $comment->getUnlike(); ?></p>
                                            </header>
                                           
                                            <p class="article-text"> <img  align="left" src="<?php echo $comment->getImg(); ?>" /><?php echo $comment->getComment(); ?></p>
                                            <footer class="article-footer"></footer>
                                        </article> </li>
                                <? endforeach; ?>
                            <?php else: ?>
                                <li>
                                    <article><p class="article-text">No hay comentarios¡¡¡</p>
                                        <footer class="article-footer"></footer>
                                </li>
                            <?php endif; ?>            
                        </ul>           
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
        <footer><?php require_once 'pagerTopic.html.php';?></footer>
</article>
</section>

