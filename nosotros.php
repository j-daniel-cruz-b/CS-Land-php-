<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Nosotros</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/icono.png">
</head>

<body>
    <header class="site-header nosotros">
        <div class="contenido-header">
            <div class="navbar">
            <?php
                include_once 'includes/templates/navbar.php';
            ?>
            </div>
            <h1 class="texto-titulo">CONOCENOS</h1>
        </div>
    </header>

    <section class="contenedor seccion">
        <h2 class="centrar-texto">Nuestra Historia</h2>
        <div class="contenido-his">
            <div class="imagen-h">
                <img src="img/nosotros.jpg" alt="Imagen sobre nosotros">
            </div>
            <div class="texto-historia">
                <blockquote>Fundación Oficial: 26 de Septiembre 2019.</blockquote>
                <p>Esta historia da inicio por la necesidad de conectar al mundo con sus artistas favoritos, y por el esfuerzo participativo de diversos sectores y personajes de la Comarca Lagunera y de la vida nacional. La Ing. Carolina tuvo la idea de
                    crear un lugar en donde se pudieran ver los conciertos en vivo de artistas mundialmente famosos, trayendo con ella el concepto de “Stream”, ya lo hacía Netflix y Amazon, pero no en tiempo real, ella junto con el Ing. Cruz crearon Concert.net,
                    como se llamó primero cuando dependíamos directamente de T.V. Azteca.
                </p>
            </div>
        </div>
    </section>

    <section class="contenedor-mv seccion">
        <div class="mv-div">
            <img class="margin-0" src="img/logo-sin-texto.png" alt="">
            <div class="contenedor m-v">
                <div class="mision">
                    <h3 class="margin-0">Misión</h3>
                    <p>Plataforma dedicada al Stream de Conciertos Oficiales con artistas mundialmente reconocidos, así como sitio con Merche Oficial.</p>
                </div>
                <div class="vision">
                    <h3 class="margin-0">Visión</h3>
                    <p class="centrar-texto">"Para 2022 ser reconocidos como la plataforma #1 de Stream de conciertos oficiales"</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contenedor seccion">
        <h3 class="centrar-texto">Nuestros Fundadores</h3>
        <div class="fundadores centrar-texto">
            <div class="f2">
                <div class="img-f">
                    <img src="img/fund-caro.jpeg" alt="" srcset="">
                </div>
                <p class="texto-f">Ing. Carolina Medina</p>
            </div>
            <div class="f2">
                <div class="img-f">
                    <img src="img/fund-dani.jpeg" alt="">
                </div>
                <p class="texto-f">Ing. Daniel Bustamante</p>
            </div>
        </div>
    </section>

    <?php
    include_once 'includes/templates/footer.php';
    ?>
</body>

</html>