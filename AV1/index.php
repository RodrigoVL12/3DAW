<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "dawnoitefaeterj";

    try {
        $conn = new PDO("mysql:host=$servidor", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $nomeBanco";
        $conn->exec($sql);
        $sql = "use $nomeBanco";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS Disciplinas (
            ID int(11) AUTO_INCREMENT PRIMARY KEY,
            nome varchar(30) NOT NULL,
            periodo int(3) NOT NULL,
            preRequisito varchar(30) NOT NULL,
            creditos int(4) NOT NULL
            )";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS Usuarios (
            ID int(11) AUTO_INCREMENT PRIMARY KEY,
            nome varchar(30) NOT NULL,
            email varchar(30) NOT NULL,
            senha varchar(15) NOT NULL,
            tipo varchar(15) NOT NULL,
            perfil varchar(15) NOT NULL
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Controle de Disciplinas</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Início</a></li>
                <li><a href="Disciplinas/CadastrarDisciplina.php">Cadastrar Disciplina</a></li>
                <li><a href="Disciplinas/AlterarDisciplina.php">Alterar Disciplina</a></li>
                <li><a href="Disciplinas/ListarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="Disciplinas/ExcluirDisciplina.php">Excluir Disciplina</a></li>
                <li><a href="Usuarios/UploadUsuarios.php">Carregar um usuário</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Controle de Disciplinas</h3>
        </div>
    </div>
</body>
</html>