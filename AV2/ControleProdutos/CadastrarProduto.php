<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "daw3AV2";

$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
if ($conn->connect_error) {
    die("Conexão com erro: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $codigo_barras = $_GET["codigo_barras"];
    $fabricante = $_GET["fabricante"];
    $preco = $_GET["preco"];
    $quantidade_estoque = $_GET["quantidade_estoque"];
    $categoria = $_GET["categoria"];
    $tipo = $_GET["tipo"];
    $peso = $_GET["peso"];
    $data = $_GET["data"];
    $descricao = $_GET["descricao"];
    $img = $_GET["img"];

    $sql = "insert into `PRODUTOS` (
            `nome`, `codigo_barras`, `fabricante`, `preco`, `quantidade_estoque`, `categoria`, `tipo`, `peso`, `data`, `descricao`, `img`
        ) VALUES (
            '$nome', '$codigo_barras', '$fabricante', '$preco', '$quantidade_estoque', '$categoria', '$tipo', '$peso', '$data', '$descricao' ,'$img'
        )";
    if ($conn->query($sql) == TRUE) {
        echo json_encode("Produto $nome Inserido com Sucesso");
    } else {
        echo json_encode("insert error: ");
    }

}

?>