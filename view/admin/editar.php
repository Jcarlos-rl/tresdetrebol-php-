        <?php
            require_once('../../db/conexion.php');

            $id = $_GET['id'];

            $query = $conn->prepare("SELECT * FROM productos WHERE idProductos ='$id'");
            $query->execute();

            while($res = $query->fetch()) { 		
                $nombre = $res['nombre'];
                $stock = $res['stock'];
                $categoria = $res['categoria'];
                $descripcion = $res['descripcion'];
                $precio = $res['precio'];
                $marca = $res['marca'];
            }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Registro</title>
            <link rel="stylesheet" href="../css/style.css">
            <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        </head>
        <body>
            <header>
                <nav>
                    <ul class="slogan1">
                        <li style="margin: 5px">
                            <a href="home.php"><p class="white-text  Lobster">Productos</p></a>
                        </li>
                        <li style="margin: 5px">
                            <a href="usuarios.php"><p class="white-text  Lobster">Usuarios</p></a>
                        </li>
                    </ul>
                    <img id='logo' src='../img/logo.png'>
                    <ul class="principal">
                        <?php
                            session_start();
                            if(isset($_SESSION['name'])){
                                echo "<div class='dropdown'>";
                                    echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>Admin: $_SESSION[name]</span></li></a>";
                                    echo "<div class='dropdown-content'>";
                                        echo "<a href='../../controllers/cerrarsesion.php'>Cerrar Sesión</a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </ul>
                </nav>
            </header>
            <section id='background-catalogo'></section>
            <div class="container">
                <div class="spacing25"></div>
                <h1 class="Lobster text-center">Nuevo Producto</h1>
                <h1>sdghdsfsdfgjhfdsfg</h1>
                <hr>
                <div class="spacing25"></div>
                <form action="../../controllers/editarProducto.php" method="post" enctype="multipart/form-data">
                <input style="display: none"  type="text" value="<?php echo $id;?>" name="id">
                <div class="row">
                    <div class="col m4">
                        <label class="Lobster" for="nombre">Nombre: </label>
                        <input style="width: 100%" type="text" value="<?php echo $nombre;?>" name="nombre">
                    </div>
                    <div class="col m4">
                        <label class="Lobster" for="nombre">Stock: </label>
                        <input style="width: 100%" type="text" value="<?php echo $stock;?>" name="stock">
                    </div>
                    <div class="col m4">
                        <label class="Lobster" for="nombre">Categoria: </label>
                        <input style="width: 100%" type="text" value="<?php echo $categoria;?>" name="categoria">
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <label class="Lobster" for="nombre">Descripcion: </label>
                        <textarea style="width:100%;height:100px;border: 1px solid #151515;" cols="60" rows="8" name="descripcion"><?php echo $descripcion;?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <label class="Lobster" for="nombre">Precio: </label>
                        <input style="width: 100%" type="text" value="<?php echo $precio;?>" name="precio">
                    </div>
                    <div class="col m6">
                        <label class="Lobster" for="nombre">Marca: </label>
                        <input style="width: 100%" type="text" value="<?php echo $marca;?>" name="marca">
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <?php 
                            $path = "../img/files/".$id;
                            if(file_exists($path)){
                                $directorio = opendir($path);
                                while ($imagen = readdir($directorio)){
                                    if (!is_dir($imagen)){
                                        echo "<a href='../../controllers/eliminarImg.php?id=$id'><img class='responsive-img' src='../img/files/$id/$imagen' alt='Card image cap'></a>";
                                    }
                                }
                            }	
                        ?>
                    </div>
                    <a href='http://www.google.com'><button>Eliminar</button></a>
                    <div class="col m6">
                        <label class="Lobster" for="exampleFormControlFile1">Seleccionar Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                </div>
                <br>
                <button class="img-center" type="submit">Guardar</button>
                </form>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="../js/nav.js"></script>
        </body>
        </html>