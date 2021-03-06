<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

$id_cliente = $_POST['cliente'];
$desconto = $_POST['desconto'];
$data = $_POST['data'];
$descricao = $_POST['descricao'];

if(!empty($id_cliente) && !empty($desconto) && !empty($data) && !empty($descricao)){


    $sql = "INSERT INTO `descontos_clientes`(`id_desconto`, `id_cliente`, `descricao`, `data_desconto`, `valor`) 
        VALUES (DEFAULT,$id_cliente,'$descricao','$data',$desconto)";
    $exec = mysqli_query($conn, $sql);

    if(!$exec){
        echo 'Erro de execução no banco de dados!';
    } else {
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Desconto cadastrado com sucesso!</div>';
            
        echo '<script>window.location.href = "index.php?pagina=Desconto-Cliente"</script>';
    }
}
