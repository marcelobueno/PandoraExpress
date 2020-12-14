<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="assets/Usuarios/Insere_Usuario.php" method="POST">
                        <div class="card">
                            <div class="ml-3 mr-3 mt-3 mb-3">
                                <h2 class="text-center text-dark">Cadastro de usuário</h2>
                                <br>
                                <label class="font-weight-light" for="Nome">Nome do Usuário:</label>
                                <input class="form-control" type="text" name="Nome" id="usNome" required>
                                <label class="font-weight-light" for="Login">Login:</label>
                                <input class="form-control" type="text" name="Login" id="usLogin" required>
                                <label class="font-weight-light" for="Senha">Senha:</label>
                                <input class="form-control" type="password" name="Senha" id="usSenha" required>
                                <label class="font-weight-light" for="Nivel">Nível de Acesso:</label>
                                <select class="form-control" name="Nivel" id="usNivel" required>
                                    <option value="3">Desenvolvedor</option>
                                    <option value="2">Gerente Geral</option>
                                    <option value="1">Operador</option>
                                    <option value="0">Expedição</option>
                                </select>
                                <button class="float-right mt-3 btn btn-dark btn-sm" type="submit">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </main>