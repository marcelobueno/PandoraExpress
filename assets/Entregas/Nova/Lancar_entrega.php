<?php

require __DIR__."/../../Conexao.php";
require __DIR__."/../../Verifica_login.php";

?>
<main class="corpo">
        <div class="container">
            <br>
            <?php
                if(isset($_SESSION['alert']))
                {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <h3 class="text-center">Lançar entregas</h3>
            <div class="row mt-4">
                <!-- <div class="col col-0 col-md-1 col-lg-1 col-xl-1">

                </div> -->
                <div class="col col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card" id="cardInfoEntLan">
                        <div class="mt-5 mb-5 mr-3 ml-3">
                            <form action="assets/Entregas/Nova/CadEnt.php" method="post">
                                <div class="row">
                                    <div class="col col-12 col-md-8 col-lg-8 col-xl-8">
                                        <label for="cliente">Cliente:</label>
                                        <select class="form-control" name="cliente" id="" required>
                                            <option value="">Selecione o cliente</option>
                                            <?php
                                                $bCliente = "SELECT * FROM `clientes` ORDER BY `nome_cliente`";
                                                $bClienteExec = mysqli_query($conn, $bCliente);

                                                while($row = mysqli_fetch_assoc($bClienteExec)){ ?>
                                                    <option value="<?= $row['id_cliente']; ?>"><?= $row['nome_cliente'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                        <label for="nf">Nota fiscal:</label>
                                        <input class="form-control" type="text" name="nf" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                                        <label for="motoboy">Motoboy:</label>
                                        <select class="form-control" name="motoboy" id="" required>
                                            <option value="">Selecione o motoboy</option>
                                            <?php
                                                $bMotoboys = "SELECT * FROM `motoboys` ORDER BY `nome_motoboy`";
                                                $bMotoboysExec = mysqli_query($conn, $bMotoboys);

                                                while($bMotoboysResult = mysqli_fetch_assoc($bMotoboysExec)){ ?>
                                                    <option value="<?= $bMotoboysResult['id_motoboy']; ?>"><?= $bMotoboysResult['nome_motoboy']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 col-xl-6">
                                        <label for="observacoes">Observações:</label>
                                        <textarea class="form-control" name="observacoes" cols="30" rows="1"></textarea>
                                    </div>
                                    <div class="col col-12 col-md-2 col-lg-2 col-xl-2">
                                        <label for="">Confirmar</label>
                                        <button class="btn btn-block btn-outline-success" type="submit">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col col-0 col-md-1 col-lg-1 col-xl-1">
                    
                </div> -->
            </div>
        </div>
</main>