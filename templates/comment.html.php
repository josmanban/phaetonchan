<?php require_once 'showComments.php'; ?>

<script type="text/javascript">
    window.onload=function(){
        buttons=document.getElementsByName("repply")  ;
       
        
        for(i=0;i<buttons.length;i++){
           
            buttons[i].onclick=mensaje;
        }
    };
    function mensaje(){
        document.getElementById('name').focus();
        hiden=document.getElementById('idRepplyComment');
        hiden.value=this.id;
        //alert(hiden.value);
    }
 
    
</script>
<section id="comments">
    <article>
        <header class="secundary-section-header" >Comentarios (<? echo $numComments ?>): </header>
        <?php showComments($idComment, $idTopic, $offset, $limit) ?>
        <footer><?php require_once 'pagerComment.html.php' ?></footer>
    </article>    
</section>
<section>
    <?php require_once 'addComment.html.php'; ?>
</section>


