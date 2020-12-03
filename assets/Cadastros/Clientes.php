<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
require './assets/Formatar.php';
?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <h3 class="text-dark text-center">Clientes</h3>
            <table id="listaClientes" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID do Cliente</th>
                        <th>Nome/Razão Social</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th width="100px" class="text-center">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sql = "SELECT `id_cliente`, `nome_cliente`, `cnpj_cliente`, `tel_cliente`
                    FROM `clientes` WHERE clientes.status_cliente = 'Ativo'";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){
                    $cpf_cnpj = $row['cnpj_cliente'];
                    $tel = $row['tel_cliente']; ?>
                    <tr>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['nome_cliente']; ?></td>
                        <td><?php FormatarDoc($cpf_cnpj); ?></td>
                        <td><?php FormatarTel($tel); ?></td>
                        <td>
                            <div class="row">
                                <form class="ml-4" action="?pagina=Visualizar-Cliente" method="post">
                                    <button class="btn btn-sm" type="submit" name="visualizar_cliente" value="<?= $row['id_cliente']; ?>">
                                        <svg title="Visualizar" width="20px" height="20px" viewBox="0 0 16 16" class="text-success bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </button>
                                </form>
                                <form action="?pagina=Editar-Cliente" method="post">
                                    <button class="btn btn-sm" type="submit" name="editar_cliente" value="<?= $row['id_cliente']; ?>">
                                        <svg title="Editar" width="1em" height="1em" viewBox="0 0 16 16" class=" text-info bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </form>
                                <!--Modal para desativar cliente-->
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#desativaCliModal<?= $count; ?>">
                                    <svg title="Deletar" width="1em" height="1em" viewBox="0 0 16 16" class="text-danger bi bi-file-earmark-excel" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                        <path fill-rule="evenodd" d="M5.18 6.616a.5.5 0 0 1 .704.064L8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 0 1 .064-.704z"/>
                                    </svg>
                                </button>
                                <div class="modal fade" id="desativaCliModal<?= $count; ?>" tabindex="-1" aria-labelledby="desativaCliModal<?= $count; ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="desativaCliModal<?= $count; ?>Label">Atenção!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que deseja desativar este cliente ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                                <form action="assets/Cadastros/Desativar.php" method="post">
                                                    <button class="btn btn-outline-danger" type="submit" name="id_cliente" value="<?= $row['id_cliente']; ?>">
                                                        Desativar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fim do modal-->
                            </div>
                        </td>
                    </tr>
                    <?php $count += 1; } ?>
                </tbody>
            </table>
            <br><br>
            <?php
                $buscaInativos = "SELECT `id_cliente`, `nome_cliente`, `cnpj_cliente`, `tel_cliente`
                FROM `clientes` WHERE clientes.status_cliente = 'Inativo'";
                $buscaInativosExec = mysqli_query($conn, $buscaInativos);
                $linhas = mysqli_num_rows($buscaInativosExec);

                if($linhas > 0){ ?>
                    <div class="accordion mt-3" id="accordionCliente">
                    <div class="">
                        <div class="" id="headingCliente">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block badge-dark text-left" type="button" data-toggle="collapse" data-target="#collapseCliente" aria-expanded="true" aria-controls="collapseCliente">
                                
                                <h5 class="text-light dropdown-toggle text-center">Clientes inativos</h5>
                                
                                </button>
                            </h2>
                        </div>
                        <div id="collapseCliente" class="collapse text-center" aria-labelledby="headingCliente" data-parent="#accordionCliente">
                            <div class="card-body text-danger">
                                <table id="" class="display table table-bordered" style="width:100%;">
                                    <thead class="bg-danger text-light">
                                        <tr>
                                            <th>ID do Cliente</th>
                                            <th>Nome/Razão Social</th>
                                            <th>CPF/CNPJ</th>
                                            <th>Telefone</th>
                                            <th class="text-center">Reativar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($result = mysqli_fetch_assoc($buscaInativosExec)){
                                            $cpf_cnpj = $result['cnpj_cliente'];
                                            $tel = $result['tel_cliente']; ?>
                                            <tr>
                                                <td><?= $result['id_cliente']; ?></td>
                                                <td><?= $result['nome_cliente']; ?></td>
                                                <td><?php FormatarDoc($cpf_cnpj); ?></td>
                                                <td><?php FormatarTel($tel); ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#reativaCliModal">
                                                        Reativar
                                                    </button>
                                                    <div class="modal fade" id="reativaCliModal" tabindex="-1" aria-labelledby="reativaCliModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-danger" id="reativaCliModalLabel">Atenção!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Tem certeza que deseja reativar esse cliente ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                                    <form action="assets/Cadastros/Reativar.php" method="post">
                                                                        <button class="btn btn-outline-success" type="submit" name="id_cliente" value="<?= $result['id_cliente']; ?>">
                                                                            Reativar
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <br><br>
        </div>
    </main>