<?php
session_start();
$arquivo = 'usuarios.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    $logado = false;

    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        foreach ($linhas as $linha) {
            list($userSalvo, $senhaSalva) = explode(':', $linha);
            //password_verify($senha, $senhaSalva) compara as senhas
            if ($usuario === $userSalvo && password_verify($senha, $senhaSalva)) {
                $logado = true;
                //gurda  ome do usuário em uma sessão
                $_SESSION['usuario'] = $usuario;
                header("Location: home.php");
                exit;
            }
        }
    }

    if (!$logado) {
        echo "<p style='color:red;'>Usuário ou senha incorretos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>
<form method="post">
    <label>Usuário:</label>
    <input type="text" name="usuario" required><br>
    <label>Senha:</label>
    <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
<p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>
