<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <?php
                if(isset($_SESSION['alert']))
                {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <h3 class="text-dark text-center">Entregas</h3>
            <div>
                <form class="form-inline" action="?pagina=Detalhes-Entrega" method="post">
                    <label class="font-weight-normal mr-2" for="entrega_nf">NF da entrega: </label>
                    <input class="form-control" type="text" name="entrega_nf" placeholder="EX: 389821">
                    <button class="btn btn-dark" type="submit">
                        <span class="font-italic">Buscar </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <br>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Entrega</th>
                        <th>Cliente</th>
                        <th>Nota Fiscal</th>
                        <th width="130px">Status</th>
                        <th class="text-center">Complementos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_entrega`, `nome_cliente`, `nf_origem`, `status_entrega` 
                    FROM `entregas`, `clientes`
                    WHERE entregas.id_cliente = clientes.id_cliente 
                    AND entregas.status_entrega <> 'Entregue' 
                    AND entregas.status_entrega <> 'Retorno' 
                    AND entregas.status_entrega <> 'Cancelada'";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){  ?>
                    
                    <tr>
                        <td class="text-center"><?php echo $row['id_entrega']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td class="text-center"><?= $row['nf_origem']; ?></td>
                        <?php if($row['status_entrega'] == "Em aberto")
                        { ?>
                            <td class="text-center text-info"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php }elseif($row['status_entrega'] == "Em andamento")
                        { ?>
                            <td class="text-center text-warning"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php }elseif($row['status_entrega'] == "Entregue")
                        { ?>
                            <td class="text-center text-success"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php }else
                        { ?>
                            <td class="text-center text-danger"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php } ?>
                        <td class="text-center">
                            <div class="">
                                <form action="?pagina=Detalhes-Entrega" method="post">
                                    <button class="btn btn-sm btn-info" title="Visualizar os detalhes" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">Complementos
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>