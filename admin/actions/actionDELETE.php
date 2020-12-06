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
                $artist = $resultado['nArtist'];
                $sql = "DELETE FROM `eventassignament` WHERE `eventassignament`.`ArtistidA` = '$artist' AND `eventassignament`.`EventidE` = $idEvento
                 AND `eventassignament`.`folio` = 127";
                
                $sqlTrigger = "DELETE FROM `evento` WHERE `evento`.`idE` = $idEvento;";
                break;
            case 'Producto':
                // echo var_dump($resultado);
                $idProduct = $resultado['idProduct'];  
                $title = $resultado['nameProduct'];
                $artist = $resultado['Artist'];
                $sql = "DELETE FROM `product` WHERE `product`.`idP` = $idProduct;";
                break;
            case 'Usuario':
                // echo var_dump($resultado);
                $nameUser = $resultado['nameUser'];
                $fNameUser = $resultado['firstnameUser'];    
                $lnameUser = $resultado['lastnameUser'];
                $idUser = $resultado['idUser'];
                $phoneUser = $resultado['phoneUser'];
                $roleUser = $resultado['rolUser'];
                $title = $nameUser.' - '.$fNameUser.' '.$lnameUser;    
                $sql = "DELETE FROM `user` WHERE `user`.`idU` = $idUser";;
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
            <h4 class="alert-heading">¡El registro '.$title.', fue ELIMINADO con exito !</h4>
            <p>Puede ir a <a href="../results.php?entity='.strtolower($entity).'&action=get"> >Consultas >> '.strtoupper($entity).'</a>, para ver a detalle la información del registro</p>
            <hr>
            <p class="mb-0">Si desea actualizar un '.$entity.' más, <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=delete">Presione Aquí</a></p>
            </div>';
            echo '</div>';
        } else {
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡El registro '.$title.', NO PUDO ser ELIMINADO con exito :c !</h4>
            <p>El error que se identifico fue <span class="badge badge-danger">'.$connection->error.'</span></p>
            <hr>
            <p class="mb-0">Si desea intentar de nuevo <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=delete">Presione Aquí</a></p>
            </div>';
            echo '</div>';
        }
        
    ?>

</body>
</html>