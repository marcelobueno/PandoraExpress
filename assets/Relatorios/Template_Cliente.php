<?php

require __DIR__."/../../Conexao.php";

date_default_timezone_set("America/Sao_Paulo");

$cliente = $_SESSION['relatorio_cliente']['id'];
$dataIni = strtotime($_SESSION['relatorio_cliente']['data_ini']);
$dataFim = strtotime($_SESSION['relatorio_cliente']['data_fim']);
$format = "d/m/Y";

$countIni = date("d", $dataIni);
$countFim = date("d", $dataFim);

$data = new DateTime($_SESSION['relatorio_cliente']['data_ini']);
$data_final = new DateTime($_SESSION['relatorio_cliente']['data_fim']);

$aTotalDia = [
    "total" => 0.0
];

$aTotal = [
    "total" => 0.0
];

$aDescontos = [
    "total" => 0.0
];

$bEntregas = "SELECT * FROM entregas 
        WHERE entregas.id_cliente = $cliente 
        AND entregas.status_entrega <> 'Em aberto' 
        AND entregas.status_entrega <> 'Em andamento' 
        AND entregas.status_entrega <> 'Cancelada'   
        AND entregas.data_entrega BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
$bEntregasExec = mysqli_query($conn, $bEntregas);
$totalEntregas = mysqli_num_rows($bEntregasExec);

while($bEntregasResult = mysqli_fetch_assoc($bEntregasExec)){

    $id_tabela = $bEntregasResult['id_tabela_preco'];
    $horas = floatval($bEntregasResult['horas']);

    $bTbl = "SELECT `valor_cobranca`, `tipo_cobranca` FROM tabela_preco WHERE tabela_preco.id_tabela_preco = $id_tabela";
    $bTblExec = mysqli_query($conn, $bTbl);
    $bTblResult = mysqli_fetch_assoc($bTblExec);

    $tipo_cobranca = $bTblResult['tipo_cobranca'];
    $valor_cobranca = floatval($bTblResult['valor_cobranca']);

    if($tipo_cobranca == 'Hora' && $horas != null){
        $valor_cobranca *= $horas;
    }

    $aTotal['total'] += $valor_cobranca;
}

$bDescontos = "SELECT * FROM descontos_clientes 
        WHERE id_cliente = $cliente 
        AND data_desconto BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
$bDescontosExec = mysqli_query($conn, $bDescontos);

while($bDescontosResult = mysqli_fetch_assoc($bDescontosExec)){
    
    $valor = $bDescontosResult['valor'];
    
    $aDescontos['total'] += $valor;
}

$totalGeral = [
    'total' => 0.0
];

$totalGeral['total'] += ($aTotal['total'] - $aDescontos['total']);

