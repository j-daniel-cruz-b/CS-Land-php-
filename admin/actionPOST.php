<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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

    <?php
        $resultado = $_POST;
        $nameEvent = $resultado['nameEvent'];    
        $descEvent = $resultado['descEvent'];
        $dateEvent = $resultado['dateEvent'];
        $timeEvent = $resultado['timeEvent'];
        $cost1Event = $resultado['cost1Event'];
        $cost2Event = $resultado['cost2Event'];
        // $imgEvent = $resultado['imgEvent'];
        echo var_dump($resultado);
        // echo '<script type="text/javascript">';
        //     // echo 'alert(\'' . addslashes($nameEvent) . '\');';
        //     echo 'alert(\'' . rawurlencode($nameEvent) . '\');';
        //     echo '</script>';
            // include_once ('../admin/results.php?entity=evento&action=get');
    ?>

</body>
</html>