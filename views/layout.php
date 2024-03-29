<?php 
    
    if(!isset($_SESSION)){
        session_start();
    }
    // var_dump($_SESSION);

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

     <header class="header <?php echo $inicio ? 'inicio' : '' ?>"> <!-- //<?php echo $inicio ? 'inicio' : '' ?>" actua como if con la variable $inicio del index haciendo que inicio solo se active si es llamado-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/public">
                    <img src="../build/img/logo.svg" width="300" height="49.38" alt="logotipo de bienes raices">
                </a>


                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/public/nosotros">Nosotros</a>
                        <a href="/public/propiedades">Anuncios</a>
                        <a href="/public/blog">Blog</a>
                        <a href="/public/contacto">Contacto</a>
                        <a href="/public/login">Iniciar Sesión</a>

                        <?php if($auth): ?>
                        <a href="/public/logout">Cerrar Sesión</a>
                        <?php endif; ?>



                    </nav>

                </div>


            </div>
            <!--.barra-->

            <?php 
                if($inicio){
                    echo "<h1>Venta de Casa y Departamentos Exclusivos</h1>";
                }
            ?>

        </div>
    </header>


    <?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>

            </nav>
        </div>



        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>