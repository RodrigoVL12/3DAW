<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "DawNoiteFaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
        return;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Listar Disciplinas</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="index.html">Início</a></li>
                <li><a href="CadastrarDisciplina.php">Cadastrar Disciplina</a></li>
                <li><a href="AlterarDisciplina.php">Alterar Disciplina</a></li>
                <li><a href="ListarDisciplinas.php">Listar Disciplinas</a></li>
                <li><a href="ExcluirDisciplina.php">Excluir Disciplina</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Listar Disciplinas</h3>
        </div>
        <?php
            $sql = "SELECT * FROM disciplinas";
            $result = $conn->query($sql);

            if ($result->num_rows == 0){
                echo "<h3>Não há dados na tabela para serem exibidos</h3><br>";
                echo "<h4>Por favor cadastre alguma disciplina.</h4>";
                echo '<a class="btn btn-primary" href="CadastrarDisciplina.php" role="button">Cadastrar Agora</a>  ';
                echo '<a class="btn btn-danger" href="index.html" role="button">Cancelar</a>';
            }else{
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Código</th>";
                echo "<th scope='col'>Disciplina</th><th scope='col'>Período</th>";
                echo "<th scope='col'>Pré Requisito</th><th scope='col'>Créditos</th>";
                
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'> " . $linha["id"] . "</th>";
                    echo "<td> " . $linha["nome"] . "</td>";
                    echo "<td> " . $linha["periodo"] . "</td>";
                    echo "<td> " . $linha["preRequisito"] . "</td>";
                    echo "<td> " . $linha["creditos"] . "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>