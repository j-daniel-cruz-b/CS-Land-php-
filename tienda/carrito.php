<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Tienda</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="img/icono.png">
    <script src="../js/calcular.js"></script>
    <script src="../lib/jsPDF-1.3.2/dist/jspdf.min.js"></script>
    <script src="../js/pdfCotizacion.js"></script>
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
                    echo '<a> ['.$_SESSION['name'].'] </a>';
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
        <hr>
        <h4 id="userID" style="display:none;"><?php echo $_SESSION['usuarioID'] ?></h4>
        <h4 id="userName" style="display:none;"><?php echo $_SESSION['name'] ?></h4>
        <h4 id="userEmail" style="display:none;"><?php echo $_SESSION['email'] ?></h5>
        <h4 id="userPhone" style="display:none;"><?php echo $_SESSION['phone'] ?></h5>
    </section>

    <section class="contenedor ">
        <div class="vista-tienda ">
        <div id="Read" class="container">
            <?php 
                $idUss = $_SESSION['usuarioID'];
                $r = rand ( 1 , 9999 );
                // echo $r;
                $columnas = 0;
                $total = 0;
                $sql = " SELECT `productoID`,`costoProduct`, `cantC`, `costoTotal`,`nameP` FROM `carrito` 
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
                    $registros = $res->fetch_all();
                ?>
            </pre>
            <table class="table table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Producto</th>
                        <th scope="col">Prec/Unidad</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Prec/Total</th>
                        <th scope="col">Nombre Producto</th>
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
                    $ren = 0;
                    $celda = 0;
                            foreach($registros as $registro) {
                                echo '<tr id="ren'.$ren.'">';
                                for ($i=0; $i < $columnas; $i++) { 
                                    if ($i == 3) {
                                        echo '<td id="dato'.$celda.'">$ '.$registro[$i].'</td>';
                                        $total += $registro[$i];
                                        $celda++;
                                    } else if ($i == 1){
                                        echo '<td id="dato'.$celda.'">$ '.$registro[$i].'</td>';
                                        $celda++;
                                    } else {
                                        echo '<td id="dato'.$celda.'">'.$registro[$i].'</td>';
                                        $celda++;
                                    }
                                }
                                echo '<tr>';
                                $ren ++;
                            }
                        ?>                    
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <h4>TOTAL</h4>
                        </td>
                        <td >
                            <h4><?php echo '$ '.$total ?></h4>
                            <input value="<?php echo $total ?>" id="total" style="display: none">
                        </td>
                        <td>
                        </td>
                    <tr>
                </tbody>
                </table>
            </table>
            <div class="botones" id="buttons">
            <?php
            $id = $_SESSION['usuarioID'];
            if ($total == 0){
                echo '<a class="boton-base boton-largo boton-rosa" href="../tienda.php">Ir a Tienda</a>' ;
            } else {
                echo '<p id="totRenglones" style="display:none;">'.$ren.'</p>';
                echo '<a class="boton-base boton-rosa" href="pagarPaypal.php?usser='.$id.'&action=buy&total='.$total.'">Comprar</a>';
                echo '<a class="boton-base boton-largo boton-rosa" href="carrito.php?usser='.$id.'&action=delete">Borrar Compra</a>' ;
                echo '<button type="submit" class="boton-base boton-largo boton-azul" id="btnImprimir">Cotización de Compra</button>';
                echo '<button type="submit" class="boton-base boton-largo boton-rosa" id="btnIVA">Mostrar I.V.A.</button>';
            }
        ?>
            
            </div>
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