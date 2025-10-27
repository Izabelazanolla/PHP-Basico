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
        <h1>Resultado Final</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        /**Essa condição garante que o código só será executado se o formulário foi realmente enviado.

        👉 Evita erros caso alguém tente acessar o logica.php diretamente pelo navegador. */

        // Recebe os dados do formulário
         $num1 = (float) $_POST["num1"];
         $num2 = (float) $_POST["num2"];
         $comparador = $_POST["comparador"];

        /**$_POST é um array associativo do PHP.

        Ele guarda os valores enviados pelo formulário com o método POST.
        Cada campo do formulário é acessado pelo name que você colocou no HTML. */

        // Faz a comparação
        $resultado = "";

        switch ($comparador) {
            case ">":
              $resultado = ($num1 > $num2) ? "$num1 é maior que $num2" : "$num1 não é maior que $num2";
              break;
            case "<":
              $resultado = ($num1 < $num2) ? "$num1 é menor que $num2" : "$num1 não é menor que $num2";
              break;
            case ">=":
              $resultado = ($num1 >= $num2) ? "$num1 é maior ou igual que $num2" : "$num1 não é maior ou igual que $num2";
              break;
             case "<=":
              $resultado = ($num1 <= $num2) ? "$num1 é menor ou igual que $num2" : "$num1 não é menor ou igual que $num2";
              break;
            case "=":
              $resultado = ($num1 == $num2) ? "$num1 é igual a $num2" : "$num1 é diferente de $num2";
              break;
            default:
              $resultado = "Operador inválido.";
        }
        echo "<p>$resultado</p>";
}
?>

</div>
</body>
</html>
