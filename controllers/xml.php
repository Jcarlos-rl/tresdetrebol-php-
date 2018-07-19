<?php
 require_once('../db/conexion.php');
 $id_pedido = $_GET['idOrden'];
session_start();
$id_user=$_SESSION['id'];
$nombre_usuario=$_SESSION['name'];
$correo=$_SESSION['email'];
try {                  
    $sql = "select * from order_item item 
    inner join orden orden on item.orden_idorden = orden.idorden
    inner join productos prod on prod.idProductos = item.Productos_idProductos
    where item.orden_User_idUser = $id_user
    and orden.estado = 'pagado' and orden.idorden = $id_pedido";                
    $gsent = $conn->prepare($sql);
    $gsent->execute();   
    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Compra></Compra>"); 
    while( $tabla = $gsent->fetch(PDO::FETCH_OBJ)){
        $track = $xml->addChild('Datos');
        $track->addChild('IdOrden',$tabla->idorden);
        $track->addChild('fecha',$tabla->fecha);
        $track->addChild('Producto',$tabla->nombre);
        $track->addChild('marca',$tabla->marca);
        $track->addChild('cantidad',$tabla->cantidad);
        $track->addChild('total',$tabla->total);           
        $track->addChild('usuario',$nombre_usuario);
        $track->addChild('email',$correo);   
    }
    Header('Content-type: text/xml');
    $filename="Compra_".$id_pedido."_".$nombre_usuario.".xml";
    header("Content-Disposition: attachment; filename='$filename'");
    print($xml->asXML());
    $mbd = null;                            
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}