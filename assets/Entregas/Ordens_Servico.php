<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
        <h3 class="text-dark text-center">Ordens de Serviço</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID da O.S</th>
                        <th width="300px">Cliente</th>
                        <th width="70px">Entregas</th>
                        <th width="150px">Data de Abertura</th>
                        <th width="150px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_ordem`, `nome_cliente`, `data_os`, `status_os` FROM `ordem_servico`, `clientes`
                    WHERE ordem_servico.id_cliente = clientes.id_cliente";
                    
                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){
                    $id_os = $row['id_ordem'] ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id_ordem']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td class="text-center"><span class="badge badge-success" style="font-size: 15px;">
                            <?php $count = 0;

                            $sql = "SELECT * FROM `entregas`, `ordem_servico` WHERE entregas.id_ordem_servico = $id_os";
                            
                            $exec = mysqli_query($conn, $sql);
                            
                            $result = mysqli_num_rows($exec);
                            
                            $count += $result;

                            echo $count;
                            ?>
                        </span></td>
                        <td><?php echo $row['data_os']; ?></td>
                        <?php 
                        if($row['status_os'] == "Aberta")
                        { ?>
                            <td class="text-center badge-success"><b><?php echo $row['status_os']; ?></b></td> 
                        <?php }else
                        { ?>
                            <td class="text-center badge-danger"><b><?php echo $row['status_os']; ?></b></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>