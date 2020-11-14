<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe a informação de encerramento da Ordem de Serviço 
# Autor: Marcelo Bueno
# Última revisão: 09/11/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require __DIR__."/../../Conexao.php";

if(!isset($_POST['id_os']))
{
    echo 'Erro: Nenhum id de Ordem de serviço foi informado!';
}
else
{
    $id_os = $_POST['id_os'];

    $query = "UPDATE `ordem_servico` SET `status_os`= 'Fechada' 
    WHERE ordem_servico.id_ordem = $id_os";

    $exec = mysqli_query($conn, $query);

    if(!$exec)
    {
        echo 'Erro: Ocorreu um erro ao fechar a Ordem de Serviço. ' . mysqli_error($exec);
    }
    else
    {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Ordem de Serviço fechada com sucesso</div>';
        header('location:../../../index.php?pagina=Ordens-de-Servico');
    }
}
