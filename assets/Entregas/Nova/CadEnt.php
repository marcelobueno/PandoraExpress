<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de Registro de novas Entregas
# Autor: Marcelo Bueno
# Última revisão: 10/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$id_os = $_POST['ordem_servico'];
$id_cliente = $_POST['id_cliente'];
$nome = filter_input(INPUT_POST, 'nome_dest' , FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$motoboy = $_POST['motoboy'];
$data = $_POST['data'];
$pagamento = $_POST['forma_pagamento'];
$valor = $_POST['valor'];

if(strpos($valor , ","))
{
    $valor = number_format($_POST['valor_cobranca'], 2, '.', '');
}

if($nome == null || $id_os == null || $motoboy == null || $data == null || $endereco == null || $numero == null || $bairro == null || $cidade == null || $estado == null || $cep == null)
{  
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao cadastrar Entrega</div>';
    
    header('location:../../../index.php?pagina=Cadastro-de-Entrega');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cliente cadastrado com sucesso</div>';

    $sql = "INSERT INTO `entregas`(`id_entrega`, `id_ordem_servico`, `id_cliente`, `id_motoboy`, 
    `data_entrega`, `forma_pagamento`, `valor_mercadoria`, `id_tabela_preco`, `nome_destinatario`, 
    `end_entrega`, `end_num_entrega`, `end_bairro_entrega`, `end_cidade_entrega`, `end_estado_entrega`, 
    `end_cep_entrega`, `end_comp_entrega`, `status_entrega`) VALUES 
      (DEFAULT,'$nome',$id_os,$id_cliente,$motoboy,'$data', '$pagamento', '$endereco','$numero','$complemento','$bairro','$cidade','$estado','$cep')";

    $exec = mysqli_query($conn, $sql);

    header('location:../../../index.php?pagina=Cadastro-de-Entrega');
}
