<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="js/validar.js"></script>
    <style>
        body{
            background-color: #151515;
        }
        .login{
            background-color: #fff; 
            height:450px;
        }
        @media only screen and (max-width: 600px){
            .login{
                height: 310px;
            }
            .direccion{
                height: 400px;
            }
        }
    </style>
</head>
<body>
    <section class="container">
        <div class="spacing25"></div>
        <h1 class="text-center Lobster white-text">Registro</h1>
        <div class="spacing25"></div>
        <div class="row">
            <form action="../controllers/registro.php" method="post" onsubmit="return validar();">
                <div class="col m6 s12 login">
                    <div class="spacing25"></div>
                    <div class="text-center">
                        <label class="Lobster">Usuario: </label>
                        <input  type="text" name="usuario" id="usuario">
                        <div class="spacing25"></div>
                        <label class="Lobster">E-mail: </label>
                        <input  type="email" name="email" id="email">
                        <div class="spacing25"></div>
                        <label for="" class="Lobster">Contraseña:</label>
                        <input  type="password" name="contrasena" id="contrasena">
                    </div>
                </div>
                <div class="col m6 login s12 direccion">
                    <div class="hide-on-small-only spacing25"></div>
                    <div class="text-center">
                        <label for="" class="Lobster">Callea:</label>
                        <input type="text"  name="calle" id="calle">
                        <label for="" class="Lobster">Numero:</label>
                        <input type="text"  name="numero" id="numero">
                        <label for="" class="Lobster">Codigo postal:</label>
                        <input type="text"  maxlength="5" name="cp" id="cp">
                        <label for="" class="Lobster">Telefono:</label>
                        <input type="text"  name="tel" maxlength="10" id="tel">
                        <div class="spacing25"></div>
                        <input type="submit" value="Registrar">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--<form action="../controllers/registro.php" method="post">
        <label for="nombre">Usuario: </label>
        <input type="text" name="usuario">
        <label for="email">E-mail: </label>
        <input type="text" name="email">
        <label for="contrasena">Contraseña: </label>
        <input type="password" name="contrasena">
        <button type="submit">Registrar</button>
    </form>-->
</body>
</html>