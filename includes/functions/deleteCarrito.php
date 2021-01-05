<?php
    $sqlDelete = "DELETE FROM `carrito`;";
    try {
        require_once ('../functions/db_connection-regular.php');
        $resDelete = $connection->query($sqlDelete);

        echo '<script>
    window.location="../../index.php";
    </script>';
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
?>