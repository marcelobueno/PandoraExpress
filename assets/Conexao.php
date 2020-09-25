<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'pandora';

$conn = mysqli_connect($server, $user, $pass, $database);

/* TESTE DE CONEXÃO
if($conn == true){
    echo 'Conectado com sucesso.';
}
else{
    echo 'falha de conexão.';
}
*/
