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
        $nomeOld = $_POST["nomeOld"];
        $nome = $_POST["nome"];
        $periodo = $_POST["periodo"];
        $preRequisito = $_POST["preRequisito"];
        $creditos = $_POST["creditos"];

        $sql = "UPDATE disciplinas SET nome='$nome',periodo = '$periodo', preRequisito='$preRequisito', creditos='$creditos' WHERE nome='$nomeOld'";

        mysqli_query($conn,$sql) or die("Erro na tentativa de alteração! Verifique os valores novamente.");
        echo "<div class='container'><h4>Disciplina alterada com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Alterar Disciplina</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="../index.html">Início</a></li>
                <li><a href="CadastrarDisciplina.php">Cadastrar Disciplina</a></li>
                <li><a href="AlterarDisciplina.php">Alterar Disciplina</a></li>
                <li><a href="ListarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="ExcluirDisciplina.php">Excluir Disciplina</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Selecione a disciplina que deseja alterar</h3>
        </div>

        <?php
            echo "<form action='AlterarDisciplina.php' method='POST'>";
            echo '<div class="form-group">';
            echo '<label for="Disciplinas">Disciplinas</label>';
            echo '<select class="form-control" name="nomeOld">';
            $sql = "SELECT * FROM disciplinas";
            $result = $conn->query($sql);
            while ($linha = $result->fetch_assoc()) {
                $valor = $linha["nome"];
                echo "<option value = '$valor'>" . $linha["nome"] . "</option>";
            }
            echo "</select>";
            echo "</div>";
            echo '<div class="nav" align="center">';
            echo '<h3>Insira os novos dados</h3>';
            echo '</div>';
            echo '<div class="form-row">';
            echo '<div class="form-group">';
            echo '<label for="Disciplina">Nome</label>';
            echo '<input type="text" class="form-control" id="Disciplina" placeholder="Nome da Disciplina" name="nome">';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="periodo">Período</label>';
            echo '<select class="form-control" name="periodo">';
            echo '<option value = 1>1</option>';
            echo '<option value = 2>2</option>';
            echo '<option value = 3>3</option>';
            echo '<option value = 4>4</option>';
            echo '<option value = 5>5</option>';
            echo '</select>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="preRequisito">Pré Requisito</label>';
            echo '<select class="form-control" name="preRequisito">';
            echo '<option value = "Livre">Nenhuma Opção</option>';
            $sql = "SELECT * FROM disciplinas";
            $result = $conn->query($sql);
            while ($linha = $result->fetch_assoc()) {
                $valor = $linha["nome"];
                echo "<option value = '$valor'>" . $linha["nome"] . "</option>";
            }
            echo '</select>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="creditos">Créditos</label>';
            echo '<input type="number" class="form-control" id="creditos" placeholder="Quantidade de créditos" name="creditos"><br><br>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Alterar</button>   ';
            echo '<a class="btn btn-danger" href="../index.html" role="button">Cancelar</a>';
            echo '</div>';
            echo '</form>';
        ?>
    </div>
</body>
</html>