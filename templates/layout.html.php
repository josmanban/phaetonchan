<!DOCTYPE html>
<!--_______________________________________________________-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo (isset($title) ? $title : "Inicio"); ?></title>
        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <?php if ($rightCol): ?>
            <link rel="stylesheet" type="text/css" href="css/rightCol.css" />
        <?php endif; ?>

    </head>
    <body>
        <div id="wrapper">
            <!--_______________________HEADER________________________________-->
            <header>
                <h1>Phaeton Chan </h1>
                <p id="eslogan">Un chan mas, en español | Beta </p>
            </header>
            <nav> <!--_______________________NAV MENU________________________________-->
                <ul id="menu">         
                    <li class="menu-item"><a href="index.php">Inicio</a></li>
                    <li class="menu-item"><a href="avisoLegal.php">Términos y condiciones</a></li>      
                </ul>
            </nav>
            <!--___________________________RIGHT COL____________________________-->
            <aside>


            </aside>
            <!--__________________________BODY_____________________________-->
            <section id="content">    
                <?php
                if ($rightCol) {
                    require_once 'rightCol.php';
                }
                ?>
                <?php if (isset($html_of_script) && file_exists($html_of_script)): ?>
                    <?php require $html_of_script; ?>
                <?php else: ?>
                    <p>Sitio en construcción</p>
                <?php endif; ?>    



            </section>
            <!--_________________________FOOTER______________________________-->
            <footer> 
                Powered by <a class="linkFooter"name="message" href="http://josmanban.github.com/phaetonchan/">josmanban</a> 2013 &copy; Derechos Reservados
            </footer>              
        </div>
    </body>
</html>