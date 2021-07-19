<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "daw3AV2";

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
    <title>Listar Produtos</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Início</a></li>
                <li><a href="CadastrarProduto.php">Cadastrar Produto</a></li>
                <li><a href="AlterarProduto.php">Alterar Produto</a></li>
                <li><a href="ListarProdutos.php">Listar Produtos</a></li>
                <li><a href="ExcluirProduto.php">Excluir Produto</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Listar Produtos</h3>
        </div>
        <?php
            $sql = "SELECT * FROM Produtos";
            $result = $conn->query($sql);

            //Caso o número de Produtos cadastradas seja igual a zero, 
            //será retornada uma mensagem com o devido aviso, caso contrário,
            //será exibida uma tabela com todas.
            if ($result->num_rows == 0){
                echo "<h3>Não há dados na tabela para serem exibidos</h3><br>";
                echo "<h4>Por favor, cadastre algum Produto.</h4>";
                echo '<a class="btn btn-primary" href="CadastrarProduto.php" role="button">Cadastrar Agora</a>  ';
                echo '<a class="btn btn-danger" href="index.php" role="button">Cancelar</a>';
            }else{
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th scope='col'>Código</th>";
                echo "<th scope='col'>Produto</th><th scope='col'>Período</th>";
                echo "<th scope='col'>Pré Requisito</th><th scope='col'>Créditos</th>";
                
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'> " . $linha["ID"] . "</th>";
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