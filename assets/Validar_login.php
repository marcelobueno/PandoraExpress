<?php

include 'Conexao.php';

session_start();

$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT `id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario` FROM `usuarios` 
WHERE login_usuario = '{$user}' AND senha_usuario = md5('{$pass}')";

$query = mysqli_query($conn, $sql);

$row = mysqli_num_rows($query);
$result = mysqli_fetch_assoc($query);

if($row != 1){
    echo 'Falha de conexão, usuário não encontrado!';
    header("location:../index.php?pagina=Login");
}else{
    $_SESSION['administrador'] = $result['nome_usuario'];
    $_SESSION['nivel_acesso'] = $result['nivel_acesso'];

    header("location:../index.php?pagina=Home");
}
