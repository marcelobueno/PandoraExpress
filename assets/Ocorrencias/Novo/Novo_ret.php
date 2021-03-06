<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

echo 'achou';
/*
if(isset($_POST['id_entrega']) && !empty($_POST['id_entrega']))
{
    $id_entrega = $_POST['id_entrega'];

    $query = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega LIMIT 1";
    $exec = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec);

    if($row['id_ordem_servico'] == null){
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno:<br>Entrega
        precisa estar em uma ordem de serviço!</div>';
        header('location:../../../index.php?pagina=Novo-Retorno');
    }

    $flag = 'Retorno 1';
    $data_retorno = $row['data_entrega'];
    $id_cliente = $row['id_cliente'];
    $status_retorno = 'Em aberto';

    $query1 = "UPDATE `entregas` SET `status_entrega`= 'Retorno' WHERE entregas.id_entrega = $id_entrega";
    $exec1 = mysqli_query($conn, $query1);

    $query2 = "INSERT INTO `retornos`(`id_retorno`, `flag`, `id_entrega`, `id_tabela`, `id_cliente`, `status_retorno`)
        VALUES (DEFAULT,'$flag',$id_entrega,null ,$id_cliente,'$status_retorno')";
    $exec2 = mysqli_query($conn, $query2);

    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno registrado com sucesso!</div>';
    header('location:../../../index.php?pagina=Retornos');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno</div>';
    header('location:../../../index.php?pagina=Novo-Retorno');
}
*/
