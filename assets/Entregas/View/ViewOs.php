<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';

if(isset($_POST['ordem']))
{
$id_os = $_POST['ordem'];
?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2>Entregas para a Ordem de Serviço: <span class="text-danger">#<?php echo $id_os; ?></span></h2>
            </div>
            <table id="listaClientes" class="display table table-sm table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Entrega</th>
                        <th width="180px">Nome Destinatário</th>
                        <th>Endereço</th>
                        <th width="100px">Status</th>
                        <th>Detalhes</th>
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
                        <?php }else
                        { ?>
                            <td class="text-center text-success"><b>
                                <?php echo $row['status_entrega']; ?>
                            </b></td>
                        <?php } ?>
                        <td class="text-center">
                            <form action="?pagina=Detalhes-Entrega" method="post">
                                <button class="btn btn-sm btn-outline-dark" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">Visualizar 
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
            <div>
                <p><b class="text-danger">Encerrar Ordem de Serviço: </b></p>
                <p><b class="text-danger">Importante! </b>Para encerrar uma ordem de serviço 
                todas as entregas devem estar com o status <b class="text-success">Entregue</b> 
                ou <b class="text-danger">Cancelada</b>. Após fechada a Ordem de Serviço não
                poderá ser aberta novamente.</p>
            </div>
        </div>
    </main>
<?php } 

if(isset($_POST['motoboy']))
{
    $id_motoboy = $_POST['motoboy'];

    $sql = "SELECT `nome_motoboy` FROM `motoboys` WHERE motoboys.id_motoboy = $id_motoboy";
    $exec = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($exec);

    $data = date("Y-m-d");
    $dataf = date("d/m/Y");
    ?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2>Entregas de: <span class="text-danger"><?= $result['nome_motoboy']; ?></span> em: <?= $dataf; ?></h2>
            </div>
            <table id="listaClientes" class="display table table-sm table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Entrega</th>
                        <th width="180px">Nome Destinatário</th>
                        <th>Endereço</th>
                        <th width="100px">Status</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `id_entrega`, `nome_destinatario`, `end_entrega`, `end_num_entrega`, 
                    `end_bairro_entrega`, `end_cidade_entrega`, `end_estado_entrega`, `end_cep_entrega`, 
                    `end_comp_entrega`, `status_entrega` 
                    FROM `entregas` 
                    WHERE entregas.id_motoboy = $id_motoboy AND entregas.data_entrega = '$data'";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){ ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id_entrega']; ?></td>
                        <td><?php echo $row['nome_destinatario']; ?></td>
                        <td><?php echo $row['end_entrega'] . " " . $row['end_num_entrega'] . ", " . $row['end_bairro_entrega'] . ", " . $row['end_cidade_entrega'] . " - " . $row['end_estado_entrega'] . " CEP: " . $row['end_cep_entrega'] ?></td>
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
                            <form action="?pagina=Detalhes-Entrega" method="post">
                                <button class="btn btn-sm btn-outline-dark" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">Visualizar 
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
<?php }