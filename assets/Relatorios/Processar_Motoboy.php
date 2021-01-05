<?php

use Dompdf\Dompdf;

require __DIR__."/../Conexao.php";
require __DIR__."/../Formatar.php";
require __DIR__."/../../vendor/autoload.php";

$motoboy = $_POST['motoboy'];
$data_ini = $_POST['data_ini'];
$data_fim = $_POST['data_fim'];

session_start();
$_SESSION['relatorio_motoboy'] = [];

if(!empty($motoboy) || !empty($data_ini) || !empty($data_fim))
{
    $infomotoboy = "SELECT `nome_motoboy`, `cpf_motoboy` FROM `motoboys` WHERE motoboys.id_motoboy = $motoboy";
    $infomotoboyExec = mysqli_query($conn, $infomotoboy);
    $infomotoboyResult = mysqli_fetch_assoc($infomotoboyExec);

    $_SESSION['relatorio_motoboy'] += [
        "id" => $motoboy,
        "nome_motoboy" => $infomotoboyResult['nome_motoboy'],
        "cpf" => $infomotoboyResult['cpf_motoboy'],
        "data_ini" => $data_ini,
        "data_fim" => $data_fim
    ];
}

//$date = date('Ymd');

$dompdf = new Dompdf(["enable_remote" => true]);

$dompdf->loadHtml
('
<style>

</style>
<img src="https://i.imgur.com/ZRbEkKR.png"/>
');

ob_start();
require __DIR__."/view/Template_Motoboy.php";
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper("A4");

$dompdf->render();

$dompdf->stream('relatorio_motoboy_nome-motoboy', ["Attachment" => false]);
