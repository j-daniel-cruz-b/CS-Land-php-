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
<header class="site-header tienda">
        <div class="contenido-header contacto">
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
                    echo '<p> ['.$_SESSION['name'].'] </p>';
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

    <section class="contenedor ">
        <h1>Mi Carrito</h1>
        
        <!-- <a class="boton-base boton-largo boton-azul" href="carrito.php?usser='.$_SESSION['usuarioID'].'&action=delete">Borrar Comprar</a> -->
    </section>

    <section class="contenedor ">
        <div class="vista-tienda ">

        <div name="Read" class="container">
            <?php 
                $idUss = $_SESSION['usuarioID'];
                $r = rand ( 1 , 9999 );
                // echo $r;
                $columnas = 0;
                $total = 0;
                $sql = " SELECT `productoID`,`usuarioId`,`costoProduct`, `nameP`, `cantC` FROM `carrito` 
                INNER JOIN product
                ON carrito.productoID = product.idP
                WHERE usuarioId = $idUss";
                $columnas = 5;
            
                try {
                    require_once ('../includes/functions/db_connection-regular.php');
                    $res = $connection->query($sql);
                    // $resAux = $connection->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
            <pre>
            <?php
                    // echo $sql;
                    // $registrosHeader = $resAux->fetch_assoc();
                    $registros = $res->fetch_all();
                    // $arrayPropiedades = array_keys($registrosHeader);
                    // echo '<pre>'.var_dump($registros).'</pre>';
                ?>
            </pre>
            <table class="table table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Producto</th>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Prec/Unidad</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Unidades</th>
                    </tr>
                    <?php
                        // foreach ($arrayPropiedades as $propiedad) {
                        //     switch ($propiedad) {
                        //         case 'idE':
                        //             echo '<th scope="col">ID</th>';
                        //             break;                            
                        //         case 'cost1':
                        //             echo '<th scope="col">Normal</th>';
                        //             break;
                        //         case 'cost2':
                        //             echo '<th scope="col">VIP</th>';
                        //             break;
                        //         default:
                        //             echo '<th scope="col">'.$propiedad.'</th>';
                        //             break;
                        //     }
                        // }
                    ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach($registros as $registro) {
                                    echo '<tr>';
                                    for ($i=0; $i < $columnas; $i++) { 
                                        if ($i == 2) {
                                            echo '<td>$ '.$registro[$i].'</td>';
                                            $total += $registro[$i];
                                        } else {
                                        echo '<td>'.$registro[$i].'</td>';
                                        }
                                    }
                                    echo '<tr>';
                                
                            }
                            // $connection->close();
                        ?>                    
                    <tr>
                        <td>
                        </td>
                        <td>
                            <h4>TOTAL</h4>
                        </td>
                        <td>
                            <h4><?php echo '$ '.$total ?></h4>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    <tr>
                </tbody>
                </table>
            </table>
            <?php
            $id = $_SESSION['usuarioID'];
            if ($total == 0){
                echo '<a class="boton-base boton-largo boton-rosa" href="carrito.php?usser='.$id.'&action=delete">Borrar Compra</a>' ;
            } else {
                echo '<a class="boton-base boton-rosa" href="pagarPaypal.php?usser='.$id.'&action=buy&total='.$total.'">Comprar</a>';
                echo '<a class="boton-base boton-largo boton-rosa" href="carrito.php?usser='.$id.'&action=delete">Borrar Compra</a>' ;
            }
        ?>
        </div>
        
        <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            var_dump($_GET);
            switch ($action) {
                case 'delete':
                    $sqlDelete = "DELETE FROM `carrito`;";
                    try {
                        require_once ('../includes/functions/db_connection-regular.php');
                        $resDelete = $connection->query($sqlDelete);
                        // $resAux = $connection->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                    // echo $connection->error;
                    if ($resDelete) {
                        echo '<script>
                            window.location="carrito.php";
                            </script>';
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
            
            // <?php 
            // try {
            //     require_once ('../includes/functions/db_connection-regular.php');
            //     $sql = $sql = " SELECT `idP`, `nameP`,`costP`,`imgP`,`descP`,`nameA` FROM `product`
            //     INNER JOIN artist
            //     ON artist.idA = product.ArtistidA
            //     LIMIT 4";
            //     $res = $connection->query($sql);
            // } catch (\Exception $e) {
            //     echo $connection->error;
            // }
            // $products = $res->fetch_all();
            
            // // echo var_dump($products);
            // foreach ($products as $product) {
            //     echo '
            //     <div class="producto-t">
            //         <div class="imagen-prod">
            //             <img src="img/'.$product[3].'" alt="" srcset="">
            //         </div>
            //         <div class="texto-prod">
            //             <h4>'.$product[1].'</h4>
            //             <p>'.$product[4].'</p>
            //             <p class="precio">'.$product[2].'</p>
            //         </div>
            //         <a class="boton-base boton-azul" href="venta.php?producto='.$product[0].'"> Comprar</a>
            //     </div>
            // ';
            // }
            ?>
        </div>
    </section>

    <footer>
        <div class="contendor contenido-footer ">
            <div class="col ">
                <img src="../img/logo-footer.png " alt=" " srcset=" ">
            </div>
            <h5 class="margin-0 "></h5>
            <div>
                <h4 class="margin-0 ">CONTACTO</h4>
                <p class="margin-0 "><span>Correo:</span> &ThinSpace; cs-land.enterprise@gmail.com</p>
                <p class="margin-0 "><span>Teléfono:</span> &ThinSpace; 52(84)200-87-70></p>
                <P class="margin-0 "><span>Direccion:</span> &ThinSpace; Montes Pirineos 947Independencia Oriente, <br> 44340 Guadalajara, Jal.></P>
            </div>
            <h5 class="margin-0 "></h5>
            <div class="margin-0 ">
                <h4 class="margin-0 ">Menú:</h4>
                <lo class="navegacion-footer ">
                    <li><a href="../login.html ">
                        Inicio de Sesión / Registro
                    </a></li>
                    <li><a href="../nosotros.html ">
                        Nosotros
                    </a></li>
                    <li>
                        <a href="../stream.html ">
                            Stream
                        </a>
                    </li>
                    <li><a href="../tienda.html ">
                        Tienda
                    </a></li>
                    <li><a href="../contacto.html ">
                        Contacto
                    </a></li>
                    <li><a href="../blog.html ">
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