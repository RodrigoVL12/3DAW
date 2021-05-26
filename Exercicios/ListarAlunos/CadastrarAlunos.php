<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3DAWNoite";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];

        $sql = "Insert into alunos (`nome`, `email`, `matricula`) VALUES ('$nome', '$email', '$matricula')";

        mysqli_query($conn,$sql) or die("Erro na tentativa de inserção! Verifique os valores novamente.");
        echo "<div class='container'><h4>Aluno cadastrado com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cadastrar Aluno</title>
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
            <h3>Cadastrar Aluno</h3>
        </div>
        <form action="cadastrarAlunos.php" method="POST">
            <div class="form-row">

                <div class="form-group">
                <label for="Aluno">Nome</label>
                <input type="text" class="form-control" id="Aluno" placeholder="Nome do Aluno" name="nome">
                </div>

                <div class="form-group">
                <label for="Aluno">Email</label>
                <input type="email" class="form-control" id="email" placeholder="fulano@teste.com" name="email">
                </div>

                <div class="form-group">
                <label for="Aluno">Matrícula</label>
                <input type="number" class="form-control" id="matricula" placeholder="Matrícula" name="matricula">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>