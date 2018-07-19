<?php
    require_once('../db/conexion.php');
    $id = $_GET['id'];

    $user = "UPDATE user SET is_admin=1 WHERE idUser='$id'";
    $conn->exec($user);

    header("Location: ../view/admin/usuarios.php");
?>