<?php
    $servidor = "localhost";
    $nombreusuario = "superAdmin";
    $password = "sgNdlKnrFaWBS4mw";
    $db = "cslandData";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // $sql = "CREATE DATABASE cslandData";
    // if($conexion->query($sql) === true){
    //     echo "Base de datos creada correctamente...";
    // }else{
    //     die("Error al crear base de datos: " . $conexion->error);
    // }

    // $sql = "CREATE TABLE Product (
    //     idP tinyint(11) NOT NULL AUTO_INCREMENT, 
    //     nameP varchar(255) NOT NULL, 
    //     costP decimal(19, 0) NOT NULL, 
    //     ArtistidA tinyint(11) NOT NULL, 
    //     PRIMARY KEY (idP)
    // );
    // CREATE TABLE User (
    //     idU tinyint(11) NOT NULL AUTO_INCREMENT, 
    //     nameU varchar(25) NOT NULL, 
    //     passU varchar(15) NOT NULL, 
    //     firstnameU varchar(100) NOT NULL, 
    //     lastnameU varchar(100) NOT NULL, 
    //     emailU varchar(255) NOT NULL, 
    //     phoneU varchar(12), 
    //     RoleidR tinyint(11) NOT NULL, 
    //     PRIMARY KEY (idU), 
    //     INDEX (firstnameU), INDEX (lastnameU)
    // );
    // CREATE TABLE Sesion (
    //     idS tinyint(11) NOT NULL AUTO_INCREMENT, 
    //     token varchar(50) NOT NULL UNIQUE, 
    //     UseridU tinyint(11) NOT NULL, 
    //     PRIMARY KEY (idS)
    // );
    // CREATE TABLE Role (
    //     idR tinyint(11) NOT NULL AUTO_INCREMENT, 
    //     nameR varchar(255) NOT NULL, 
    //     UseridU tinyint(11) NOT NULL, 
    //     PRIMARY KEY (idR)
    // );
    // CREATE TABLE EventAssignament (
    //     ArtistidA tinyint(11) NOT NULL, 
    //     EventidE tinyint(11) NOT NULL, 
    //     folio tinyint(11) NOT NULL, 
    //     PRIMARY KEY (ArtistidA, EventidE, folio), 
    //     INDEX (folio)
    // );
    // CREATE TABLE purchase (
    //     ProductidP tinyint(11) NOT NULL,
    //     UseridU tinyint(11) NOT NULL,
    //     folio tinyint(11) NOT NULL UNIQUE,
    //     tipoPago varchar(30) NOT NULL,
    //     cantP tinyint(100) NOT NULL,
    //     total decimal(19, 0) NOT NULL, 
    //     PRIMARY KEY (ProductidP, UseridU, folio), 
    //     INDEX (folio), INDEX (cantP)
    // );
    // CREATE TABLE Access (
    //     EventidE tinyint(11) NOT NULL,
    //     UseridU tinyint(11) NOT NULL,
    //     folio tinyint(11) NOT NULL UNIQUE,
    //     typeA tinyint(1) NOT NULL,
    //     cost decimal(19, 0) NOT NULL, 
    //     PRIMARY KEY (EventidE, UseridU, folio), 
    //     INDEX (typeA)
    // );
    
    // ALTER TABLE EventAssignament ADD CONSTRAINT Fk_Artist_Event FOREIGN KEY (ArtistidA) REFERENCES Artist (idA);
    // ALTER TABLE EventAssignament ADD CONSTRAINT Fk_Event_Artist FOREIGN KEY (EventidE) REFERENCES Event (idE);
    // ALTER TABLE Product ADD CONSTRAINT Fk_Product_Artist FOREIGN KEY (ArtistidA) REFERENCES Artist (idA);
    // ALTER TABLE purchase ADD CONSTRAINT Fk_Product_Purschase FOREIGN KEY (ProductidP) REFERENCES Product (idP);
    // ALTER TABLE purchase ADD CONSTRAINT Fk_Product_Purschase_User FOREIGN KEY (UseridU) REFERENCES `User` (idU);
    // ALTER TABLE Acces ADD CONSTRAINT FKAcces292156 FOREIGN KEY (EventidE) REFERENCES Event (idE);
    // ALTER TABLE Acces ADD CONSTRAINT FKAcces358034 FOREIGN KEY (UseridU) REFERENCES `User` (idU);
    // ALTER TABLE Sesion ADD CONSTRAINT FKSesion662130 FOREIGN KEY (UseridU) REFERENCES `User` (idU);
    // ALTER TABLE Entity ADD CONSTRAINT FKEntity796526 FOREIGN KEY (RoleidR) REFERENCES Role (idR);
    // ALTER TABLE `User` ADD CONSTRAINT FKUser118663 FOREIGN KEY (RoleidR) REFERENCES Role (idR); 
    // ";

    // if($conexion->query($sql) === true){
    //     echo "La tabla USUARIOS se creó correctamente...";
    // }else{
    //     die("Error al crear tabla: " . $conexion->error);
    // }

    $sql = "INSERT INTO user(nameU, passU, firstnameU, lastnameU, phoneU, emailU, RoleidR)
    VALUES('jaime.dcb@hotmail.com','jm10dn16','DANIEL', 'CRUZ BUSTAMANTE','6371149255','jaime.dcb@hotmail.com',1)";

    if($conexion->query($sql) === true){
        echo "INSERCIÓN CORRECTA...";
    }else{
        die("Error en la tabla: " . $conexion->error);
    }

?>