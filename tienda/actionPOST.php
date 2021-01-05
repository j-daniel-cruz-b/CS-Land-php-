<?php
session_start();
$resultado = $_POST;
// $entity = $resultado['entity'];
$title = "";
$sql = "";
$subTotal = 0;
echo var_dump($resultado);
$name = $resultado['nameProduct'];    
$idProduct = $resultado['idProduct'];    
$cost = $resultado['costProduct'];    
$units = $resultado['unidades'];
$idUser = $_SESSION['usuarioID'];
$total = $cost * $units;
$sql = "INSERT INTO `carrito` (`productoID`, `usuarioId`, `costoProduct`, `cantC`, `costoTotal`) 
VALUES ($idProduct, $idUser, $cost, $units, $total)";
try {
    require_once ('../includes/functions/db_connection-regular.php');
    $res = $connection->query($sql);
} catch (\Exception $e) {
    echo $connection->error;
}
echo $sql;
echo $connection->error;
if ($res) {
    echo 'ya quedó';
} else {
    echo 'no quedó';
}
echo '<script>
    window.location="../tienda.php";
    </script>'; ?>