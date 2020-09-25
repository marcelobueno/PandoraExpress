<?php

if(!isset($_SESSION['administrador'])){
    $_SESSION['administrador'] = null;
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
        $pagina = 'Login';
    }

    switch($pagina){
        case 'Login': include 'assets/Login.php'; break;
        case 'Home': include 'assets/Main.php'; break;
        default: include 'assets/Login.php'; break;
    }

include 'assets/Footer.php';
}
