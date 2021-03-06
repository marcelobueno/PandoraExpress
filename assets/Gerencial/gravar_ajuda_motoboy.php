<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

$id_motoboy = $_POST['motoboy'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$descricao = $_POST['descricao'];

if(!empty($id_motoboy) && !empty($valor) && !empty($data) && !empty($descricao)){

    $sql = "INSERT INTO `ajuda_custo`(`id_ajuda`, `id_motoboy`, `data_ajuda`, `descricao`, `valor`) 
        VALUES (DEFAULT,$id_motoboy,'$data','$descricao',$valor)";
    $exec = mysqli_query($conn, $sql);

    if(!$exec){
        echo 'Erro de execução no banco de dados!';
    } else {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Ajuda de custo cadastrada com sucesso!</div>';
            
        echo '<script>window.location.href = "index.php?pagina=Ajuda-Motoboy"</script>';
    }
}
