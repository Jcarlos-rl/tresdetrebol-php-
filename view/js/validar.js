function validar(){
    var usuario, email,contrasena, calle, numero, cp, telefono, expresion;
    usuario= document.getElementById("usuario").value;
   email = document.getElementById("email").value;
   contrasena = document.getElementById("contrasena").value;
  calle = document.getElementById("calle").value;
   numero = document.getElementById("numero").value;
   cp = document.getElementById("cp").value;
   telefono = document.getElementById("tel").value;
   expresion = /\w+@\w+\.+[a-z]/;
    if (usuario === "" || email===""|| contrasena==="" || calle==="" || numero===""|| cp==="" || telefono===""){
        alert("No seas pendejo debes llenar todos los campos");
        return false;
    } 
    if (usuario.length>40) {
        alert("no mames apoco tienes el nombre mas grande del mundo?, para de mamar y pon tu nombre");
        return false;
    }
     if(usuario.length < 3 ){
        alert("el nombre de usuario es muy corto ");
        return false;
    }
    if(!expresion.test(email)){
        alert("El correo no es válido, debe ser de la forma usuario@dominio.com");
        return false;
    }
    if(contrasena.length < 6 ){
        alert("La contraseña debe tener al menos 6 digitos ");
        return false;
    }
    if(isNaN(numero)){
        alert("Debes ingresar un numero para el campo numero");
        return false;
    }else{
        if(numero < 0){
            alert("el numero no puede ser negativo")
            return false;
        }
    }
    if(isNaN(cp)){
        alert("El codigo postal ingresado no es valido, debes ingresar un numero de 5 digitos pe: 76430");
        return false;
    }
    if(cp.length<5 || cp.length>5){
        alert("El telefono ingresado no es valido, debes ingresar un numero de 10 digitos pe: 2349981602");
        return false;
    }
    if(telefono.length < 10 || telefono.length > 10  ){
        alert("El numero de telefono debe tener 10 caracteres");
        return false;
    }
    if(isNaN(telefono)){
        alert("El telefono ingresado no es valido, debes ingresar un numero de 10 digitos pe: 2349981602");
        return false;
    }
}   

function validar_login(){
    var usr, pass;
    usr= document.getElementById("usuario").value;
   pass = document.getElementById("contrasena").value;
    if (usuario === "" ||  contrasena==="" ){
        alert("No seas pendejo debes llenar todos los campos");
        return false;
    } 
}   
