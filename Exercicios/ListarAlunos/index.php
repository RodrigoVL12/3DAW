<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3DAWNoite";

    //Criando Banco e Tabelas, caso não exista:
    try {
        $conn = new PDO("mysql:host=$servidor", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $nomeBanco";
        $conn->exec($sql);
        $sql = "use $nomeBanco";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS alunos (
            id int(5) AUTO_INCREMENT PRIMARY KEY,
            nome varchar(30) NOT NULL,
            email varchar(30) NOT NULL,
            matricula int(10) NOT NULL
            )";
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Controle de Alunos</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Início</a></li>
                <li><a href="CadastrarAlunos.php">Cadastrar Alunos</a></li>
                <li><a href="ListarAlunos.php">Listar Alunos</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Controle de Alunos</h3>
        </div>
    </div>
</body>
</html>