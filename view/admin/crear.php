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
        <hr>
        <div class="spacing25"></div>
        <form action="../../controllers/nuevoProducto.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col m6">
                        <label class="Lobster" for="nombre">Nombre: </label><br>
                        <input style="width: 100%" type="text" name="nombre">
                    </div>
                    <div class="col m6">
                        <label class="Lobster" for="email">Stock: </label>
                        <input style="width: 100%" type="text" name="stock">
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <label class="Lobster" for="email">Categoria: </label>
                        <input style="width: 100%" type="text" name="categoria">
                    </div>
                    <div class="col m6">
                        <label class="Lobster" for="email">Descripcion: </label>
                        <input style="width: 100%" type="text" name="descripcion">
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <label class="Lobster" for="email">Precio: </label>
                        <input style="width: 100%" type="text" name="precio">
                    </div>
                    <div class="col m6">
                        <label class="Lobster" for="email">Marca: </label>
                        <input style="width: 100%" type="text" name="marca">
                    </div>
                </div>
                <div class="row">
                    <label class="Lobster img-center" for="exampleFormControlFile1">Seleccionar Imagen</label>
                    <input style="width: 100%" required="true" type="file" class="form-control-file" name="imagen">
                </div>
            <button class="img-center" type="submit">Registrar</button>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/nav.js"></script>
</body>
</html>