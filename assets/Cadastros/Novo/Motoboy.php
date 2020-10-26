<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2 class="mb-3">Cadastro de Motoboy</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <form action="assets/Cadastros/Novo/CadMtb.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-8">
                            <label class="font-weight-normal" for="nome_motoboy">Nome Completo: </label>
                            <input class="form-control" type="text" name="nome_motoboy" id="iptCadMtbNome" required>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="cpf_motoboy">CPF/CNPJ: </label>
                            <input class="form-control" type="text" name="cpf_motoboy" id="iptCadMtbCpf" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="endereco">Endereço: </label>
                            <input class="form-control" type="text" name="endereco" id="iptCadMtbEndereco" required>
                        </div>
                        <div class="col col-2">
                            <label class="font-weight-normal" for="numero">Número: </label>
                            <input class="form-control" type="text" name="numero" id="iptCadMtbNumero" required>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="complemento">Complemento: </label>
                            <input class="form-control" type="text" name="complemento" id="iptCadMtbComplemento">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="bairro">Bairro: </label>
                            <input class="form-control" type="text" name="bairro" id="iptCadMtbBairro" required>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="cidade">Cidade: </label>
                            <input class="form-control" type="text" name="cidade" id="iptCadMtbCidade" required>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="estado">Estado: </label>
                            <select class="form-control" name="estado" id="iptCadMtbEstado" required>
                                <option value="SP">SP</option>
                                <option value="RJ">RJ</option>
                                <option value="MG">MG</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="cep">CEP: </label>
                            <input class="form-control" type="text" name="cep" id="iptCadMtbCep" required>
                        </div>
                    </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="email">E-mail: </label>
                            <input class="form-control" type="text" name="email" id="iptCadMtbEmail" required>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="telefone">Telefone: </label>
                            <input class="form-control" type="text" name="telefone" id="iptCadMtbTelefone">
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-outline-dark" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>