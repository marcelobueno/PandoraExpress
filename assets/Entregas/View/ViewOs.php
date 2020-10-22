<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';

$id_os = $_POST['ordem'];
?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2>Entregas para a O.S: #<?php echo $id_os; ?></h2>
            </div>
            <table id="listaClientes" class="display table table-sm table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Entrega</th>
                        <th width="180px">Nome Destinatário</th>
                        <th>Endereço</th>
                        <th width="100px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_entrega`, `nome_destinatario`, `end_entrega`, `end_num_entrega`, 
                    `end_bairro_entrega`, `end_cidade_entrega`, `end_estado_entrega`, `end_cep_entrega`, 
                    `end_comp_entrega`, `status_entrega` FROM `entregas` 
                    WHERE entregas.id_ordem_servico = $id_os";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){ ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id_entrega']; ?></td>
                        <td><?php echo $row['nome_destinatario']; ?></td>
                        <td><?php echo $row['end_entrega'] . " " . $row['end_num_entrega'] . ", " . $row['end_bairro_entrega'] . ", " . $row['end_cidade_entrega'] . " - " . $row['end_estado_entrega'] . " CEP: " . $row['end_cep_entrega'] ?></td>
                        <td class="text-center"><?php echo $row['status_entrega']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>