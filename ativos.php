<?php
include 'headerFooter/header.php';
require_once 'classes/Ativo.php';

$ativo = new Ativo();
$relatorio = $ativo->calcularPrecoMedio();
?>

<main>
    <div class="container">
        <h1>Relatório de Ativos</h1>
        <table border="1">
            <tr>
                <th>Ativo</th>
                <th>Total Comprado</th>
                <th>Preço Médio</th>
            </tr>
            <?php foreach ($relatorio as $linha): ?>
                <tr>
                    <td><?= $linha['ativo'] ?></td>
                    <td><?= $linha['total_quantidade'] ?></td>
                    <td><?= number_format($linha['preco_medio'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>

<?php
    include 'headerFooter/footer.php';            
?>