<?php

use Dompdf\Dompdf;

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Formatar.php";
require __DIR__."/../../../vendor/autoload.php";

$motoboy = $_POST['motoboy'];

$_SESSION['motoboy'] = [];

if(!empty($motoboy))
{
    $bBoyInfo = "SELECT * FROM motoboys WHERE id_motoboy = $motoboy";
    $bBoyInfoExec = mysqli_query($conn, $bBoyInfo);

    $bBoyInfoResult = mysqli_fetch_assoc($bBoyInfoExec);

    $_SESSION['motoboy'] += [
        "id" => $motoboy,
        "nome" => $bBoyInfoResult['nome_motoboy'],
        "cpf" => $bBoyInfoResult['cpf_motoboy']
    ];
}

$dompdf = new Dompdf(["enable_remote" => true]);

$dompdf->loadHtml
('
<style>

</style>
<img src="https://i.imgur.com/ZRbEkKR.png"/>
');

ob_start();
require __DIR__."/Template_Ent.php";
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper("A4");

$dompdf->render();

$dompdf->stream('relatorio-entregas', ["Attachment" => false]);
