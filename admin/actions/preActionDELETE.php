<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
            include_once '../templates/headPreAdmin.php';
        ?>
</head>
<body>
    <header>
        <?php
            include_once '../templates/headerActions.php';
        ?>
    </header>
    <div class="container">
    <?php
        $resultado = $_GET;
        $entity = $resultado['entity'];
        $sql = "";
        switch ($entity) {
            case 'evento':
                $sql = " SELECT idE, idA,nameE, nameA, descE, dateE, timeE, cost1, cost2, imgE
                FROM `eventassignament`
                INNER JOIN evento
                ON eventassignament.EventidE = evento.idE
                INNER JOIN artist
                ON eventassignament.ArtistidA = artist.idA
                WHERE idE = ".$resultado['evento'].
                " ORDER BY dateE";
                break;
            case 'producto':
                $sql = " SELECT idP, nameP,ArtistidA, descP, nameA, costP, imgP, stok FROM `product`
                INNER JOIN artist
                ON artist.idA = product.ArtistidA
                WHERE idP = ".$resultado['producto'].
                " ORDER BY idP";
                break;
            case 'usuario':
                $sql = " SELECT `idU`,`nameU`,`firstnameU`,`passU`,`lastnameU`,`emailU`,`phoneU`,`RoleidR`, nameR
                FROM `user` 
                INNER JOIN role 
                ON user.RoleidR = role.idR 
                WHERE idU = ".$resultado['usuario']."
                ORDER BY idU";
                break;
            default:
                # code...
                break;
        }
        try {
            require_once ('../../includes/functions/db_connection-regular.php');
            $res = $connection->query($sql);
        } catch (\Exception $e) {
            echo $connection->error;
        }
        $seleccion = $res->fetch_assoc();
        switch ($entity) {
            case 'evento': ?>                
                <form class="mt-4" name="Update" action="actionDELETE.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input name="entity" value="Evento" readonly >
                        </div>
                        <div class="form-group col-md-2">
                            <?php echo '<input type="text" class="form-control" value="'.$seleccion['idE'].'" name="idEvent" readonly>';?>
                            <?php echo '<input type="text" class="form-control" value="'.$seleccion['idA'].'" name="oldArtist" readonly>';?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="nameEvent">Name</label>
                            <?php echo '<input type="text" class="form-control" name="nameEvent" value="'.$seleccion['nameE'].'" readonly required>';?>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="descEvent">Descripción del Evento</label>
                            <?php echo '<textarea type="text" class="form-control" name="descEvent" placeholder="Descripción breve del evento" readonly required>'.$seleccion['descE'].'</textarea>';?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="dateEvent">Fecha</label>
                            <?php echo '<input type="date" class="form-control" name="dateEvent" value="'.$seleccion['dateE'].'" readonly required>';?>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="timeEvent">Hora</label>
                            <?php echo '<input type="time" class="form-control" name="timeEvent" value="'.$seleccion['timeE'].'" readonly required>';?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cost1Event">Precio Normal</label>
                            <?php echo '<input type="number" class="form-control" name="cost1Event" value="'.$seleccion['cost1'].'" readonly required>';?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cost2Event">Precio VIP</label>
                            <?php echo '<input type="number" class="form-control" name="cost2Event" value="'.$seleccion['cost2'].'" readonly readonly required>';?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nArtist">Artista </label>
                            <select class="custom-select" name="nArtist" readonly required readonly>
                                <?php echo '<option value="'.$seleccion['idA'].'" selected>'.$seleccion['idA'].' - '.$seleccion['nameA'].'</option>';?>                                
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                        <div class="form-group">
                            <label for="imgEvent">Imagen del Evento (Exibición [237x237px])</label>
                            <?php echo '<br>Imagen elegida: '.$seleccion['imgE'];?>
                            <!-- <input type="file" class="form-control-file" name="imgEvent" readonly> -->
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
                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Si borra el evento, se borrará permamentente">Eliminar Evento</button>
                </form>
                
                <?php
                break;
            case 'producto': ?>
                <div name="Create" class="container mt-4">
                    <form action="actionDELETE.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" value="Producto" name="entity" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="nameProduct">ID del Producto</label>
                                <label for="nameProduct">ID del Artista</label>
                            </div> 
                            <div class="form-group col-md-2">
                                <?php echo '<input type="text" class="form-control" value="'.$seleccion['idP'].'" name="idProduct" readonly>';?>
                                <?php echo '<input type="text" class="form-control" value="'.$seleccion['ArtistidA'].'" name="oldArtist" readonly>';?>
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="nameProduct">Name</label>
                                <?php echo '<input type="text" class="form-control" name="nameProduct" value="'.$seleccion['nameP'].'" readonly readonly required>';?>
                                
                            </div>
                            <div class="form-group col-md-10">
                                <label for="descProduct">Descripción del Producto</label>
                                <?php echo '<textarea type="text" class="form-control" name="descProduct" placeholder="Descripción breve del producto" readonly required>'.$seleccion['descP'].'</textarea>';?>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="costProduct">Precio</label>
                                <?php echo '<input type="number" class="form-control" name="costProduct" value="'.$seleccion['costP'].'" readonly required>';?>
                            </div>
                            
                            <div class="form-group col-md-5">
                                <label for="Artist">Artista</label>
                                <select class="custom-select" name="Artist">
                                <?php echo '<option value="'.$seleccion['ArtistidA'].'" selected>'.$seleccion['ArtistidA'].' - '.$seleccion['nameA'].'</option>';?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="stokProducto">Stok Disponible</label>
                                    <?php echo '<input type="number" class="form-control" name="stokProducto" value="'.$seleccion['stok'].'" readonly>';?>
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Si borra el producto, se borrará permamentente">Eliminar Producto</button>
                    </form>
                </div>                
                <?php
                break;
            case 'usuario': ?> 
                <div name="Create" class="container mt-4">
                    <form action="actionDELETE.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" value="Usuario" name="entity" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="idUser">ID del Usuario</label>
                            </div> 
                            <div class="form-group col-md-2">
                                <?php echo '<input type="text" class="form-control" value="'.$seleccion['idU'].'" name="idUser" readonly>';?>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="firstnameUser">Nombre</label>
                                <?php echo '<input type="text" class="form-control" name="firstnameUser" value="'.$seleccion['firstnameU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="lastnameUser">Apellidos</label>
                                <?php echo '<input type="text" class="form-control" name="lastnameUser" value="'.$seleccion['lastnameU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="nameUser">Username</label>
                                <?php echo '<input type="text" class="form-control" name="nameUser" value="'.$seleccion['nameU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="emailUser">Email</label>
                                <?php echo '<input type="email" class="form-control" name="emailUser" value="'.$seleccion['emailU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="passUser">Contraseña</label>
                                <?php echo '<input type="password" class="form-control" name="passUser" value="'.$seleccion['passU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="CpassUser">Confirmar Contraseña</label>
                                <?php echo '<input type="password" class="form-control" name="CpassUser" value="'.$seleccion['passU'].'" readonly required>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="phoneUser">Telefóno</label>
                                <?php echo '<input type="tel" class="form-control" name="phoneUser" value="'.$seleccion['phoneU'].'" readonly required>';?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rolUser">Rol</label>
                                <select class="custom-select" name="rolUser" readonly>
                                <?php echo '<option value="'.$seleccion['RoleidR'].'" selected>'.$seleccion['RoleidR'].' - '.$seleccion['nameR'].'</option>';?>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Si borra el producto, se borrará permamentente">Eliminar Producto</button>
                    </form>
                </div>

                <?php
                break;
        
            default:
                # code...
                break;
        }    
    ?>
    </div>
</body>
</html>