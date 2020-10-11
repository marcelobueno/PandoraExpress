<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de Registro de novas O.S
# Autor: Marcelo Bueno
# Última revisão: 10/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$cliente = $_POST['cliente'];
$data = $_POST['data'];

if($cliente == null || $data == null)
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao Registrar O.S</div>';

    header('location:../../../index.php?pagina=Cadastro-de-Ordem-de-Servico');
}else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">O.S registrada com sucesso</div>';

    $sql = "INSERT INTO `ordem_servico`(`id_ordem`, `data_os`, `id_cliente`, `status_os`) VALUES 
    (DEFAULT,'$data',$cliente,'Aberta')";
    $exec = mysqli_query($conn, $sql);

    header('location:../../../index.php?pagina=Cadastro-de-Ordem-de-Servico');
}
