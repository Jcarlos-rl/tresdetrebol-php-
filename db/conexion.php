<?php
    $username="root";
    $password="";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=3detrebol", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Conectado fallo" . $e->getMessage();
    }
?>