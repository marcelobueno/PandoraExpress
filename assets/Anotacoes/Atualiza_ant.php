<?php
#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do campo de anotações da página principal
# Autor: Marcelo Bueno
# Última revisão: 30/12/2020
#---------------------------------------------------------------------------------------------------------------

require __DIR__."/../Conexao.php";

$data = $_POST['dataAnT'];
$anotacao = $_POST['anotacao'];
$urgencia = $_POST['nivel_urgencia'];

$filter = "/'/";
$replace = " ";
$anotacao = preg_replace($filter, $replace, $anotacao);

$iAnotacao = "INSERT INTO `anotacoes`(`id_anotacao`, `anotacao`, `nivel_urgencia`, `data`) 
VALUES (DEFAULT,'$anotacao','$urgencia','$data')";
$iAnotacaoExec = mysqli_query($conn, $iAnotacao);


header('location:../../index.php?pagina=Home');
