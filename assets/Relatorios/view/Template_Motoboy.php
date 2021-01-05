<?php

require __DIR__ . "/../../Conexao.php";

date_default_timezone_set("America/Sao_Paulo");

$motoboy = $_SESSION['relatorio_motoboy']['id'];
$dataIni = strtotime($_SESSION['relatorio_motoboy']['data_ini']);
$dataFim = strtotime($_SESSION['relatorio_motoboy']['data_fim']);
$format = "d/m/Y";

$countIni = date("d", $dataIni);
$countFim = date("d", $dataFim);

$data = new DateTime($_SESSION['relatorio_motoboy']['data_ini']);

$aTotalDia = [
    "total" => 0.0
];

$aTotalGeral = [
    "total" => 0.0
]
?>
<html>

<head>
    <title>Relatório - <?= $_SESSION['relatorio_motoboy']['nome_motoboy']; ?></title>
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
        <h4>Relatório de entregas : Motoboy</h4>
    </div>
    <div class="headerContent">
        <span>
            <b>Motoboy: </b><?= $_SESSION['relatorio_motoboy']["nome_motoboy"]; ?><br>
            <b>CPF/CNPJ: </b><?= FormatarDoc($_SESSION['relatorio_motoboy']["cpf"]); ?><br>
            <b>De: </b><?= date($format, $dataIni); ?> <b>Até: </b><?= date($format, $dataFim); ?>
        </span>
    </div>
    <!--Início das tabelas-->
    <table class="table table-striped table-sm table-bordered my-3">
        <thead class="thead-dark">
            <tr>
                <th>Data</th>
                <th>
                    <div class="float-right">
                        <span>Entregas</span>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = $countIni; $i <= $countFim; $i++) { ?>
                <tr>
                    <td><?= $data->format('d/m/Y'); ?></td>
                    <td>
                        <div class="float-right">
                            <?php
                            $bEntregas = "SELECT * FROM entregas 
                                    WHERE entregas.id_motoboy = $motoboy 
                                    AND entregas.status_entrega = 'Entregue' 
                                    AND entregas.data_entrega = '{$data->format('Y-m-d')}'";

                            $bEntregasExec = mysqli_query($conn, $bEntregas);
                            $result = mysqli_num_rows($bEntregasExec);

                            echo $result;
                            ?>
                        </div>
                    </td>
                </tr>
            <?php
                $data->modify("+1 day"); //Acrescenta um dia a data fazendo com que a query procure a data correta. 
            }
            ?>
        </tbody>
    </table>
    <div class="float-right">
        <h5 class="text-dark">Total do período: R$<?= number_format( $aTotalGeral['total'], 2, ',', '.'); ?></h5>
    </div>
</body>

</html>