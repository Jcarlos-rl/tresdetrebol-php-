<?php
    require_once('../db/conexion.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE idProductos='$id'";
    $conn->exec($sql);

    eliminarDirImg('../view/img/files/'.$id);
    function eliminarDirImg($carpeta){
        foreach(glob($carpeta . "/*") as $archivos_carpeta){
            if (is_dir($archivos_carpeta)){
                eliminarDirImg($archivos_carpeta);
            }else{
                unlink($archivos_carpeta);
            }
        }
        rmdir($carpeta);
    }

    header("Location: ../view/admin/home.php");
?>