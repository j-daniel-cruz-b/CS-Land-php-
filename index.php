<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Home</title>
    <?php
        include_once 'includes/templates/header.php';
    ?>
</head>

<body>
<header class="site-header home">
        <div class="contenido-header">
            <div class="navbar">
                <?php
                    include_once 'includes/templates/navbar.php';
                ?>
            </div>
            <img class="logo-home" src="img/logo-sin-fondo.png" alt="" srcset="">
        </div>
    </header>

    

    <section class="contenedor contenido-centrado seccion">
        <br>
        <br>
        <h1 class="centrar-texto">Eventos del Mes</h1>
        <div class="eventos">
        <?php 
            $calendario = array(); 
            try {
                require_once ('includes/functions/db_connection-regular.php');
                $sql = " SELECT nameE, nameA, imgE, descE, dateE, timeE
                FROM `eventassignament`
                INNER JOIN evento
                ON eventassignament.EventidE = evento.idE
                INNER JOIN artist
                ON eventassignament.ArtistidA = artist.idA 
                ORDER BY dateE";
                $res = $connection->query($sql);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            $calendario = array();           
                while ($eventos = $res->fetch_assoc()) { 
                    $fecha = $eventos['dateE'];
                    $evento = array('nombre' => $eventos['nameE'],
                    'artista' => $eventos['nameA'],
                    'descripción' => $eventos['descE'],
                    'fecha' => $eventos['dateE'],
                    'hora' => $eventos['timeE'],
                    'imagen' => $eventos['imgE'] );
                    $calendario[$fecha][] = $evento;
                }
                date_default_timezone_set('America/Mexico_City');
                $fechaActual = date('d-m-Y');
                $rango = date("d-m-Y",strtotime($fechaActual."+ 30 days"));
                $rango = strtotime($rango);
                $fechaActual = strtotime($fechaActual);                
                ?>
            <?php 
                foreach ($calendario as $dia => $lista_eventos) {                    
                    setlocale(LC_TIME, 'spanish');
                    $dia = strtotime($dia);
                    if ($dia < $rango && $dia > $fechaActual) {
                        
                    ?>
                <?php 
                        foreach ($lista_eventos as $event) { ?>
                            <div class="evento">
                                <?php
                                echo '<img class="imagen" src="img/stream/'.$event['imagen'].'" alt="" srcset="">'.
                                '<div class="texto-evento">'.
                                '<h3>'.$event['nombre'].'</h3>'.
                                '<p>'.$event['descripción'].'</p>'.
                                '<span class="badge badge-info">'.$event['artista'].'</span>'.
                                '<span class="badge badge-light">'.$event['fecha'].' | '.$event['hora'].'</span>'.
                                '</div>'.
                                '<a class="boton-base boton-morado" href="./eventos/1.html">Ir a Evento</a>'
                                ?>                            
                            </div>
                <?php 
                        }
                    }
                }
                // $connection->close();
            ?>
        </div>
    </section>

    <section class="seccion-blog seccion">
        <h2 class="contenedor centrar-texto texto-blanco">Descubre</h2>
        <div class="contenedor descubre">
            <a href="blog.php">
                <div class="entradas">
                    <div class="mini-entrda">
                        <div class="imagen">
                            <img src="img/bts-blog.jpg" alt="Entrada de blog">
                        </div>
                        <div class="texto-entrada">
                            <h4>BTS EN LOS BILLBOARD MUSIC AWARDS: UN NO PARAR DE SORPRESAS</h4>
                            <p>BTS fue uno de los grupos protagonistas de los BMA's y había mucha expectación puesta en ellos.</p>
                        </div>
                    </div>
                    <div class="mini-entrda">
                        <div class="imagen">
                            <img src="img/billie-blog.jpg" alt="Entrada de blog">
                        </div>
                        <div class="texto-entrada">
                            <h4>Billie Eilish hace historia en los Grammy 2020.</h4>
                            <p>Se ha convertido en la cantante más joven en llevarse las cuatro categorías destacadas.</p>
                        </div>
                    </div>

                </div>
            </a>
            <a href="blog.html">
                <div class="entrada-principal centrar-texto">
                    <div class="texto-entrada">
                        <h4>Adele, triunfo y 'patinazo' en los Grammy</h4>
                        <p>La noche de la 59 edición de los Premios Grammy fue de Adele.</p>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="seccion contenedor">
        <h2 class="contenedor centrar-texto">Nuevos Productos</h2>
        <div class="vista-tienda">
        <?php 
                    try {
                        require_once ('includes/functions/db_connection-regular.php');
                        $sql = " SELECT `idP`, `nameP`,`costP`,`imgP`,`descP`,`nameA` FROM `product`
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