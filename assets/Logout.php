<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Encerra a sessão e redireciona a página de login
# Autor: Marcelo Bueno
# Última revisão: 08/10/2020
#---------------------------------------------------------------------------------------------------------------

session_start();
if(!$_SESSION['administrador'] == null){
    session_destroy();
    header('location:../index.php?pagina=Login');
exit();
}else {
    header('location:../index.php?pagina=Login');
}
