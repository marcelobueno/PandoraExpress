<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
require './assets/Formatar.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <h3 class="text-dark text-center">Clientes</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID do Cliente</th>
                        <th>Nome/Razão Social</th>
                        <th width="160px">CPF/CNPJ</th>
                        <th width="130px">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_cliente`, `nome_cliente`, `cnpj_cliente`, `tel_cliente`
                    FROM `clientes`";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){
                    $cpf_cnpj = $row['cnpj_cliente'];
                    $tel = $row['tel_cliente']; ?>
                    <tr>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td><?php FormatarDoc($cpf_cnpj); ?></td>
                        <td><?php FormatarTel($tel); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>