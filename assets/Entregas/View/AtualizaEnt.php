<?php
#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de atualização de Status das Entregas
# Autor: Marcelo Bueno
# Última revisão: 10/12/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";


$id = $_POST['id_entrega'];
$os = $_POST["id_os"];
$nf = $_POST['nf_origem'];
$tabela = $_POST["id_tabela_preco"];
$motoboy = $_POST["id_motoboy"];
$destinatario = strtoupper($_POST["nome_destinatario"]);
$end = strtoupper($_POST["end_entrega"]);
$num = $_POST["end_num_entrega"];
$bairro = strtoupper($_POST["end_bairro_entrega"]);
$cidade = strtoupper($_POST["end_cidade_entrega"]);
$estado = $_POST["end_estado_entrega"];
$cep = $_POST["end_cep_entrega"];
$complemento = strtoupper($_POST["end_comp_entrega"]);
$valor = $_POST["valor_mercadoria"];
$extra = $_POST["cobranca_extra"];
$pagamento = $_POST["forma_pagamento"];
$data = $_POST["data_entrega"];
$status = $_POST["status"];
$observacoes = $_POST["observacoes"];
$horas = $_POST['horas'];


if(strpos($valor , ","))
{
    $valor = number_format($valor, 2, '.', '');
}

if(strpos($extra , ","))
{
    $extra = number_format($extra, 2, '.', '');
}

if(strpos($horas , ","))
{
    $horas = number_format($horas, 2, '.', '');
}

if($horas == null){
    $horas = 0;
}

if($extra == null){
    $extra = 0;
}

$update = "UPDATE `entregas` SET 
    `id_ordem_servico`= $os,
    `id_motoboy`= $motoboy,
    `nf_origem`= '$nf',
    `data_entrega`= '$data',
    `forma_pagamento`= '$pagamento',
    `valor_mercadoria`= $valor,
    `cobranca_extra`= $extra, 
    `horas` = $horas,
    `id_tabela_preco`= $tabela,
    `nome_destinatario`= '$destinatario',
    `end_entrega`= '$end',
    `end_num_entrega`= '$num',
    `end_bairro_entrega`= '$bairro',
    `end_cidade_entrega`= '$cidade',
    `end_estado_entrega`= '$estado',
    `end_cep_entrega`= '$cep',
    `end_comp_entrega`= '$complemento',
    `status_entrega`= '$status',
    `observacoes`= '$observacoes'
     WHERE entregas.id_entrega = $id";

var_dump($update);

$updateExec = mysqli_query($conn, $update);

if(!$updateExec)
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao atualizar Entrega</div>';

    header('location:../../../index.php?pagina=Entregas');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Entrega atualizada com sucesso</div>';

    header('location:../../../index.php?pagina=Entregas');
}
