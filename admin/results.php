<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Resultados</title>
    <?php
        include_once '../includes/templates/header.php';
    ?>
</head>
<body>
    <header>
        <?php
            include_once 'templates/headerAdmin.php';
        ?>
    </header>

    <div name="Titulos" class="container">
        <h1>
            <?php 
                $entidad = ($_GET['entity']);
                echo strtoupper($entidad);
            ?>
        </h1>
        <div>
            <?php
                switch ($entidad) {
                    case 'evento':
                        switch ($_GET['action']) {
                            case 'get':
                                echo '<h4>LISTA DE REGISTROS TOTALES</h4>'; ?>
                                
                                <div name="Read" class="container">
                                    <?php 
                                        $sql = '';
                                        $columnas = 0;
                                        switch ($entidad) {
                                            case 'evento':
                                                $sql = " SELECT idE, nameE, nameA, descE, dateE, timeE, cost1, cost2
                                                FROM `eventassignament`
                                                INNER JOIN evento
                                                ON eventassignament.EventidE = evento.idE
                                                INNER JOIN artist
                                                ON eventassignament.ArtistidA = artist.idA 
                                                ORDER BY dateE";
                                                $columnas = 8;
                                                break;
                                            case 'producto':
                                                $sql = "SELECT idP, nameP, descP, costP, ArtistidA
                                                FROM `product`
                                                ORDER BY idP";
                                                $columnas = 5;
                                                break; 
                                            case 'usuario':
                                                $sql = "SELECT * FROM `user`";
                                                $columnas = 8;
                                                break;           
                                            default:
                                                # code...
                                                break;
                                        }
                                    
                                        try {
                                            require_once ('../includes/functions/db_connection-regular.php');
                                            $res = $connection->query($sql);
                                            $resAux = $connection->query($sql);
                                        } catch (\Exception $e) {
                                            echo $e->getMessage();
                                        }
                                    ?>
                                    <pre>
                                    <?php
                                            $registrosHeader = $resAux->fetch_assoc();
                                            $registros = $res->fetch_all();
                                            $arrayPropiedades = array_keys($registrosHeader);
                                            // echo '<pre>'.var_dump($registros).'</pre>';
                                        ?>
                                    </pre>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <?php
                                                foreach ($arrayPropiedades as $propiedad) {
                                                    switch ($propiedad) {
                                                        case 'idE':
                                                            echo '<th scope="col">ID</th>';
                                                            break;                            
                                                        case 'cost1':
                                                            echo '<th scope="col">Normal</th>';
                                                            break;
                                                        case 'cost2':
                                                            echo '<th scope="col">VIP</th>';
                                                            break;
                                                        default:
                                                            echo '<th scope="col">'.$propiedad.'</th>';
                                                            break;
                                                    }
                                                }
                                            ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conciertos = array();           
        
                                                    foreach($registros as $registro) {
                                                            echo '<tr>';
                                                            for ($i=0; $i < $columnas; $i++) { 
                                                                echo '<td>'.$registro[$i].'</td>';
                                                            }
                                                            echo '<tr>';
                                                        
                                                    }
                                                    $connection->close();
                                                ?>                    
                                            
                                            <tr>
                                        </tbody>
                                        </table>
                                    </table>
                                </div>
                                
                                <?php
                                break;
                            case 'post':
                                echo '<h4>REALIZA NUEVO REGISTROS</h4>'; ?>
        
                                <div name="Create" class="container">
                                    <form action="actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="nameEvent">Name</label>
                                                <input type="text" class="form-control" name="nameEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="descEvent">Descripción del Evento</label>
                                                <textarea class="form-control" name="descEvent" placeholder="Descripción breve del evento" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="dateEvent">Fecha</label>
                                                <input type="date" class="form-control" name="dateEvent">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="timeEvent">Hora</label>
                                                <input type="time" class="form-control" name="timeEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="cost1Event">Precio Normal</label>
                                                <input type="number" class="form-control" name="cost1Event">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cost2Event">Precio VIP</label>
                                                <input type="number" class="form-control" name="cost2Event">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="nArtist">Número de Artista</label>
                                                <select class="custom-select" name="nArtist">
                                                    <option value="0">Número</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                            <label for="imgEvent">Imagen del Evento (Exibición [237x237px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgEvent">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label for="inputCity">Imagen del Evento (Venta [450x450px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Evento</button>
                                    </form>
                                </div>
                                <?php
                                break;
                            case 'put':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                            case 'detele':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                        }
                        break;
                    case 'producto':
                        switch ($_GET['action']) {
                            case 'get':
                                echo '<h4>LISTA DE REGISTROS TOTALES</h4>'; ?>
                                
                                <div name="Read" class="container">
                                    <?php 
                                        $sql = '';
                                        $columnas = 0;
                                        switch ($entidad) {
                                            case 'evento':
                                                $sql = " SELECT idE, nameE, nameA, descE, dateE, timeE, cost1, cost2
                                                FROM `eventassignament`
                                                INNER JOIN evento
                                                ON eventassignament.EventidE = evento.idE
                                                INNER JOIN artist
                                                ON eventassignament.ArtistidA = artist.idA 
                                                ORDER BY dateE";
                                                $columnas = 8;
                                                break;
                                            case 'producto':
                                                $sql = "SELECT idP, nameP, descP, costP, ArtistidA
                                                FROM `product`
                                                ORDER BY idP";
                                                $columnas = 5;
                                                break; 
                                            case 'usuario':
                                                $sql = "SELECT * FROM `user`";
                                                $columnas = 8;
                                                break;           
                                            default:
                                                # code...
                                                break;
                                        }
                                    
                                        try {
                                            require_once ('../includes/functions/db_connection-regular.php');
                                            $res = $connection->query($sql);
                                            $resAux = $connection->query($sql);
                                        } catch (\Exception $e) {
                                            echo $e->getMessage();
                                        }
                                    ?>
                                    <pre>
                                    <?php
                                            $registrosHeader = $resAux->fetch_assoc();
                                            $registros = $res->fetch_all();
                                            $arrayPropiedades = array_keys($registrosHeader);
                                            // echo '<pre>'.var_dump($registros).'</pre>';
                                        ?>
                                    </pre>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <?php
                                                foreach ($arrayPropiedades as $propiedad) {
                                                    switch ($propiedad) {
                                                        case 'idE':
                                                            echo '<th scope="col">ID</th>';
                                                            break;                            
                                                        case 'cost1':
                                                            echo '<th scope="col">Normal</th>';
                                                            break;
                                                        case 'cost2':
                                                            echo '<th scope="col">VIP</th>';
                                                            break;
                                                        default:
                                                            echo '<th scope="col">'.$propiedad.'</th>';
                                                            break;
                                                    }
                                                }
                                            ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conciertos = array();           
        
                                                    foreach($registros as $registro) {
                                                            echo '<tr>';
                                                            for ($i=0; $i < $columnas; $i++) { 
                                                                echo '<td>'.$registro[$i].'</td>';
                                                            }
                                                            echo '<tr>';
                                                        
                                                    }
                                                    $connection->close();
                                                ?>                    
                                            
                                            <tr>
                                        </tbody>
                                        </table>
                                    </table>
                                </div>
                                
                                <?php
                                break;
                            case 'post':
                                echo '<h4>REALIZA NUEVO REGISTROS</h4>'; ?>
        
                                <div name="Create" class="container">
                                    <form action="actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="nameEvent">Name</label>
                                                <input type="text" class="form-control" name="nameEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="descEvent">Descripción del Evento</label>
                                                <textarea class="form-control" name="descEvent" placeholder="Descripción breve del evento" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="dateEvent">Fecha</label>
                                                <input type="date" class="form-control" name="dateEvent">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="timeEvent">Hora</label>
                                                <input type="time" class="form-control" name="timeEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="cost1Event">Precio Normal</label>
                                                <input type="number" class="form-control" name="cost1Event">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cost2Event">Precio VIP</label>
                                                <input type="number" class="form-control" name="cost2Event">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="nArtist">Número de Artista</label>
                                                <select class="custom-select" name="nArtist">
                                                    <option value="0">Número</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                            <label for="imgEvent">Imagen del Evento (Exibición [237x237px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgEvent">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label for="inputCity">Imagen del Evento (Venta [450x450px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Evento</button>
                                    </form>
                                </div>
                                <?php
                                break;
                            case 'put':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                            case 'detele':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                        }
                        break; 
                    case 'usuario':
                        switch ($_GET['action']) {
                            case 'get':
                                echo '<h4>LISTA DE REGISTROS TOTALES</h4>'; ?>
                                
                                <div name="Read" class="container">
                                    <?php 
                                        $sql = '';
                                        $columnas = 0;
                                        switch ($entidad) {
                                            case 'evento':
                                                $sql = " SELECT idE, nameE, nameA, descE, dateE, timeE, cost1, cost2
                                                FROM `eventassignament`
                                                INNER JOIN evento
                                                ON eventassignament.EventidE = evento.idE
                                                INNER JOIN artist
                                                ON eventassignament.ArtistidA = artist.idA 
                                                ORDER BY dateE";
                                                $columnas = 8;
                                                break;
                                            case 'producto':
                                                $sql = "SELECT idP, nameP, descP, costP, ArtistidA
                                                FROM `product`
                                                ORDER BY idP";
                                                $columnas = 5;
                                                break; 
                                            case 'usuario':
                                                $sql = "SELECT * FROM `user`";
                                                $columnas = 8;
                                                break;           
                                            default:
                                                # code...
                                                break;
                                        }
                                    
                                        try {
                                            require_once ('../includes/functions/db_connection-regular.php');
                                            $res = $connection->query($sql);
                                            $resAux = $connection->query($sql);
                                        } catch (\Exception $e) {
                                            echo $e->getMessage();
                                        }
                                    ?>
                                    <pre>
                                    <?php
                                            $registrosHeader = $resAux->fetch_assoc();
                                            $registros = $res->fetch_all();
                                            $arrayPropiedades = array_keys($registrosHeader);
                                            // echo '<pre>'.var_dump($registros).'</pre>';
                                        ?>
                                    </pre>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <?php
                                                foreach ($arrayPropiedades as $propiedad) {
                                                    switch ($propiedad) {
                                                        case 'idE':
                                                            echo '<th scope="col">ID</th>';
                                                            break;                            
                                                        case 'cost1':
                                                            echo '<th scope="col">Normal</th>';
                                                            break;
                                                        case 'cost2':
                                                            echo '<th scope="col">VIP</th>';
                                                            break;
                                                        default:
                                                            echo '<th scope="col">'.$propiedad.'</th>';
                                                            break;
                                                    }
                                                }
                                            ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conciertos = array();           
        
                                                    foreach($registros as $registro) {
                                                            echo '<tr>';
                                                            for ($i=0; $i < $columnas; $i++) { 
                                                                echo '<td>'.$registro[$i].'</td>';
                                                            }
                                                            echo '<tr>';
                                                        
                                                    }
                                                    $connection->close();
                                                ?>                    
                                            
                                            <tr>
                                        </tbody>
                                        </table>
                                    </table>
                                </div>
                                
                                <?php
                                break;
                            case 'post':
                                echo '<h4>REALIZA NUEVO REGISTROS</h4>'; ?>
        
                                <div name="Create" class="container">
                                    <form action="actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="nameEvent">Name</label>
                                                <input type="text" class="form-control" name="nameEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="descEvent">Descripción del Evento</label>
                                                <textarea class="form-control" name="descEvent" placeholder="Descripción breve del evento" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="dateEvent">Fecha</label>
                                                <input type="date" class="form-control" name="dateEvent">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="timeEvent">Hora</label>
                                                <input type="time" class="form-control" name="timeEvent">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="cost1Event">Precio Normal</label>
                                                <input type="number" class="form-control" name="cost1Event">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cost2Event">Precio VIP</label>
                                                <input type="number" class="form-control" name="cost2Event">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="nArtist">Número de Artista</label>
                                                <select class="custom-select" name="nArtist">
                                                    <option value="0">Número</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                            <label for="imgEvent">Imagen del Evento (Exibición [237x237px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="imgEvent">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label for="inputCity">Imagen del Evento (Venta [450x450px])</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Elije un archivo (.jpg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Evento</button>
                                    </form>
                                </div>
                                
                                <?php
                                break;
                            case 'put':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                            case 'detele':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <?php
                                break;
                        }
                        break;           
                    default:
                        # code...
                        break;
                }
            ?>
        </h5>
    </div>
    
    
    

</body>
</html>