<?php
    require_once('../db/conexion.php');

    session_start();
    $id_user=$_SESSION['id'];
    
    $id = $_GET['id'];
    $query1 = $conn->prepare("SELECT * FROM order_item item inner join productos prod on item.Productos_idProductos = prod.idProductos where item.idorder_item = $id");
    $query1-> execute();
    $row = $query1->fetch();
    $importe = $row['cantidad']*$row['precio'];
    echo "Importe: ".$importe;

    $id_orden = $row['orden_idorden'];
    $query2 = $conn->prepare("Select * from orden where idorden = $row[orden_idorden]");
    $query2->execute();
    $row1 = $query2->fetch();

    $total = $row1['total'] - $importe;
    $query3 = $conn->prepare("UPDATE orden set total=$total where idorden=$id_orden");
    $query3->execute();

    $query = $conn->prepare("DELETE FROM order_item where idorder_item=$id");
    $query->execute();

    header('Location: ../view/user/carrito.php');

?>