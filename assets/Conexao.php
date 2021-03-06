<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Realizar a conexão com o banco de dados.
# Autor: Marcelo Bueno
# Última revisão: 08/10/2020
#---------------------------------------------------------------------------------------------------------------

/* $server = 'localhost';
$user = 'root';
$pass = '';
$database = 'pandora'; */

$server = "pandoraexpress.mysql.dbaas.com.br";
$user = "pandoraexpress";
$pass = "MfB786860@";
$database = "pandoraexpress";

$conn = mysqli_connect($server, $user, $pass, $database);
