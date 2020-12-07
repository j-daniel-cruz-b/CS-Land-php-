<?php 
    if (isset($_SESSION['user'])) {
        if($_SESSION['role'] == 5){
        echo '<script>
        window.location="../index.php";
        </script>';
        } else {
            echo '<script>
        window.location="admin.php";
        </script>';
        }
    } else {
        echo '<script>
        window.location="../index.php";
        </script>';
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
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

</body>
</html>