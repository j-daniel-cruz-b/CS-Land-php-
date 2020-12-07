<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Contacto</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/icono.png">
</head>

<body>
    <header class="site-header contacto">
        <div class="contenido-header">
            <div class="navbar">
            <a class="icono contenedor" href="index.php">
                <img src="img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <nav>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="stream.php">Stream</a>
                    <a href="tienda.php">Tienda</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
                <a href="login.php">
                    <img src="./img/login.png" alt="login">
                </a>
                </div>
            </div>
        </div>
    </header>

    <section class="contenedor-contacto seccion ">
        <h2>Iniciar Sesión</h2>
            <form class="contacto" action="./login.php" method="POST">
            <?php

            if(isset($errorLogin)){
                echo $errorLogin;
            }

            ?>
                <fieldset class="centrar-texto">
                    <legend>Escriba Correctamente sus credenciales</legend>
                    <label for="email">Nombre de Usuario</label> <input name="email" type="text" placeholder="Correo Electronico">
                    <label for="contraseña">Contraseña</label> <input name="contraseña" type="password" placeholder="Contraseña">
                    <a href="login/registro.php">Soy nuevo :D</a>
                </fieldset>
                <input type="submit" value="Iniciar Sesión" class="boton-base boton-azul">
    </section>

    <?php
    include_once 'includes/templates/footer.php';
    ?>
</body>

</html>