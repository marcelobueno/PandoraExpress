<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do formulário de cadastro de Usuários
# Autor: Marcelo Bueno
# Última revisão: 08/10/2020
#---------------------------------------------------------------------------------------------------------------

include '../Conexao.php';
session_start();

$nome_usuario = $_POST['Nome'];
$login_usuario = $_POST['Login'];
$senha_usuario = $_POST['Senha'];
$nivel_acesso = $_POST['Nivel'];

$sql = "INSERT INTO `usuarios`(`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso`, `nome_usuario`) VALUES 
(DEFAULT,'$login_usuario',md5('$senha_usuario'),$nivel_acesso,'$nome_usuario')";

$exec = mysqli_query($conn, $sql);

$_SESSION['alert'] = '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso</div>';
header('location:.../index.php?pagina=Usuarios');
