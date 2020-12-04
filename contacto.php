<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Contacto</title>
    <?php
        include_once 'includes/templates/header.php';
    ?>
</head>

<body>
    <header class="site-header contacto">
        <div class="contenido-header">
            <div class="navbar">
            <?php
                        include_once 'includes/templates/navbar.php';
                    ?>
            </div>
            <h1 class="texto-titulo">CONTACTANOS</h1>
        </div>
    </header>

    <section class="contenedor seccion">
        <h1>INFORMACIÓN DE CONTACTO</h1>
        <div class="info">
            <p><span>CORREO:</span>&ThinSpace;cs-land.enterprise@gmail.com</p>
            <p> <span>TÉLEFONO:</span> &ThinSpace;52(84)200-87-70</p>
            <p><span>DIRECCIÓN:</span> &ThinSpace;Montes Pirineos 947Independencia Oriente, 44340 Guadalajara, Jal.</p>
        </div>
    </section>
    <hr class="contenedor">
    <main class="contenedor-contacto seccion">
        <h2>Formulario de Contacto & Soporte</h2>

        <form class="contacto" action="">
            <fieldset>
                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label> <input id="nombre" type="text" placeholder="Nombre Completo">
                <label for="email">Email</label> <input id="email" type="email" placeholder="Correo Electronico">
                <label for="telefono">Teléfono</label> <input id="telefono " type="tel" placeholder="Telefono Móvil">


            </fieldset>

            <fieldset>
                <legend>Información de Ubicación</legend>
                <label for="cp">Codigo Postal</label> <input id="cp" type="text" placeholder="Codigo Postal">
                <label for="Ciudad">Ciudad</label> <input id="Ciudad" type="text" placeholder="Ciudad">
                <label for="Estado">Estado</label> <input id="Estado" type="text" placeholder="Estado">
                <label for="País">País</label> <input id="País" type="text" placeholder="País">
            </fieldset>

            <fieldset>
                <legend>Información de Contacto</legend>

                <label for="mensaje">Asunto</label>
                <input type="text" placeholder="Asunto">
                <label for="mensaje">Especifique su Problema Brevemente</label>
                <textarea name="comentario" id="mensaje" placeholder="Escribe Brevemente tu mensaje"></textarea>
                <p>Como desea ser contactado:</p>
                <div class="forma-contacto">
                    <label for="telefono">Telefono</label>
                    <input type="radio" name="contacto" value="telefono" id="telefono">
                    <label for="email">E-mail</label>
                    <input type="radio" name="contacto" value="correo" id="email">
                </div>

                <p>Si eligio Telefono, elija la fecha y hora</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">
                <p>Horario Disponible</p>
                <label for="hora">De:</label>
                <input type="time" id="hora" min="9:00" max="18:00">
                <label for="hora">A:</label>
                <input type="time" id="hora" min="9:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-base boton-azul">
        </form>
    </main>


    <?php
    include_once 'includes/templates/footer.php';
    ?>
</body>

</html>