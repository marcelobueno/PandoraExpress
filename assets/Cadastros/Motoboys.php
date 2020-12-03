<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
include './assets/Formatar.php';
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
            <h3 class="text-dark text-center">Motoboys</h3>
            <table id="" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th width="100px">ID Motoboy</th>
                        <th>Nome Completo</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th width="100px" class="text-center">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sql = "SELECT `id_motoboy`, `nome_motoboy`, `cpf_motoboy`, `tel_motoboy`
                    FROM `motoboys` WHERE motoboys.status_motoboy = 'Ativo'";

                    $busca_clientes = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($busca_clientes)){
                        $cpf = $row['cpf_motoboy'];
                        $tel = $row['tel_motoboy'];  ?>
                    <tr>
                        <td><?= $row['id_motoboy']; ?></td>
                        <td><?= $row['nome_motoboy']; ?></td>
                        <td><?= FormatarDoc($cpf); ?></td>
                        <td><?= FormatarTel($tel); ?></td>
                        <td>
                            <div class="row">
                                <form class="ml-4" action="?pagina=Visualizar-Motoboy" method="post">
                                    <button class="btn btn-sm" type="submit" name="visualizar_motoboy" value="<?= $row['id_motoboy']; ?>">
                                        <svg title="Visualizar" width="20px" height="20px" viewBox="0 0 16 16" class="text-success bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </button>
                                </form>
                                <form action="?pagina=Editar-Motoboy" method="post">
                                    <button class="btn btn-sm" type="submit" name="editar_motoboy" value="<?= $row['id_motoboy']; ?>">
                                        <svg title="Editar" width="1em" height="1em" viewBox="0 0 16 16" class=" text-info bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </form>
                                <!--Modal para desativar motoboy-->
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#desativaMotModal<?= $count; ?>">
                                    <svg title="Deletar" width="1em" height="1em" viewBox="0 0 16 16" class="text-danger bi bi-file-earmark-excel" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                        <path fill-rule="evenodd" d="M5.18 6.616a.5.5 0 0 1 .704.064L8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 0 1 .064-.704z"/>
                                    </svg>
                                </button>
                                <div class="modal fade" id="desativaMotModal<?= $count; ?>" tabindex="-1" aria-labelledby="desativaMotModal<?= $count; ?>Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="desativaMotModal<?= $count; ?>Label">Atenção!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que deseja desativar este Motoboy ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                                <form action="assets/Cadastros/Desativar.php" method="post">
                                                    <button class="btn btn-outline-danger" type="submit" name="id_motoboy" value="<?= $row['id_motoboy']; ?>">
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
                $buscaInativos = "SELECT * FROM `motoboys` WHERE motoboys.status_motoboy = 'Inativo'";
                $buscaInativosExec = mysqli_query($conn, $buscaInativos);
                $linhas = mysqli_num_rows($buscaInativosExec);

                if($linhas > 0){ ?>
                <div class="accordion mt-3" id="accordionMotoboy">
                    <div class="">
                        <div class="" id="headingMotoboy">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block badge-dark text-left" type="button" data-toggle="collapse" data-target="#collapseMotoboy" aria-expanded="true" aria-controls="collapseMotoboy">
                                
                                <h5 class="text-light dropdown-toggle text-center">Motoboys inativos</h5>
                                
                                </button>
                            </h2>
                        </div>
                        <div id="collapseMotoboy" class="collapse text-center" aria-labelledby="headingMotoboy" data-parent="#accordionMotoboy">
                            <div class="card-body text-danger">
                                <table id="" class="display table table-bordered" style="width:100%;">
                                    <thead class="bg-danger text-light">
                                        <tr>
                                            <th width="100px">ID Motoboy</th>
                                            <th>Nome Completo</th>
                                            <th>CPF/CNPJ</th>
                                            <th>Telefone</th>
                                            <th width="100px" class="text-center">Reativar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($result = mysqli_fetch_assoc($buscaInativosExec)){ ?>
                                            <tr>
                                                <td><?= $result['id_motoboy']; ?></td>
                                                <td><?= $result['nome_motoboy']; ?></td>
                                                <td><?= $result['cpf_motoboy']; ?></td>
                                                <td><?= $result['tel_motoboy']; ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#reativaMotModal">
                                                        Reativar
                                                    </button>
                                                    <div class="modal fade" id="reativaMotModal" tabindex="-1" aria-labelledby="reativaMotModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-danger" id="reativaMotModalLabel">Atenção!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Tem certeza que deseja reativar esse motoboy ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                                    <form action="assets/Cadastros/Reativar.php" method="post">
                                                                        <button class="btn btn-outline-success" type="submit" name="id_motoboy" value="<?= $result['id_motoboy']; ?>">
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
                <br><br>
            <?php } ?>
        </div>
    </main>