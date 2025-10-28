<?php

function gerarSenha(
    int $tamanho = 12,
    bool $usarMaiusculas = true,
    bool $usarMinusculas = true,
    bool $usarNumeros = true,
    bool $usarSimbolos = true
): string {

    if ($tamanho < 5) $tamanho = 5;
    // range() cria sequências automáticas de caracteres ou números [array]
    // implode -> junta o array em uma string
    $maiusculas = implode('', range('A', 'Z'));
    $minusculas = implode('', range('a', 'z'));
    $numeros    = implode('', range('0', '9'));
    $simbolos   = '!@#$%&*()-_=+[]{}<>?';
    
   // código monta a lista de todos os caracteres que podem ser usados
    $pool = '';
    $categorias = [];

    if ($usarMaiusculas) { $pool .= $maiusculas; $categorias[] = $maiusculas; }
    if ($usarMinusculas) { $pool .= $minusculas; $categorias[] = $minusculas; }
    if ($usarNumeros)    { $pool .= $numeros;    $categorias[] = $numeros; }
    if ($usarSimbolos)   { $pool .= $simbolos;   $categorias[] = $simbolos; }

    if ($pool === '') {
        throw new InvalidArgumentException('Selecione pelo menos uma categoria!');
    }

    $senhaArray = [];

    // Garantir pelo menos um caractere de cada categoria
    foreach ($categorias as $cat) {
        $senhaArray[] = $cat[random_int(0, strlen($cat) - 1)];
    }
 // Completar o restante
    $restantes = $tamanho - count($senhaArray);
    for ($i = 0; $i < $restantes; $i++) {
        $senhaArray[] = $pool[random_int(0, strlen($pool) - 1)];
    }
    // Embaralhar (Fisher-Yates shuffle)
    for ($i = count($senhaArray) - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        [$senhaArray[$i], $senhaArray[$j]] = [$senhaArray[$j], $senhaArray[$i]];
    }
    // Transformar em string e retornar
    return implode('', $senhaArray);
}

// --- Processa os dados enviados ---
$tamanho = (int)($_POST['tamanho'] ?? 12);
$maiusculas = isset($_POST['maiusculas']);
$minusculas = isset($_POST['minusculas']);
$numeros = isset($_POST['numeros']);
$simbolos = isset($_POST['simbolos']);

$senha = gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha Gerada</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h2>🔑 Sua Senha Gerada</h2>
        <div class="senha">
            <code><?= htmlspecialchars($senha) ?></code>
        </div>

        <br>
        <a href="index.html">
            <button>Gerar Outra</button>
        </a>
    </div>
</body>
</html>
