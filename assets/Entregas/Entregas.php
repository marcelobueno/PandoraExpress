<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
        <h3 class="text-dark text-center">Entregas</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Entrega</th>
                        <th>Cliente</th>
                        <th>Motoboy</th>
                        <th width="130px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_entrega`, `nome_cliente`, `nome_motoboy`, `status_entrega` 
                    FROM `entregas`, `clientes`, `motoboys`
                    WHERE entregas.id_cliente = clientes.id_cliente AND 
                    entregas.id_motoboy = motoboys.id_motoboy";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){  ?>
                    
                    <tr>
                        <td class="text-center"><?php echo $row['id_entrega']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td><?php echo $row['nome_motoboy']; ?></td>
                        <?php if($row['status_entrega'] == "Em aberto")
                        { ?>
                            <td class="text-center badge-info"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php }elseif($row['status_entrega'] == "Em andamento")
                        { ?>
                            <td class="text-center badge-warning"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php }else
                        { ?>
                            <td class="text-center badge-success"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>