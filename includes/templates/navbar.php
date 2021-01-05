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
<?php  
    session_start();
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