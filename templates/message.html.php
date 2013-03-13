<?php if (isset($_GET['message'])): ?>
    <section>
        <article>
            <p ><a style="display:block;text-decoration: none;text-align: center"class="comment-header" href="#" name='message'>
                    <?php
                    echo $_GET['message'];
                    ?></a>
            </p>
        </article>
    </section>
    <? endif;
?>