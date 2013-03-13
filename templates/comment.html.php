<section id="comments">
    <article>
        <header class="secundary-section-header" >Comentarios:</header>
        <ul id="list-comments">
            <?php if (isset($allComments) && count($allComments) > 0): ?>
                <?php foreach ($allComments as $family): ?>
                    <?php if (isset($family)): ?>
                        <?php
                        $father = $family[0];
                        if (isset($family[1])) {
                            $sons = $family[1];
                        } else {
                            $sons = array();
                        }
                        ?>
                        <li><article>
                                <header class="comment-header"><?php echo $father->getSubject(); ?><p style="display: inline;float:right"><?php echo $father->getName() . ' | ' . $father->getDateTime() . ' | Positivos: ' . $father->getLike() . ' | Negativos: ' . $father->getUnlike(); ?></p></header>
                             
                                <p class="article-text">   <img  align="left" src="<?php echo $father->getImg(); ?>" /><?php echo $father->getComment(); ?></p>
                                <footer class="article-footer"></footer>
                            </article> </li>
                        <?php if (isset($sons)): ?>
                            <ul>
                                <?php foreach ($sons as $son): ?>
                                    <li><article>
                                            <header class="comment-header"><?php echo $son->getSubject(); ?><p style="display: inline;float:right"><?php echo $son->getName() . ' | ' . $son->getDateTime() . ' | Positivos: ' . $son->getLike() . ' | Negativos: ' . $son->getUnlike(); ?></p></header>
                                           
                                            <p class="article-text"> <img  align="left" src="<?php echo $son->getImg(); ?>" /><?php echo $son->getComment(); ?></p>
                                            <footer class="article-footer"></footer>
                                        </article> </li>
                                <? endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <? endif; ?>
                <? endforeach; ?>

            <?php else: ?>
                <li><article><p class="article-text">No hay comentarios¡¡¡</p></li>
                <footer class="article-footer"></footer>
            <?php endif; ?>            
        </ul>
        <footer><?php require_once 'pagerComment.html.php';?></footer>
    </article>    
</section>
<section>
    <?php require_once 'addComment.html.php';?>
</section>


