<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de cadastro de Clientes
# Autor: Marcelo Bueno
# Última revisão: 09/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$nome = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
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
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao cadastrar Cliente</div>';
    
    header('location:../../../index.php?pagina=Cadastro-de-Cliente');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cliente cadastrado com sucesso</div>';

    $sql = "INSERT INTO `clientes`(`id_cliente`, `nome_cliente`, `cnpj_cliente`, `email_cliente`,
     `tel_cliente`, `end_cliente`, `end_num_cliente`, `end_comp_cliente`, `end_bairro_cliente`,
      `end_cidade_cliente`, `end_estado_cliente`, `end_cep_cliente`) VALUES 
      (DEFAULT,'$nome','$cnpj','$email','$telefone','$endereco','$numero','$complemento','$bairro','$cidade','$estado','$cep')";

    $exec = mysqli_query($conn, $sql);

    if(!$exec)
    {
        echo 'Erro ao inserir cliente';
    }

    header('location:../../../index.php?pagina=Cadastro-de-Cliente');
}
