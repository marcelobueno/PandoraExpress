<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <h3 class="text-dark text-center">Tabelas de Preço</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID da Tabela</th>
                        <th>Nome da Tabela</th>
                        <th>Cliente</th>
                        <th>Tipo de Cobrança</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_tabela_preco`, `nome_tabela`, `nome_cliente`, `tipo_cobranca`, `valor_cobranca`
                    FROM `tabela_preco`, `clientes`
                    WHERE tabela_preco.id_cliente = clientes.id_cliente";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){ ?>
                    <tr>
                        <td><?php echo $row['id_tabela_preco']; ?></td>
                        <td><?php echo $row['nome_tabela']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td>Por: <?php echo $row['tipo_cobranca']; ?></td>
                        <td>R$<?php echo number_format($row['valor_cobranca'], 2, ',', ''); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>