<?php

include_once 'db_connection.php';

class User extends DB{

    private $nombre;
    private $usuario;
    private $id;
    private $role;
    private $phone;

    public function userExists($user, $pass){
        $md5pass = md5($pass);

        $query = $this->connect()->prepare('SELECT * FROM user WHERE `nameU` = :user AND `passU` = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM user WHERE nameU = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['firstnameU'].' '.$currentUser['lastnameU'];
            $this->usuario = $currentUser['nameU'];
            $this->id = $currentUser['idU'];
            $this->role = $currentUser['RoleidR'];
            $this->phone = $currentUser['phoneU'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getId(){
        return $this->id;
    }

    public function getRole(){
        return $this->role;
    }

    public function getPhone(){
        return $this->phone;
    }
}

?>
