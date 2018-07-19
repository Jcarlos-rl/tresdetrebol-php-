<?php
    require_once('../db/conexion.php');
    $id = $_GET['id'];

    session_start();
    $id_user=$_SESSION['id'];
    if($id_user === NULL){
        header("Location: ../view/login.php");
    }
    $hoy = date('Y-m-d H:i:s');   
    $estado= "SELECT * FROM orden where User_idUser=$id_user and estado='progreso'";
    $gsent1 =$conn->prepare($estado);
    $gsent1->execute();
    $result1 = $gsent1->fetch();   
    $result = $gsent1->rowCount();
    $importe = "SELECT * from productos where idProductos=$id";  
    $gsent3 =$conn->prepare($importe);
    $gsent3->execute();
    $importe = $gsent3->fetch();   
    
    if($result > 0){
        $total = $importe['precio'] + $result1['total'];
        $query3 = "INSERT INTO order_item(cantidad, orden_idorden, orden_user_idUser, Productos_idProductos ) values(1, $result1[idorden], $id_user, $id)";
        $gsent2 =$conn->prepare($query3);
        $gsent2->execute();
        
        $query4 = "UPDATE orden set total = $total where idorden=$result1[idorden]";
        $gsent4 =$conn->prepare($query4);
        $gsent4->execute();
    }else{
        $query = "INSERT INTO orden(User_idUser, estado, fecha, total) values('$id_user','progreso', '$hoy',0.0)";
        $gsent =$conn->prepare($query);
        $gsent->execute();
        
        $idOrden = $conn->lastInsertId();
        $query2 = "INSERT INTO order_item(cantidad, orden_idorden, orden_user_idUser, Productos_idProductos ) values(1, $idOrden, $id_user, $id)";
        $gsent1 =$conn->prepare($query2);
        $gsent1->execute();
        
       /*$total = $result1['idorden'];
        echo "TOTAL: ".$total;
        $query5 = "UPDATE orden set total = $importe[precio] where idorden=$result1[idorden]";
        $gsent5 =$conn->prepare($query5);
        $gsent5->execute();*/
    }
    
    



    header('Location: ../view/user/catalogo.php');



?>