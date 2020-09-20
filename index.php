<?php

include 'assets/Header.php';

    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    else{
        $pagina = 'Home';
    }

    switch($pagina){
        case 'Home': include 'assets/Main.php'; break;
        default: include 'assets/Main.php'; break;
    }

include 'assets/Footer.php';
