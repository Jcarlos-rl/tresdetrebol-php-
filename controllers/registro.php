<?php
    require_once('../db/conexion.php');

    if(!empty($_POST)){
        $user = $_POST['usuario'];
        $email = $_POST['email'];
        $pass = $_POST['contrasena'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $cp = $_POST['cp'];
        $telefono = $_POST['tel'];

        $md5 = MD5($pass);

        $queryUser = "INSERT INTO user (nombreUsuario,password,email) VALUES('$user','$md5','$email')";
        $conn->exec($queryUser);
        $id = $conn->lastInsertId();

        $queryDireccion = "INSERT INTO direccion (calle,numero,codigo_postal,telefono, User_idUser) VALUES('$calle','$numero','$cp','$telefono','$id')";
        $conn->exec($queryDireccion);
        
        header('Location: ../view/login.php');
    }
?>