<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <h3 class="text-dark text-center">Tabelas de Preço</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID da Tabela</th>
                        <th>Nome da Tabela</th>
                        <th>Cliente</th>
                        <th width="100px">Cobrança</th>
                        <th width="100px">Valor</th>
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
                        <td><?= $row['id_tabela_preco']; ?></td>
                        <td><?= $row['nome_tabela']; ?></td>
                        <td><?= $row['nome_cliente']; ?></td>
                        <td>Por: <?= $row['tipo_cobranca']; ?></td>
                        <td>R$<?= number_format($row['valor_cobranca'], 2, ',', ''); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>