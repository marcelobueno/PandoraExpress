<?php
include './assets/Conexao.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <table id="listaClientes" class="display table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID do Cliente</th>
                        <th>Nome/Razão Social</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_cliente`, `nome_cliente`, `cnpj_cliente`, `tel_cliente`
                    FROM `clientes`";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){ ?>
                    <tr>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td><?php echo $row['cnpj_cliente']; ?></td>
                        <td><?php echo $row['tel_cliente']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>