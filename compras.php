<?php
    include 'headerFooter/header.php';
    require_once 'classes/Compra.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $compra = new Compra();
        $compra->adicionarCompra($_POST['ativo'], $_POST['quantidade'], $_POST['valor_unitario'], $_POST['data_compra']);
        echo "Compra adicionada com sucesso!";
    }
?>

<main>
    <div class="container">
        <h1>Cadastrar Compra</h1>
        <form method="POST">
            <label>Ativo:</label>
            <input type="text" name="ativo" required><br>
            <label>Quantidade:</label>
            <input type="number" name="quantidade" required><br>
            <label>Valor Unitário:</label>
            <input type="number" step="0.01" name="valor_unitario" required><br>
            <label>Data da Compra:</label>
            <input type="date" name="data_compra" required><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</main>

<?php

    include 'headerFooter/footer.php';

?>