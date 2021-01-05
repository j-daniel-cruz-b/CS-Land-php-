<?php 

    $host     = 'localhost';
    $db       = 'u760520066_csland';
    $user     = 'u760520066_csAdmin';
    $password = "apfelsekte";

    $connection = new mysqli($host,$user,$password,$db);
    
    if($connection->connect_error){
        echo'Error connection: ' .$error -> $connection->connect_error;    
    }

?>