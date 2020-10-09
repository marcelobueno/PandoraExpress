<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de login
# Autor: Marcelo Bueno
# Última revisão: 08/10/2020
#---------------------------------------------------------------------------------------------------------------

include 'Conexao.php';

session_start();

$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$sql = "SELECT `id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario` FROM `usuarios` 
WHERE login_usuario = '{$user}' AND senha_usuario = md5('{$pass}') LIMIT 1";

$query = mysqli_query($conn, $sql);

$row = mysqli_num_rows($query);
$result = mysqli_fetch_assoc($query);

if($row != 1){
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Usuário ou Senha incorreta</div>';
    header("location:../index.php?pagina=Login");
}else{
    $_SESSION['administrador'] = $result['nome_usuario'];
    $_SESSION['nivel_acesso'] = $result['nivel_acesso'];
    header("location:../index.php?pagina=Home");
}
