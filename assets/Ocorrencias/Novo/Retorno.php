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
                            $cliente = $row['id_cliente']; 
                        ?>
                        <tr>
                            <td class="text-center"><?= $row['id_entrega']; ?></td>
                            <td class="text-center"><?= $row['id_ordem_servico']; ?></td>
                            <td>
                                <?php
                                    $sql2 = "SELECT nome_cliente FROM clientes 
                                    WHERE clientes.id_cliente = $cliente";
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
                                        <h5 class="modal-title text-danger" id="retornoTitulo<?= $count; ?>"><u>Registrar retorno</u></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <b class="text-danger">Atenção!</b><br><br>

                                        Ao confirmar esta ação, a entrega n° <b class="text-danger"><?= $row['id_entrega']; ?></b> só poderá ser alterada
                                        através da sessão de <b class="text-danger">Retornos</b>.<br><br>

                                        Deseja prosseguir ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form action="assets/Ocorrencias/Novo/Registrar_ret.php" method="post">
                                            <input type="hidden" name="registrar" value="1">
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