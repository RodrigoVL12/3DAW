<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "DawNoiteFaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("<br><h2>Conexão com erro: " . $conn->connect_error . "</h2>");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $valido = TRUE;

        $verificacao = "SELECT * FROM disciplinas";
        $result = $conn->query($verificacao);
        while ($linha = $result->fetch_assoc()) {
            $valor = $linha["preRequisito"];
            if ($valor == $nome){
                echo '<div class="container"><h3>Não foi possível excluir a disciplina ' . $nome . ', pois ela é pre requisito de ' . $linha["nome"] . '</h3>';
                $valido = FALSE;
                break;
            }
        }
        if ($valido == TRUE){
            $sql = "DELETE FROM disciplinas WHERE nome='$nome'";
            mysqli_query($conn,$sql) or die("Erro na tentativa de exclusão! Verifique os valores novamente.");
            echo "<div class='container'><h4>Disciplina excluída com sucesso!</h4></div>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Excluir Disciplina</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Início</a></li>
                <li><a href="CadastrarDisciplina.php">Cadastrar Disciplina</a></li>
                <li><a href="AlterarDisciplina.php">Alterar Disciplina</a></li>
                <li><a href="ListarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="ExcluirDisciplina.php">Excluir Disciplina</a></li>
                <li><a href="../Usuarios/UploadUsuarios.php">Carregar um usuário</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Selecione a disciplina que deseja excluir</h3>
        </div>

        <?php
            echo "<form action='ExcluirDisciplina.php' method='POST'>";
            echo '<div class="form-group">';
            echo '<label for="Disciplinas">Disciplinas</label>';
            echo '<select class="form-control" name="nome">';
            $sql = "SELECT * FROM disciplinas";
            $result = $conn->query($sql);
            while ($linha = $result->fetch_assoc()) {
                $valor = $linha["nome"];
                echo "<option value = '$valor'>" . $linha["nome"] . "</option>";
            }
            echo "</select><br>";
            echo '<button type="submit" class="btn btn-primary">Excluir</button>  ';
            echo '<a class="btn btn-danger" href="../index.php" role="button">Cancelar</a>';
            echo "</div>";
        ?>
    </div>
</body>
</html>