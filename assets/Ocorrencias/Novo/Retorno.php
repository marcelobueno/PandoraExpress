<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <h3 class="text-center">Registrar Retorno</h3>
            <form action="#" method="post">
                <table class="display table table-hoverable table-bordered">
                    <thead class="thead-dark">
                        <th width="140px">ID Entrega</th>
                        <th width="140px">ID O.S</th>
                        <th>Cliente</th>
                        <th class="text-center" width="200px">Selecionar</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM entregas 
                            WHERE entregas.status_entrega != 'Entregue' 
                            AND entregas.status_entrega != 'Cancelada' 
                            AND entregas.status_entrega != 'Retorno'";
                            $exec = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($exec))
                            { 
                            $cliente = $row['id_ordem_servico'];    ?>
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
                                    <button class="btn btn-sm btn-danger">Selecionar</button>
                                </td>
                            </tr>
                            <?php }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </main>