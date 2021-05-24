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
        $periodo = $_POST["periodo"];
        $preRequisito = $_POST["preRequisito"];
        $creditos = $_POST["creditos"];

        $sql = "Insert into Usuarios (`nome`, `periodo`, `preRequisito`, `creditos`) VALUES ('$nome', '$periodo', '$preRequisito', '$creditos')";

        mysqli_query($conn,$sql) or die("Erro na tentativa de inserção! Verifique os valores novamente.");
        echo "<div class='container'><h4>Usuarios cadastrada com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cadastrar Usuarios</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
            <li><a href="../index.php">Início</a></li>
                <li><a href="../Disciplinas/CadastrarDisciplina.php">Cadastrar Disciplina</a></li>
                <li><a href="../Disciplinas/AlterarDisciplina.php">Alterar Disciplina</a></li>
                <li><a href="../Disciplinas/ListarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="../Disciplinas/ExcluirDisciplina.php">Excluir Disciplina</a></li>
                <li><a href="UploadUsuarios.php">Carregar um usuário</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Cadastrar Usuarios</h3>
        </div>
        <form action="cadastrarUsuarios.php" method="POST">
            <div class="form-row">

                <div class="form-group">
                <label for="Usuarios">Nome</label>
                <input type="text" class="form-control" id="Usuarios" placeholder="Nome da Usuarios" name="nome">
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
                            $sql = "SELECT * FROM Usuarios";
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
                <a class="btn btn-danger" href="../index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>