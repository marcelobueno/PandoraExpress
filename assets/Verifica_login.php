<?php
if(!$_SESSION['administrador']){
    header('location:../index.php?pagina=Login');
    exit();
}
