<section id="threads">
    <article>
        <?php include_once 'commons/manager/CommentManager.php'; ?>
        <!--<header class="section-header">Temas | id | Comentarios | positivos | negativos |fecha y hora</header>-->
        <!--                    <ul id="threads-list">   
        <?php //if (isset($arr_topics) & count($arr_topics) > 0): ?> 
        <?php //foreach ($arr_topics as $topic) : ?>
                                 <li class="thread-item"><a href="topic.php?id=<?php // echo $topic->getId();            ?>">
        <?php //echo $topic->getSubject() . ' | ' . $topic->getDateTime() ?></a></li>
        <?php // endforeach; ?>
        <?php //else: ?>
                             <li><p>Ningun tema publicado</p> <br><br><br><br><br>
                                 <br><br><br><br><br><br><br><br><br><br><br></li>                            
        <?php // endif; ?>                            
                     </ul>-->
<!--        <section id="left">-->
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td style="padding-right: 1em">
                    <table class="topicTable" cellpadding="0" cellspacing="0">
                        <tr class="article-header">
                            <td class="thread-item">Ultimos temas</td>
                            <td class="thread-item">Comentarios</td>
        <!--                    <td class="thread-item">Positivos</td>
                            <td class="thread-item">Negativos</td>-->
                            <td class="thread-item">Fecha y hora</td>
                            <?php if (isset($arr_topics) & count($arr_topics) > 0): ?> 
                                <?php foreach ($arr_topics as $topic) : ?>
                                <tr>
                                    <td class="thread-item td-subject"><a href="topic.php?id=<?php echo $topic->getId(); ?>&page=1">
                                            <?php echo $topic->getSubject(); ?></a>
                                    </td>
                                    <td class="thread-item td-center"><?php echo CommentManager::countCommentsPerIdTopic($topic->getId()) ?></td>
                <!--                            <td class="thread-item"><?php echo $topic->getlike(); ?></td>
                                    <td class="thread-item"><?php echo $topic->getUnlike(); ?></td>-->
                                    <td class="thread-item td-center"><?php echo $topic->getDateTime(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><p>Ningun tema publicado</p> <br><br><br><br><br>
                                <br><br><br><br><br><br><br><br><br><br><br></li>                            
                        <?php endif; ?>  
            </tr>
        </table>
        <footer class="article-footer"></footer>
        <!--        </section>
                            <section id="right">-->
        </td>

        <td style="padding-left: 1em">
            <table class="topicTable"  cellpadding="0" cellspacing="0">
                <tr class="article-header">
                    <td class="thread-item">Temas mas populares</td>

                    <td class="thread-item">Comentarios</td>
<!--                    <td class="thread-item">Positivos</td>
                    <td class="thread-item">Negativos</td>-->
                    <td class="thread-item">Fecha y hora</td>
                    <?php if (isset($arr_popularTopic) & count($arr_popularTopic) > 0): ?> 
                        <?php foreach ($arr_popularTopic as $topic) : ?>
                        <tr>
                            <td class="thread-item td-subject" ><a href="topic.php?id=<?php echo $topic->getId(); ?>&page=1">
                                    <?php echo $topic->getSubject(); ?></a>
                            </td>

                            <td class="thread-item td-center"><?php echo CommentManager::countCommentsPerIdTopic($topic->getId()) ?></td>
        <!--                            <td class="thread-item"><?php echo $topic->getlike(); ?></td>
                            <td class="thread-item"><?php echo $topic->getUnlike(); ?></td>-->
                            <td class="thread-item td-center "><?php echo $topic->getDateTime(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li><p>Ningun tema publicado</p> <br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br><br><br></li>                            
                <?php endif; ?>  
                </tr>
            </table>
            <footer class="article-footer"></footer>
    </article></td>
</tr>
</table>
<!--</section>-->
</section>
<section>
    <article >
        <p class="statics">
            Numero de Visitas: <?php include("contador.php");
            echo contador();
            ?> | Número de Temas: <?php echo $numAllTopics ?> | Número de Comentarios: <?php echo $numAllComments ?></p>

    </article>
</section>
<section></section>


