<?php
    include 'headerFooter/header.php';
    require_once 'classes/Login.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = new Login();
        $login->logar($_POST['email'], $_POST['password']);
    }
?>

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
        </div>
    </main>

<?php
    include 'headerFooter/footer.php';
?>
