<!DOCTYPE html>
<html lang="en">
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

                session_start();

                if (isset($_SESSION['user'])) {
                    echo '<p> ['.$_SESSION['usuarioID'].' '.$_SESSION['name'].'] </p>';
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
    <?php 
        // $resultado = $_GET;
        // // echo var_dump($resultado);
        // $id = $resultado['producto'];
        
        // $product = $res->fetch_assoc();
        // echo var_dump($product);
        // foreach ($products as $product) { ?>
        <h2>Pagos con Paypal</h2>
        <div class="evento">
        <?php 
            $resultado = $_GET['exito'];
            $paymentId = $_GET['paymentId'];

            if($resultado == "true"){
                echo '<div class="ml-5">';
                echo "<h4>El pago se realizo correctamente <h4>";
                echo "<h3>El ID es {$paymentId}</h3>";
                echo '</div>'.
                '<a class="boton-base boton-rosa mb-5" href="../tienda.php">Ir a la Tienda</a>';
                $sqlDelete = "DELETE FROM `carrito`;";
                try {
                    require_once ('../includes/functions/db_connection-regular.php');
                    $resDelete = $connection->query($sqlDelete);
                    // $resAux = $connection->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "<h4>El pago no se realizo</h4>";
            }
        ?>
        <?php
        // echo '<img class="imagen" src="../img/harry-tienda-home.jpg" alt="" srcset="">'.
        // '<div class="texto-evento">'.
        
        // '<input type="text" name="nameProduct" rows="1" colums="5" value="'.$product['nameP'].'" readonly></input>'.
        // '<p>'.$product['descP'].'</p>'.
        // '</div>'.
        // '<div class="texto-evento">'.
        // // '<h3 class="">'.$product['nameA'].'</h3>'.
        // '<h3>Desde</h3>'.
        // '<input type="number" name="idProduct" value="'.$product['idP'].'" readonly></input>'.
        // '<input type="number" name="costProduct" value="'.$product['costP'].'" readonly></input>'.
        // '<br>'.
        // '<label for="unidades">Unidades</label>'.
        // '<input type="number" name="unidades" value="1"></div>'.
        // '<button type="submit" class="boton-base boton-rosa mr-5">Agregar al Carrito</button>'.
        // '</div>';
        // if ($_SESSION['addcarrito'] == "ok") {
        //     echo '<h3>AGREGADO</h3>';
        // }
        ?>                            
        </div>
        <?php
        
        // }

        // echo var_dump($products);
        // foreach ($products as $product) {
            // echo '
            // <img src="../img/t'.$product['imgP'].'" alt="">
            // <div class="">
            //     <div class="texto-articulo">
            //         <h3>'.$product['nameP'].'</h3>
            //         <p>Desde '.$product['costP'].'</p>
            //     </div>
            //     <div class="comprar-articulo">
            //         <label for="unidades">Unidades</label>
            //         <input type="number" id="unidades">
            //         <a class="boton-base boton-rosa " herf=" ">Comprar</a>
            //     </div>
            // </div>
            // ';
        // }
    ?>
    </section>
    <div class="formulario">
        

    </div>
    
</body>
</html>