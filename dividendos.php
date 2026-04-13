<?php
include 'headerFooter/header.php';
require_once 'classes/Dividendo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dividendo = new Dividendo();
    $dividendo->adicionarDividendo($_POST['ativo'], $_POST['valor'], $_POST['data_recebimento']);
    echo "Dividendo registrado com sucesso!";
}
?>
<main>
    <div class="container">
        <h1>Cadastrar Dividendos</h1>
        <form method="POST">
            <label>Ativo:</label>
            <input type="text" name="ativo" required><br>
            <label>Valor Recebido:</label>
            <input type="number" step="0.01" name="valor" required><br>
            <label>Data de Recebimento:</label>
            <input type="date" name="data_recebimento" required><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</main>    
<?php
    include 'headerFooter/footer.php';
?>