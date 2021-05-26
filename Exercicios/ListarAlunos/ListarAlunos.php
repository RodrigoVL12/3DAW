<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3DAWNoite";


    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Listar Alunos</title>
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
            <h3>Listar Alunos</h3>
        </div>
        <?php
            $sql = "SELECT * FROM alunos";
            $result = $conn->query($sql);
            $numero_dados = $result->num_rows;

            //Caso o número de alunos cadastrados seja igual a zero, 
            //será retornada uma mensagem com o devido aviso, caso contrário,
            //será exibida uma tabela com todos.
            if ($numero_dados == 0){
                echo "<h3>Não há dados na tabela para serem exibidos</h3><br>";
                echo "<h4>Por favor, cadastre algum Aluno.</h4>";
                echo '<a class="btn btn-primary" href="CadastrarAlunos.php" role="button">Cadastrar Agora</a>  ';
                echo '<a class="btn btn-danger" href="index.php" role="button">Cancelar</a>';
            }else{
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Código</th>";
                echo "<th scope='col'>Aluno</th>";
                echo "<th scope='col'>Email</th>";
                echo "<th scope='col'>Matrícula</th>";
                
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'> " . $linha["id"] . "</th>";
                    echo "<td> " . $linha["nome"] . "</td>";
                    echo "<td> " . $linha["email"] . "</td>";
                    echo "<td> " . $linha["matricula"] . "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>