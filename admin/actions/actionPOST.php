<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
            include_once '../templates/headAdmin.php';
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
        $usuarioNuevo = "";
        echo $entity;
        switch ($entity) {
            case 'Evento':
                // echo var_dump($resultado);
                $nameEvent = $resultado['nameEvent'];    
                $$title = $resultado['nameEvent'];    
                $descEvent = $resultado['descEvent'];
                $dateEvent = $resultado['dateEvent'];
                $timeEvent = $resultado['timeEvent'];
                $cost1Event = $resultado['cost1Event'];
                $cost2Event = $resultado['cost2Event'];
                $imgEvent = $resultado['imgEvent'];
                $artist = $resultado['nArtist'];
                $sql = "INSERT INTO Evento(nameE, descE, dateE,timeE, imgE, cost1, cost2)
                VALUES('$nameEvent','$descEvent.','$dateEvent','$timeEvent','$imgEvent',$cost1Event,$cost2Event);";
                
                $sqlTrigger = "INSERT INTO `eventassignament` (`ArtistidA`, `EventidE`, `folio`)
                VALUES($artist,(SELECT idE FROM `evento` WHERE nameE = '$nameEvent'),127)";
                break;
            case 'Producto':
                // echo var_dump($resultado);
                $nameProduct = $resultado['nameProduct'];    
                $title = $resultado['nameProduct'];    
                $descProduct = $resultado['descProduct'];
                $costProduct = $resultado['costProduct'];
                $imgProduct = $resultado['imgProduct'];
                $artist = $resultado['Artist'];
                $sql = "INSERT INTO product(nameP, costP, ArtistidA, imgP, descP)
                VALUES('$nameProduct',$costProduct,$artist,'$imgProduct','$descProduct');";
                break;
            case 'Usuario':
                // echo var_dump($resultado);
                $fNameUser = $resultado['firstnameUser'];    
                $title = $resultado['firstnameUser'].' '.$resultado['lastnameUser'];    
                $lnameUser = $resultado['lastnameUser'];
                $nameUser = $resultado['nameUser'];
                $emailUser = $resultado['emailUser'];
                $passUser = $resultado['passUser'];
                $phoneUser = $resultado['phoneUser'];
                $roleUser = $resultado['rolUser'];
                $sql = "INSERT INTO user(nameU, passU, firstnameU, lastnameU, emailU, phoneU, RoleidR)
                VALUES('$nameUser','$passUser','$fNameUser','$lnameUser','$emailUser','$phoneUser',$roleUser);";
                break;
            case 'Cliente':
                // echo var_dump($resultado);
                $fNameUser = $resultado['firstnameUser'];    
                $usuarioNuevo = $resultado['firstnameUser'].' '.$resultado['lastnameUser'];    
                $lnameUser = $resultado['lastnameUser'];
                $nameUser = $resultado['nameUser'];
                $emailUser = $resultado['emailUser'];
                $passUser = $resultado['passUser'];
                $phoneUser = $resultado['phoneUser'];
                $roleUser = $resultado['rolUser'];
                $sql = "INSERT INTO user(nameU, passU, firstnameU, lastnameU, emailU, phoneU, RoleidR)
                VALUES('$nameUser','$passUser','$fNameUser','$lnameUser','$emailUser','$phoneUser',$roleUser);";
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

        if ($_POST['entity'] == 'Cliente') {
            if ($res) {
                echo '<script>
            window.location="../../login/resultado.php?exito=true&usuario='.$usuarioNuevo.'";
            </script>';
            } else {
                echo '<script>
            window.location="../../login/resultado.php?exito=false";
            </script>';
            }
        } else {
            // echo $sql;
            // echo var_dump($registros);
            if ($res) {
                // var_dump($res);
                echo '<div class="container">';
                echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">¡El registro '.$title.', fue registrado con exito !</h4>
                <p>Puede ir a <a href="../results.php?entity='.strtolower($entity).'&action=get"> >Consultas >> '.strtoupper($entity).'</a>, para ver a detalle la información del registro</p>
                <hr>
                <p class="mb-0">Si desea registrar un '.$entity.' más, <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=post">Presione Aquí</a></p>
                </div>';
                echo '</div>';
            } else {
                echo '<div class="container">';
                echo '<div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">¡El registro '.$title.', NO PUDO ser registrado con exito :c !</h4>
                <p>El error que se identifico fue <span class="badge badge-danger">'.$connection->error.'</span></p>
                <hr>
                <p class="mb-0">Si desea intentar de nuevo <a role="button" class="btn btn-info" href="../results.php?entity='.strtolower($entity).'&action=post">Presione Aquí</a></p>
                </div>';
                echo '</div>';
            }
        }
        
    ?>

</body>
</html>