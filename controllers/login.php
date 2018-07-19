<?php
    require_once('../db/conexion.php');

    if(!empty($_POST)){
        $user = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $md5=MD5($pass);
        $sql = $conn->prepare("SELECT * FROM user WHERE nombreUsuario ='$user' AND password ='$md5'");
        $sql->execute();
        $result = $sql->fetch();
        if($result>0){
            session_start();
            $_SESSION['id']=$result['idUser'];
            $_SESSION['name']=$result['nombreUsuario'];
             $_SESSION['email']=$result['email'];
            $_SESSION['isAdmin']=$result['is_admin'];
            if($_SESSION['isAdmin']==1){
                header('Location: ../view/admin/home.php');
            }else{
                header('Location: ../index.php');
            }
        } else{
            $md5=MD5($pass); 
            $sql2 = $conn->prepare("SELECT * FROM user WHERE nombreUsuario ='$user'");
            $sql2->execute();
            $sql3 = $conn->prepare("SELECT * FROM user WHERE nombreUsuario ='$user' AND password ='$md5'");
            $sql3->execute();    
            $sql4 = $conn->prepare("SELECT * FROM user WHERE password ='$md5'");
            $sql4->execute();
            $result2 = $sql2->fetch();
            $result3 = $sql3->fetch();
            $result4 = $sql3->fetch();
                if($result2>0){
                if($result3<1){
                    header('Location: ../view/login.php?error_p=login'); //p
                }
            }else{
                header('Location: ../view/login.php?error=login');
            }     
        } //
    }
?>