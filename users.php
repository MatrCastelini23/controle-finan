<?php
    include 'headerFooter/header.php';  
    require_once 'classes/Login.php';

    $users = new Login();
    $usuarios = $users->listarUsuarios();
?>

    <main>
        <div class="container">
            <h1>Todos os Usuarios</h1>
            <table>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>
                    <th>Editar:</th>
                    <th>Deletar:</th>
                </tr>
                <?php foreach ($usuarios as $linha): ?>
                    <tr>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['email'] ?></td>
                        <td><a href="editar.php?id=<?= $linha['id'] ?>">Editar</a></td>
                        <td><a href="deletar.php?id=<?= $linha['id'] ?>">Deletar</a></td>
                    </tr>
                <?php endforeach ?>    
            </table>
        </div>
    </main>

<?php
    include 'headerFooter/footer.php';  
?>