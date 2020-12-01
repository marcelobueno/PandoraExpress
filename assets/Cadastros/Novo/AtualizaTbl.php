<?php

#-------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de atualização de tabelas
# Autor: Marcelo Bueno
# Última Revisão: 01/12/2020
#-------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

$nome = $_POST['nome'];
$tipo_cobranca = $_POST['tipo_cobranca'];
$valor_cobranca = $_POST['valor_cobranca'];
$id = $_POST['id'];

if(strpos($valor_cobranca , ","))
{
    $valor_cobranca = number_format($_POST['valor_cobranca'], 2, '.', '');
}

if(!empty($nome) || !empty($tipo_cobranca) || !empty($valor_cobranca) || !empty($id)){

    $atualizaTabela = "UPDATE `tabela_preco` SET `nome_tabela`= '$nome',
    `tipo_cobranca`= '$tipo_cobranca',`valor_cobranca`= '$valor_cobranca' WHERE tabela_preco.id_tabela_preco = $id";
    $atualizaTabelaExec = mysqli_query($conn, $atualizaTabela);

    if(!$atualizaTabelaExec){
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Tabela</div>';

        header('location:../../../index.php?pagina=Tabelas');
    }else{
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Tabela editado com sucesso</div>';

        header('location:../../../index.php?pagina=Tabelas');
    }
}else{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao editar Tabela</div>';

    header('location:../../../index.php?pagina=Tabelas');
}