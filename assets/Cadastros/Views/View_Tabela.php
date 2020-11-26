<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(isset($_POST['visualizar_tabela']))
{ 
    $tabela = $_POST['visualizar_tabela'];

    $buscaTabela = "SELECT * FROM `tabela_preco` WHERE tabela_preco.id_tabela_preco = $tabela";
    $buscaTabelaExec = mysqli_query($conn, $buscaTabela);
    $result = mysqli_fetch_assoc($buscaTabelaExec);

    ?>
    <main class="corpo">
        <div class="container">
            <br>
        </div>
    </main>
<?php
}
elseif(isset($_POST['editar_tabela']))
{ ?>
    <main class="corpo">
        <div class="container">

        </div>
    </main>
<?php
}
elseif(isset($_POST['deletar_tabela']))
{ ?>
    <main class="corpo">
        <div class="container">

        </div>
    </main>
<?php
}
else
{ ?>
    <main class="corpo">
        <div class="container">
            <br><br><br>
            <h1 class="text-info text-center">Página não encontrada!</h1>
        </div>
    </main>
<?php
}
?>