<?php
    require_once('../../db/conexion.php');

    $query = $conn->prepare("SELECT * FROM productos");
    $query->execute();
?>