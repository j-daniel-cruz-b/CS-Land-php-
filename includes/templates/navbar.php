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
    echo '<p> ['.$_SESSION['name'].'] </p>';
}
?>
<a href="login.php">
    <img src="./img/login.png" alt="login">
</a>
</div>