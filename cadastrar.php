<?php
    include 'headerFooter/header.php';
    require_once 'classes/NovoUsuario.php';

    //if que verifica se ha uma requisição post sendo enviada ao servidor
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //variavel compra para chamar a classe Compra.php
        $newUser = new NovoUsuario();
        //variavel chama metodo e envia via post os dados do forms
        $newUser->novoUsuario($_POST['name'], $_POST['email'], $_POST['password']);
    }
?>
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