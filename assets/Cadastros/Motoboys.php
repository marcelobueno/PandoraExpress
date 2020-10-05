<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
include './assets/Formatar.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <h3 class="text-dark text-center">Motoboys</h3>
            <table id="" class="display table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID do Motoboy</th>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `tel_motoboy`
                    FROM `motoboys`";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){
                        $cpf = $row['cpf_motoboy'];
                        $tel = $row['tel_motoboy']; ?>
                    <tr>
                        <td><?php echo $row['id_motoboy']; ?></td>
                        <td><?php echo $row['nome_motoboy']; ?></td>
                        <td><?php FormatarDoc($cpf); ?></td>
                        <td><?php FormatarTel($tel); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>