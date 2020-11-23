<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

$buscarMotoboy = "SELECT * FROM `motoboys`";
$buscarMotoboyExec = mysqli_query($conn, $buscarMotoboy);

?>

<main class="corpo">
        <div class="container">
            <div class="text-center">
                <br>
                <h3>Fechamento - Motoboy</h3>
            </div>
            <div class="row mt-5">
                <div class="col col-0 col-md-2 col-lg-2 col-xl-2">

                </div>
                <div class="col col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="ml-3 mr-3 mt-3 mb-3">
                        <form action="#" method="post" target="_blank">
                            <label class="font-weight-normal" for="motoboy"><b class="text-danger">Selecione o Motoboy: </b></label>
                            <select class="form-control" name="motoboy" id="">
                                <?php
                                    while($result = mysqli_fetch_assoc($buscarMotoboyExec))
                                    { ?>
                                        <option value="<?= $result['id_motoboy']; ?>"><?= $result['nome_motoboy']; ?></option>
                                    <?php }
                                ?>
                            </select>
                            <label class="font-weight-normal mt-3" for="data_ini"><b class="text-danger">Selecione a Data Início: </b></label>
                            <input class="form-control" type="date" name="data_ini">
                            <label class="font-weight-normal mt-3" for="data_fim"><b class="text-danger">Selecione a Data Fim: </b></label>
                            <input class="form-control" type="date" name="data_fim">
                            <button class="btn btn-lg btn-success mt-3 float-right" type="submit">Gerar Relatório</button>
                        </form>
                    </div>
                </div>
                <div class="col col-0 col-md-2 col-lg-2 col-xl-2">

                </div>
            </div>
        </div>
</main>