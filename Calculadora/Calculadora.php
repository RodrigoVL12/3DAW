<?php
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $op = $_POST["op"];
    $resultado = 0;

    if ($op == "soma"){
        $resultado = somar($n1, $n2);
    }
    if ($op == "subt"){
        $resultado = subtrair($n1, $n2);
    }
    if ($op == "mult"){
        $resultado = multiplicar($n1, $n2);
    }
    if ($op == "divs"){
        $resultado = dividir($n1, $n2);
    }

    function somar(int $n1, int $n2){
        return $n1 + $n2;
    }
    function subtrair(int $n1, int $n2){
        return $n1 - $n2;
    }
    function multiplicar(int $n1, int $n2){
        return $n1 * $n2;
    }
    function dividir(int $n1, int $n2){
        return $n1 / $n2;
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="Calculadora.php" method="POST">
            <label >Primeiro  Número:</label>
            <input type="number" id="n1" name="n1" /><br><br>

            <label >Segundo  Número:</label>
            <input type="number" id="n2" name="n2" /><br><br>

            <label for="op">Escolha a operação:</label>
            <select name="op">
                <option value="soma">Soma</option>
                <option value="subt">Subtração</option>
                <option value="mult">Multiplicação</option>
                <option value="divs">Divisão</option>
            </select>
            <br><br>
            <input type="submit" value="calcular" />
        </form>
    </div>

    <h1>Resultado:</h1>
    <?php
        echo "$resultado";
    ?>
</body>
</html>