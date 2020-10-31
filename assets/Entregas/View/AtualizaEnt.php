<?php
#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de atualização de Status das Entregas
# Autor: Marcelo Bueno
# Última revisão: 31/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$status = $_POST['status'];
$id_entrega = $_POST['id_entrega'];
$id_motoboy = $_POST['motoboy'];
$observacoes = $_POST['observacoes'];
$cobranca = $_POST['cobranca'];

if(strpos($cobranca , ","))
{
    $cobranca = number_format($_POST['cobranca'], 2, '.', '');
}

$sql = "UPDATE `entregas` SET `status_entrega` = '$status', `observacoes` = '$observacoes', `id_motoboy` = $id_motoboy, `cobranca_extra` = $cobranca 
WHERE entregas.id_entrega = $id_entrega";
$exec = mysqli_query($conn, $sql);

if(!$exec)
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao atualizar Entrega</div>';
    
    header('location:../../../index.php?pagina=Entregas');
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Entrega atualizada com sucesso</div>';

    header('location:../../../index.php?pagina=Entregas');
}
