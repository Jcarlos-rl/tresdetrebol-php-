<?php
$id = $_GET['id'];

eliminarDir('../view/img/files/'.$id);
function eliminarDir($carpeta){
    foreach(glob($carpeta . "/*") as $archivos_carpeta){
        if (is_dir($archivos_carpeta)){
            eliminarDir($archivos_carpeta);
		}else{
            unlink($archivos_carpeta);
		}
	}
    rmdir($carpeta);
}
header("Location: ../view/admin/editar.php?id=$id");    	
?>