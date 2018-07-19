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
    <title>Detalles</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn white-text" onclick="closeNav()">&times;</a>
        <a class="Lobster white-text" href="../../index.php">Home</a>
        <a class="Lobster white-text" href="catalogo.php">Catalogo</a>
        <a class="Lobster white-text" href="#">Contacto</a>
        <a class="Lobster white-text" href="#">About</a>
        <a class="Lobster white-text hide-on-med-and-up" href="carrito.php">Cart</a>
    </div>
    <header>
        <nav>
            <i style="cursor:pointer" class="menu hide-on-small-only fas fa-bars white-text" onclick="openNav()"></i>
            <i style="cursor:pointer" class="menu1 hide-on-med-and-up fas fa-bars white-text" onclick="openNav()"></i>
            <p class="white-text slogan Lobster hide-on-small-only">Do you believe in Magic?</p>
            <img id='logo' src='../img/logo.png'>
            <ul class="principal hide-on-small-only">
                <a href="carrito.php"><li class="cart white-text"><i class="fas fa-shopping-cart"> <span class="Lobster">Cart</span></i></li></a>
                <?php
                    session_start();
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='../login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='../../controllers/misPedidos.php'>Mis Pedidos</a>";
                                echo "<a href='../../controllers/cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='../login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
            <ul class="principal-mov hide-on-med-and-up">
                <?php
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='../login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='../../controllers/cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='../login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
        </nav>
    </header>
    <div class="text-center hide-on-small-only">
        <ul class="left">
            <li><a class="secundario Lobster" href="../../index.php">Home</a></li>
            <li><a class="secundario Lobster" href="catalogo.php">Catalogo</a></li>
        </ul>
        <ul class="right">
            <li><a class="secundario Lobster" href="#contact">Contact</a></li>
            <li><a class="secundario Lobster" href="#about">About</a></li>
        </ul>
    </div>
    <section id='background-catalogo'></section>
    <section class="container">
        <div class="spacing25"></div>
        <h1 class="text-center Lobster"><?php echo $nombre?></h1>
        <hr>
        <div class="spacing50"></div>        
        <div class="row">
            <div class="col m6">
                <?php
                    $path = "../img/files/".$id;
                    if(file_exists($path)){
                        $directorio = opendir($path);
                        while ($imagen = readdir($directorio)){
                            if (!is_dir($imagen)){
                                echo "<img class='responsive-img' src='../img/files/$id/$imagen' alt='Card image cap'>";
                            }
                        }
                    }
                ?>
            </div>
            <div class="col m6">
                <h3 class="Lobster">Marca:</h3>
                <p><?php echo $marca ?></p>
                <h3 class="Lobster">Descripción:</h3>
                <p class="text-justify"><?php echo $descripcion ?></p>
                <h3 class="Lobster">Precio:</h3>
                <p>$<?php echo $precio ?></p>
                <?php echo "<a class='acatalogo' href='../../controllers/agregarCarrito.php?id=$id'>";?><input type="submit" value="Agregar carrito"></a>
            </div>
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
    <script src="../js/nav.js"></script>
    <script src="../js/sidenav.js"></script>
</body>
</html>