<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";
require __DIR__."/../../Formatar.php";

if(isset($_POST['visualizar_motoboy']))
{
    $motoboy = $_POST['visualizar_motoboy'];

    $buscaMotoboy = "SELECT * FROM `motoboys` WHERE motoboys.id_motoboy = $motoboy";
    $buscaMotoboyExec = mysqli_query($conn, $buscaMotoboy);
    $result = mysqli_fetch_assoc($buscaMotoboyExec); 

    ?>
    <main class="corpo">
        <div class="container">
            <br>
            <div class="text-center">
                <h4>Detalhes do Motoboy: #<span class="text-info"><?= $motoboy; ?><span></h4>
            </div>
            <div class="row">
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col col-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card cardInfoDetails">
                        <div class="mt-3 mr-3 mb-3 ml-3">
                            <span class="font-weight-bolder text-info">Nome: </span>
                            <span class="font-weight-light"><?= $result['nome_motoboy']; ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">CPF/CNPJ: </span>
                            <span class="font-weight-light"><?= FormatarDoc($result['cpf_motoboy']); ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">Telefone: </span>
                            <span class="font-weight-light"><?= FormatarTel($result['tel_motoboy']); ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">E-mail: </span>
                            <span class="font-weight-light"><?= $result['email_motoboy']; ?></span>
                            <br><br>
                            <span class="font-weight-bolder text-info">Endereço: </span>
                            <span class="font-weight-light">
                                <?= $result['end_motoboy']." ".$result['end_num_motoboy'].", ".$result['end_bairro_motoboy']
                                .", ".$result['end_cidade_motoboy']." - ".$result['end_estado_motoboy']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>
    </main>
<?php
}
elseif(isset($_POST['editar_motoboy']))
{ 
    $motoboy = $_POST['editar_motoboy'];

    $buscaMotoboy = "SELECT * FROM `motoboys` WHERE motoboys.id_motoboy = $motoboy";
    $buscaMotoboyExec = mysqli_query($conn, $buscaMotoboy);
    $result = mysqli_fetch_assoc($buscaMotoboyExec); 

    ?>
    <main class="corpo">
        <div class="container">
            <br>
            <div class="text-center">
                <h4>Editar motoboy: #<span class="text-info"><?= $motoboy; ?></span></h4>
            </div>
            <div class="row">
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col col-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card cardInfoDetails">
                        <div class="mt-3 mr-3 mb-3 ml-3">
                            <form action="assets/Cadastros/Novo/AtualizaMot.php" method="post">
                                <label class="font-weight-bolder text-info" for="nome">Razão Social: </label>
                                <input class="form-control" type="text" name="nome" value="<?= $result['nome_motoboy']; ?>" required>
                                <br>
                                <label class="font-weight-bolder text-info" for="cnpj">CPF/CNPJ: </label>
                                <input class="form-control" type="text" name="cnpj" value="<?= $result['cpf_motoboy']; ?>" required>
                                <br>
                                <label class="font-weight-bolder text-info" for="tel">Telefone: </label>
                                <input class="form-control" type="text" name="tel" value="<?= $result['tel_motoboy']; ?>" required>
                                <br>
                                <label class="font-weight-bolder text-info" for="email">E-mail: </label>
                                <input class="form-control" type="text" name="email" value="<?= $result['email_motoboy']; ?>" required>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder text-info" for="endereco">Endereço: </label>
                                            <input class="form-control" type="text" name="endereco" value="<?= $result['end_motoboy']; ?>" required>
                                        </div>
                                        <div class="col col-6 col-md-2 col-lg-2 col-xl-2">
                                            <label class="font-weight-bolder text-info" for="numero">Número: </label>
                                            <input class="form-control" type="text" name="numero" value="<?= $result['end_num_motoboy']; ?>" required>
                                        </div>
                                        <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label class="font-weight-bolder text-info" for="complemento">Complemento: </label>
                                            <input class="form-control" type="text" name="complemento" value="<?= $result['end_comp_motoboy']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label class="font-weight-bolder text-info" for="bairro">Bairro: </label>
                                            <input class="form-control" type="text" name="bairro" value="<?= $result['end_bairro_motoboy']; ?>" required>
                                        </div>
                                        <div class="col col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label class="font-weight-bolder text-info" for="cidade">Cidade: </label>
                                            <input class="form-control" type="text" name="cidade" value="<?= $result['end_cidade_motoboy']; ?>" required>
                                        </div>
                                        <div class="col col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label class="font-weight-bolder text-info" for="estado">Estado: </label>
                                            <select class="form-control" name="estado" required>
                                                <option value="SP" <?=($result['end_estado_motoboy'] == "SP")? 'selected':''; ?>>SP</option>
                                                <option value="RJ" <?=($result['end_estado_motoboy'] == "RJ")? 'selected':''; ?>>RJ</option>
                                                <option value="MG" <?=($result['end_estado_motoboy'] == "MG")? 'selected':''; ?>>MG</option>
                                            </select>
                                        </div>
                                        <div class="col col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label class="font-weight-bolder text-info" for="cep">CEP: </label>
                                            <input class="form-control" type="text" name="cep" value="<?= $result['end_cep_motoboy']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-info" type="submit" name="id" value="<?= $motoboy; ?>">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-1 col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>
        <br>
    </main>
<?php
}
elseif(isset($_POST['deletar_motoboy']))
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