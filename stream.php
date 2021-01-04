<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CS Land | Stream</title>
        <?php
        include_once 'includes/templates/header.php';
    ?>
    </head>
    <body>
        <header class="stream-header">
            <div class="contenido-header">
                <div class="navbar">
                <?php
                    include_once 'includes/templates/navbar.php';
                ?>
                </div>
                </div>
                <div class="slideshow">
                    <ul class="slider">
                        <li>
                            <img src="img/background-main 6.jpg" alt="">
                            <section class="caption">
                                <h1>Eventos Estelares</h1>
                                <p>Los últimos eventos más esperados por la audiencia.</p>
                            </section>
                        </li>
                        <li>
                            <img src="img/bts-evento-estelar.jpg" alt="">
                            <section class="caption">
                                <a class="boton-base boton-azul mb-5" href="./eventos/1.html">Ir a Evento</a>
                            </section>
                        </li>
                        <li>
                            <img src="img/adele-evento-estelar.jpg" alt="">
                            <section class="caption">
                                <a class="boton-base boton-azul mb-5" href="./eventos/1.html">Ir a Evento</a>
                            </section>
                        </li>
                        <li>
                            <img src="img/billie-concert-estelar.jpg" alt="">
                            <section class="caption">
                                <br>
                                <a class="boton-base boton-azul mb-5" href="./eventos/1.html">Ir a Evento</a>
                            </section>
                        </li>
                    </ul>

                    <ol class="pagination">

                    </ol>

                    <div class="left">
                        <span class="fa fa-chevron-left"></span>
                    </div>

                    <div class="right">
                        <span class="fa fa-chevron-right"></span>
                    </div>
                </div>
                <!-- <h1 class="texto-titulo">STREAM</h1> -->
            
        </header>
        
        <section class="contenedor contenido-centrado seccion">
            <br>
            <hr class="contenedor">
            <br>
            <br>
            <h3 class="centrar-texto">Próximos Eventos</h3>

            <?php 
            
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
         ?>
    
         <div class="">
            <?php
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
                    ?>
                <?php
                }                
            ?>
            <?php 
                foreach ($calendario as $dia => $lista_eventos) { ?>
                    <h3 class="centrar-texto"> <?php 
                        
                        // setlocale(LC_TIME, 'es_ES.UTF-8');
                        setlocale(LC_TIME, 'spanish');
                        ?>
                        <span class="fa fa-calendar">
                        <?php echo strftime( "%A, %e de %B del %Y", strtotime($dia) );?>  
                </h3></span>
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
                            '</div>'

                            ?>                            
                            
                            <a class="boton-base boton-morado" href="./eventos/1.html">Ir a Evento</a>
                        </div>
                <?php 
                    }
                }
                $connection->close();
            ?>
        </section>

        <?php
            include_once 'includes/templates/footer.php';
        ?>
    </body>

</html>