<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CS Land | Tienda</title>
        <?php
        include_once 'includes/templates/header.php';
        ?>
    </head>

    <body>
        <header class="site-header tienda">
            <div class="contenido-header">
                <div class="navbar">
                <?php
                        include_once 'includes/templates/navbar.php';
                    ?>
                </div>
                <h1 class="texto-titulo">TIENDA</h1>
            </div>
        </header>
        <section class="seccion contenedor">
            <h2 class="contenedor centrar-texto">Nuevos Productos</h2>
            <div class="vista-tienda">
                <?php 
                    try {
                        require_once ('includes/functions/db_connection-regular.php');
                        $sql = $sql = " SELECT `idP`, `nameP`,`costP`,`imgP`,`descP`,`nameA` FROM `product`
                        INNER JOIN artist
                        ON artist.idA = product.ArtistidA";
                        $res = $connection->query($sql);
                    } catch (\Exception $e) {
                        echo $connection->error;
                    }
                    $products = $res->fetch_all();
                    foreach ($products as $product) {
                        echo '
                            <div class="producto">
                                <div class="imagen-prod">
                                    <img src="img/tienda/'.$product[3].'" alt="" srcset="">
                                </div>
                                <div class="texto-prod">
                                    <h4>'.$product[1].'</h4>
                                    <p>'.$product[4].'</p>
                                    <p class="precio">'.$product[2].'</p>
                                </div>';
                                if (isset($_SESSION['user'])) {
                                echo '<a class="boton-base boton-azul" href="tienda/venta.php?producto='.$product[0].'"> Comprar</a>';
                                }
                            echo '</div>';
                    }
                ?>
                </div>
        </section>
        <?php
    include_once 'includes/templates/footer.php';
    ?>

    </body>

</html>