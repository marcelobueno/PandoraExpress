<?php

session_start();

if(!isset($_SESSION['administrador'])){
    $_SESSION['administrador'] = null;
}
if(!isset($_SESSION['nivel_acesso'])){
    $_SESSION['nivel_acesso'] = null;
}

if($_SESSION['administrador'] == null){
    include 'assets/Login.php';
}
else{
    include 'assets/Header.php';


    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    else{
        $pagina = 'Home';
    }

    switch($pagina){
        case 'Login': include 'assets/Login.php'; break;
        case 'Home': include 'assets/Main.php'; break;
        case 'Clientes': include 'assets/Cadastros/Clientes.php'; break;
        case 'Motoboys': include 'assets/Cadastros/Motoboys.php'; break;
        case 'Tabelas': include 'assets/Cadastros/Tabelas_Preco.php'; break;
        case 'Usuarios': include 'assets/Usuarios/Usuarios.php'; break;
        case 'Retornos': include 'assets/Ocorrencias/Retornos.php'; break;
        case 'Cadastro-de-usuario': include 'assets/Usuarios/Cad_Usuario.php'; break;
        case 'Cadastro-de-Cliente': include 'assets/Cadastros/Novo/Cliente.php'; break;
        case 'Cadastro-de-Motoboy': include 'assets/Cadastros/Novo/Motoboy.php'; break;
        case 'Cadastro-de-Tabela': include 'assets/Cadastros/Novo/Tabela_Preco.php'; break;
        case 'Nova-Ocorrencia': include 'assets/Ocorrencias/Novo/Retorno.php'; break;
        default: include 'assets/Login.php'; break;
    }

include 'assets/Footer.php';
}
