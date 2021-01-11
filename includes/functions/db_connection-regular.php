<?php 

    $host     = 'localhost';
    $db       = 'id15525618_cslanddata';
    $user     = 'id15525618_superadmin';
    $password = "e|X+=B7F8mBVlnf&";

    $connection = new mysqli($host,$user,$password,$db);
    
    if($connection->connect_error){
        echo'Error connection: ' .$error -> $connection->connect_error;    
    }

?>