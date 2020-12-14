<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de Registro de novas Entregas
# Autor: Marcelo Bueno
# Última revisão: 08/12/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

if(isset($_POST['cadEnt'])){
    
    $id_os = $_POST['ordem_servico'];
    $id_tabela = $_POST['tabela_preco'];
    $nome = filter_input(INPUT_POST, 'nome_dest' , FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $motoboy = $_POST['motoboy'];
    $data = $_POST['data'];
    $pagamento = $_POST['forma_pagamento'];
    $valor = $_POST['valor'];
    $nf = $_POST['nf_origem'];

    $sql = "SELECT `id_cliente` FROM `ordem_servico` WHERE ordem_servico.id_ordem = $id_os";
    $exec = mysqli_query($conn, $sql);

    $result = mysqli_fetch_assoc($exec);
    $id_cliente = $result['id_cliente'];

    if(strpos($valor , ","))
    {
        $valor = number_format($_POST['valor_cobranca'], 2, '.', '');
    }

    if(!empty($id_os) || !empty($id_tabela) || !empty($nf)){

        $buscaEntregas = "SELECT * FROM entregas";
        $buscaEntregasExec = mysqli_query($conn, $buscaEntregas);
        $results = mysqli_fetch_assoc($buscaEntregasExec);

        $temp = 0;

        foreach($results as $result){

            $nf_origem = $result['nf_origem'];

            if($nf_origem == $nf){

                $temp++;

            }
        }

        if($temp > 0){

            echo 'Entrega já existe!';
            
        } else {

            echo 'Entrega pode ser cadastrada';

        }
    }

    if($nome == null || $id_os == null || $motoboy == null || $data == null || $endereco == null || $numero == null || $bairro == null || $cidade == null || $estado == null || $cep == null)
    {  
        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao cadastrar Entrega</div>';
        
        header('location:../../../index.php?pagina=Cadastro-de-Entrega');
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Entrega registrada com sucesso</div>';

        $sql = "INSERT INTO `entregas`(`id_entrega`, `id_ordem_servico`, `id_cliente`, `id_motoboy`, 
        `data_entrega`, `forma_pagamento`, `valor_mercadoria`, `id_tabela_preco`, `nome_destinatario`, 
        `end_entrega`, `end_num_entrega`, `end_bairro_entrega`, `end_cidade_entrega`, `end_estado_entrega`, 
        `end_cep_entrega`, `end_comp_entrega`, `status_entrega`, `nf_origem`) VALUES 
        (DEFAULT,$id_os,$id_cliente,$motoboy,'$data','$pagamento',$valor,$id_tabela,'$nome',
        '$endereco',$numero,'$bairro','$cidade','$estado','$cep','$complemento','Em Aberto','$nf')";

        $exec = mysqli_query($conn, $sql);

        if(!$exec)
        {
            echo "Erro na query" . mysqli_error($exec);
        }

        header('location:../../../index.php?pagina=Cadastro-de-Entrega');
    }
}

if(!isset($_POST['cadEnt'])){

    $id_entrega = 'DEFAULT';
    $cliente = $_POST['cliente'];
    $nf = $_POST['nf'];

    if(!empty($id_entrega) || !empty($cliente) || !empty($nf)){

        $entregas = "SELECT * FROM `entregas` WHERE entregas.nf_origem = '$nf' AND entregas.id_cliente = $cliente";
        $entregasExec = mysqli_query($conn, $entregas);
        $result = mysqli_num_rows($entregasExec);

        if($result > 0){

            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">NF de venda já registrada!</div>';
        
            header('location:../../../index.php?pagina=Lancamento-Entrega');

        } else{

            $registrar = "INSERT INTO `entregas`(`id_entrega`, `id_cliente`, `nf_origem`) 
                        VALUES (DEFAULT,$cliente,'{$nf}')";
            $registrarExec = mysqli_query($conn, $registrar);

            if(!$registrarExec){

                $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar entrega</div>';
        
                header('location:../../../index.php?pagina=Lancamento-Entrega');

            } else{

                $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Entrega cadastrada com sucesso!</div>';
            
                header('location:../../../index.php?pagina=Lancamento-Entrega');

            }
        }
    }
}
