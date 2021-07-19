<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "daw3AV2";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $periodo = $_POST["periodo"];
        $preRequisito = $_POST["preRequisito"];
        $creditos = $_POST["creditos"];

        $sql = "Insert into PRODUTOS (`nome`, `periodo`, `preRequisito`, `creditos`) VALUES ('$nome', '$periodo', '$preRequisito', '$creditos')";

        mysqli_query($conn,$sql) or die("Erro na tentativa de inserção! Verifique os valores novamente.");
        echo "<div class='container'><h4>Produto cadastrada com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cadastrar Produto</title>
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
            <h3>Cadastrar Produto</h3>
        </div>
        <form action="cadastrarProduto.php" method="POST">
            <div class="form-row">

                <div class="form-group">
                <label for="nome">Nome do produto</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome">
                </div>

                <label for="codigo_barras">Código de Barras</label>
                <input type="number" class="form-control" id="codigo_barras" placeholder="Código de Barras" name="codigo_barras">
                </div>

                <div class="form-group">
                <label for="fabricante">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" placeholder="Fabricante" name="fabricante">
                </div>

                <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" id="preco" placeholder="Preço" name="preco">
                </div>

                <div class="form-group">
                <label for="quantidade_estoque">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="quantidade_estoque" placeholder="Quantidade em Estoque" name="quantidade_estoque">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoria"></select>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo"></select>
                </div>

                <div class="form-group">
                <label for="peso">Peso</label>
                <input type="number" class="form-control" id="peso" placeholder="Peso em gramas" name="peso">
                </div>

                <div class="form-group">
                <label for="data">Data de entrada</label>
                <input type="date" class="form-control" id="data" placeholder="Data de entrada" name="data">
                </div>

                <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a class="btn btn-danger" href="../index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>