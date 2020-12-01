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
$cpf = $_POST['cnpj'];
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
    
    $atualizaMotoboy = "UPDATE `motoboys` SET 
    `nome_motoboy`= '$nome', `cpf_motoboy`= '$cpf', `email_motoboy`= '$email', `tel_motoboy`= '$tel',
    `end_motoboy`= '$endereco', `end_num_motoboy`= '$numero', `end_comp_motoboy`= '$complemento',
    `end_bairro_motoboy`= '$bairro', `end_cidade_motoboy`= '$cidade', `end_estado_motoboy`= '$estado',
    `end_cep_motoboy`= '$cep' 
    WHERE motoboys.id_motoboy = $id";

    $atualizaMotoboyExec = mysqli_query($conn, $atualizaMotoboy);

    if(!$atualizaMotoboyExec){
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Motoboy</div>';

        header('location:../../../index.php?pagina=Motoboys');
    }else{
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Motoboy editado com sucesso</div>';

        header('location:../../../index.php?pagina=Motoboys');
    }
}else{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Motoboy</div>';

    header('location:../../../index.php?pagina=Motoboys');
}
