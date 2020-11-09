<?php

#---------------------------------------------------------------------------------------------------------------
# Objetivo: Recebe as informações vindas do campo de anotações da página principal
# Autor: Marcelo Bueno
# Última revisão: 07/11/2020
#---------------------------------------------------------------------------------------------------------------

require __DIR__."/Conexao.php";

$ant = $_POST['anotacao'];
$filter = "/'/";
$replace = " ";
$ant = preg_replace($filter, $replace, $ant);

$query = "UPDATE `anotacao` SET `anotacao`= '$ant' WHERE anotacao.id_anotacao = 1";
$exec = mysqli_query($conn, $query);

header('location:../index.php?pagina=Home');
