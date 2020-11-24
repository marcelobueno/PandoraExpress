<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(isset($_POST['id_entrega']) && !empty($_POST['id_entrega']))
{
    $id_entrega = $_POST['id_entrega'];

    $query = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega LIMIT 1";
    $exec = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec);
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno</div>';
    header('location:../../../index.php?pagina=Novo-Retorno');
}
?>
<main class="corpo">
    <div class="container">
        <span><br></span>
        <div class="row">
            <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                <h3>Detalhes da Entrega</h3>
                <p class="font-weight-normal"><b class="text-danger">ID Entrega: </b><?= $row['id_entrega']; ?></p>
                <p><b class="text-danger">Destinatário:</b> <?= $row['nome_destinatario']; ?></p>
                <p><b class="text-danger">Endereço: </b><?= $row['end_entrega'] .", "
                . $row['end_num_entrega'] ." ". $row['end_bairro_entrega'] .", "
                . $row['end_cidade_entrega'] ." - ". $row['end_estado_entrega']; ?></p>
                <p><b class="text-danger">CEP: </b><?= mb_substr($row['end_cep_entrega'], 0, 5) ."-"
                . mb_substr($row['end_cep_entrega'], 5); ?></p>
                <p><b class="text-danger">Complemento: </b><?= $row['end_comp_entrega']; ?></p>
                <p><b class="text-danger">Data de Entrega: </b><?= $row['data_entrega']; ?></p>
            </div>
            <div class="col col-6 col-md-4 col-lg-4 col-xl-4">
                <h3>Status</h3>
                <form action="assets/Ocorrencias/Novo/Registrar_ret.php" method="post">
                    <label class="font-weight-normal" for="motoboy"><b class="text-danger">Motoboy:</b></label>
                    <select class="form-control" name="motoboy">
                        <?php
                            $buscaBoy = "SELECT `id_motoboy`,`nome_motoboy` FROM `motoboys`";
                            $buscaBoyExec = mysqli_query($conn, $buscaBoy);
                            while($boys = mysqli_fetch_assoc($buscaBoyExec))
                            { ?>
                                <option value="<?= $boys['id_motoboy']; ?>" 
                                <?=($boys['id_motoboy'] == $row['id_motoboy'])? 'selected': ''; ?>
                                ><?= $boys['nome_motoboy']; ?></option>
                            <?php }
                        ?>
                    </select>
                    <label class="font-weight-normal mt-2" for="flag"><b class="text-danger">Status Retorno: </b></label>
                    <select class="form-control" name="flag">
                        <option value="Retorno 1">Retorno 1</option>
                        <option value="Retorno 2">Retorno 2</option>
                        <option value="Retorno 3">Retorno 3</option>
                        <option value="Retorno 4">Retorno 4</option>
                        <option value="Retorno 5">Retorno 5</option>
                    </select>
                    <label class="font-weight-normal mt-2" for="tabela"><b class="text-danger">Tabela de Preço:</b></label>
                    <select class="form-control" name="tabela">
                        <?php
                            $buscaTabela = "SELECT `id_tabela_preco`, `nome_tabela` FROM `tabela_preco` 
                            WHERE `nome_tabela` LIKE '%Retorno%'";
                            $buscaTabelaExec = mysqli_query($conn, $buscaTabela);
                            while($tabela = mysqli_fetch_assoc($buscaTabelaExec))
                            { ?>
                                <option value="<?= $tabela['id_tabela_preco']; ?>"><?= $tabela['nome_tabela']; ?></option>
                            <?php }
                        ?>
                    </select>
                    <?php
                        $buscaRetorno = "SELECT `status_retorno` FROM `retornos` 
                        WHERE retornos.id_entrega = $id_entrega";
                        $buscaRetornoExec = mysqli_query($conn, $buscaRetorno);
                        $buscaRetornoInfo = mysqli_fetch_assoc($buscaRetornoExec);
                    ?>
                    <label class="font-weight-normal" for="status_retorno"><b class="text-danger">Status Retorno:</b></label>
                    <select class="form-control" name="status_retorno">
                        <option value="Em aberto">Em aberto</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Entregue">Entregue</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                    <p class="font-weight-normal mt-2"><b class="text-danger">Confirmar Retorno</b></p>
                    <input type="text" name="id_cliente" hidden value="<?= $row['id_cliente']; ?>">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmaRetornoModal">
                        Confirmar
                    </button>
                    <div class="modal fade" id="confirmaRetornoModal" tabindex="-1" aria-labelledby="confirmaRetornoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="confirmaRetornoModalLabel">Atenção</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Confirma as informações para o retorno da entrega #<b class="text-danger"><?= $id_entrega; ?></b> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="id_entrega" value="<?= $id_entrega; ?>" class="btn btn-danger">Confirmar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="col col-6 col-md-4 col-lg-4 col-xl-4"></div>
        </div>
    </div>
</main>