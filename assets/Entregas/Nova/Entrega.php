<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
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
            <form action="assets/Entregas/Nova/CadEnt.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="ordem_servico">Ordem de Serviço: </label>
                            <select class="form-control" name="ordem_servico" id="iptCadEntOrdem" required>
                                <?php
                                    $sql = 'SELECT OS.id_ordem, OS.id_cliente, CLI.nome_cliente FROM ordem_servico AS OS, clientes AS CLI 
                                    WHERE OS.status_os = "Aberta" AND OS.id_cliente = CLI.id_cliente';
                                    
                                    $exec = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($exec))
                                    { ?>
                                        <option value="<?php echo $row['id_ordem']; ?>"><?php echo $row['nome_cliente']; ?> - O.S: <?php echo $row['id_ordem']; ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="tabela_preco">Tabela Preco: </label>
                            <select class="form-control" name="tabela_preco">
                            <?php
                                    $sql = 'SELECT `id_cliente`, `nome_tabela` from tabela_preco ORDER BY `nome_tabela`';
                                    
                                    $exec = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($exec))
                                    { $id_cliente = $row['id_cliente'];?>
                                        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nome_tabela']; ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="nome_dest">Nome destinatário: </label>
                            <input class="form-control" type="text" name="nome_dest" id="iptCadEntNomeDest" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="endereco">Endereço: </label>
                                <input class="form-control" type="text" name="endereco" id="iptCadEntEndereco" required>
                            </div>
                            <div class="col col-2">
                                <label class="font-weight-normal" for="numero">Número: </label>
                                <input class="form-control" type="text" name="numero" id="iptCadEntNumero" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="complemento">Complemento (Opcional): </label>
                                <input class="form-control" type="text" name="complemento" id="iptCadEntComplemento">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="bairro">Bairro: </label>
                                <input class="form-control" type="text" name="bairro" id="iptCadEntBairro" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="cidade">Cidade: </label>
                                <input class="form-control" type="text" name="cidade" id="iptCadEntCidade" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="estado">Estado: </label>
                                <select class="form-control" name="estado" id="iptCadEntEstado" required>
                                    <option value="SP">São Paulo</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="MG">Minas Gerais</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="cep">CEP (Somente números): </label>
                                <input class="form-control" type="text" name="cep" id="iptCadEntCep" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="motoboy">Motoboy: </label>
                                <select class="form-control" name="motoboy" id="" required>
                                    <?php
                                        $sql = "SELECT `id_motoboy`, `nome_motoboy` FROM `motoboys`";
                                        $exec = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($exec))
                                        { ?>
                                            <option value="<?php echo $row['id_motoboy']; ?>"><?php echo $row['nome_motoboy']; ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="data">Data da Entrega: </label>
                                <input class="form-control" type="date" name="data" id="" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="forma_pagamento">Forma de Pagamento: </label>
                                <select class="form-control" name="forma_pagamento" id="">
                                    <option value="dinheiro">Dinheiro</option>
                                    <option value="cartão">Cartão</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="valor">Valor da Mercadoria: </label>
                                <input class="form-control" type="number" step="0.10" name="valor" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-outline-dark" type="submit">Registrar</button>
            </form>
        </div>
    </main>