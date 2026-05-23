<?php
    include 'headerFooter/header.php';  
    require_once 'classes/Users.php';
   // Verifica se o ID do usuário foi fornecido pela URL 
    if (!isset($_GET['id'])) {
        echo "ID do usuário não fornecido.";
    }else {
        // Se o ID for fornecido, processa a solicitação de deleção
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = new Users();
            $users->deletarUsuario($id, $_POST['senha']);
            // session_destroy();
            // header('Location: login.php');
        }
    }

?>

<main>
    <div class="container">
        <h1>Deletar Usuario</h1>
        <p>Digite sua senha para deletar:</p>
        <!-- Ler README.md para enteder a comparação com o forms de deletar -->
        <form method="POST">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <button type="submit">Deletar</button>
        </form>
    </div>
</main>


<?php
    include 'headerFooter/footer.php';
?>