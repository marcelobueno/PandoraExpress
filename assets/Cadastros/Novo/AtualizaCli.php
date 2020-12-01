<?php

#-------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de atualização de clientes
# Autor: Marcelo Bueno
# Última Revisão: 01/12/2020
#-------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$id = $_POST['id'];

if(!empty($nome) || !empty($cnpj) || !empty($tel) || !empty($email) || !empty($endereco) 
|| !empty($bairro) || !empty($cidade) || !empty($estado) || !empty($cep)){
    
    $atualizaCliente = "UPDATE `clientes` SET 
    `nome_cliente`= '$nome', `cnpj_cliente`= '$cnpj', `email_cliente`= '$email', `tel_cliente`= '$tel',
    `end_cliente`= '$endereco', `end_num_cliente`= '$numero', `end_comp_cliente`= '$complemento',
    `end_bairro_cliente`= '$bairro', `end_cidade_cliente`= '$cidade', `end_estado_cliente`= '$estado',
    `end_cep_cliente`= '$cep' 
    WHERE clientes.id_cliente = $id";

    $atualizaClienteExec = mysqli_query($conn, $atualizaCliente);

    if(!$atualizaClienteExec){
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Cliente</div>';

        header('location:../../../index.php?pagina=Clientes');
    }else{
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cliente editado com sucesso</div>';

        header('location:../../../index.php?pagina=Clientes');
    }
}else{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Cliente</div>';

    header('location:../../../index.php?pagina=Clientes');
}