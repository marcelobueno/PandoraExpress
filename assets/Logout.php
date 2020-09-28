<?php
session_start();
if(!$_SESSION['administrador'] == null){
    session_destroy();
    header('location:../index.php?pagina=Login');
exit();
}else {
    header('location:../index.php?pagina=Login');
}
