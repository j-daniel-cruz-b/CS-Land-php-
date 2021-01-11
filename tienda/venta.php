<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Tienda</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="img/icono.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<header class="site-header tienda">
        <div class="contenido-header">
            <div class="navbar">
            <a class="icono contenedor" href="../index.php">
                <img src="../img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <nav>
                    <a href="../nosotros.php">Nosotros</a>
                    <a href="../stream.php">Stream</a>
                    <a href="../tienda.php">Tienda</a>
                    <a href="../contacto.php">Contacto</a>
                </nav>
                <?php 

                session_start();

                if (isset($_SESSION['user'])) {
                    echo '<p> ['.$_SESSION['usuarioID'].' - '.$_SESSION['name'].'] </p>';
                    echo ' <a href="carrito.php">
                    Carrito
                    </a>';
                } else {
                    echo ' <a href="../login.php">
                    <img src="../img/login.png" alt="login">
                    </a>';
                }
                ?>
                </div>
            </div>
        </div>
    </header>

    <section class="contenedor seccion">
        <form action="actionPOST.php" method="post">
    <?php 
        $resultado = $_GET;
        // echo var_dump($resultado);
        $id = $resultado['producto'];
        try {
            require_once ('../includes/functions/db_connection-regular.php');
            $sql = " SELECT `idP`, `nameP`,`costP`,`imgP`,`descP`,`nameA` FROM `product`
            INNER JOIN artist
            ON artist.idA = product.ArtistidA
            WHERE idP = $id";
            $res = $connection->query($sql);
        } catch (\Exception $e) {
            echo $connection->error;
        }
        $product = $res->fetch_assoc();
        // echo var_dump($product);
        // foreach ($products as $product) { ?>
        <div class="evento">
        <?php
        echo '<img class="imagen" src="../img/tienda/'.$product['imgP'].'" alt="" srcset="">'.
        '<div class="texto-evento">'.
        
        '<input type="text" name="nameProduct" rows="1" colums="15" value="'.$product['nameP'].'" readonly></input>'.
        '<p>'.$product['descP'].'</p>'.
        '</div>'.
        '<div class="texto-evento">'.
        // '<h3 class="">'.$product['nameA'].'</h3>'.
        '<h3>Desde</h3>'.
        '<input type="number" name="idProduct" value="'.$product['idP'].'" readonly></input>'.
        '<input type="number" name="costProduct" value="'.$product['costP'].'" readonly></input>'.
        '<br>'.
        '<label for="unidades">Unidades</label>'.
        '<input type="number" name="unidades" value="1"></div>'.
        '<button type="submit" class="boton-base boton-rosa mr-5">Agregar al Carrito</button>'.
        '</div>';
        ?>                            
        </div>    
    </form>
    </section>

    <section class="contenedor ">
        <h1>Más Articulos</h1>
        <div class="vista-tienda ">
        <?php 
        try {
            require_once ('../includes/functions/db_connection-regular.php');
            $sql = $sql = " SELECT `idP`, `nameP`,`costP`,`imgP`,`descP`,`nameA` FROM `product`
            INNER JOIN artist
            ON artist.idA = product.ArtistidA
            LIMIT 3";
            $res = $connection->query($sql);
        } catch (\Exception $e) {
            echo $connection->error;
        }
        $products = $res->fetch_all();
        
        // echo var_dump($products);
        foreach ($products as $product) {
            echo '
            <div class="producto">
                <div class="imagen-prod">
                    <img src="../img/tienda/'.$product[3].'" alt="" srcset="">
                </div>
                <div class="texto-prod">
                    <h4>'.$product[1].'</h4>
                    <p>'.$product[4].'</p>
                    <p class="precio">'.$product[2].'</p>
                </div>
                <a class="boton-base boton-azul" href="venta.php?producto='.$product[0].'"> Comprar</a>
            </div>
        ';
        }
    ?>
    </section>

    <footer>
        <div class="contendor contenido-footer ">
            <div class="col ">
                <img src="../img/logo-footer.png " alt=" " srcset=" ">
            </div>
            <h5 class="margin-0 line"></h5>
            <div>
                <h4 class="margin-0 ">CONTACTO</h4>
                <p class="margin-0 "><span>Correo:</span> &ThinSpace; cs-land.enterprise@gmail.com</p>
                <p class="margin-0 "><span>Teléfono:</span> &ThinSpace; 52(84)200-87-70></p>
                <P class="margin-0 "><span>Direccion:</span> &ThinSpace; Montes Pirineos 947Independencia Oriente, <br> 44340 Guadalajara, Jal.></P>
            </div>
            <h5 class="margin-0 line"></h5>
            <div class="margin-0 ">
                <h4 class="margin-0 ">Menú:</h4>
                <lo class="navegacion-footer ">
                    <li><a href="../login.php ">
                        Inicio de Sesión / Registro
                    </a></li>
                    <li><a href="../nosotros.php ">
                        Nosotros
                    </a></li>
                    <li>
                        <a href="../stream.php ">
                            Stream
                        </a>
                    </li>
                    <li><a href="../tienda.php ">
                        Tienda
                    </a></li>
                    <li><a href="../contacto.php ">
                        Contacto
                    </a></li>
                    <li><a href="../blog.php ">
                        Blog
                    </a></li>
                </lo>
            </div>
        </div>
        <div class="row ">
            <p> <span> &copy; Carolina Medina & Daniel Cruz &MediumSpace; Todos los derechos reservados </span></p>
        </div>
    </footer>


</html>