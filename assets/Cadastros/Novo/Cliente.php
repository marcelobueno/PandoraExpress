<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2 class="mb-3">Cadastro de Cliente</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <form action="assets/Cadastros/Novo/CadCli.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-8">
                            <label class="font-weight-normal" for="nome_cliente">Razão Social: </label>
                            <input class="form-control" type="text" name="nome_cliente" id="iptCadCliNome" required placeholder="Ex: Farmácia Exemplo LTDA.">
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="cnpj">CPF/CNPJ: </label>
                            <input class="form-control" type="text" name="cnpj" id="iptCadCliCnpj" required placeholder="Ex: 29281857000190">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="endereco">Endereço: </label>
                                <input class="form-control" type="text" name="endereco" id="iptCadCliEndereco" required>
                            </div>
                            <div class="col col-2">
                                <label class="font-weight-normal" for="numero">Número: </label>
                                <input class="form-control" type="text" name="numero" id="iptCadCliNumero" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="complemento">Complemento: </label>
                                <input class="form-control" type="text" name="complemento" id="iptCadCliComplemento">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="bairro">Bairro: </label>
                                <input class="form-control" type="text" name="bairro" id="iptCadCliBairro" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="cidade">Cidade: </label>
                                <input class="form-control" type="text" name="cidade" id="iptCadCliCidade" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="estado">Estado: </label>
                                <select class="form-control" name="estado" id="iptCadCliEstado" required>
                                    <option value="SP">SP</option>
                                    <option value="RJ">RJ</option>
                                    <option value="MG">MG</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="cep">CEP: </label>
                                <input class="form-control" type="text" name="cep" id="iptCadCliCep" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-normal" for="email">E-mail: </label>
                                <input class="form-control" type="text" name="email" id="iptCadCliEmail" required placeholder="Ex: contato@exemplo.com">
                            </div>
                            <div class="col">
                                <label class="font-weight-normal" for="telefone">Telefone + DDD: </label>
                                <input class="form-control" type="text" name="telefone" id="iptCadCliTelefone" required placeholder="Ex: 1199999999">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-outline-dark" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>