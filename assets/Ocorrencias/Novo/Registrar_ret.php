<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe a informação de Retorno de uma entrega
# Autor: Marcelo Bueno
# Última revisão: 11/01/2021
#---------------------------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(isset($_POST['registrar'])){
    $id_entrega = $_POST['id_entrega'];

    $query = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega LIMIT 1";
    $exec = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec);

    if($row['id_ordem_servico'] == null){
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno:<br>Entrega
        precisa estar em uma ordem de serviço!</div>';
        header('location:../../../index.php?pagina=Novo-Retorno');
    } else {
        $flag = 'Retorno 1';
        $data_retorno = $row['data_entrega'];
        $id_cliente = $row['id_cliente'];
        $status_retorno = 'Em aberto';

        $query1 = "UPDATE `entregas` SET `status_entrega`= 'Retorno' WHERE entregas.id_entrega = $id_entrega";
        $exec1 = mysqli_query($conn, $query1);

        $query2 = "INSERT INTO `retornos`(`id_retorno`, `flag`, `id_entrega`, `id_cliente`, `status_retorno`)
        VALUES (DEFAULT, '$flag', $id_entrega, $id_cliente, '$status_retorno')";
        $exec2 = mysqli_query($conn, $query2);

        if(!$exec2){
            echo 'Erro ao inserir retorno' . mysqli_error($exec2);
        } else {
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno registrado com sucesso!</div>';
            header('location:../../../index.php?pagina=Retornos');
        }
    }
}
else {
    //Informações da entrega.
    $id_entrega = $_POST['id_entrega'];
    $nf_origem = $_POST['nf_origem'];
    $id_os = $_POST['id_os'];
    $id_motoboy = $_POST['id_motoboy'];
    $nome_destinatario = $_POST['nome_destinatario'];
    $end_entrega = $_POST['end_entrega'];
    $end_num_entrega = $_POST['end_num_entrega'];
    $end_comp_entrega = $_POST['end_comp_entrega'];
    $end_bairro_entrega = $_POST['end_bairro_entrega'];
    $end_cidade_entrega = $_POST['end_cidade_entrega'];
    $end_estado_entrega = $_POST['end_estado_entrega'];
    $end_cep_entrega = $_POST['end_cep_entrega'];
    $valor_mercadoria = $_POST['valor_mercadoria'];
    $cobranca_extra = $_POST['cobranca_extra'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $data_entrega_ent = $_POST['data_entrega'];
    $observacoes = $_POST['observacoes'];
    //

    //Informações do retorno.
    $id_cliente = $_POST['id_cliente'];
    $id_tabela = $_POST['id_tabela'];
    $data_entrega_ret = $_POST['data_entrega'];
    $flag = $_POST['flag'];
    $status_retorno = $_POST['status_retorno'];
    //

    $query = "SELECT * FROM `retornos` WHERE retornos.id_entrega = $id_entrega";
    $exec = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($exec);

    if($rows > 0) //Verifica se o retorno já existe, se existir apenas altera os status.
    {
        $query1 = "UPDATE `retornos` SET 
            `flag`= '$flag',
            `id_tabela`= $id_tabela,
            `status_retorno`= '$status_retorno',
            `data_retorno` = '$data_entrega_ret'
        WHERE retornos.id_entrega = $id_entrega";
        $exec = mysqli_query($conn, $query1);

        $query2 = "UPDATE `entregas` SET 
            `id_motoboy`= $id_motoboy,
            `forma_pagamento`= '$forma_pagamento',
            `valor_mercadoria`= $valor_mercadoria,
            `cobranca_extra`= $cobranca_extra,
            `nome_destinatario`= '$nome_destinatario',
            `end_entrega`= '$end_entrega',
            `end_num_entrega`= '$end_num_entrega',
            `end_bairro_entrega`= '$end_bairro_entrega',
            `end_cidade_entrega`= '$end_cidade_entrega',
            `end_estado_entrega`= '$end_estado_entrega',
            `end_cep_entrega`= '$end_cep_entrega',
            `end_comp_entrega`= '$end_comp_entrega',
            `observacoes`= '$observacoes' 
            WHERE entregas.id_entrega = $id_entrega";
        $exec2 = mysqli_query($conn, $query2);

        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno atualizado com sucesso!</div>';
        header('location:../../../index.php?pagina=Retornos');
    }
    else
    {
        $query3 = "UPDATE `entregas` SET `status_entrega`= 'Retorno' WHERE entregas.id_entrega = $id_entrega";
        $exec3 = mysqli_query($conn, $query3);

        $query4 = "INSERT INTO `retornos`(`id_retorno`, `flag`, `id_entrega`, `id_tabela`, `id_cliente`, `data_retorno`, `status_retorno`)
        VALUES (DEFAULT, '$flag', $id_entrega, $id_tabela, $id_cliente, '$data_entrega_ret',''$status_retorno')";
        $exec4 = mysqli_query($conn, $query4);

        if(!$exec4){
            echo 'Erro ao inserir retorno' . mysqli_error($exec4);
        } else {
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Retorno registrado com sucesso!</div>';
            header('location:../../../index.php?pagina=Retornos');
        }
    }
}
