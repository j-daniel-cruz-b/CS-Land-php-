<!DOCTYPE html>
<html lang="en">

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
        <header class="site-header stream">
            <div class="contenido-header">
                <div class="navbar">
                <?php
                    include_once 'includes/templates/navbar.php';
                ?>
                </div>
                <h1 class="texto-titulo">STREAM</h1>
            </div>
        </header>
        <section class=" seccion">
            <h2 class="centrar-texto">Eventos Estelares</h2>

            <div class="evento-e1">
                <div class="contenido-eventoE" style="background-image: url(img/adele-evento-estelar.jpg);">
                <!-- <img src="img/adele-evento-estelar.jpg" alt="Logotipo de CS Land"> -->
                    <!-- background-image: url(/img/adele-evento-estelar.jpg); -->
                    <p background="img/adele-evento-estelar.jpg">BTS MAP OF THE SOUL ON:E</p>
                    <a class="boton-base boton-azul" href="./eventos/1.html">Ir a Evento</a>
                </div>
            </div>
            <div class="evento-e2">
                <div class="contenido-eventoE">
                    <p>ADELE LIVE IN NEW YORK CITY 2020</p>
                    <a class="boton-base boton-azul" href="./eventos/2.html">Ir a Evento</a>
                </div>
            </div>
            <div class="evento-e3">
                <div class="contenido-eventoE">
                    <p>Billie Eilish When We All Fall Asleep Tour</p>
                    <a class="boton-base boton-azul" href="./eventos/3.html">Ir a Evento</a>
                </div>
            </div>
        </section>

        <hr class="contenedor">

        <section class="contenedor contenido-centrado seccion">
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
                        <i class="fab fa-github-square">
                        <?php echo strftime( "%A, %e de %B del %Y", strtotime($dia) );?>  
                </h3></i>
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