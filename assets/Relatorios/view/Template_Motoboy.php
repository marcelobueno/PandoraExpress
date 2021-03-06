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
$data_final = new DateTime($_SESSION['relatorio_motoboy']['data_fim']);

$aTotalDia = [
    "total" => 0.0
];

$aTotalGeral = [
    "total" => 0.0
];

$aDescontos = [
    "total" => 0.0
];

$aAjudaCusto = [
    "total" => 0.0
];

//1 - Buscar todas as entregas finalizadas realizadas pelo motoboy no período
$bEntregas = "SELECT * FROM entregas 
    WHERE entregas.id_motoboy = $motoboy
    AND entregas.status_entrega = 'Entregue'
    AND entregas.data_entrega BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
$bEntregasExec = mysqli_query($conn, $bEntregas);

while($bEntregasResult = mysqli_fetch_assoc($bEntregasExec)){
	$id_tabela = $bEntregasResult['id_tabela_preco'];
	$horas = floatval($bEntregasResult['horas']);
	
	//2 - Armazenar o informação da tabela de preço de cada entrega.
	
	$bTabela = "SELECT * FROM tabela_preco 
		WHERE id_tabela_preco = {$id_tabela}";
	$bTabelaExec = mysqli_query($conn, $bTabela);
	$bTabelaResult = mysqli_fetch_assoc($bTabelaExec);
	
	//3 - Obter a informação sobre a comissão de cada tabela.
	
	$comissao = $bTabelaResult['comissao_boy']; 
	$tipo_cobranca = $bTabelaResult['tipo_cobranca'];
	
	//4 - Verificar se a entrega é cobrada por hora, se sim, multiplicar a comissão pelo número de horas
	
	if($tipo_cobranca == 'Hora' && $horas != null){
		
		$valor = $comissao * $horas;
		
	//5 - Somar todas as as comissões do período e lançar o total.	
	
		$aTotalGeral['total'] += $valor;
		
	} else {
		
		$aTotalGeral['total'] += $comissao;
		
	}
}

//Busca todos os clientes para alimentar o for que formará as tabelas.

$bClientes = "SELECT * FROM clientes";
$bClientesExec = mysqli_query($conn, $bClientes);
$bClientesResult = mysqli_num_rows($bClientesExec);

$aClientes = [];
$count = 0;

while ($cliente = mysqli_fetch_assoc($bClientesExec))
{
    $aClientes += [
        "$count" => [
            "id_cliente" => $cliente['id_cliente'],
            "nome_cliente" => $cliente['nome_cliente']
        ],
    ];

    $count++;
}

$bDescontos = "SELECT * FROM descontos_motoboys 
        WHERE id_motoboy = $motoboy 
        AND data_desconto BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
$bDescontosExec = mysqli_query($conn, $bDescontos);

while($bDescontosResult = mysqli_fetch_assoc($bDescontosExec)){
    
    $valor = $bDescontosResult['valor'];
    
    $aDescontos['total'] += $valor;
}

$totalGeral = [
    'total' => 0.0
];

$totalGeral['total'] += ($aTotalGeral['total'] - $aDescontos['total']);

$bAjudas = "SELECT * FROM ajuda_custo WHERE id_motoboy = $motoboy";
$bAjudasExec = mysqli_query($conn, $bAjudas);

while($bAjudasResult = mysqli_fetch_assoc($bAjudasExec)){

    $valor = $bAjudasResult['valor'];

    $aAjudaCusto['total'] += $valor;
}

$totalGeral['total'] += $aAjudaCusto['total'];

?>
<html>

<head>
    <title>Relatório - <?= $_SESSION['relatorio_motoboy']['nome_motoboy']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="preconnect" href="./css/bootstrap.min.css"> -->
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
            width: 150px;
        }

        h4 {
            font-family: 'Ubuntu', sans-serif;
        }

        .headerContent {
            font-size: 11px;
        }

        .tblFont {
            font-size: 11px;
        }

        .sign {
            margin-left: 400px;
        }
    </style>
</head>

