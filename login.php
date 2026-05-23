<?php
    require_once 'classes/Users.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $users = new Users();
        $users->logar($_POST['email'], $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Início</a></li>
                <li><a href="compras.php">Cadastrar Compras</a></li>
                <li><a href="dividendos.php">Cadastrar Dividendos</a></li>
                <li><a href="relatorio.php">Relatório</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Login:</h1>
            <form method="POST">
                <label>E-mail:</label>
                <input type="email" name="email" require>
                <label>Senha</label>
                <input type="password" name="password" require>

                <button type="submit">Entrar</button>
            </form>
            <div class='newUser'>
                <h4>Não tem conta ainda. Cadastre-se:</h4>
                <a class="botaoCadastrar" href="cadastrar.php">Cadastrar Novo Usuario</a>
            </div>
        </div>
    </main>

<?php
    include 'headerFooter/footer.php';
?>
