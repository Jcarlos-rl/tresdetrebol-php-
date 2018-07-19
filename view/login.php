<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        body{
            background-color: #151515;
        }
    </style>
</head>
<body>
    <section class="container">
        <div class="spacing25"></div>
        <h1 class="text-center Lobster white-text">Login</h1>
        <div class="spacing25"></div>
        <div class="row">
            <div class="col m6 s12 marca hide-on-small-only">
                <div class="spacing75"></div>
                <h2 class="Lobster text-center white-text">3 de trebol</h2>
                <img style="width: 200px;" class="img-center" src="img/logo.png" alt="">
            </div>
            <div class="col m6 s12 login">
                <?php
                    if(isset($_GET["error"])) {
                        echo "<center><p style='border-style: solid;border-color: #ffaa00; 
                        color:#ff1a1a; font-size:75%; margin-left:25%;' class='col m6'><strong> Usuario y/o contraseña incorrectos. Verifique su usuario </strong></p> </center>";
                                            }
                ?>
                <div class="spacing75"></div>
                <div class="text-center">
                    <form action="../controllers/login.php" method="post">
                        <label for="" class="Lobster">Usuario</label>
                        <input required type="text" name="usuario" id="usuario">
                        <div class="spacing25"></div>
                        <label for="" class="Lobster">Contraseña</label>
                        <input type="password" required name="contrasena" id="contrasena">
                        <?php
                         if(isset($_GET["error_p"])) {
                          echo "<center><p style='border-style: solid;border-color: #ffaa00; 
                         color:#ff1a1a; font-size:75%; margin-left:25%;' class='col m6 '><strong>contraseña incorrecta. Intentelo de nuevo.</strong></p> </center>";
                                                    }
                        ?>
                        <div class="spacing25"></div>
                        <input type="submit" value="Ingresar" onclick="validar_login()">
                    </form>
                    <p>¿No tienes cuenta?<a class="registrate" href="registro.php"> Registrate</a></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>