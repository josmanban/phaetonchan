<article>
    <style>

        form{
            clear:both;
            padding: 0% 30%;  
        }
        form label,form input,form textarea{
            width: 100%;
            display:block;
            padding:0.25em;
            /*margin:0.25em;         */
            font-family: inherit;
            
        }
        form input,form textarea{
            border: 1px solid #5c5c5c;
        }
        form label{
            text-align: left;
        }
    </style>
    <form method="POST" action="addComment.php">
        <label class="article-header">Añadir Comentario:</label>
        <input type="hidden" name="idComment" value="<?php echo $idComment ?>"/>
        <input type="hidden"name="idTopic" value="<?php echo $id ?>">
        <label>Nick:</label><input name="name" placeholder="Anonymous" value="Anonymous" type="text">
        <label>*Asunto:</label><input  name="subject" type="text">
        <label>URL imagen:</label><input name="img" type="url">   
        <label>*Comentario:</label><textarea   name="comment" cols="10" rows="4" ></textarea>
        <input type="submit" name="aceptar" value="Publicar">
    </form>
</article>
