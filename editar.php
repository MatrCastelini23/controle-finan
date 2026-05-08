<?php
    include 'headerFooter/header.php';  
    require_once 'classes/Login.php';

    $login = new Login();
    $user = $login->listarUsuario();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login->editarUsuario($_POST['id'], $_POST['name'],$_POST['email'], $_POST['senha']);
    }
?>

<main>
    <div class="container">
        <h1>Editar Usuario</h1>
        <form method="POST">
            <!-- Ler README.md para enteder a comparação com o forms de deletar -->
            <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($user['nome']) ? $user['nome'] : ''; ?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Salvar</button>
        </form>
    </div>
</main>

<?php
    include 'headerFooter/footer.php';  
?>