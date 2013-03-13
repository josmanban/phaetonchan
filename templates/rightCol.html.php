
    <section id="categories">
        <article>
            <header class="section-header">Categorias</header>
            <style>
                .prueba{
                    /*display: inline-block;*/
                    
                    /*width: 15%;*/
                   
                }
                #categories-list{
                    column-count: 7;
                    -webkit-column-count: 7;
                    -moz-column-count: 7;
                }
                .father-category-title{
                    font-weight: bold;
                    text-decoration: underline;
                    padding: 0.5em;       }
            </style>
            
            <ul id="categories-list">        
                <?php foreach ($categories as $fatherCategory): ?>
                    <?php if (is_null($fatherCategory->getIdFatherCategory())): ?>
                        <li class="father-category-title"><?php echo $fatherCategory->getName(); ?></li>
                        <?php foreach ($categories as $category): ?>
                            <?php if ($category->getIdFatherCategory() == $fatherCategory->getId()): ?>
                        <li class="categories-item prueba"> <a href="topicPerCategory.php?idCat=<?php echo $category->getId(); ?>&page=1"> <?php echo $category->getName(); ?></a></li> 
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
    </section>

