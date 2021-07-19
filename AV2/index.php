<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "daw3AV2";

    //Criando Banco e Tabelas, caso não exista:
    try {
        $conn = new PDO("mysql:host=$servidor", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $nomeBanco";
        $conn->exec($sql);
        $sql = "use $nomeBanco";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS PRODUTOS (
            ID int(11) AUTO_INCREMENT PRIMARY KEY,
            codigo_barra varchar(30) NOT NULL,
            nome varchar(50) NOT NULL,
            fabricante varchar(30) NOT NULL,
            categoria varchar(30) NOT NULL,
            tipo_produto varchar(30) NOT NULL,
            preco_venda float(15) NOT NULL,
            quantidade_estoque int(4) NOT NULL,
            peso_gramas float(10) NOT NULL,
            descricao varchar(100) NOT NULL,
            link_imagem varchar(100) NOT NULL,
            data_conclusao date NOT NULL,
            ativo boolean NOT NULL
            )";
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Loja Ximbolê Bahiano</title>
</head>
<body>
    <div class="container">
        <nav id="links-menu">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Início</a></li>
                <li><a href="ControleProdutos/CadastrarProduto.php">Cadastrar Produto</a></li>
                <li><a href="ControleProdutos/AlterarProduto.php">Alterar Produto</a></li>
                <li><a href="ControleProdutos/ListarProdutos.php">Listar Produtos</a></li>
                <li><a href="ControleProdutos/ExcluirProduto.php">Excluir Produto</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="nav" align="center">
            <h3>Bem vido à loja Ximbolê Bahiano!</h3>
        </div>
    </div>
</body>
</html>