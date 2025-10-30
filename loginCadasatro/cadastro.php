<?php

$arquivo='arquivo.txt';

if($_SERVER['REQUEST_METHOD']==='POST'){
    //trim remove espaços extras
    $usuario= trim($_POST['usuario']);
    $senha= trim($_POST['senha']);

    if($usuario!== '' && $senha!== ''){
        $linhas= file($arquivo, FILE_IGNORE_NEW_LINES);
        $existe=false;

        foreach($linhas as $linha){
            list($userSalvo) = explode(':',$linha);// separa o nome e senha
            if ($userSalvo===$usuario) {
                $existe=true;
                break;
            }
        }
        if($existe){
            echo"<p>Usuário já Cadastrado !</p>";
        } else{
            $senhaCript=password_hash($senha, PASSWORD_DEFAULT);
            file_put_contents($arquivo,"$usuario:$senhaCript\n", FILE_APPEND);
            echo"<p>Cadastro Realizado com Suceso !!!</p>";
        }
    } else{
        echo"<p>Preencha todos os campos</p>";
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Cadastro de Usuário</h2>
<form method="post">
    <label>Usuário:</label>
    <input type="text" name="usuario" required><br>
    <label>Senha:</label>
    <input type="password" name="senha" required><br>
    <button type="submit">Cadastrar</button>
</form>
<p>Já tem conta? <a href="login.php">Fazer login</a></p>
</body>
</html>