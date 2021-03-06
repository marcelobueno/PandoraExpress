<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

$id_motoboy = $_POST['motoboy'];
$desconto = $_POST['desconto'];
$data = $_POST['data'];
$descricao = $_POST['descricao'];

if(!empty($id_motoboy) && !empty($desconto) && !empty($data) && !empty($descricao)){

    $sql = "INSERT INTO `descontos_motoboys`(`id_desconto`, `id_motoboy`, `data_desconto`, `descricao`, `valor`) 
        VALUES (DEFAULT,$id_motoboy,'$data','$descricao',$desconto)";
    $exec = mysqli_query($conn, $sql);

    if(!$exec){
        echo 'Erro de execução no banco de dados!';
    } else {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Desconto cadastrado com sucesso!</div>';
            
        echo '<script>window.location.href = "index.php?pagina=Desconto-Motoboy"</script>';
    }
}
