<?php
    require_once('../../controllers/leerProductos.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Admin</title>
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
        <h1 class="Lobster text-center">Inventario</h1>
        <hr>
        <div class="spacing25"></div>
        <a style="text-decoration:none" href="crear.php"><button class="img-center">Nuevo</button></a>
        <div class="spacing50"></div>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Stock</td>
                    <td>Categoria</td>
                    <td>Precio</td>
                    <td>Marca</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <?php 
                while($res = $query->fetch()) { 		
                    echo "<tr>";
                    echo "<td>".$res['idProductos']."</td>";
                    echo "<td>".$res['nombre']."</td>";
                    echo "<td>".$res['stock']."</td>";
                    echo "<td>".$res['categoria']."</td>";
                    echo "<td>".$res['precio']."</td>";
                    echo "<td>".$res['marca']."</td>";
                    echo "<td><a href='editar.php?id=$res[idProductos]'><button type='button' class='btn btn-success'><i class='far fa-edit'></i></button></a> | <a href=\"../../controllers/eliminarProducto.php?id=$res[idProductos]\" onClick=\"return confirm('Seguro que deseas eliminarlo?')\"><button type='button' class='btn btn-danger'><i class='far fa-trash-alt'></i></button></a></td>";		
                }
            ?>
        </table>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/nav.js"></script>
</body>
</html>