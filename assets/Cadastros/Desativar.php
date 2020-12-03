<?php

#-------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações de desativação de Clientes, Motoboys e Tabela de Preço
# Autor: Marcelo Bueno
# Última Revisão: 03/12/2020
#-------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

if(isset($_POST['id_cliente']))
{
    $id = $_POST['id_cliente'];

    if(!empty($id))
    {
        $reativaCliente = "UPDATE `clientes` SET `status_cliente`= 'Inativo' WHERE clientes.id_cliente = $id";
        $reativaClienteExec = mysqli_query($conn, $reativaCliente);

        if(!$reativaClienteExec)
        {
            //Erro ao desativar
            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Cliente</div>';
            header('location:../../index.php?pagina=Clientes');
        }
        else
        {
            //Cliente desativado
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Cliente desativado com sucesso</div>';
            header('location:../../index.php?pagina=Clientes');
        }
    }
    else
    {
        //Id do cliente não informada
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Cliente</div>';
        header('location:../../index.php?pagina=Clientes');
    }
}
elseif(isset($_POST['id_motoboy']))
{
    $id = $_POST['id_motoboy'];

    if(!empty($id))
    {
        $reativaMotoboy = "UPDATE `motoboys` SET `status_motoboy`= 'Inativo' WHERE motoboys.id_motoboy = $id";
        $reativaMotoboyExec = mysqli_query($conn, $reativaMotoboy);

        if(!$reativaMotoboyExec)
        {
            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Motoboy</div>';
            header('location:../../index.php?pagina=Motoboys');
        }
        else
        {
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Motoboy desativado com sucesso</div>';
            header('location:../../index.php?pagina=Motoboys');
        }
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Motoboy</div>';
        header('location:../../index.php?pagina=Motoboys');
    }
}
elseif(isset($_POST['id_tabela']))
{
    $id = $_POST['id_tabela'];

    if(!empty($id))
    {
        $reativaTabela = "UPDATE `tabela_preco` SET `status_tabela`= 'Inativo' WHERE tabela_preco.id_tabela_preco = $id";
        $reativaTabelaExec = mysqli_query($conn, $reativaTabela);

        if(!$reativaTabelaExec)
        {
            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Tabela</div>';
            header('location:../../index.php?pagina=Tabelas');
        }
        else
        {
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Tabela desativada com sucesso</div>';
            header('location:../../index.php?pagina=Tabelas');
        }
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao desativar Tabela</div>';
        header('location:../../index.php?pagina=Tabelas');
    }
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Ocorreu algum erro inesperado, favor contatar o suporte</div>';
    header('location:../../index.php?pagina=Home');
}
