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
        $dados_usuario = $_FILES["arquivo"];
        $nome_arquivo = $dados_usuario['name'];

        $nome = "";
        $email = "";
        $senha = "";
        $tipo = "";
        $perfil = "";

        $delimitador = ',';
        $cerca = '"';

        $uploaddir = 'Uploads/';
        $uploadfile = $uploaddir . basename($dados_usuario['name']);

        if (move_uploaded_file($dados_usuario['tmp_name'], $uploadfile)) {
            echo "<div class='container'><h4>Arquivo válido e enviado com sucesso</h4></div>";
        } else {
            echo "<div class='container'><h4>Possível ataque de upload de arquivo!</h4></div>";
        }

        $arquivo = fopen("Uploads/$nome_arquivo", "r") or die("Não foi possível abrir o arquivo!");

        if ($arquivo) { 

            // Ler cabecalho do arquivo
            $cabecalho = fgetcsv($arquivo, 0, $delimitador, $cerca);

            // Enquanto nao terminar o arquivo
            while (!feof($arquivo)) { 

                // Ler uma linha do arquivo
                $linha = fgetcsv($arquivo, 0, $delimitador, $cerca);
                if (!$linha) {
                    continue;
                }

                // Montar registro com valores indexados pelo cabecalho
                $registro = array_combine($cabecalho, $linha);

                // Obtendo o nome
                $nome = $registro['nome'].PHP_EOL;
                $email = $registro['email'].PHP_EOL;
                $senha = $registro['senha'].PHP_EOL;
                $tipo = $registro['tipo'].PHP_EOL;
                $perfil = $registro['perfil'].PHP_EOL;
            }
            fclose($arquivo);
        }

        $sql = "Insert into usuarios (`nome`, `email`, `senha`, `tipo`, `perfil`) VALUES ('$nome', '$email', '$senha', '$tipo', '$perfil')";

        mysqli_query($conn,$sql) or die("Erro na tentativa de inserção! Verifique o arquivo novamente.");
        echo "<div class='container'><h4>Envio de usuário realizado com sucesso!</h4></div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Upload de Usuários</title>
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
            <h3>Upload de Usuários</h3>
        </div>
        <div class="nav">
            <h4>O arquivo deve estar no formato .csv</h4>
            <h4>As colunas do csv devem ser: nome,email,senha,tipo e perfil, conforme o exemplo abaixo:</h4>
        </div>
        <div class="nav" align="center">
            <img src="exemploCSV.png">
        </div>
        <form enctype="multipart/form-data" action="UploadUsuarios.php" method="POST">
            <input type="file" name="arquivo"/><br>
            <button type="submit" class="btn btn-primary">Carregar Arquivo</button>
            <a class="btn btn-danger" href="../index.php" role="button">Cancelar</a>
        </form>
    </div>
</body>
</html>