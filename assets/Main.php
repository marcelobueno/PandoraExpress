<?php

require __DIR__ . "/Conexao.php";
require __DIR__ . "/Verifica_login.php";

?>
<main class="corpo">
    <div class="container">
        <?php
        if ($_SESSION['nivel_acesso'] != 0) { ?>
            <div class="row ml-auto">
                <!--Menus informativos da página inicial-->
                <div class="col col-12 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <!--Clientes-->
                    <div class="cardInfo" style="background-color: #5289F7;">
                        <div class="row">
                            <div class="col text-light bg-primary cardInfoOne">
                                <a href="?pagina=Clientes">
                                    <svg width="60px" height="60px" viewBox="0 0 16 16" class="text-light bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoTwo">
                                <div class="row">
                                    <h4 class="cardItemCount">
                                        <?php
                                        $sql = "SELECT * FROM `clientes`";
                                        $exec = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($exec);
                                        echo $count;
                                        ?>
                                    </h4>
                                    <span class="text-light cardItemText">Clientes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-3 col-lg-4 col-xl-3 mt-3">
                    <!--Entregas-->
                    <div class="cardInfo" style="background-color: #535353;">
                        <div class="row">
                            <div class="col text-light bg-dark cardInfoOne">
                                <a href="?pagina=Entregas">
                                    <svg width="60px" height="60px" viewBox="0 0 16 16" class="text-light bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoEight">
                                <div class="row">
                                    <h4 class="cardItemCount">
                                        <?php
                                        $sql = "SELECT * FROM `entregas` 
                                            WHERE entregas.status_entrega != 'Entregue' 
                                            AND entregas.status_entrega != 'Cancelada' 
                                            AND entregas.status_entrega != 'Retorno'";
                                        $exec = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($exec);
                                        echo $count;
                                        ?>
                                    </h4>
                                    <span class="cardItemText">Entregas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <!--Ordens de Serviço-->
                    <div class="cardInfo" style="background-color: #44CD35;">
                        <div class="row">
                            <div class="col text-light bg-success cardInfoOne">
                                <a href="?pagina=Ordens-de-Servico">
                                    <svg width="60px" height="60px" viewBox="0 0 16 16" class="text-light bi bi-journal-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoSix">
                                <div class="row">
                                    <h4 class="cardItemCount">
                                        <?php
                                        $sql = "SELECT * FROM `ordem_servico` 
                                            WHERE ordem_servico.status_os = 'Aberta'";
                                        $exec = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($exec);
                                        echo $count;
                                        ?>
                                    </h4>
                                    <span class="cardItemText">O.S Abertas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <!--Retornos-->
                    <div class="cardInfo" style="background-color: #EE3636;">
                        <div class="row">
                            <div class="col text-light bg-danger cardInfoOne">
                                <a href="?pagina=Retornos">
                                    <svg width="60px" height="60px" viewBox="0 0 16 16" class="text-light bi bi-exclamation-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoFour">
                                <div class="row">
                                    <h4 class="cardItemCount">
                                        <?php
                                        $sql = "SELECT * FROM `retornos` 
                                            WHERE retornos.status_retorno != 'Entregue' 
                                            AND retornos.status_retorno != 'Cancelada'";
                                        $exec = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($exec);
                                        echo $count;
                                        ?>
                                    </h4>
                                    <span class="cardItemText">Retornos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fim dos menus informativos-->
            <div class="row">
                <!--Informativo sobre as entregas do dia-->
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                    <div class="card cardEntInfo">
                        <div class="row">
                            <div id="cardTitleEnt" class="col bg-dark">
                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="mb-1 text-light bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                                <span class="text-light font-weight-bolder"> Entregas do dia</span>
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <table class="table table-sm table-striped table-bordered table-hover display">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>Motoboy</th>
                                        <th class="text-center">Entregas</th>
                                        <th class="text-center">Detalhes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    <?php
                                    $bBoys = "SELECT * FROM motoboys";
                                    $bBoysExec = mysqli_query($conn, $bBoys);

                                    while ($bBoysRow = mysqli_fetch_assoc($bBoysExec)) {
                                        $boy_id = $bBoysRow['id_motoboy']; ?>
                                        <tr>
                                            <form action="?pagina=Entregas-Por-Motoboy" method="post">

                                                <td><?= $bBoysRow['nome_motoboy']; ?></td>
                                                <td class="text-center">
                                                    <div class="badge badge-danger">
                                                        <?php
                                                        $ent_boy = "SELECT `id_entrega`, `id_motoboy`, `status_entrega` FROM entregas 
                                                            WHERE entregas.id_motoboy = $boy_id 
                                                            AND status_entrega <> 'Entregue' 
                                                            AND status_entrega <> 'Retorno' 
                                                            AND status_entrega <> 'Cancelada'";

                                                        $ent_boyExec = mysqli_query($conn, $ent_boy);

                                                        $ent_boy_result = mysqli_num_rows($ent_boyExec);

                                                        echo $ent_boy_result;
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input type="hidden" name="boy_name" value="<?= $bBoysRow['nome_motoboy']; ?>">
                                                    <button class="btn btn-sm btn-outline-danger" name="boy_id" value="<?= $bBoysRow['id_motoboy']; ?>" type="submit">Listar</button>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                    <div id="cardEntGraf" class="card cardEntInfo">
                        <div class="row">
                            <div id="cardTitleEnt2" class="col bg-dark">
                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="text-light bi bi-journal-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                                </svg>
                                <span class="text-light font-weight-bolder">Anotações e Observações</span>
                            </div>
                        </div>
                        <div class="col">
                            <!--Conteúdo anotações-->
                            <?php
                            $query = "SELECT * FROM `anotacoes` ORDER BY anotacoes.id_anotacao DESC LIMIT 5";
                            $busca = mysqli_query($conn, $query);
                            while ($linha = mysqli_fetch_assoc($busca)) {
                                if ($linha['nivel_urgencia'] == 'Baixo') { ?>
                                    <div class="mt-2 mb-2 alert alert-success" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                                <?php } elseif ($linha['nivel_urgencia'] == 'Medio') { ?>
                                    <div class="mt-2 mb-2 alert alert-warning" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="mt-2 mb-2 alert alert-danger" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                            <?php }
                            } ?>
                            <div class="mr-3 ml-3 mb-3">
                                <div class="row float-right">
                                    <a class="mr-1 btn btn-outline-info" href="?pagina=Anotacoes">Ver todas</a>
                                    <!--Lançar Modal-->
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAnt">
                                        Nova anotação
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalAnt" tabindex="-1" aria-labelledby="modalAntLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="modalAntLabel">Nova anotação</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="assets/Anotacoes/Atualiza_ant.php" method="post">
                                                        <div class="my-3 mx-3">
                                                            <?php
                                                            $dataAnt = date('Y-m-d');
                                                            ?>
                                                            <label for="dataAnT"><b class="text-info">Data:</b> <?= $dataAnt; ?></label>
                                                            <input type="hidden" name="dataAnT" value="<?= $dataAnt; ?>">
                                                            <div class="dropdown-divider"></div>
                                                            <label for="anotacao"><b class="text-info">Anotação:</b></label>
                                                            <textarea class="form-control" name="anotacao" cols="30" rows="4"></textarea>
                                                            <div class="dropdown-divider"></div>
                                                            <label for="nivel_urgencia"><b class="text-info">Nível de urgência:</b></label>
                                                            <select class="form-control" name="nivel_urgencia">
                                                                <option value="">Selecione uma opção</option>
                                                                <option value="Baixo">Baixo</option>
                                                                <option value="Medio">Medio</option>
                                                                <option value="Alto">Alto</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-info type=" submit">Registrar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <!-- Tela inicial Expedição: Inicio -->
            <br>
            <h3 class="text-center">Entregas por Motoboy</h3>
            <div class="row my-3">
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 my-2">
                    <table class="table table-sm table-striped table-bordered table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Motoboy</th>
                                <th class="text-center">Entregas</th>
                                <th class="text-center">Detalhes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-light">
                            <?php
                            $bBoys = "SELECT * FROM motoboys";
                            $bBoysExec = mysqli_query($conn, $bBoys);

                            while ($bBoysRow = mysqli_fetch_assoc($bBoysExec)) {
                                $boy_id = $bBoysRow['id_motoboy']; ?>
                                <tr>
                                    <form action="?pagina=Entregas-Por-Motoboy" method="post">

                                        <td><?= $bBoysRow['nome_motoboy']; ?></td>
                                        <td class="text-center">
                                            <div class="badge badge-danger">
                                                <?php
                                                $ent_boy = "
                                                SELECT `id_entrega`, `id_motoboy`, `status_entrega` FROM entregas 
                                                    WHERE entregas.id_motoboy = {$boy_id} 
                                                    AND status_entrega <> 'Entregue' 
                                                    AND status_entrega <> 'Retorno' 
                                                    AND status_entrega <> 'Cancelada'";

                                                $ent_boyExec = mysqli_query($conn, $ent_boy);

                                                $ent_boy_result = mysqli_num_rows($ent_boyExec);

                                                echo $ent_boy_result;
                                                ?>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <input type="hidden" name="boy_name" value="<?= $bBoysRow['nome_motoboy']; ?>">
                                            <button class="btn btn-sm btn-outline-danger" name="boy_id" value="<?= $bBoysRow['id_motoboy']; ?>" type="submit">Listar Entregas</button>
                                        </td>
                                    </form>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 my-2">
                <div id="cardEntGraf" class="card cardEntInfo">
                        <div class="row">
                            <div id="cardTitleEnt2" class="col bg-dark">
                                <svg width="20px" height="20px" viewBox="0 0 16 16" class="text-light bi bi-journal-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                                </svg>
                                <span class="text-light font-weight-bolder">Anotações e Observações</span>
                            </div>
                        </div>
                        <div class="col">
                            <!--Conteúdo anotações-->
                            <?php
                            $query = "SELECT * FROM `anotacoes` ORDER BY anotacoes.id_anotacao DESC LIMIT 5";
                            $busca = mysqli_query($conn, $query);
                            while ($linha = mysqli_fetch_assoc($busca)) {
                                if ($linha['nivel_urgencia'] == 'Baixo') { ?>
                                    <div class="mt-2 mb-2 alert alert-success" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                                <?php } elseif ($linha['nivel_urgencia'] == 'Medio') { ?>
                                    <div class="mt-2 mb-2 alert alert-warning" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="mt-2 mb-2 alert alert-danger" role="alert">
                                        <a href="?pagina=Anotacoes" class="alert-link">
                                            <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                                        </a>
                                    </div>
                            <?php }
                            } ?>
                            <div class="mr-3 ml-3 mb-3">
                                <div class="row float-right">
                                    <a class="mr-1 btn btn-outline-info" href="?pagina=Anotacoes">Ver todas</a>
                                    <!--Lançar Modal-->
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalAnt">
                                        Nova anotação
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalAnt" tabindex="-1" aria-labelledby="modalAntLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="modalAntLabel">Nova anotação</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="assets/Anotacoes/Atualiza_ant.php" method="post">
                                                        <div class="my-3 mx-3">
                                                            <?php
                                                            $dataAnt = date('Y-m-d');
                                                            ?>
                                                            <label for="dataAnT"><b class="text-info">Data:</b> <?= $dataAnt; ?></label>
                                                            <input type="hidden" name="dataAnT" value="<?= $dataAnt; ?>">
                                                            <div class="dropdown-divider"></div>
                                                            <label for="anotacao"><b class="text-info">Anotação:</b></label>
                                                            <textarea class="form-control" name="anotacao" cols="30" rows="4"></textarea>
                                                            <div class="dropdown-divider"></div>
                                                            <label for="nivel_urgencia"><b class="text-info">Nível de urgência:</b></label>
                                                            <select class="form-control" name="nivel_urgencia">
                                                                <option value="">Selecione uma opção</option>
                                                                <option value="Baixo">Baixo</option>
                                                                <option value="Medio">Medio</option>
                                                                <option value="Alto">Alto</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-info type=" submit">Registrar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tela inicial Expedição: Fim -->
        <?php } ?>
        <span><br></span>
    </div>
</main>