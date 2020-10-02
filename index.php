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
        case 'Usuarios': include 'assets/Cadastros/Usuarios.php'; break;
        case 'Cadastro-de-usuario': include 'assets/Cadastros/Cad_Usuario.php'; break;
        default: include 'assets/Login.php'; break;
    }

include 'assets/Footer.php';
}
