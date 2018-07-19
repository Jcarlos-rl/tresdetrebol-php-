<?php
    require_once('../db/conexion.php');
    $id = $_GET['id'];

    $dir = "DELETE FROM direccion WHERE User_idUser='$id'";
    $conn->exec($dir);

    $user = "DELETE FROM user WHERE idUser='$id'";
    $conn->exec($user);

    header("Location: ../view/admin/usuarios.php");
?>