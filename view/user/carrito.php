
<?php
    require_once('../../db/conexion.php');

    session_start();
    $id_user=$_SESSION['id'];
    if($id_user == NULL){
        header("Location: ../login.php");
    }
    $query = "select * from order_item item 
    inner join orden orden on item.orden_idorden = orden.idorden
    inner join productos prod on prod.idProductos = item.Productos_idProductos
    where item.orden_User_idUser = $id_user
    and orden.estado = 'progreso'";

    $resultado = $conn->prepare($query);
    $resultado->execute();
    $rows = $resultado->rowCount();
    $total = 0;
    $idOrden=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
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
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
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
                            echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
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
        <div class="spacing50"></div>
        <div class="row">
            <div class="col m4"></div>
            <div class="col m4 s12">
                <h1 class="text-center Lobster">Mis compras</h1>
                <hr>
            </div>
            <div class="col m4"></div>
        </div>
        <div class="spacing25"></div>
        <?php
            if($rows > 0){
                while($row = $resultado->fetch()){
                    $importe = $row['cantidad']*$row['precio'];
                    $id = $row['idProductos'];
                    echo "<div class='row'>";
                        echo "<div class='col m3'>";
                            $path = "../img/files/".$id;
                            if(file_exists($path)){
                                $directorio = opendir($path);
                                while ($imagen = readdir($directorio)){
                                    if (!is_dir($imagen)){
                                        echo "<img class='responsive-img' src='../img/files/$id/$imagen' alt='Card image cap'>";
                                    }
                                }
                            }
                        echo "</div>";
                        echo "<div class='col m9'>";
                            echo "<div class='row'>";
                                echo "<div class='col m4 s12'>";
                                    echo "<p class='Lobster'>Nombre: $row[nombre]</p>";
                                    echo "<p class='Lobster'>Categoria: $row[categoria]</p>";
                                    echo "<p class='Lobster'>Marca: $row[marca]</p>";
                                    echo "<p class='Lobster'>Importe: $importe</p>";
                                echo "</div>";            
                                echo "<div class='col m4 s12'>";
                                    echo "<form action='../../controllers/actualizarCantidad.php' method='POST'>";
                                        echo "<input type='hidden' value=$row[idorder_item] name='idOrder_item'>";
                                        echo "<div class='quantity'>";
                                            echo "<input type='number' max=$row[stock] min=1 value=$row[cantidad] name='cantidad'>";
                                        echo "</div>";
                                        echo "<input type='submit' value='Actualizar'>";
                                    echo "</form>";
                                echo "</div>";            
                                echo "<div class='col m4 s12'>";
                                    echo "<a href=\"../../controllers/eliminarDeCarrito.php?id=$row[idorder_item]\" onClick=\"return confirm('Seguro que deseas eliminarlo?')\"><button type='button' class='btn btn-danger'>Eliminar</button></a>";		
                                echo "</div>";            
                            echo "</div>";        
                        echo "</div>";
                    echo "</div>";
                    $total = $total + $importe;
                    $idOrden = $row['orden_idorden'];
                }      
                echo "<p class='text-center Lobster'>Total: <span style='color: red'>$$total.00</span></p>";
                $query = $conn->prepare("UPDATE orden set total='$total' where idorden=$idOrden");
                $query->execute();
                echo "<a style='text-decoration: none' href=\"../../controllers/confirmarPago.php\"><button type='button' class='img-center'>Confirmar Pago</button></a>";		
                echo "<br>";
            }else{
                echo "<h1 class='text-center'>Lo Sentimos, aún no tienes nada en tu carrito. Regresa y compra algo</h1>";
            }
        ?>
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
    <script src="../js/input.js"></script>
</body>
</html>