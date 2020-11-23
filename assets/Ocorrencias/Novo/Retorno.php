<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <?php
                if(isset($_SESSION['alert']))
                {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <h3 class="text-center">Registrar Retorno</h3>
            <table class="display table table-hoverable table-bordered">
                <thead class="thead-dark">
                    <th width="140px">ID Entrega</th>
                    <th width="140px">ID O.S</th>
                    <th>Cliente</th>
                    <th class="text-center" width="200px">Selecionar</th>
                </thead>
                <tbody>
                    <?php
                        $count = 1;

                        $sql = "SELECT * FROM entregas 
                        WHERE entregas.status_entrega != 'Entregue' 
                        AND entregas.status_entrega != 'Cancelada' 
                        AND entregas.status_entrega != 'Retorno'";
                        $exec = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($exec))
                        { 
                        $cliente = $row['id_ordem_servico']; 
                        ?>
                        <tr>
                            <td class="text-center"><?= $row['id_entrega']; ?></td>
                            <td class="text-center"><?= $row['id_ordem_servico']; ?></td>
                            <td>
                                <?php
                                    $sql2 = "SELECT clientes.nome_cliente FROM clientes, ordem_servico 
                                    WHERE ordem_servico.id_ordem = $cliente 
                                    AND ordem_servico.id_cliente = clientes.id_cliente";
                                    $exec2 = mysqli_query($conn, $sql2);
                                    $result = mysqli_fetch_assoc($exec2);
                                    echo $result['nome_cliente'];
                                ?>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#retornoModal<?= $count; ?>">
                                Selecionar
                                </button>
                                <div class="modal fade" id="retornoModal<?= $count; ?>" tabindex="-1" aria-labelledby="retornoTitulo<?= $count; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="retornoTitulo<?= $count; ?>">Detalhes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b class="text-danger">Destinatário:</b> <?= $row['nome_destinatario']; ?></p>
                                        <p><b class="text-danger">Endereço: </b><?= $row['end_entrega'] .", "
                                        . $row['end_num_entrega'] ." ". $row['end_bairro_entrega'] .", "
                                        . $row['end_cidade_entrega'] ." - ". $row['end_estado_entrega']; ?></p>
                                        <p><b class="text-danger">CEP: </b><?= mb_substr($row['end_cep_entrega'], 0, 5) ."-"
                                        . mb_substr($row['end_cep_entrega'], 5); ?></p>
                                        <p><b class="text-danger">Complemento: </b><?= $row['end_comp_entrega']; ?></p>
                                        <p><b class="text-danger">Data de Entrega: </b><?= $row['data_entrega']; ?></p>
                                        <br>
                                        <p class="font-weight-normal">Confirmar ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form action="?pagina=Confirmar-Retorno" method="post">
                                            <button type="submit" name="id_entrega" value="<?= $row['id_entrega']; ?>" class="btn btn-danger">Confirmar</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <?php $count++; }
                    ?>
                </tbody>
            </table>
        </div>
    </main>