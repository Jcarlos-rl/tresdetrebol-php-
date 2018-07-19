<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tres de trebol</title>
	<link rel="stylesheet" href="view/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn white-text" onclick="closeNav()">&times;</a>
        <a class="Lobster white-text" href="index.php">Home</a>
        <a class="Lobster white-text" href="view/user/catalogo.php">Catalogo</a>
        <a class="Lobster white-text" href="#">Contacto</a>
        <a class="Lobster white-text" href="#">About</a>
        <a class="Lobster white-text hide-on-med-and-up" href="#">Cart</a>
    </div>
	<header>
        <nav>
            <i style="cursor:pointer" class="menu hide-on-small-only fas fa-bars white-text" onclick="openNav()"></i>
            <i style="cursor:pointer" class="menu1 hide-on-med-and-up fas fa-bars white-text" onclick="openNav()"></i>
            <p class="white-text slogan Lobster hide-on-small-only">Do you believe in Magic?</p>
            <img id='logo' src='view/img/logo.png'>
            <ul class="principal hide-on-small-only">
                <a href="view/user/carrito.php"><li class="cart white-text"><i class="fas fa-shopping-cart"> <span class="Lobster">Cart</span></i></li></a>
                <?php
                    session_start();
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='controllers/misPedidos.php'>Mis Pedidos</a>";
                                echo "<a href='controllers/cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
            <ul class="principal-mov hide-on-med-and-up">
                <?php
                    if(isset($_SESSION['name'])){
                        echo "<div class='dropdown'>";
                            echo "<a class='dropbtn principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>$_SESSION[name]</span></li></a>";
                            echo "<div class='dropdown-content'>";
                                echo "<a href='controllers/misPedidos.php'>Mis Pedidos</a>";
                                echo "<a href='controllers/cerrarsesion.php'>Cerrar Sesión</a>";
                            echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<a class='principal' href='view/login.php'><li class='principal white-text'> <span class='Lobster'>Login</span></li></a>";
                    }
                ?>
            </ul>
        </nav>
    </header> 
    <div class="text-center hide-on-small-only">
        <ul class="left">
            <li><a class="secundario Lobster" href="index.php">Home</a></li>
            <li><a class="secundario Lobster" href="view/user/catalogo.php">Catalogo</a></li>
        </ul>
        <ul class="right">
            <li><a class="secundario Lobster" href="#contact">Contact</a></li>
            <li><a class="secundario Lobster" href="#about">About</a></li>
        </ul>
    </div>
    <section id='background-header'></section>
    <div class="container">
        <div class="spacing50"></div>
        <div class="col m12">
            <div class="row">
                <div class="col m6 s12">
                    <h1 class="text-center Lobster">Tres de trebol</h1>
                    <img style="width: 200px" class="responsive-img img-center" src="view/img/logo-negro.png" alt="">
                </div>
                <div class="col m6 s12">
                    <div class="spacing25"></div>
                    <p class="text-justify"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti obcaecati molestias eligendi, ut recusandae quae nostrum doloribus enim voluptas tempore iure cum optio, incidunt animi eaque doloremque sit? Velit, eius.<br><br></span><span>Iusto ratione corporis, impedit iste porro nulla numquam quidem, incidunt ducimus quo recusandae laudantium eaque tempora reiciendis esse laboriosam provident inventore explicabo. Commodi consectetur modi, saepe amet veritatis quos quidem.<br><br></span></p>
                </div>
            </div>
        </div>
        <div class="spacing50"></div>
    </div>
    <img style="height: 350px; width: 100%;" class="responsive-img" src="view/img/banner.png" alt="">
    <div class="container">
        <div class="spacing50"></div>
        <h2 class="text-center Lobster">Nuestras marcas</h2>
        <div class="spacing25"></div>
        <hr>
        <div class="col m12">
            <div class="row">
                <a href="view/user/catalogoMarca.php?marca=Bicycle"><div class="col m3 s12"><img src="view/img/bicycle.png" alt="" class="responsive-img img-center"></div></a>
                <a href="view/user/catalogoMarca.php?marca=Ellusionist"><div class="col m3 s12"><img src="view/img/ellusionist.png" alt="" class="responsive-img img-center"></div></a>
                <a href="view/user/catalogoMarca.php?marca=Murphy\'s Magic"><div class="col m3 s12"><img src="view/img/murphymagic.png" alt="" class="responsive-img img-center"></div></a>
                <a href="view/user/catalogoMarca.php?marca=Theory 11"><div class="col m3 s12"><img src="view/img/theory11.png" alt="" class="responsive-img img-center"></div></a>
            </div>
        </div>
        <hr>
        <div class="spacing25"></div>
    </div>
    <div class="container95">
        <h2 class="text-center Lobster">Naipes destacados</h2>
        <div class="spacing50"></div>
        <div class="row">
            <div class="col m3">
                <a href="view/user/descripcion.php?id=1"><img src="view/img/files/1/memento.jpg" alt="" class="responsive-img"></a>
                <h3 class="text-center">Memento Mori</h3>
                <p class="text-center">$150</p>
            </div>
            <div class="col m3">
                <a href="view/user/descripcion.php?id=12"><img src="view/img/files/12/NPH.jpg" alt="" class="responsive-img"></a>
                <h3 class="text-center">NPH</h3>
                <p class="text-center">$190</p>
            </div>
            <div class="col m3">
                <a href="view/user/descripcion.php?id=16"><img src="view/img/files/16/k.jpg" alt="" class="responsive-img"></a>
                <h3 class="text-center">Knights</h3>
                <p class="text-center">$200</p>
            </div>
            <div class="col m3">
                <a href="view/user/descripcion.php?id=8"><img src="view/img/files/8/lord.png" alt="" class="responsive-img"></a>
                <h3 class="text-center">Bicycle dragonlord</h3>
                <p class="text-center">$95</p>
            </div>
        </div>
    </div>
    <div class="spacing50"></div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col m4"></div>
                <div class="col m4">
                    <div class="spacing25"></div> 
                    <p class="white-text text-center">3 de trebol | Todos los derechos reservados</p>
                </div>
                <div class="col m4">
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="view/js/nav.js"></script>
    <script src="view/js/sidenav.js"></script>
</body>
</html>