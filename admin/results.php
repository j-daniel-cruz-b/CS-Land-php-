<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Resultados</title>
    <?php
            include_once 'templates/headAdmin.php';
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
                $ids;
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
                                        $columnas = 0;
                                        $sql = " SELECT idE, nameE, nameA, descE, dateE, timeE, cost1, cost2
                                        FROM `eventassignament`
                                        INNER JOIN evento
                                        ON eventassignament.EventidE = evento.idE
                                        INNER JOIN artist
                                        ON eventassignament.ArtistidA = artist.idA 
                                        ORDER BY dateE";
                                        $columnas = 8;
                                    
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
                                echo '<h4>REALIZA NUEVOS REGISTROS</h4>'; ?>

                                <div name="Create" class="container">
                                    <form action="actions/actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <!-- <label for="nameEvent">Nombre del Producto</label> -->
                                                <input type="text" class="form-control" value="Evento" name="entity" readonly>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="nameEvent">Name</label>
                                                <input type="text" class="form-control" name="nameEvent" required>
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
                                                <input type="date" class="form-control" name="dateEvent" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="timeEvent">Hora</label>
                                                <input type="time" class="form-control" name="timeEvent" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="cost1Event">Precio Normal</label>
                                                <input step="any" type="number" class="form-control" name="cost1Event" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cost2Event">Precio VIP</label>
                                                <input step="any" type="number" class="form-control" name="cost2Event" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="nArtist">Artista </label>
                                                <select class="custom-select" name="nArtist" required>
                                                    <option value="0" disabled selected>Número</option>
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = "SELECT * FROM `artist` ORDER BY `artist`.`idA` ASC";
                                                            $resids = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $ids = $resids->fetch_all();
                                                        
                                                        foreach($ids as $id) {
                                                            echo '<option value="'.$id[0].'">'.$id[0].' - '.$id[1].'</option>';
                                                        
                                                        }
                                                    $connection->close();
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" type="file" class="formFile">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Evento</button>
                                    </form>
                                </div>
                                
                                <?php
                                break;
                            case 'put':
                                echo '<h4>ACTUALIZA LOS REGISTROS</h4>'; ?>

                                <div name="Update" class="container">
                                    <form method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Evento" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Evento para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = " SELECT idE, nameE, nameA
                                                            FROM `eventassignament`
                                                            INNER JOIN evento
                                                            ON eventassignament.EventidE = evento.idE
                                                            INNER JOIN artist
                                                            ON eventassignament.ArtistidA = artist.idA
                                                            ORDER BY idE";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionPUT.php?entity=evento&evento='.$event[0].'">'.$event[0].' - '.$event[1].'</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                                
                                
                                <?php
                                break;
                            case 'delete':
                                echo 'ELIMNA UN NUEVO REGISTRO'; ?>

                                <div name="Delete" class="container">
                                    <form method="detele">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Evento" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Evento para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = " SELECT idE, nameE, nameA
                                                            FROM `eventassignament`
                                                            INNER JOIN evento
                                                            ON eventassignament.EventidE = evento.idE
                                                            INNER JOIN artist
                                                            ON eventassignament.ArtistidA = artist.idA
                                                            ORDER BY idE";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionDelete.php?entity=evento&evento='.$event[0].'">'.$event[0].' - '.$event[1].'</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                                
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
                                        $sql = "SELECT idP, nameP, descP, costP, ArtistidA, stok
                                        FROM `product`
                                        ORDER BY idP";
                                        $columnas = 6;
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
                                echo '<h4>REALIZA NUEVOS REGISTROS</h4>'; ?>
        
                                <div name="Create" class="container">
                                    <form action="actions/actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <!-- <label for="nameEvent">Nombre del Producto</label> -->
                                                <input type="text" class="form-control" value="Producto" name="entity" readonly>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="nameProduct">Nombre del Producto</label>
                                                <input type="text" class="form-control" name="nameProduct">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="descProduct">Descripción del Producto</label>
                                                <textarea class="form-control" name="descProduct" placeholder="Descripción breve del producto" required></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="costProduct">Precio</label>
                                                <input type="number" class="form-control" name="costProduct">
                                            </div>
                                            
                                            <div class="form-group col-md-5">
                                                <label for="Artist">Artista</label>
                                                <select class="custom-select" name="Artist">
                                                    <option value="0">Seleccione el Artista</option>
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = "SELECT * FROM `artist` ORDER BY `artist`.`idA` ASC";
                                                            $res = $connection->query($sql);
                                                            } catch (\Exception $e) {
                                                                echo $connection->error;
                                                            }
                                                            $ids = $res->fetch_all();
                                                            foreach($ids as $id) {
                                                                echo '<option value="'.$id[0].'">'.$id[0].' - '.$id[1].'</option>';
                                                            
                                                            }
                                                    $connection->close();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="stokProducto">Stock</label>
                                                <input type="number" class="form-control" name="stokProducto">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar Producto</button>
                                    </form>
                                </div>
                                <?php
                                break;
                            case 'put':
                                echo '<h4>ACTUALIZA LOS REGISTROS</h4>'; ?>
                                <div name="Update" class="container">
                                    <form method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Producto" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Product para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = " SELECT * FROM `product` ORDER BY `idP` ASC";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionPUT.php?entity=producto&producto='.$event[0].'">'.$event[0].' - '.$event[1].'</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>                                            
                                    </form>
                                </div>                                
                                <?php
                                break;
                            case 'delete':
                                echo 'REALIZA UN NUEVO REGISTRO'; ?>
                                <div name="Update" class="container">
                                    <form method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Producto" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Product para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = " SELECT * FROM `product` ORDER BY `idP` ASC";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionDELETE.php?entity=producto&producto='.$event[0].'">'.$event[0].' - '.$event[1].'</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>

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
                                        $sql = "SELECT * FROM `user`";
                                        $columnas = 8;
                                    
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
                                echo '<h4>REALIZA NUEVOS REGISTROS</h4>'; ?>
        
                                <div name="Create" class="container">
                                    <form action="actions/actionPOST.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <!-- <label for="nameEvent">Nombre del Producto</label> -->
                                                <input type="text" class="form-control" value="Usuario" name="entity" readonly>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="firstnameUser">Nombre</label>
                                                <input type="text" class="form-control" name="firstnameUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="lastnameUser">Apellidos</label>
                                                <input type="text" class="form-control" name="lastnameUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="nameUser">Username</label>
                                                <input type="text" class="form-control" name="nameUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="emailUser">Email</label>
                                                <input type="email" class="form-control" name="emailUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="passUser">Contraseña</label>
                                                <input type="password" class="form-control" name="passUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="CpassUser">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" name="CpassUser">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="phoneUser">Telefóno</label>
                                                <input type="tel" class="form-control" name="phoneUser">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="rolUser">Rol</label>
                                                <select class="custom-select" name="rolUser">
                                                    <option value="0" disabled selected>Rol de usuario</option>
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = "SELECT * FROM `role` ORDER BY `role`.`idR` ASC";
                                                            $resRole = $connection->query($sql);
                                                            } catch (\Exception $e) {
                                                                echo $connection->error;
                                                            }
                                                            $roles = $resRole->fetch_all();
                                                            foreach($roles as $id) {
                                                                echo '<option value="'.$id[0].'">'.$id[0].' - '.$id[1].'</option>';
                                                            
                                                            }
                                                    $connection->close();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                                    </form>
                                </div>

                                <?php
                                break;
                            case 'put':
                                echo '<h4>ACTUALIZA UN REGISTRO</h4>'; ?>
                                <div name="Update" class="container">
                                    <form method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Usuario" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Usuario para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = "SELECT * FROM `user` ORDER BY `user`.`idU` ASC";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionPUT.php?entity=usuario&usuario='.$event[0].'">'.$event[0].' - '.$event[1].' ['.$event[3].' '.$event[4].']</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                                
                                <?php
                                break;
                            case 'delete':
                                echo 'ELIMNA UN REGISTRO'; ?>
                                <div name="Update" class="container">
                                    <form method="get">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control" value="Usuario" name="entity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nArtist">Selecciona un Usuario para editar </label>
                                                <div  class="list-group" name="nArtist">
                                                    <?php 
                                                        try {
                                                            require_once ('../includes/functions/db_connection-regular.php');
                                                            $sql = $sql = "SELECT * FROM `user` ORDER BY `user`.`idU` ASC";
                                                            $resevs = $connection->query($sql);
                                                        } catch (\Exception $e) {
                                                            echo $connection->error;
                                                        }
                                                        $evs = $resevs->fetch_all();
                                                        foreach ($evs as $event) {
                                                            echo '<a class="list-group-item list-group-item-action" href="actions/preActionDELETE.php?entity=usuario&usuario='.$event[0].'">'.$event[0].' - '.$event[1].' ['.$event[3].' '.$event[4].']</a>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
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