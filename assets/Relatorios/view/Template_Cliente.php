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

$aTotalDia = [
    "total" => 0.0
];

$aTotalGeral = [
    "total" => 0.0
]
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
        <!--Início das tabelas-->
        <?php
        for($i = $countIni; $i <= $countFim; $i++)
        { ?>
            <div class="mt-3">
                <?php
                    $buscaOS = "SELECT `id_ordem` FROM `ordem_servico` 
                                WHERE ordem_servico.data_os = '{$data->format("Y-m-d")}'
                                AND ordem_servico.id_cliente = $cliente";
                    $buscaOSExec = mysqli_query($conn, $buscaOS);
                    $buscaOSResult = mysqli_num_rows($buscaOSExec);
                ?>
                <table class="table table-sm table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th><?= $data->format("d/m/Y"); ?></th>
                            <th class="text-center">Totais</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b class="font-weight-light">Ordens de Serviço:</b></td>
                            <td class="text-center"><?= $buscaOSResult; ?></td>
                            <?php
                                $buscaTabelas = "SELECT `id_tabela_preco`, `nome_tabela`, `valor_cobranca` 
                                FROM `tabela_preco` 
                                WHERE tabela_preco.id_cliente = $cliente 
                                AND tabela_preco.nome_tabela NOT LIKE '%Retorno%'";
                                $buscaTabelasExec = mysqli_query($conn, $buscaTabelas);
                                while($rows = mysqli_fetch_assoc($buscaTabelasExec))
                                {
                                    $iValor = $rows['valor_cobranca']; ?>
                                <tr>
                                    <td><b class="font-weight-light"><?= $rows['nome_tabela']; ?>:</b></td>
                                    <td class="text-center">
                                        <?php
                                            $buscaEntregas = "SELECT `id_entrega` 
                                            FROM `entregas` 
                                            WHERE entregas.id_cliente = $cliente 
                                            AND entregas.data_entrega = '{$data->format("Y-m-d")}'
                                            AND entregas.id_tabela_preco = {$rows['id_tabela_preco']} 
                                            AND entregas.status_entrega != 'Em aberto' 
                                            AND entregas.status_entrega != 'Em andamento' 
                                            AND entregas.status_entrega != 'Cancelada'";

                                            $buscaEntregasExec = mysqli_query($conn, $buscaEntregas);
                                            $buscaEntregasResult = mysqli_num_rows($buscaEntregasExec);

                                            $iTotal = $iValor * $buscaEntregasResult;
                                            $aTotalDia['total'] += $iTotal;

                                            echo $buscaEntregasResult;
                                        ?>
                                    </td>
                                </tr>
                                <?php }
                            ?>
                        <tr>
                            <td class="bg-dark"><b class="text-light">Total: </b></td>
                            <td class="bg-dark text-center"><b class="text-light">R$<?= number_format($aTotalDia['total'],2,",","."); ?></b></td>
                            <?php
                                $aTotalGeral['total'] += $aTotalDia['total'];
                                $aTotalDia['total'] = 0.0;
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php  
        $data->modify("+1 day"); //Acrescenta um dia a data fazendo com que a query procure a data correta.
            } 
        ?>
        <h2 class="float-right">Total do período: R$<?= number_format($aTotalGeral['total'],2,",","."); ?></h2>
    </body>
</html>