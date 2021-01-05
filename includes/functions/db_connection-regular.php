<?php 

    $host     = 'localhost';
    $db       = 'cslanddata';
    $user     = 'superAdmin';
    $password = "dLm40IX8fwIyiOCA";

    $connection = new mysqli($host,$user,$password,$db);
    
    if($connection->connect_error){
        echo'Error connection: ' .$error -> $connection->connect_error;    
    }

?>