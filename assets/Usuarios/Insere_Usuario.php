<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de cadastro de Usuários
# Autor: Marcelo Bueno
# Última revisão: 08/12/2020
#---------------------------------------------------------------------------------------------------------------

require __DIR__."/../Conexao.php";
session_start();

$nome_usuario = $_POST['Nome'];
$login_usuario = $_POST['Login'];
$senha_usuario = $_POST['Senha'];
$nivel_acesso = $_POST['Nivel'];

if(!empty($nome_usuario) || !empty($login_usuario) || !empty($senha_usuario) || !empty($nivel_acesso)){

    $buscaUsuarios = "SELECT * FROM usuarios WHERE usuarios.login_usuario = '$login_usuario'";
    $buscaUsuariosExec = mysqli_query($conn, $buscaUsuarios);
    $result = mysqli_num_rows($buscaUsuariosExec);

    if($result > 0){

        $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Usuário não pode ser cadastrado pois já existe um usuario com este login</div>';
        header('location:../../../index.php?pagina=Usuarios');

    } else{

        $sql = "INSERT INTO `usuarios`(`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario`) VALUES 
        (DEFAULT,'$login_usuario',md5('$senha_usuario'),$nivel_acesso,'$nome_usuario')";
        $sqlExec = mysqli_query($conn, $sql);

        if(!$sqlExec){
            $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Ocorreu alguma falha no cadastro</div>';
            header('location:../../../index.php?pagina=Usuarios');
        } else{

        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso</div>';
        header('location:../../../index.php?pagina=Usuarios');

        }
    }
}
