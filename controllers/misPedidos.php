<?php
    require_once('../db/conexion.php');
    
    session_start();
    $id_user=$_SESSION['id'];
    $query = $conn->prepare("SELECT * FROM orden where User_idUser=$id_user and estado='pagado'");
    $query->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn white-text" onclick="closeNav()">&times;</a>
        <a class="Lobster white-text" href="../index.php">Home</a>
        <a class="Lobster white-text" href="../view/user/catalogo.php">Catalogo</a>
        <a class="Lobster white-text" href="#">Contacto</a>
        <a class="Lobster white-text" href="#">About</a>
        <a class="Lobster white-text hide-on-med-and-up" href="../view/user/carrito.php">Cart</a>
    </div>
    <header>
        <nav>
            <i style="cursor:pointer" class="menu hide-on-small-only fas fa-bars white-text" onclick="openNav()"></i>
            <i style="cursor:pointer" class="menu1 hide-on-med-and-up fas fa-bars white-text" onclick="openNav()"></i>
            <p class="white-text slogan Lobster hide-on-small-only">Do you believe in Magic?</p>
            <img id='logo' src='../view/img/logo.png'>
            <ul class="principal hide-on-small-only">
                <a href="../view/user/carrito.php"><li class="cart white-text"><i class="fas fa-shopping-cart"> <span class="Lobster">Cart</span></i></li></a>
                <?php
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='../view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='misPedidos.php'>Mis Pedidos</a>";
                                echo "<a href='cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='../view/login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
            <ul class="principal-mov hide-on-med-and-up">
                <?php
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='../view/login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
        </nav>
    </header>
    <div class="text-center hide-on-small-only">
        <ul class="left">
            <li><a class="secundario Lobster" href="../index.php">Home</a></li>
            <li><a class="secundario Lobster" href="../view/user/catalogo.php">Catalogo</a></li>
        </ul>
        <ul class="right">
            <li><a class="secundario Lobster" href="#contact">Contact</a></li>
            <li><a class="secundario Lobster" href="#about">About</a></li>
        </ul>
    </div>
    <section id='background-catalogo'></section>
    <section class="container">
        <div class="spacing50"></div>
        <div class="row">
            <div class="col m4"></div>
            <div class="col m4 s12">
                <h1 class="text-center Lobster">Mis pedidos</h1>
                <hr>
            </div>
            <div class="col m4"></div>
        </div>
        <div class="spacing25"></div>
        <div class="row">
            <?php
                while($row = $query->fetch()){
                    $idOrden = $row['idorden'];
                    echo "<h1 class='Lobster text-center'>Pedido ".$idOrden."</h1>";
                    $query1 = $conn->prepare("SELECT * FROM order_item inner join Productos on order_item.Productos_idProductos = Productos.idProductos where order_item.orden_idorden=$idOrden");
                    $query1 -> execute();
                    echo "<table style='width: 100%'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<td class='Lobster'>Nombre</td>";
                    echo "<td class='Lobster'>Cantidad</td>";
                    echo "<td class='Lobster'>Precio</td>";
                    echo "<td class='Lobster'>Importe</td>";
                    echo "</tr>";
                    echo "</thead>";
                    while($res = $query1->fetch()){
                        echo "<tr>";
                        echo "<td>$res[nombre]</td>";
                        echo "<td>$res[cantidad]</td>";
                        echo "<td>$res[precio]</td>";
                        echo "<td>".$res['precio']*$res['cantidad']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<br>";
                    echo "<div class='row'>";
                        echo "<div class='col m6 s12'>";
                            echo "<h2 class=' text-center Lobster'>Total: ".$row['total']."</h2>";
                        echo "</div>";
                        echo "<div class='col m6 s12'>";
                            echo '<form action="xml.php" method="GET" >';
                            echo "<input type='hidden' value=$row[idorden] name='idOrden'>";
                            echo "<input type='submit' value='Generar XML'>";
                            echo "</form>";
                        echo "</div>";
                        echo "<br>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col m4"></div>
                <div class="col m4">
                    <div class="spacing25"></div> 
                    <p style="" class="white-text text-center">3 de trebol | Todos los derechos reservados</p>
                </div>
                <div class="col m4">
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../view/js/nav.js"></script>
    <script src="../view/js/sidenav.js"></script>
</body>
</html>