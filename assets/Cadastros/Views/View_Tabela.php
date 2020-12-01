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
            <div class="text-center">
                <h4>Detalhes da Tabela: #<span class="text-info"><?= $tabela; ?><span></h4>
            </div>
            <div class="row">
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col col-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card cardInfoDetails">
                        <div class="mt-3 mr-3 mb-3 ml-3">
                            <span class="font-weight-bolder text-info">Nome da Tabela: </span>
                            <span class="font-weight-light"><?= $result['nome_tabela']; ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">Cliente: </span>
                            <?php
                                $buscaCliente = "SELECT `nome_cliente` FROM `clientes` WHERE clientes.id_cliente = {$result['id_cliente']}";
                                $buscaClienteExec = mysqli_query($conn, $buscaCliente);
                                $row = mysqli_fetch_assoc($buscaClienteExec);
                                $cliente = $row['nome_cliente'];
                            ?>
                            <span class="font-weight-light"><?= $cliente; ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">Tipo de Cobrança: </span>
                            <span class="font-weight-light"><?= $result['tipo_cobranca']; ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">Valor Cobrado: </span>
                            <span class="font-weight-light">R$<?= $result['valor_cobranca']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>
    </main>
<?php
}
elseif(isset($_POST['editar_tabela']))
{ 
    $tabela = $_POST['editar_tabela'];

    $buscaTabela = "SELECT * FROM `tabela_preco` WHERE tabela_preco.id_tabela_preco = $tabela";
    $buscaTabelaExec = mysqli_query($conn, $buscaTabela);
    $result = mysqli_fetch_assoc($buscaTabelaExec);

    ?>
    <main class="corpo">
        <div class="container">
            <br>
            <div class="text-center">
                <h4>Editar Tabela: #<span class="text-info"><?= $tabela; ?></span></h4>
            </div>
            <div class="row">
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col col-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card cardInfoDetails">
                        <div class="mt-3 mr-3 mb-3 ml-3">
                            <form action="assets/Cadastros/Novo/AtualizaTbl.php" method="post">
                                <label class="font-weight-bolder text-info" for="nome">Nome da Tabela: </label>
                                <input class="form-control" type="text" name="nome" value="<?= $result['nome_tabela']; ?>">
                                <br>
                                <label class="font-weight-bolder text-info" for="cliente">Cliente:</label>
                                <?php
                                    $buscaCliente = "SELECT `nome_cliente` FROM `clientes` WHERE clientes.id_cliente = {$result['id_cliente']}";
                                    $buscaClienteExec = mysqli_query($conn, $buscaCliente);
                                    $row = mysqli_fetch_assoc($buscaClienteExec);
                                    $cliente = $row['nome_cliente'];
                                ?>
                                <input class="form-control" type="text" name="cliente" value="<?= $cliente . ' - Não pode ser alterado' ?>" disabled>
                                <br>
                                <div class="row">
                                    <div class="col col-6 col-md-6 col-lg-6 colxl-6">
                                        <label class="font-weight-bolder text-info" for="tipo_cobranca">Tipo de Cobrança: </label>
                                        <select class="form-control" name="tipo_cobranca">
                                            <option value="Entrega" <?=($result['tipo_cobranca'] == 'Entrega')? 'selected': ''; ?>>Entrega</option>
                                            <option value="Hora" <?=($result['tipo_cobranca'] == 'Hora')? 'selected': ''; ?>>Hora</option>
                                            <option value="Distancia" <?=($result['tipo_cobranca'] == 'Distancia')? 'selected': ''; ?>>Distância</option>
                                        </select>
                                    </div>
                                    <div class="col col-6 col-md-6 col-lg-6 colxl-6">
                                        <label class="font-weight-normal" for="valor_cobranca">Valor R$: </label>
                                        <input class="form-control" type="number" step="0.10" name="valor_cobranca" value="<?= $result['valor_cobranca']; ?>" required>
                                    </div>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-info" type="submit" name="id" value="<?= $tabela; ?>">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>

        </div>
    </main>
<?php
}
elseif(isset($_POST['deletar_tabela']))
{ ?>
    <main class="corpo">
        <div class="container">
        <br><br><br><br><br><br><br><br><br>
            <div class="text-center">
                <h5 class="text-danger">No momento esta função não está disponível.</h5>
            </div>
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