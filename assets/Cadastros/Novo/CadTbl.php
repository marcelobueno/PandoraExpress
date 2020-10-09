<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de cadastro de Tabelas de Preço
# Autor: Marcelo Bueno
# Última revisão: 09/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$nome_tbl = filter_input(INPUT_POST, 'nome_tabela', FILTER_SANITIZE_STRING);
$tipo_cobranca = filter_input(INPUT_POST, 'tipo_cobranca', FILTER_SANITIZE_STRING);
$valor = $_POST['valor_cobranca'];

if(strpos($valor , ","))
{
    $valor = number_format($_POST['valor_cobranca'], 2, '.', '');
}


if($cliente == null || $nome_tbl == null || $tipo_cobranca == null || $valor == null)
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao cadastrar Tabela</div>';
    
    header('location:../../../index.php?pagina=Cadastro-de-Tabela');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Tabela cadastrada com sucesso</div>';

    $sql = "INSERT INTO `tabela_preco`(`id_tabela_preco`, `nome_tabela`, `id_cliente`, `tipo_cobranca`, 
    `valor_cobranca`) VALUES 
    (DEFAULT,'$nome_tbl',$cliente,'$tipo_cobranca',$valor)";

    $exec = mysqli_query($conn, $sql);

    if(!$exec)
    {
        echo 'Erro ao inserir tabela';
    }

    header('location:../../../index.php?pagina=Cadastro-de-Tabela');
}