?>
<html>
    <head>
        <title>Relatório - <?= $_SESSION['relatorio_cliente']['nome_cliente']; ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap">
        <style>
            @page {
                margin: 70px;
            }
            .center {
                text-align: center;
            }
            .logoEmpresa {
                width: 200px;
            }
            h4 {
                font-family: 'Ubuntu', sans-serif;
            }
            .headerContent {
                font-size: 11px;
            }
            .text-advert {
                font-size: 8px;
            }
        </style>
    </head>
    <body>
        <div class="center">
            <img class="logoEmpresa" src="https://i.imgur.com/ZRbEkKR.png">
        </div>
        <div class="text-center mt-3">
            <h4>Relatório de entregas</h4>
        </div>
        <div class="headerContent">
            <span>
                <b>Cliente: </b><?= $_SESSION['relatorio_cliente']["nome_cliente"]; ?><br>
                <b>CPF/CNPJ: </b><?= FormatarDoc($_SESSION['relatorio_cliente']["cnpj"]); ?><br>
                <b>De: </b><?= date($format, $dataIni); ?> <b>Até: </b><?= date($format, $dataFim); ?>
            </span>
        </div>
        <div class="dropdown-divider"></div>
        <!--Início das tabelas-->
            <h6 class="text-center">Ordens de Serviço</h6>

            <?php
                $buscaOS = "SELECT * FROM `ordem_servico` 
                        WHERE ordem_servico.id_cliente = $cliente 
                        AND status_os = 'Fechada'  
                        AND ordem_servico.data_os BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
                $buscaOSExec = mysqli_query($conn, $buscaOS);
                $buscaOSResult = mysqli_num_rows($buscaOSExec);
            ?>

            <span class="headerContent">Ordens de Serviço encerradas no período: <b><?= $buscaOSResult; ?></b></span>
            <br><br>
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="headerContent"><b>Data</b></th>
                        <th class="text-center headerContent" width="120px"><b>Número O.S</b></th>
                        <th class="text-center headerContent" width="150px"><b>Total entregas</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($buscaOSRows = mysqli_fetch_assoc($buscaOSExec)){
                        $id_os = $buscaOSRows['id_ordem']; ?>
                        <tr>
                            <td class="headerContent"><?= $buscaOSRows['data_os']; ?></td>
                            <td class="headerContent text-center"><?= $buscaOSRows['id_ordem']; ?></td>
                            <td class="headerContent text-center">
                                <?php
                                    $bEntOS = "SELECT `id_entrega` FROM entregas WHERE id_ordem_servico = $id_os";
                                    $bEntOSExec = mysqli_query($conn, $bEntOS);
                                    $bEntOSResult = mysqli_num_rows($bEntOSExec);

                                    echo $bEntOSResult;
                                ?>
                            </td>
                        </tr>
                    <?php }
                ?>
                </tbody>
            </table>
            <div class="dropdown-divider"></div>
            <h6 class="text-center">Entregas</h6>

            <span class="headerContent">Total de entregas concluídas no período: <b><?= $totalEntregas; ?></b></span>
            <br><br>
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="headerContent"><b>Tabela</b></th>
                        <th class="text-center headerContent" width="70px"><b>Preço</b></th>
                        <th class="text-center headerContent" width="150px"><b>Total entregas</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $buscaTabelas = "SELECT `id_tabela_preco`, `nome_tabela`, `valor_cobranca` 
                                    FROM `tabela_preco` 
                                    WHERE tabela_preco.id_cliente = $cliente";
                    $buscaTabelasExec = mysqli_query($conn, $buscaTabelas);
                    while($rows = mysqli_fetch_assoc($buscaTabelasExec))
                    {

                        $id_tabela = $rows['id_tabela_preco']; ?>
                        <tr>
                            <td class="headerContent"><?= $rows['nome_tabela']; ?></td>
                            <td class="headerContent text-center"><?= $rows['valor_cobranca']; ?></td>
                            <td class="headerContent text-center">
                                <?php
                                    $buscaEntregas = "SELECT id_entrega, data_entrega, status_entrega, horas FROM entregas
                                            WHERE id_cliente = $cliente
                                            AND entregas.id_tabela_preco = $id_tabela
                                            AND status_entrega <> 'Em aberto'
                                            AND status_entrega <> 'Em andamento'
                                            AND status_entrega <> 'Cancelada'
                                            AND data_entrega BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";

                                    $buscaEntregasExec = mysqli_query($conn, $buscaEntregas);
                                    $buscaEntregasResult = mysqli_num_rows($buscaEntregasExec);

                                    echo $buscaEntregasResult;
                                ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        <!--Fim das tabelas-->
        <div class="dropdown-divider"></div>
        <br><br>
        <h6 class="text-center">Totais</h6>
        <h5 class="">Total do período: R$<?= number_format($aTotal['total'],2,",","."); ?>*</h5>
        <h5>Descontos: R$<?= number_format($aDescontos['total'],2,",","."); ?></h5>
        <h5>Total Geral: R$<?= number_format($totalGeral['total'],2,",","."); ?></h5>
        <span class="headerContent font-weight-lighter">*O valor total se refere a soma das entregas conluídas até a data de fechamento.</span>
    </body>
</html>