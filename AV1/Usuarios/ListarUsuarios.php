<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "DawNoiteFaeterj";

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
    <title>Listar Usuários</title>
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
                <li><a href="UploadUsuarios.php">Carregar Usuário</a></li>
                <li><a href="ListarUsuarios.php">Listar Usuários</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Listar Usuários</h3>
        </div>
        <?php
            $sql = "SELECT * FROM Usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows == 0){
                echo "<h3>Não há dados na tabela para serem exibidos</h3><br>";
                echo "<h4>Por favor faça o upload de algum Usuário.</h4>";
                echo '<a class="btn btn-primary" href="UploadUsuarios.php" role="button">Enviar Agora</a>  ';
                echo '<a class="btn btn-danger" href="index.php" role="button">Cancelar</a>';
            }else{
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Código</th>";
                echo "<th scope='col'>Usuário</th>";
                echo "<th scope='col'>Email</th>";
                echo "<th scope='col'>Tipo</th>";
                echo "<th scope='col'>Perfil</th>";
                
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'> " . $linha["ID"] . "</th>";
                    echo "<td> " . $linha["nome"] . "</td>";
                    echo "<td> " . $linha["email"] . "</td>";
                    echo "<td> " . $linha["tipo"] . "</td>";
                    echo "<td> " . $linha["perfil"] . "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>