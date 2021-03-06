<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

if(!isset($_POST['id_entrega'])){
    echo 'Erro ao abrir entrega, ID não informado';
} else {
    $id_entrega = $_POST['id_entrega'];
    $sql = "UPDATE entregas SET status_entrega = 'Em aberto' WHERE id_entrega = $id_entrega";
    $exec = mysqli_query($conn, $sql);

    if(!$exec){
        echo 'Erro ao abrir entrega, ID não encontrado no banco de dados';
    } else {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Entrega aberta com sucesso</div>';
        echo '<script>window.location.href = "index.php?pagina=Entregas"</script>';
    }
}
