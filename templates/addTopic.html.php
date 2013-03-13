<article>
    <style>

        form{
            clear:both;
            padding:0 50% 1% 5%;

        }
        form label,form input,form textarea{

            display:inline-block;
            padding:0.25em;
            /*margin:0.25em;         */
            font-family: inherit;


        }
        form input,form textarea{
            border: 1px solid #5c5c5c;
            width: 70%;
            margin-right: 1em;
        }
        form label{
            text-align: right;
            width: 25%;
        }

    </style>
    <form method="POST" action="addTopic.php">
        <input type="hidden" name="idCat" value="<?php echo $_GET['idCat'] ?>"/>
        <label>*Nick:</label><input name="name" value="Anonymous" placeholder="Anonymous" type="text">
        <label>*Asunto:</label><input  name="subject" type="text">
        <label>URL imagen:</label><input name="img" type="url"> 
        <label>*Contenido:</label><textarea   name="comment"  rows="3" ></textarea>
        <label></label><input type="submit" name="aceptar" value="Publicar">
    </form>
</article>
