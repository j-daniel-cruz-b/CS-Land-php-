<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
        include_once '../../includes/templates/header.php';
    ?>
</head>
<body>
    <header>
        <?php
            include_once '../templates/headerActions.php';
        ?>
    </header>

    <?php
        $resultado = $_POST;
        $entity = $resultado['entity'];
        $title = "";
        $sql = "";
        $sqlTrigger = "";
        echo $entity;
        switch ($entity) {
            case 'Evento':
                // echo var_dump($resultado);
                $idEvento = $resultado['idEvent'];    
                $nameEvent = $resultado['nameEvent'];    
                $title = $resultado['nameEvent'];    
                $descEvent = $resultado['descEvent'];
                $dateEvent = $resultado['dateEvent'];
                $timeEvent = $resultado['timeEvent'];
                $cost1Event = $resultado['cost1Event'];
                $cost2Event = $resultado['cost2Event'];
                $imgEvent = $resultado['imgEvent'];
                $artist = $resultado['nArtist'];
                $oldArtist = $resultado['oldArtist'];
                $sql = "UPDATE `evento` SET `nameE` = '$nameEvent', `descE` = '$descEvent', `dateE` = '$dateEvent', `timeE` = '$timeEvent',
                `imgE` = '$imgEvent', `cost1` = $cost1Event, `cost1` = $cost2Event
                WHERE `evento`.`idE` = $idEvento;";
                
                $sqlTrigger = "UPDATE `eventassignament` SET `ArtistidA` = $artist WHERE `eventassignament`.`ArtistidA` = $oldArtist 
                AND `eventassignament`.`EventidE` = $idEvento AND `eventassignament`.`folio` = 127;";
                break;
            case 'Producto':
                // echo var_dump($resultado);
                $idProduct = $resultado['idProduct']; 
                $nameProduct = $resultado['nameProduct'];    
                $title = $resultado['nameProduct'];    
                $descProduct = $resultado['descProduct'];
                $costProduct = $resultado['costProduct'];
                $imgProduct = $resultado['imgProduct'];
                $artist = $resultado['Artist'];
                $oldArtist = $resultado['oldArtist'];
                $sql = "UPDATE `product` SET `nameP` = '$nameProduct', `costP` = $costProduct, `ArtistidA` = $artist, 
                `imgP` = '$imgProduct', `descP` = '$descProduct' 
                WHERE `product`.`idP` = $idProduct;";
                break;
            case 'Usuario':
                // echo var_dump($resultado);
                $idUser = $resultado['idUser'];    
                $fNameUser = $resultado['firstnameUser'];    
                $lnameUser = $resultado['lastnameUser'];
                $nameUser = $resultado['nameUser'];
                $emailUser = $resultado['emailUser'];
                $passUser = $resultado['passUser'];
                $phoneUser = $resultado['phoneUser'];
                $roleUser = $resultado['rolUser'];
                $title = $nameUser.' ['.$fnameUser.' '.$lnameUser.'] ';    
                $sql = "UPDATE `user` SET `nameU` = '$nameUser', `passU` = '$passUser', `firstnameU` = '$fNameUser', 
                `lastnameU` = '$lnameUser', `emailU` = '$emailUser', `phoneU` = '$phoneUser', `RoleidR` = $roleUser 
                WHERE `user`.`idU` = $idUser;";
                break;
            default:
                # code...
                break;
        }
        
        try {
            require_once ('../../includes/functions/db_connection-regular.php');
            $res = $connection->query($sql);
            if ($sqlTrigger != null) {
                $res = $connection->query($sqlTrigger);
            }
        } catch (\Exception $e) {
            echo $connection->error;
        }
        if ($res) {
            echo '<div class="container">';
            echo '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">¡El registro '.$title.', fue actualizado con exito !</h4>
            <p>Puede ir a <a href="../results.php?entity='.strtolower($entity).'&action=get"> >Consultas >> '.strtoupper($entity).'</a>, para ver a detalle la información del registro</p>
            <hr>
            <p class="mb-0">Si desea actualizar un '.$entity.' más, <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=put">Presione Aquí</a></p>
            </div>';
            echo '</div>';
        } else {
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡El registro '.$title.', NO PUDO ser actualizado con exito :c !</h4>
            <p>El error que se identifico fue <span class="badge badge-danger">'.$connection->error.'</span></p>
            <hr>
            <p class="mb-0">Si desea intentar de nuevo <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=put">Presione Aquí</a></p>
            </div>';
            echo '</div>';
        }
        
    ?>

</body>
</html>