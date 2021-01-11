<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="img/icono.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<header class="">
        <div class="">
            <div class="navbar">
            <a class="icono contenedor" href="./index.php">
                <img src="./img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <nav>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="stream.php">Stream</a>
                    <a href="tienda.php">Tienda</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
                <?php 
                    if (isset($_SESSION['user'])) {
                        echo '<a href="index.php"> ['.$_SESSION['usuarioID'].' - '.$_SESSION['name'].'] </a>';
                        echo ' <a href="tienda/carrito.php">
                        Carrito
                        </a>';
                        echo '<a href="includes/functions/logout.php">
                        Cerrar de Sesión
                        </a>';
                        if($_SESSION['role'] != 5){
                            echo '<a href="admin/admin.php">
                        Ir al Administrador
                        </a>';
                        }
                    } else {
                        echo '<a href="login.php">
                        <img src="./img/login.png" alt="login">
                    </a>';
                    }
                ?>
                </div>
            </div>
        </div>
    </header>

    <section class="contenedor seccion">
        <h2>Inicio de Sesión</h2>
        <div class="evento">
        <?php 
                echo '<div class="ml-5">';
                echo "<h4>Se ha inicacio sesión CORRECTAMENTE<h4>";
                echo '<h3>Con el Usuario ['.$_SESSION['usuarioID'].' - '.$_SESSION['name'].']</h3>';
                echo '</div>';
            
        ?>    
        </div>
    </seccion>
    </body>
</html>