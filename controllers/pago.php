<?php
    require_once('../db/conexion.php');

    session_start();
    $id_user=$_SESSION['id'];

    $query1 = $conn->prepare("SELECT * FROM orden where User_idUser=$id_user and estado='progreso'");
    $query1 -> execute();
    $res = $query1->fetch();
    $idOrden = $res['idorden'];
    
    $query3 = $conn->prepare("select * from order_item item 
    inner join orden orden on item.orden_idorden = orden.idorden
    inner join productos prod on prod.idProductos = item.Productos_idProductos
    where item.orden_User_idUser = $id_user
    and orden.estado = 'progreso'");
    $query3->execute();

    while($row=$query3->fetch()){
        $nuevoStock = $row['stock'] - $row['cantidad'];
        $query4 = $conn->prepare("UPDATE Productos set stock=$nuevoStock where idProductos=$row[Productos_idProductos]");
        $query4 ->execute();
    }
    

    if(!empty($_POST)){
        $forma = $_POST['forma'];
        $numTar = $_POST['num_tarjeta'];
        $banco = $_POST['banco'];
        $nombre = $_POST['nombre'];
        $mesV = $_POST['mesV'];
        $anoV = $_POST['anoV'];
        $num_Seg = $_POST['seguridad'];

        $query = $conn->prepare("INSERT INTO pago(forma, numTar, banco, nombre, mesV, anoV, num_Seg, idOrden) values('$forma', '$numTar', '$banco', '$nombre', $mesV, $anoV, $num_Seg, $idOrden)");
        $query->execute();
        
        $query2 = $conn->prepare("update orden set estado='pagado', forma_de_pago='$forma' where idOrden=$idOrden");
        $query2->execute();
    }

    



    Header("Location: ../index.php ")


?>