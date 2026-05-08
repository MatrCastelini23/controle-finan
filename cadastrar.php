<?php
    require_once 'classes/NovoUsuario.php';

    //if que verifica se ha uma requisição post sendo enviada ao servidor
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //variavel compra para chamar a classe NovoUsuario.php
        $newUser = new NovoUsuario();
        
        //armazena o resultado da checagem em uma variavel clara
        $checarEmail = $newUser->checarEmail($_POST['email']);

        if($checarEmail){
            echo 'Este email já está cadastrado!';
        } else {
            //variavel chama metodo e envia via post os dados do forms
            $newUser->novoUsuario($_POST['name'], $_POST['email'], $_POST['password']);
            echo 'Novo usuario cadastrado';
            header('Location: login.php');
            exit();
        }
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
            <h1>Cadastre-se</h1>
            <form method="POST">
                <label>Nome:</label>
                <input type="text" name="name" require>
                <label>E-mail</label>
                <input type="email" name="email" require>
                <label>Senha:</label>
                <input type="password" name="password" require>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
<?php
    include 'headerFooter/footer.php';
?>