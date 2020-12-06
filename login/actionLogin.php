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
    <header class="site-header">
        <div class="contenido-header">
            <div class="navbar">
            <a class="icono contenedor" href="../index.php">
                <img src="../img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <nav>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="stream.php">Stream</a>
                    <a href="tienda.php">Tienda</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
                <?php 

                // session_start();

                if (isset($_SESSION['user'])) {
                    echo '<p> ['.$_SESSION['name'].'] </p>';
                }
                ?>
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
                    <label for="email">Email</label> <input name="email" type="email" placeholder="Correo Electronico">
                    <label for="contraseña">Contraseña</label> <input name="contraseña" type="password" placeholder="Contraseña">
                    <a href="index.html">¿Olvidó su contraseña?</a>
                </fieldset>
                <input type="submit" value="Iniciar Sesión" class="boton-base boton-azul">
    </section>

    <main class="contenedor-contacto seccion ">
        
            <h3>O si aún no se une a la familia, REGISTRESE</h3>
            <fieldset>

                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label> <input id="nombre" type="text" placeholder="Nombre Completo">
                <label for="email">Email</label> <input id="email" type="email" placeholder="Correo Electronico">
                <label for="contrasena">Contraseña</label> <input id="contrasena " type="password" placeholder="Contraseña">
                <label for="contrasena">Confirmar Contraseña</label> <input id="contrasena " type="password" placeholder="Contraseña">
                <label for="telefono">Teléfono</label> <input id="telefono " type="tel" placeholder="Telefono Móvil">
            </fieldset>

            <fieldset>
                <legend>Información de Ubicación</legend>
                <label for="cp">Codigo Postal</label> <input id="cp" type="text" placeholder="Codigo Postal">
                <label for="Ciudad">Ciudad</label> <input id="Ciudad" type="text" placeholder="Ciudad">
                <label for="Estado">Estado</label> <input id="Estado" type="text" placeholder="Estado">
                <label for="País">País</label> <input id="País" type="text" placeholder="País">
            </fieldset>
            <input type="submit" value="Registrarse" class="boton-base boton-rosa">
        </form>
    </main>


    <?php
    include_once 'includes/templates/footer.php';
    ?>
</body>

</html>