<body>
    <div class="center">
        <img class="logoEmpresa" src="https://i.imgur.com/ZRbEkKR.png">
        <!-- <img class="logoEmpresa" src="./img/Logo-Pandora.png"> -->
    </div>
    <div class="headerContent">
        <span>
            <b>Motoboy: </b><?= $_SESSION['relatorio_motoboy']["nome_motoboy"]; ?><br>
            <b>CPF/CNPJ: </b><?= FormatarDoc($_SESSION['relatorio_motoboy']["cpf"]); ?><br>
            <b>De: </b><?= date($format, $dataIni); ?> <b>Até: </b><?= date($format, $dataFim); ?>
        </span>
    </div>
    <div class="center"><span class="tblFont"><b>RESUMO DAS ENTREGAS</b></span></div>
    <div class="dropdown-divider"></div>
    <!--Início das tabelas-->
        <?php
            for($i = 0; $i < $bClientesResult; $i++){
                $id_cliente = $aClientes[$i]['id_cliente'];

                $bEntCli = "SELECT * FROM entregas 
                    WHERE entregas.id_cliente = $id_cliente 
                    AND entregas.id_motoboy = $motoboy 
                    AND entregas.data_entrega BETWEEN '{$data->format('Y-m-d')}' and '{$data_final->format('Y-m-d')}'";
                $bEntCliExec = mysqli_query($conn, $bEntCli);
                $bEntCliResult = mysqli_num_rows($bEntCliExec);

                if(!$bEntCliResult) {
                    //Não existem entregas -> sem ação.
                } else {
                    echo '<span class="headerContent"><b>' . $aClientes[$i]['nome_cliente'] . '</b></span><br>'; ?>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="tblFont"><small><b>Tabela</b></small></th>
                                    <th class="tblFont text-center" width="150px"><small><b>Comissão</b></small></th>
                                    <th class="tblFont text-center" width="150px"><small><b>Entregas</b></small></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $bTbl = "SELECT * FROM tabela_preco 
                                    WHERE id_cliente = $id_cliente 
                                    AND nome_tabela NOT LIKE '%Retorno%' 
                                    AND status_tabela = 'Ativo'";
                                $bTblExec = mysqli_query($conn, $bTbl);

                                while($bTblResult = mysqli_fetch_assoc($bTblExec)){
                                    $id_tbl = $bTblResult['id_tabela_preco'];

                                    $bEntTbl = "SELECT id_entrega FROM entregas 
                                            WHERE id_motoboy = $motoboy 
                                            AND id_tabela_preco = $id_tbl 
                                            AND status_entrega = 'Entregue'  
                                            AND data_entrega BETWEEN '{$data->format('Y-m-d')}' 
                                            and '{$data_final->format('Y-m-d')}'";
                                    $bEntTblExec = mysqli_query($conn, $bEntTbl);
                                    $bEntTblResult = mysqli_num_rows($bEntTblExec);

                                    if($bEntTblResult > 0) { ?>
                                        <tr>
                                        <td class="tblFont"><small><?= $bTblResult['nome_tabela']; ?></small></td>
                                        <td class="tblFont text-center"><small>R$<?= $bTblResult['comissao_boy']; ?></small></td>
                                        <td class="tblFont text-center">
                                            <small>
                                                <?php
                                                    echo $bEntTblResult;
                                                ?>
                                            </small>
                                        </td>
                                    </tr>
                                    <?php }
                                 }
                            ?>
                            </tbody>
                        </table>
                <?php }
            }
        ?>
    <div class="dropdown-divider"></div>
    <div class="">
        <h6 class="text-center">Totais</h6>
        <h6>Total das entregas: R$<?= number_format( $aTotalGeral['total'], 2, ',', '.'); ?></h6>
        <h6>Descontos: R$<?= number_format($aDescontos['total'],2,",","."); ?></h6>
        <h6>Ajuda de Custo: R$<?= number_format($aAjudaCusto['total'],2,",","."); ?></h6>
        <h6>Total Geral: R$<?= number_format($totalGeral['total'],2,",","."); ?></h6>
    </div>
    <br><br>
    <span class="text-center">___/___/_____ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _____________________________</span>
    <br>
    <span class="text-center sign">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura</span>
</body>

</html>