<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Tienda</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="img/icono.png">
    <script src="../lib/jsPDF-1.3.2/dist/jspdf.min.js"></script>
    <script src="../js/pdfCompra.js"></script>
    <script src="../js/calcular.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</head>

<body>
<header class="site-header">
        <div class="contenido-header">
            <div class="navbar">
            <a class="icono contenedor" href="../includes/functions/deleteCarrito.php">
                <img src="../img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <?php 
                session_start();
                if (isset($_SESSION['user'])) {
                    echo '<a href="#"> ['.$_SESSION['usuarioID'].' '.$_SESSION['name'].'] </a>';
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
        <h2>Pagos con Paypal</h2>
        <div class="evento">
        <?php 
            $resultado = $_GET['exito'];
            $paymentId = $_GET['paymentId'];

            if($resultado == "true"){
                echo '<div class="ml-5">';
                echo "<h4>El pago se realizo correctamente <h4>";
                echo "<h4>Id de Compra <h4>";
                echo '<h3 id="idpayment">'.$paymentId.'</h3>';
                echo '</div>'.
                '<a class="boton-base boton-largo boton-rosa mb-5" href="../includes/functions/deleteCarrito.php">Terminar Compra</a>';
                $sql = ' SELECT `productoID`,`costoProduct`, `cantC`, `costoTotal`,`nameP` FROM `carrito` 
                INNER JOIN product
                ON carrito.productoID = product.idP
                WHERE usuarioId = '.$_SESSION["usuarioID"].'';
                $columnas = 5;
                try {
                    require_once ('../includes/functions/db_connection-regular.php');
                    $res = $connection->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                $registros = $res->fetch_all();
            } else {
                echo "<h4>El pago no se realizo</h4>";
                echo "<p>Intentelo de nuevo más tarde</p>";
            }
        ?>
    </section>

    <section class="contenedor ">
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
                $columnas = 0;
                $total = 0;
                $sql = " SELECT `productoID`,`costoProduct`, `cantC`, `costoTotal`,`nameP` FROM `carrito` 
                INNER JOIN product
                ON carrito.productoID = product.idP
                WHERE usuarioId = $idUss ";
                $columnas = 5;
                try {
                    require_once ('../includes/functions/db_connection-regular.php');
                    $res = $connection->query($sql);
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
                                $sqlCompra = "INSERT INTO purchase(ProductidP, UseridU, tipoPago, cantP, total)
                                VALUES('$registro[0]',$idUss,'PAYPAL','$registro[2]',$registro[3]);";
                                $sqlResta = "UPDATE `product` 
                                SET `stok` = 100 - $registro[2]
                                WHERE `idP` = $registro[0]";
                                try {
                                    require_once ('../includes/functions/db_connection-regular.php');
                                    $res = $connection->query($sqlResta);
                                    $res = $connection->query($sqlCompra);
                                } catch (\Exception $e) {
                                    echo $e->getMessage();
                                }
                                
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
                echo '<a class="boton-base boton-largo boton-rosa" href="../includes/functions/deleteCarrito.php">Terminar</a>' ;
            } else {
                echo '<p id="totRenglones" style="display:none;">'.$ren.'</p>';
                echo '<button type="submit" class="boton-base boton-largo boton-azul" id="btnImprimir">Recibo de Compra</button>';
                echo '<button type="submit" class="boton-base boton-largo boton-rosa" id="btnIVA">Mostrar I.V.A.</button>';
            }
        ?>
            
            </div>
        </div>
        </div>
        <br>
        <br>
    </section>
    
</body>
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