<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2 class="mb-3">Nova Entrega</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <?php
                if(!isset($_POST['id_os'])){ ?>
                    <div class="card mt-3 mb-3 cardInfoEntrega shadow">
                        <div class="mt-5 mr-3 mb-3 ml-3">
                            <form action="?pagina=Cadastro-de-Entrega" method="post">
                                <div class="row">                       
                                    <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bold text-dark" for="id_os">Ordem de serviço</label>
                                        <select class="form-control" name="id_os">
                                            <option value="">Selecione a Ordem de serviço</option>
                                            <?php
                                                $sql = 'SELECT OS.id_ordem, OS.id_cliente, CLI.nome_cliente FROM ordem_servico AS OS, clientes AS CLI 
                                                WHERE OS.status_os = "Aberta" AND OS.id_cliente = CLI.id_cliente';
                                                
                                                $exec = mysqli_query($conn, $sql);

                                                while($row = mysqli_fetch_assoc($exec))
                                                { ?>
                                                    <option value="<?php echo $row['id_ordem']; ?>">O.S: <?php echo $row['id_ordem']; ?> - <?php echo $row['nome_cliente']; ?></option>
                                                <?php }
                                            ?>
                                        </select>   
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bold text-dark" for="nf_origem">NF de Venda</label>
                                        <input class="form-control" type="text" name="nf_origem">
                                    </div>              
                                </div>
                                <div class="float-right mt-3">
                                    <button class="btn btn-sm btn-primary" type="submit">Avançar</button>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php } //Final do primeiro if

                if(isset($_POST['id_os']))
                { 
                    $id_ordem = $_POST['id_os'];
                    $nf_origem = $_POST['nf_origem']; 

                    $bCliente = "SELECT `id_cliente` FROM `ordem_servico` WHERE ordem_servico.id_ordem = $id_ordem";
                    $bClienteExec = mysqli_query($conn, $bCliente);
                    $result = mysqli_fetch_assoc($bClienteExec); ?>

                <div class="card mt-3 mb-3 cardInfoEntrega shadow">

                    <input type="hidden" name="cadEnt">
                    <input type="hidden" name="id_os" value="<?= $id_ordem; ?>">
                    <input type="hidden" name="nf_origem" value="<?= $nf_origem; ?>">

                    <div class="mt-3 mr-3 mb-3 ml-3">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="font-weight-bold text-dark" for="ordem">Ordem de Serviço</label>
                                    <select class="form-control" name="ordem" disabled>
                                        <?php
                                            $bO_S = "SELECT `id_ordem`, `nome_cliente` FROM ordem_servico, clientes WHERE ordem_servico.id_cliente = {$result['id_cliente']} AND clientes.id_cliente = {$result['id_cliente']}";
                                            $bO_SExec = mysqli_query($conn, $bO_S);
                                            $bO_SResult = mysqli_fetch_assoc($bO_SExec);
                                        ?>
                                        <option value=""><?= 'O.S: ' . $bO_SResult['id_ordem'] . ' - ' . $bO_SResult['nome_cliente']; ?></option>
                                    </select>
                                </div>
                                <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold text-dark" for="nf">NF de venda</label>
                                    <input class="form-control" type="text" value="<?= $nf_origem; ?>" disabled>
                                </div>
                                <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="font-weight-bold text-dark" for="id_tabela">Tabela de preço</label>
                                    <select class="form-control" name="id_tabela" required>
                                        <option value="">Selecione a tabela de preço</option>
                                        <?php
                                            $bTabelas = "SELECT * FROM `tabela_preco` WHERE tabela_preco.id_cliente = {$result['id_cliente']}";
                                            $bTabelasExec = mysqli_query($conn, $bTabelas);

                                            while($bTabelasResult = mysqli_fetch_assoc($bTabelasExec)){ ?>
                                                <option value="<?= $bTabelasResult['id_tabela_preco']; ?>"><?= $bTabelasResult['nome_tabela']; ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="font-weight-bold text-dark" for="id_motoboy">Motoboy</label>
                                    <select class="form-control" name="id_motoboy" required>
                                        <option value="">Selecione um Motoboy</option>
                                        <?php

                                            $bMotoboys = "SELECT `id_motoboy`, `nome_motoboy` FROM motoboys";
                                            $bMotoboysExec = mysqli_query($conn, $bMotoboys);

                                            while($bMotoboysResult = mysqli_fetch_assoc($bMotoboysExec)){ ?>
                                                <option value="<?= $bMotoboysResult['id_motoboy']; ?>"><?= $bMotoboysResult['nome_motoboy']; ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="font-weight-bold text-dark" for="nome_destinatario">Nome do Destinatário</label>
                                    <input class="form-control" type="text" name="nome_destinatario" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="font-weight-bold text-dark" for="end_entrega">Endereço</label>
                                    <input class="form-control" type="text" name="end_entrega" required>
                                </div>
                                <div class="col col-3 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold text-dark" for="end_num_entrega">Número</label>
                                    <input class="form-control" type="text" name="end_num_entrega" required>
                                </div>
                                <div class="col col-12 col-md-5 col-lg-5 col-xl-5">
                                    <label class="font-weight-bold text-dark" for="end_comp_entrega">Complemento (opcional)</label>
                                    <textarea class="form-control" name="end_comp_entrega" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col col-9 col-md-3 col-lg-3 col-xl-3">
                                    <label class="font-weight-bold text-dark" for="end_bairro_entrega">Bairro</label>
                                    <input class="form-control" type="text" name="end_bairro_entrega" required>
                                </div>
                                <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="font-weight-bold text-dark" for="end_cidade_entrega">Cidade</label>
                                    <input class="form-control" type="text" name="end_cidade_entrega" required>
                                </div>
                                <div class="col col-6 col-md-3 col-lg-3 col-xl-3">
                                    <label class="font-weight-bold text-dark" for="end_estado_entrega">Estado</label>
                                    <select class="form-control" name="end_estado_entrega" required>
                                        <option value="">Selecione o Estado</option>
                                        <option value="SP">SP</option>
                                        <option value="RJ">RJ</option>
                                        <option value="MG">MG</option>
                                    </select>
                                </div>
                                <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold text-dark" for="end_cep_entrega">Cep</label>
                                    <input class="form-control" type="text" name="end_cep_entrega" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold text-dark" for="valor_mercadoria">Valor da NF R$</label>
                                    <input class="form-control" type="number" name="valor_mercadoria" step="0.10">
                                </div>
                                <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="font-weight-bold text-dark" for="forma_pagamento">Forma de Pagamento:</label>
                                    <select class="form-control" name="forma_pagamento">
                                        <option value="">Selecione uma opção</option>
                                        <option value="dinheiro">Dinheiro</option>
                                        <option value="cartão">Cartão</option>
                                    </select>
                                </div>
                                <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                    <label class="font-weight-bold text-dark" for="data_entrega">Data da Entrega: </label>
                                    <input class="form-control" type="date" name="data_entrega" required>
                                </div>
                                <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="font-weight-bold text-dark" for="observacoes">Observações</label>
                                    <textarea class="form-control" name="observacoes" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4 float-right">
                                <div class="mr-3">
                                    <button class="btn btn-xl btn-outline-success" type="submit" name="id_entrega">Registrar entrega</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>