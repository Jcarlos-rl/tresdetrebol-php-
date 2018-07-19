<?php
    require_once('../db/conexion.php');

    if(!empty($_POST)){
        $cantidad = $_POST['cantidad'];
        $id = $_POST['idOrder_item'];
        $query = $conn->prepare("Update order_item set cantidad=$cantidad where idorder_item=$id");
        $query->execute();
        header('Location: ../view/user/carrito.php');
        //echo $id, $cantidad;
    }

?>