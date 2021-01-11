<?php 

    $host     = 'localhost';
    $db       = 'cslanddata';
    $user     = 'superAdmin';
    $password = "0SYsZROHfctQMDmy";

    $connection = new mysqli($host,$user,$password,$db);
    
    if($connection->connect_error){
        echo'Error connection: ' .$error -> $connection->connect_error;    
    }

?>