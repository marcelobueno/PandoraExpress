<?php

require __DIR__ . "/../Conexao.php";
require __DIR__ . "/../Verifica_login.php";

?>
<main class="corpo">
    <div class="container">
        <br>
        <?php
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
        ?>
        <h4 class="text-center">Descontos - Cliente</h4>
        <div class="row">
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                <div class="my-3">
                    <div class="card shadow">
                        <div class="my-3 mx-3">
                            <div class="text-center">
                                <p><small>Selecione o cliente, data e desconto.</small></p>
                            </div>
                            <form action="?pagina=Gravar-Desconto-Cliente" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="cliente">Cliente</label>
                                    <select class="form-control" name="cliente" required>
                                        <option value="">-- Selecione o Cliente --</option>
                                        <?php
                                        $bClientes = "SELECT id_cliente, nome_cliente FROM clientes";
                                        $exec = mysqli_query($conn, $bClientes);

                                        while ($row = mysqli_fetch_assoc($exec)) { ?>
                                            <option value="<?= $row['id_cliente']; ?>"><?= mb_strtoupper($row['nome_cliente']); ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="desconto">Desconto</label>
                                    <input class="form-control" type="number" name="desconto" step="0.10" placeholder="R$" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="data">Data</label>
                                    <input class="form-control" type="date" name="data" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="descricao">Descrição</label>
                                    <textarea class="form-control" name="descricao" cols="30" rows="5" placeholder="Adicione uma descrição" required></textarea>
                                </div>
                                <button class="btn btn-lg btn-block btn-outline-dark" type="submit">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
        </div>
        <div class="dropdown-divider"></div>
        <?php
        $bDescCli = "SELECT * FROM descontos_clientes";
        $bDescCliExec = mysqli_query($conn, $bDescCli);
        $bDescCliResult = mysqli_num_rows($bDescCliExec);

        if ($bDescCliResult > 0) { ?>
            <div class="my-3">
                <h5 class="text-center">Histórico</h5>
                <table class="table table-sm table-hover display">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" width="40px">ID</th>
                            <th class="text-center" width="80px">Data</th>
                            <th>Cliente</th>
                            <th class="text-center" width="80px">Valor</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = mysqli_fetch_assoc($bDescCliExec)) { ?>
                            <tr>
                                <td class="text-center"><?= $result['id_desconto']; ?></td>
                                <td class="text-center"><?= $result['data_desconto']; ?></td>
                                <td>
                                    <?php
                                    $bNome = "SELECT nome_cliente FROM clientes WHERE id_cliente = {$result['id_cliente']}";
                                    $bNomeExec = mysqli_query($conn, $bNome);
                                    $bNomeResult = mysqli_fetch_assoc($bNomeExec);

                                    echo mb_strtoupper($bNomeResult['nome_cliente']);
                                    ?>
                                </td>
                                <td class="text-center">R$<?= $result['valor']; ?></td>
                                <td><?= $result['descricao']; ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php }
        ?>
    </div>
</main>