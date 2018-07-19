<?php
    require_once('../../controllers/leerUsuarios.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
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
        <h1 class="Lobster text-center">Usuarios</h1>
        <hr>
        <div class="spacing25"></div>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>E-mail</td>
                    <td>Admin</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <?php 
                while($res = $query->fetch()) { 		
                    echo "<tr>";
                    echo "<td>".$res['nombreUsuario']."</td>";
                    echo "<td>".$res['email']."</td>";
                    if($res['is_admin']==0){
                        echo "<td><a href=\"../../controllers/Admin.php?id=$res[idUser]\"><button style='background-color: red' type='button'><i class='fas fa-times'></i></button></a></td>";
                    }else{
                        echo "<td><a href=\"../../controllers/noAdmin.php?id=$res[idUser]\"><button style='background-color: green' type='button'><i class='fas fa-check'></i></button></a></td>";
                    }
                    echo "<td><a href=\"../../controllers/eliminarUsuario.php?id=$res[idUser]\" onClick=\"return confirm('Seguro que deseas eliminarlo?')\"><button type='button' class='btn btn-danger'><i class='far fa-trash-alt'></i></button></a></td>";		
                }
            ?>
        </table>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/nav.js"></script>
</body>
</html>