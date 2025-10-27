<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h2>Soma dos numeros PARES no intervalo</h2>
       <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = (float) $_POST["num1"];
    $num2 = (float) $_POST["num2"];
    $op = $_POST["op"];

    $resultado = "";

    switch ($op) {
        case "+":
            $resultado = $num1 + $num2;
            break;
        case "-":
            $resultado = $num1 - $num2;
            break;
        case "*":
            $resultado = $num1 * $num2;
            break;
        case "/":
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Erro: divisão por zero!";
            }
            break;
        default:
            $resultado = "Operador inválido.";
    }

    echo "<div class='caixa'><h2>Resultado:</h2><p>$num1 $op $num2 = $resultado</p></div>";
}
?>


</div>
</body>
</html>
