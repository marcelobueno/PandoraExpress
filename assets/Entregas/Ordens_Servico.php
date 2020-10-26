<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <h3 class="text-dark text-center">Ordens de Serviço</h3>
            <table class="display table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID da O.S</th>
                        <th>Cliente</th>
                        <th>Entregas</th>
                        <th>Data de Abertura</th>
                        <th>Status</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_ordem`, `nome_cliente`, `data_os`, `status_os` FROM `ordem_servico`, `clientes`
                    WHERE ordem_servico.id_cliente = clientes.id_cliente";
                    
                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){ 
                    $id_ordem = $row['id_ordem']; ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id_ordem']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td class="text-center"><span class="badge badge-success" style="font-size: 15px;">
                            <?php
                            $sql = "SELECT * FROM `entregas` WHERE entregas.id_ordem_servico = $id_ordem";
                            $exec = mysqli_query($conn, $sql);
                            $result = mysqli_num_rows($exec);
                            echo $result;
                            ?>
                        </span></td>
                        <td><?php echo $row['data_os']; ?></td>
                        <?php 
                        if($row['status_os'] == "Aberta")
                        { ?>
                            <td class="text-center text-success"><b><?php echo $row['status_os']; ?></b></td> 
                        <?php }else
                        { ?>
                            <td class="text-center text-danger"><b><?php echo $row['status_os']; ?></b></td>
                        <?php } ?>
                        <td class="text-center text-info">
                            <form action="?pagina=Visualizar-Entregas" method="post">
                                <button class="btn btn-sm btn-outline-success" type="submit" name="ordem" value="<?php echo $row['id_ordem']; ?>">Visualizar 
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>