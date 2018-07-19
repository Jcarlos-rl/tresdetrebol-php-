<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pago</title>
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
                <a href="carrito.php"><li class="cart white-text"><i class="fas fa-shopping-cart"> <span class="Lobster">Cart</span></i></li></a>
                <?php
                    session_start();
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
                <h1 class="text-center Lobster">Informacion de pago</h1>
                <hr>
            </div>
            <div class="col m4"></div>
        </div>
        <div class="spacing25"></div>
        <div class="row">
            <form method="POST" action="pago.php">
                <div class="row">
                    <div class="col m6 s12">
                        <p class="Lobster">Forma de Pago: </p>
                        <div class="select">
                            <select name="forma">
                                <option value="credito">Tarjeta de Credito</option>
                                <option value="debito">Tarjeta de Debito</option>
                            </select>
                        </div>
                    </div>
                    <div class="col m6 s12">
                        <p class="Lobster">Banco:</p> 
                        <div class="select">
                            <select name="banco">
                                <option value="Banamex">Banamex</option>
                                <option value="Bancomer">Bancomer</option>
                                <option value="Banorte">Banorte</option>
                                <option value="HSBC">HSBC</option>
                                <option value="Santander">Santander</option>
                                <option value="Scotia">Scotia Bank</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6 s12">
                        <p class="Lobster">Nombre del titular:</p>
                        <input style="width: 100%" type="text" name="nombre" required>
                    </div>
                    <div class="col m6 s12">
                        <p class="Lobster">Número de tarjeta:</p> 
                        <input style="width: 100%" type="text" pattern="[0-9]{16}" maxlength="16" name="num_tarjeta" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <p class="Lobster">Vencimiento:</p>
                        <div class="select">
                            <select name="mesV">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col m6">
                        <p class="Lobster white-text">hjklkjh</p>
                        <div class="select">
                            <select name="anoV">
                                <option value=2018>2018</option>
                                <option value=2019>2019</option>
                                <option value=2020>2020</option>
                                <option value=2021>2021</option>
                                <option value=2022>2022</option>
                                <option value=2023>2023</option>
                                <option value=2024>2024</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <p class="Lobster">Numero de seguridad:</p> 
                        <input style="width: 100%" type="password" pattern="[0-9]{3}" maxlength="3" name="seguridad" required>
                    </div>
                    <div class="col m6">
                        <p class="white-text">hjo</p>
                        <input class="text-center" type="submit" value="Pagar">
                    </div>
                </div>
            </form>
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