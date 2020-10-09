<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Verifica se existe uma sessão de usuário, se não houver redireciona a página de login
# Autor: Marcelo Bueno
# Última revisão: 08/10/2020
#---------------------------------------------------------------------------------------------------------------

if(!$_SESSION['administrador']){
    header('location:../index.php?pagina=Login');
    exit();
}
