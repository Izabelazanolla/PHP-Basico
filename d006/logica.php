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
        /**Essa condição garante que o código só será executado se o formulário foi realmente enviado.

        👉 Evita erros caso alguém tente acessar o logica.php diretamente pelo navegador. */

        // Recebe os dados do formulário
         $num1 = (float) $_POST["num1"];
         $num2 = (float) $_POST["num2"];
         $soma=0;
         $n=$num1;

        /**$_POST é um array associativo do PHP.

        Ele guarda os valores enviados pelo formulário com o método POST.
        Cada campo do formulário é acessado pelo name que você colocou no HTML. */

        // Faz a comparação
        
        while($n<=$num2){
          if($n%2==0){
            $soma+=$n;
          }
        
          $n++;
        }
        $resultado = $soma;
        echo "<p>$resultado</p>";
}
?>

</div>
</body>
</html>
