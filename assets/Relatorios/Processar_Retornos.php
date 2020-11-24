<?php

use Dompdf\Dompdf;

require __DIR__."/../Conexao.php";
require __DIR__."/../Formatar.php";
require __DIR__."/../../vendor/autoload.php";

$cliente = $_POST['cliente'];
$data_ini = $_POST['data_ini'];
$data_fim = $_POST['data_fim'];

session_start();
$_SESSION['relatorio_cliente'] = [];

if(!empty($cliente) || !empty($data_ini) || !empty($data_fim))
{
    $infoCliente = "SELECT `nome_cliente`, `cnpj_cliente` FROM `clientes` WHERE clientes.id_cliente = $cliente";
    $infoClienteExec = mysqli_query($conn, $infoCliente);
    $infoClienteResult = mysqli_fetch_assoc($infoClienteExec);

    $_SESSION['relatorio_cliente'] += [
        "id" => $cliente,
        "nome_cliente" => $infoClienteResult['nome_cliente'],
        "cnpj" => $infoClienteResult['cnpj_cliente'],
        "data_ini" => $data_ini,
        "data_fim" => $data_fim
    ];
}

$dompdf = new Dompdf(["enable_remote" => true]);

ob_start();
require __DIR__."/view/Template_Retornos.php";
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper("A4");

$dompdf->render();

$dompdf->stream('relatorio_cliente_nome-cliente', ["Attachment" => false]);
