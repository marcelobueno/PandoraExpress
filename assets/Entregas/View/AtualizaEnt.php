<?php
#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de atualização de Status das Entregas
# Autor: Marcelo Bueno
# Última revisão: 27/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();

require '../../Conexao.php';
require '../../Verifica_login.php';

$status = $_POST['status'];
$id_entrega = $_POST['id_entrega'];
$id_motoboy = $_POST['motoboy'];
$observacoes = $_POST['observacoes'];

$sql = "UPDATE `entregas` SET `status_entrega` = '$status', `observacoes` = '$observacoes', `id_motoboy` = $id_motoboy 
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
