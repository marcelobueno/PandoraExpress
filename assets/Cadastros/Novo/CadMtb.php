<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de cadastro de Motoboys
# Autor: Marcelo Bueno
# Última revisão: 09/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$nome = filter_input(INPUT_POST, 'nome_motoboy', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cpf_motoboy', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);

if($nome == null || $cnpj == null || $telefone == null || $email == null || $endereco == null || $numero == null || $bairro == null || $cidade == null || $estado == null || $cep == null)
{  
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao cadastrar Motoboy</div>';
    
    header('location:../../../index.php?pagina=Cadastro-de-Motoboy');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Motoboy cadastrado com sucesso</div>';

    $sql = "INSERT INTO `motoboys`(`id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `email_motoboy`, `tel_motoboy`, 
    `end_motoboy`, `end_num_motoboy`, `end_comp_motoboy`, `end_bairro_motoboy`, `end_cidade_motoboy`, 
    `end_estado_motoboy`, `end_cep_motoboy`) VALUES 
    (DEFAULT,'$nome','$cnpj','$email','$telefone','$endereco','$numero','$complemento','$bairro','$cidade',
    '$estado','$cep')";

    $exec = mysqli_query($conn, $sql);

    if(!$exec)
    {
        echo 'Erro ao inserir motoboy';
    }

    header('location:../../../index.php?pagina=Cadastro-de-Motoboy');
}
