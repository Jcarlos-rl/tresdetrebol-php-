<?php
    require_once('../db/conexion.php');

    if(!empty($_POST)){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];

        $sql = "UPDATE productos SET nombre='$nombre', stock='$stock', categoria='$categoria', descripcion='$descripcion', precio='$precio',marca='$marca' WHERE idProductos='$id'";
        $query = $conn->prepare($sql);
        $query->execute();

        if($_FILES["imagen"]["error"]>0){
            echo "Error al cargar archivo";	
            } else {
            
            $permitidos = array("image/gif","image/png","application/pdf","image/jpg","image/jpeg");
            
            if(in_array($_FILES["imagen"]["type"], $permitidos)){
                
                $ruta = '../view/img/files/'.$id.'/';
                $archivo = $ruta.$_FILES["imagen"]["name"];
                
                if(!file_exists($ruta)){
                    mkdir($ruta);
                }
                
                if(!file_exists($archivo)){
                    
                    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
                    
                    if($resultado){
                        echo "Archivo Guardado";
                        } else {
                        echo "Error al guardar archivo";
                    }
                    
                    } else {
                    echo "Archivo ya existe";
                }
                
                } else {
                echo "Archivo no permitido o excede el tamaño";
            }
            
        }

        header('Location: ../view/admin/home.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <?php
    echo $id;
    ?>
<body>
    
</body>
</html>