<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe a informação de Retorno de uma entrega
# Autor: Marcelo Bueno
# Última revisão: 14/11/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(isset($_POST['id_entrega']) && !empty($_POST['id_entrega']))
{
    $id_entrega = $_POST['id_entrega'];
    $id_tabela = $_POST['tabela'];
    $flag = $_POST['flag'];
    $motoboy = $_POST['motoboy'];
    $status_retorno = $_POST['status_retorno'];
    $cliente = $_POST['id_cliente'];

    $query = "SELECT * FROM `retornos` WHERE retornos.id_entrega = $id_entrega";
    $exec = mysqli_query($conn, $query);

    if($exec != null) //Verifica se o retorno já existe, se existir apenas altera os status.
    {
        $query1 = "UPDATE `retornos` SET `flag`= '$flag',`id_tabela`= $id_tabela,`status_retorno`= '$status_retorno' 
        WHERE retornos.id_entrega = $id_entrega";
        $exec = mysqli_query($conn, $query1);

        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno atualizado com sucesso!</div>';
        header('location:../../../index.php?pagina=Retornos');
    }
    else
    {
        $query1 = "UPDATE `entregas` SET `status_entrega`= 'Retorno' WHERE entregas.id_entrega = $id_entrega";
        $exec1 = mysqli_query($conn, $query1);

        $query2 = "INSERT INTO `retornos`(`id_retorno`, `flag`, `id_entrega`, `id_tabela`, `id_cliente`, `status_retorno`) 
        VALUES (DEFAULT,'$flag',$id_entrega,$id_tabela,$cliente,'$status_retorno')";
        $exec2 = mysqli_query($conn, $query2);

        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno registrado com sucesso!</div>';
        header('location:../../../index.php?pagina=Retornos');
    }
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno</div>';
    header('location:../../../index.php?pagina=Novo-Retorno');
}
