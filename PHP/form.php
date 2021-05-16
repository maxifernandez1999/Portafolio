<?php
    $mensaje = isset($_POST["menssage"]) ? $_POST["menssage"] : NULL;
    $user = isset($_POST["user"]) ? $_POST["user"] : NULL;
    $email = isset($_POST["email"]) ? $_POST["email"] : NULL; 

    $host = 'localhost';
    $dataBase = 'usuariosPortfolio_db';
    $user = "root";
    $pass = "";
    try {
        $objetoPDO = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $user, $pass);

    } catch (PDOException $e) {
        print "Error!!!<br/>" . $e->getMessage();
        die();
    }
    $sql = 'INSERT INTO usuariosPortfolio (nombre, email, mensaje) VALUES(:nombre, :email, :mensaje)';
    $consulta = $objetoPDO->prepare($sql);
    $consulta->bindValue(':nombre', $user, PDO::PARAM_STR);
    $consulta->bindValue(':email', $email, PDO::PARAM_STR);
    $consulta->bindValue(':mensaje', $mensaje, PDO::PARAM_STR);
    
    $consulta->execute();

?>