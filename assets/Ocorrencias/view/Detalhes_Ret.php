<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(isset($_POST['id_entrega']) && !empty($_POST['id_entrega']))
{
    $id_entrega = $_POST['id_entrega'];
    $id_retorno = $_POST['id_retorno'];

    $query = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega LIMIT 1";
    $exec = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec);

    $bRet = "SELECT * FROM retornos WHERE id_retorno = $id_retorno";
    $bRetExec = mysqli_query($conn, $bRet);
    $bRetResult = mysqli_fetch_assoc($bRetExec);
}
else
{
    $_SESSION['alert'] = '<div class="alert alert-danger" role="alert">Erro ao registrar Retorno</div>';
    header('location:../../../index.php?pagina=Novo-Retorno');
}
?>
<main class="corpo" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <br>
        <h3 class="text-center">Informações da Entrega: n° <span class="text-danger"><?= $id_entrega; ?></span><br>
            Retorno: n° <span class="text-danger"><?= $bRetResult['id_retorno']; ?></h3></span>
        <div class="card mt-3 mb-3 cardInfoEntrega">
            <div class="mt-3 mr-3 mb-3 ml-3">
                <form action="assets/Ocorrencias/Novo/Registrar_ret.php" method="post">
                    <div class="row">
                        <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold text-dark" for="id_entrega">ID Entrega</label>
                            <input class="form-control text-center" type="text" name="id_entrega" value="<?= $row['id_entrega']; ?>" readonly>
                        </div>
                        <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold text-dark" for="nf_origem">NF de venda</label>
                            <input class="form-control text-center" type="text" name="nf_origem" value="<?= $row['nf_origem']; ?>" readonly>
                        </div>
                        <div class="col col-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="font-weight-bold text-dark" for="id_cliente">Cliente</label>
                            <select class="form-control" name="id_cliente" readonly>
                                <?php

                                $bClientes = "SELECT `id_cliente`, `nome_cliente` FROM `clientes`";
                                $bClientesExec = mysqli_query($conn, $bClientes);

                                while($bClientesResult = mysqli_fetch_assoc($bClientesExec)){ ?>
                                    <option
                                            value="<?= $bClientesResult['id_cliente']; ?>"
                                        <?= ($row['id_cliente'] == $bClientesResult['id_cliente'])? 'selected':''; ?>
                                    ><?= $bClientesResult['nome_cliente']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="id_os">Ordem de serviço</label>
                            <select class="form-control" name="id_os" id="sltCliente" readonly="readonly">
                                <option value="">Selecione uma Ordem de Serviço</option>
                                <?php

                                $bO_S = "SELECT `id_ordem`, `nome_cliente` FROM ordem_servico, clientes WHERE ordem_servico.id_cliente = {$row['id_cliente']} AND clientes.id_cliente = {$row['id_cliente']}";
                                $bO_SExec = mysqli_query($conn, $bO_S);

                                while($bO_SResult = mysqli_fetch_assoc($bO_SExec)){ ?>
                                    <option
                                            value="<?= $bO_SResult['id_ordem']; ?>"
                                        <?= ($row['id_ordem_servico'] == $bO_SResult['id_ordem'])? 'selected':''; ?>
                                    ><?= 'O.S: ' . $bO_SResult['id_ordem'] . ' - ' . $bO_SResult['nome_cliente']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="id_tabela">Tabela de Preço</label>
                            <select class="form-control" name="id_tabela" required>
                                <option value="">Selecione a tabela de preço</option>
                                <?php
                                $buscaTabela = "SELECT `id_tabela_preco`, `nome_tabela` FROM `tabela_preco` 
                                                WHERE `nome_tabela` LIKE '%Retorno%' AND tabela_preco.id_cliente = {$row['id_cliente']}";
                                $buscaTabelaExec = mysqli_query($conn, $buscaTabela);

                                while($tabela = mysqli_fetch_assoc($buscaTabelaExec))
                                { ?>
                                    <option value="<?= $tabela['id_tabela_preco']; ?>"
                                        <?=($bRetResult['id_tabela'] == $tabela['id_tabela_preco'])? 'selected':''; ?>
                                    ><?= $tabela['nome_tabela']; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="id_motoboy">Motoboy</label>
                            <select class="form-control" name="id_motoboy" required>
                                <option value="">Selecione um Motoboy</option>
                                <?php

                                $bMotoboys = "SELECT `id_motoboy`, `nome_motoboy` FROM motoboys";
                                $bMotoboysExec = mysqli_query($conn, $bMotoboys);

                                while($bMotoboysResult = mysqli_fetch_assoc($bMotoboysExec)){ ?>
                                    <option value="<?= $bMotoboysResult['id_motoboy']; ?>"
                                        <?= ($bMotoboysResult['id_motoboy'] == $row['id_motoboy'])? 'selected':''; ?>>
                                        <?= $bMotoboysResult['nome_motoboy']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="font-weight-bold text-dark" for="nome_destinatario">Nome do Destinatário</label>
                            <input class="form-control" type="text" name="nome_destinatario" value="<?= $row['nome_destinatario']; ?>" required>
                        </div>
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="font-weight-bold text-dark" for="end_entrega">Endereço</label>
                            <input class="form-control" type="text" name="end_entrega" value="<?= $row['end_entrega']; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-3 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold text-dark" for="end_num_entrega">Número</label>
                            <input class="form-control" type="text" name="end_num_entrega" value="<?= $row['end_num_entrega']; ?>" required>
                        </div>
                        <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                            <label class="font-weight-bold text-dark" for="end_comp_entrega">Complemento (opcional)</label>
                            <textarea class="form-control" name="end_comp_entrega" cols="30" rows="1"><?= $row['end_comp_entrega']; ?></textarea>
                        </div>
                        <div class="col col-9 col-md-5 col-lg-5 col-xl-5">
                            <label class="font-weight-bold text-dark" for="end_bairro_entrega">Bairro</label>
                            <input class="form-control" type="text" name="end_bairro_entrega" value="<?= $row['end_bairro_entrega']; ?>" required>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                            <label class="font-weight-bold text-dark" for="end_cidade_entrega">Cidade</label>
                            <input class="form-control" type="text" name="end_cidade_entrega" value="<?= $row['end_cidade_entrega']; ?>" required>
                        </div>
                        <div class="col col-6 col-md-3 col-lg-3 col-xl-3">
                            <label class="font-weight-bold text-dark" for="end_estado_entrega">Estado</label>
                            <select class="form-control" name="end_estado_entrega" required>
                                <option value="">Selecione o Estado</option>
                                <option value="SP" <?= ($row['end_estado_entrega'] == 'SP')? 'selected':''; ?>>SP</option>
                                <option value="RJ" <?= ($row['end_estado_entrega'] == 'RJ')? 'selected':''; ?>>RJ</option>
                                <option value="MG" <?= ($row['end_estado_entrega'] == 'MG')? 'selected':''; ?>>MG</option>
                            </select>
                        </div>
                        <div class="col col-6 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="end_cep_entrega">Cep</label>
                            <input class="form-control" type="text" name="end_cep_entrega" value="<?= $row['end_cep_entrega']; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold text-dark" for="valor_mercadoria">Valor da NF R$</label>
                            <input class="form-control" type="number" name="valor_mercadoria" step="0.10" value="<?= $row['valor_mercadoria']; ?>">
                        </div>
                        <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                            <label class="font-weight-bold text-dark" for="cobranca_extra">Cobrança Extra R$</label>
                            <input class="form-control" type="number" name="cobranca_extra" step="0.10" value="<?= $row['cobranca_extra']; ?>">
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="forma_pagamento">Forma de Pagamento: </label>
                            <select class="form-control" name="forma_pagamento" id="">
                                <option value="">Selecione uma opção</option>
                                <option value="dinheiro" <?= ($row['forma_pagamento'] == 'dinheiro')? 'selected':''; ?>>Dinheiro</option>
                                <option value="cartão" <?= ($row['forma_pagamento'] == 'cartão')? 'selected':''; ?>>Cartão</option>
                                <option value="dinheiro/cartão" <?= ($row['forma_pagamento'] == 'dinheiro/cartão')? 'selected':''; ?>>Dinheiro/Cartão</option>
                                <option value="cheque" <?= ($row['forma_pagamento'] == 'cheque')? 'selected':''; ?>>Cheque</option>
                                <option value="pago" <?= ($row['forma_pagamento'] == 'pago')? 'selected':''; ?>>Pago</option>
                                <option value="a pagar" <?= ($row['forma_pagamento'] == 'a pagar')? 'selected':''; ?>>A pagar</option>
                            </select>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="data_entrega">Data da Entrega: </label>
                            <input class="form-control" type="date" name="data_entrega" value="<?= $row['data_entrega']; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="status">Status da Entrega</label>
                            <select class="form-control" name="status" readonly="readonly">
                                <option value="Em aberto" <?=($row['status_entrega'] == 'Em aberto')?'selected':''?>>Em aberto</option>
                                <option value="Em andamento" <?=($row['status_entrega'] == 'Em andamento')?'selected':''?>>Em andamento</option>
                                <option value="Entregue" <?=($row['status_entrega'] == 'Entregue')?'selected':''?>>Entregue</option>
                                <option value="Cancelada" <?=($row['status_entrega'] == 'Cancelada')?'selected':''?>>Cancelada</option>
                                <option value="Retorno" <?=($row['status_entrega'] == 'Retorno')?'selected':''?> disabled>Retorno</option>
                            </select>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="flag">Flag Retorno</label>
                            <select class="form-control" name="flag">
                                <option value="Retorno 1" <?=($bRetResult['flag'] == "Retorno 1")? 'selected':''; ?>>Retorno 1</option>
                                <option value="Retorno 2" <?=($bRetResult['flag'] == "Retorno 2")? 'selected':''; ?>>Retorno 2</option>
                                <option value="Retorno 3" <?=($bRetResult['flag'] == "Retorno 3")? 'selected':''; ?>>Retorno 3</option>
                                <option value="Retorno 4" <?=($bRetResult['flag'] == "Retorno 4")? 'selected':''; ?>>Retorno 4</option>
                                <option value="Retorno 5" <?=($bRetResult['flag'] == "Retorno 5")? 'selected':''; ?>>Retorno 5</option>
                            </select>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="font-weight-bold text-dark" for="observacoes">Observações</label>
                            <textarea class="form-control" name="observacoes" cols="30" rows="1"><?= $row['observacoes']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="font-weight-bold text-dark" for="status_retorno">Status Retorno</label>
                            <select class="form-control" name="status_retorno">
                                <option value="Em aberto"<?=($bRetResult['status_retorno'] == 'Em aberto')? 'selected':''; ?>>Em aberto</option>
                                <option value="Em andamento"<?=($bRetResult['status_retorno'] == 'Em andamento')? 'selected':''; ?>>Em andamento</option>
                                <option value="Entregue"<?=($bRetResult['status_retorno'] == 'Entregue')? 'selected':''; ?>>Entregue</option>
                                <option value="Cancelada"<?=($bRetResult['status_retorno'] == 'Cancelada')? 'selected':''; ?>>Cancelada</option>
                            </select>
                        </div>
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                            <?php
                            if($bRetResult['status_retorno'] == 'Em aberto' || $bRetResult['status_retorno'] == 'Em andamento'){ ?>
                                <label class="font-weight-bold text-dark" for="">Confirmar</label>
                                <button class="btn btn-block btn-outline-success" type="submit">Atualizar informações</button>
                            <?php } else { ?>
                                <label class="font-weight-bold text-dark" for="">Confirmar</label>
                                <button class="btn btn-block btn-outline-danger" type="submit" disabled>Retorno finalizado</button>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>