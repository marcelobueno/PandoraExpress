<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
<main class="corpo">
    <div class="container">
        <span><br></span>
        <h3 class="text-center">Retornos</h3>
        <table id="listaClientes" class="display table table-bordered" style="width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th width="100px">ID Retorno</th>
                    <th>Ref. Entrega</th>
                    <th>Ref. O.S</th>
                    <th>Status</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `retornos`";
                $exec = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($exec)) { ?>
                    <tr>
                        <td class="text-center"><?= $row['id_retorno']; ?></td>
                        <td class="text-center"><?= $row['id_entrega']; ?></td>
                        <td class="text-center">
                            <?php
                            $query = "SELECT id_ordem_servico FROM entregas WHERE entregas.id_entrega = {$row['id_entrega']}";
                            $exec = mysqli_query($conn, $query);
                            $result = mysqli_fetch_assoc($exec);
                            echo $result['id_ordem_servico'];
                            ?>
                        </td>
                        <td class="text-center"><?= $row['status_retorno']; ?></td>
                        <td class="text-center">
                            <form action="?pagina=Detalhes-Entrega" method="post">
                                <button class="btn btn-sm btn-outline-dark" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">Visualizar
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</main>