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
            <h3 class="text-center">Entregas Lançadas</h3>
        </div>
        <div class="mt-3 mb-3 row">
            <div class="col col-0 col-md-2 col-lg-2 col-xl-2"></div>
            <div class="col col-12 col-md-8 col-lg-8 col-xl-8">
                <table class="table table-sm table-striped table-bordered display">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Entrega</th>
                            <th>Cliente</th>
                            <th>NF de venda</th>
                            <!-- <th class="text-center">Complementos</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bEntregas = "SELECT * FROM `entregas` ORDER BY entregas.id_entrega DESC";
                            $bEntregasExec = mysqli_query($conn, $bEntregas);

                            while($bEntregasResult = mysqli_fetch_assoc($bEntregasExec)){ 
                                $cliente = $bEntregasResult['id_cliente'] ?>
                                <tr>
                                    <td class="text-center"><?= $bEntregasResult['id_entrega']; ?></td>
                                    <td>
                                        <?php

                                        $bCliente = "SELECT `nome_cliente` FROM `clientes` WHERE clientes.id_cliente = $cliente";
                                        $bClienteExec = mysqli_query($conn, $bCliente);
                                        $bClienteResult = mysqli_fetch_assoc($bClienteExec);
                                        echo $bClienteResult['nome_cliente'];

                                        ?>
                                    </td>
                                    <td class="text-center"><?= $bEntregasResult['nf_origem']; ?></td>
                                    <!-- <td class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <form action="?pagina=Detalhes-Entrega" method="post">
                                                    <button class="btn btn-sm btn-outline-success" title="Visualizar os detalhes" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                                                            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form action="#" method="post">
                                                    <button class="btn btn-sm btn-outline-info" title="Complementar informações" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col col-0 col-md-2 col-lg-2 col-xl-2"></div>
        </div>
</main>