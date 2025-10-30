<?php
//Se o usuário não estiver logado, é mandado de volta pro login.
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Bem-vindo</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h2>
<a href="logout.php">Sair</a>
</body>
</html>
