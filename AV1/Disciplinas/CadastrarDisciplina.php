<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "DawNoiteFaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $periodo = $_POST["periodo"];
        $preRequisito = $_POST["preRequisito"];
        $creditos = $_POST["creditos"];

        $sql = "Insert into DISCIPLINAS (`nome`, `periodo`, `preRequisito`, `creditos`) VALUES ('$nome', '$periodo', '$preRequisito', '$creditos')";

        mysqli_query($conn,$sql) or die("Erro na tentativa de inserção! Verifique os valores novamente.");
        echo "<div class='container'><h4>Disciplina cadastrada com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cadastrar Disciplina</title>
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
            <h3>Cadastrar Disciplina</h3>
        </div>
        <form action="cadastrarDisciplina.php" method="POST">
            <div class="form-row">

                <div class="form-group">
                <label for="Disciplina">Nome</label>
                <input type="text" class="form-control" id="Disciplina" placeholder="Nome da Disciplina" name="nome">
                </div>

                <div class="form-group">
                    <label for="periodo">Período</label>
                    <select class="form-control" name="periodo">
                        <option value = 1>1</option>
                        <option value = 2>2</option>
                        <option value = 3>3</option>
                        <option value = 4>4</option>
                        <option value = 5>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="preRequisito">Pré Requisito</label>
                    <select class="form-control" name="preRequisito">
                        <option value = "Livre">Nenhuma Opção</option>
                        <?php
                            $sql = "SELECT * FROM disciplinas";
                            $result = $conn->query($sql);
                            while ($linha = $result->fetch_assoc()) {
                                $valor = $linha["nome"];
                                echo "<option value = '$valor'>" . $linha["nome"] . "</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="creditos">Créditos</label>
                    <input type="number" class="form-control" id="creditos" placeholder="Quantidade de créditos" name="creditos"><br><br>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a class="btn btn-danger" href="../index.html" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>