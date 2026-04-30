<?php
    require_once "classes/Usuario.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $usuario = new Usuario();
        $usuario->criarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registrar Usuário</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>