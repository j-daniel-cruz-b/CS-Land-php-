<?php 

    $host     = 'localhost';
    $db       = 'cslandData';
    $user     = 'superAdmin';
    $password = "sgNdlKnrFaWBS4mw";

    $connection = new mysqli($host,$user,$password,$db);
    
    if($connection->connect_error){
        echo'Error connection: ' .$error -> $connection->connect_error;    
    }

?>