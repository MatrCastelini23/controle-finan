<?php
    include 'headerFooter/header.php';
    require_once 'classes/Ativo.php';
    require_once 'classes/Dividendo.php';

    $ativo = new Ativo();
    $dividendo = new Dividendo();
    $ativos = $ativo->listarValorAtivos();
    $dividendos = $dividendo->listarDividendos();
    $totalInvestido = 0;
    $totalDividento = 0;

    foreach($ativos as $item){
        $totalInvestido = $totalInvestido + $item['valor_unitario'];
    }

    foreach($dividendos as $item){
        $totalDividento = $totalInvestido + $item['valor'];
    }

?>
    <main>
        <section class="dashboard">
            <h1>Bem-vindo à Gestão de Ativos</h1>
            <p>Este sistema ajuda você a gerenciar seus investimentos em ativos e os dividendos recebidos. Use o menu acima para navegar pelas opções.</p>
            <div class="cards">
                <div class="card">
                    <h2>Total Investido</h2>
                    <p>R$ <?= $totalInvestido ?></p>
                </div>
                <div class="card">
                    <h2>Total de Dividendos</h2>
                    <p>R$ <?= $totalDividento ?></p>
                </div>
            </div>
        </section>
    </main>

<?php
    include 'headerFooter/footer.php';
?>