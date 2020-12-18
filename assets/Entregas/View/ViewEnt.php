<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

if(!isset($_POST['entrega']))
{
    echo '<p class="text-center text-danger font-weight-bolder">ID da entrega não encontrado!</p>';
}

$id_entrega = $_POST['entrega'];

$bEntrega = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega";
$bEntregaExec = mysqli_query($conn, $bEntrega);
$result = mysqli_fetch_assoc($bEntregaExec);

?>
    <main class="corpo">
        <div class="container">
            <br><h3 class="text-center">Informações da Entrega: n° <span class="text-danger"><?= $id_entrega; ?></span></h3>
            <div class="card mt-3 mb-3 cardInfoEntrega">
                <div class="mt-3 mr-3 mb-3 ml-3">
                    <form action="assets/Entregas/View/AtualizaEnt.php" method="post">
                        <div class="row">
                            <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="font-weight-bold text-dark" for="id_entrega">ID Entrega</label>
                                <input class="form-control text-center" type="text" name="id_entrega" value="<?= $result['id_entrega']; ?>" disabled required>
                            </div>
                            <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="font-weight-bold text-dark" for="nf_origem">NF de venda</label>
                                <input class="form-control text-center" type="text" name="nf_origem" value="<?= $result['nf_origem']; ?>" required>
                            </div>
                            <div class="col col-12 col-md-8 col-lg-8 col-xl-8">
                                <label class="font-weight-bold text-dark" for="id_cliente">Cliente</label>
                                <select class="form-control" name="id_cliente" disabled required>
                                    <?php
                                        
                                        $bClientes = "SELECT `id_cliente`, `nome_cliente` FROM `clientes`";
                                        $bClientesExec = mysqli_query($conn, $bClientes);

                                        while($bClientesResult = mysqli_fetch_assoc($bClientesExec)){ ?>
                                            <option 
                                                value="<?= $bClientesResult['id_cliente']; ?>"
                                                <?= ($result['id_cliente'] == $bClientesResult['id_cliente'])? 'selected':''; ?>
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
                                <select class="form-control" name="id_os" id="sltCliente" required>
                                    <option value="">Selecione uma Ordem de Serviço</option>
                                    <?php
                                        
                                        $bO_S = "SELECT `id_ordem`, `nome_cliente` FROM ordem_servico, clientes WHERE ordem_servico.id_cliente = {$result['id_cliente']} AND clientes.id_cliente = {$result['id_cliente']}";
                                        $bO_SExec = mysqli_query($conn, $bO_S);

                                        while($bO_SResult = mysqli_fetch_assoc($bO_SExec)){ ?>
                                            <option 
                                                value="<?= $bO_SResult['id_ordem']; ?>"
                                                <?= ($result['id_ordem_servico'] == $bO_SResult['id_ordem'])? 'selected':''; ?>
                                                ><?= 'O.S: ' . $bO_SResult['id_ordem'] . ' - ' . $bO_SResult['nome_cliente']; ?>
                                            </option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="id_tabela_preco">Tabela de Preço</label>
                                <select class="form-control" name="id_tabela_preco" required>
                                    <option value="">Selecione a tabela de preço</option>
                                    <?php

                                        $bTabelas = "SELECT * FROM tabela_preco WHERE tabela_preco.id_cliente = {$result['id_cliente']}";
                                        $bTabelasExec = mysqli_query($conn, $bTabelas);

                                        while($bTabelasResult = mysqli_fetch_assoc($bTabelasExec)){ ?>
                                            <option value="<?= $bTabelasResult['id_tabela_preco']; ?>"
                                            <?= ($bTabelasResult['id_tabela_preco'] == $result['id_tabela_preco'])? 'selected':''; ?>
                                            ><?= $bTabelasResult['nome_tabela']; ?></option>
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
                                                <?= ($bMotoboysResult['id_motoboy'] == $result['id_motoboy'])? 'selected':''; ?>>
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
                                <input class="form-control" type="text" name="nome_destinatario" value="<?= $result['nome_destinatario']; ?>" required>
                            </div>
                            <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="font-weight-bold text-dark" for="end_entrega">Endereço</label>
                                <input class="form-control" type="text" name="end_entrega" value="<?= $result['end_entrega']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-3 col-md-2 col-lg-2 col-xl-2">
                                <label class="font-weight-bold text-dark" for="end_num_entrega">Número</label>
                                <input class="form-control" type="text" name="end_num_entrega" value="<?= $result['end_num_entrega']; ?>" required>
                            </div>
                            <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                <label class="font-weight-bold text-dark" for="end_comp_entrega">Complemento (opcional)</label>
                                <textarea class="form-control" name="end_comp_entrega" cols="30" rows="1"><?= $result['end_comp_entrega']; ?></textarea>
                            </div>
                            <div class="col col-9 col-md-5 col-lg-5 col-xl-5">
                                <label class="font-weight-bold text-dark" for="end_bairro_entrega">Bairro</label>
                                <input class="form-control" type="text" name="end_bairro_entrega" value="<?= $result['end_bairro_entrega']; ?>" required>
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                <label class="font-weight-bold text-dark" for="end_cidade_entrega">Cidade</label>
                                <input class="form-control" type="text" name="end_cidade_entrega" value="<?= $result['end_cidade_entrega']; ?>" required>
                            </div>
                            <div class="col col-6 col-md-3 col-lg-3 col-xl-3">
                                <label class="font-weight-bold text-dark" for="end_estado_entrega">Estado</label>
                                <select class="form-control" name="end_estado_entrega" required>
                                    <option value="">Selecione o Estado</option>
                                    <option value="SP" <?= ($result['end_estado_entrega'] == 'SP')? 'selected':''; ?>>SP</option>
                                    <option value="RJ" <?= ($result['end_estado_entrega'] == 'RJ')? 'selected':''; ?>>RJ</option>
                                    <option value="MG" <?= ($result['end_estado_entrega'] == 'MG')? 'selected':''; ?>>MG</option>
                                </select>
                            </div>
                            <div class="col col-6 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="end_cep_entrega">Cep</label>
                                <input class="form-control" type="text" name="end_cep_entrega" value="<?= $result['end_cep_entrega']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                <label class="font-weight-bold text-dark" for="valor_mercadoria">Valor da NF R$</label>
                                <input class="form-control" type="number" name="valor_mercadoria" step="0.10" value="<?= $result['valor_mercadoria']; ?>">
                            </div>
                            <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                <label class="font-weight-bold text-dark" for="cobranca_extra">Cobrança Extra R$</label>
                                <input class="form-control" type="number" name="cobranca_extra" step="0.10" value="<?= $result['cobranca_extra']; ?>">
                            </div>
                            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="forma_pagamento">Forma de Pagamento: </label>
                                <select class="form-control" name="forma_pagamento" id="">
                                    <option value="">Selecione uma opção</option>
                                    <option value="dinheiro" <?= ($result['forma_pagamento'] == 'dinheiro')? 'selected':''; ?>>Dinheiro</option>
                                    <option value="cartão" <?= ($result['forma_pagamento'] == 'cartão')? 'selected':''; ?>>Cartão</option>
                                </select>
                            </div>
                            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="data_entrega">Data da Entrega: </label>
                                <input class="form-control" type="date" name="data_entrega" value="<?= $result['data_entrega']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="status">Status da Entrega</label>
                                <select class="form-control" name="status" <?=($result['status_entrega'] == 'Entregue' || $result['status_entrega'] == 'Cancelada')?'disabled':''?>>
                                    <option value="Em aberto" <?=($result['status_entrega'] == 'Em aberto')?'selected':''?>>Em aberto</option>
                                    <option value="Em andamento" <?=($result['status_entrega'] == 'Em andamento')?'selected':''?>>Em andamento</option>
                                    <option value="Entregue" <?=($result['status_entrega'] == 'Entregue')?'selected':''?>>Entregue</option>
                                    <option value="Cancelada" <?=($result['status_entrega'] == 'Cancelada')?'selected':''?>>Cancelada</option>
                                    <option value="Retorno" <?=($result['status_entrega'] == 'Retorno')?'selected':''?> disabled>Retorno</option>
                                </select>
                            </div>
                            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="font-weight-bold text-dark" for="observacoes">Observações</label>
                                <textarea class="form-control" name="observacoes" cols="30" rows="1"><?= $result['observacoes']; ?></textarea>
                            </div>
                            <?php
                                if($result['status_entrega'] == 'Entregue' || $result['status_entrega'] == 'Cancelada' || $result['status_entrega'] == 'Retorno'){ ?>
                                    <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="font-weight-bold text-dark" for="">Confirmar</label>
                                        <button class="btn btn-block btn-outline-danger" type="submit" name="id_entrega" value="<?= $id_entrega; ?>" disabled>Entrega finalizada</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="font-weight-bold text-dark" for="">Confirmar</label>
                                        <button class="btn btn-block btn-outline-success" type="submit" name="id_entrega" value="<?= $id_entrega; ?>">Atualizar Informações</button>
                                    </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>