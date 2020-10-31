<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';

if(!isset($_POST['entrega']))
{
    echo '<p class="text-center text-danger font-weight-bolder">ID da entrega não encontrado!</p>';
}

$id_entrega = $_POST['entrega'];

$sql = "SELECT * FROM `entregas` WHERE entregas.id_entrega = $id_entrega";
$exec = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($exec);


?>
    <main class="corpo">
        <div class="container">
            <span><br></span>
            <h2 class="text-center">Detalhes da entrega: <b class="text-danger">#<?= $id_entrega; ?></b></h2>
            <br>
            <div class="row">
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                    <h4>Dados da entrega:</h4>
                    <p><b class="text-danger">Cliente: </b>
                        <?php
                            $sql = "SELECT `nome_cliente` FROM `clientes` WHERE clientes.id_cliente = {$result['id_cliente']}";
                            $exec = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($exec);
                            echo $row['nome_cliente'];
                        ?>
                    </p>
                    <p><b class="text-danger">Destinatário:</b> <?= $result['nome_destinatario']; ?></p>
                    <p><b class="text-danger">Endereço: </b><?= $result['end_entrega'] .", "
                    . $result['end_num_entrega'] ." ". $result['end_bairro_entrega'] .", "
                    . $result['end_cidade_entrega'] ." - ". $result['end_estado_entrega']; ?></p>
                    <p><b class="text-danger">CEP: </b><?= mb_substr($result['end_cep_entrega'], 0, 5) ."-"
                    . mb_substr($result['end_cep_entrega'], 5); ?></p>
                    <p><b class="text-danger">Complemento: </b><?= $result['end_comp_entrega']; ?></p>
                    <p><b class="text-danger">Data de Entrega: </b><?= $result['data_entrega']; ?></p>
                </div>
                <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                    <h4>Status da Entrega:</h4>
                    <form action="assets/Entregas/View/AtualizaEnt.php" method="post">
                        <label for="motoboy"><b class="text-danger">Motoboy:</b></label>
                        <select class="form-control" name="motoboy">
                            <?php
                                $sql = "SELECT `nome_motoboy` FROM `motoboys`, `entregas` 
                                WHERE entregas.id_motoboy = motoboys.id_motoboy AND entregas.id_entrega = $id_entrega";
                                $exec = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($exec);
                                $nome_motoboy = $row['nome_motoboy'];

                                $sql2 = "SELECT `nome_motoboy`, `id_motoboy` FROM `motoboys`";
                                $exec2 = mysqli_query($conn, $sql2);
                                while($row2 = mysqli_fetch_assoc($exec2))
                                { 
                                ?>
                                    <option value="<?= $row2['id_motoboy']; ?>" <?=($row2['nome_motoboy'] == $nome_motoboy)?'selected':''?>><?= $row2['nome_motoboy']; ?></option>
                                <?php 
                                }
                            ?>
                        </select>
                        <label for="status"><b class="text-danger">Status:</b></label>
                        <select class="form-control" name="status" <?=($result['status_entrega'] == 'Entregue' || $result['status_entrega'] == 'Cancelada')?'disabled':''?>>
                            <option value="Em aberto" <?=($result['status_entrega'] == 'Em aberto')?'selected':''?>>Em aberto</option>
                            <option value="Em andamento" <?=($result['status_entrega'] == 'Em andamento')?'selected':''?>>Em andamento</option>
                            <option value="Entregue" <?=($result['status_entrega'] == 'Entregue')?'selected':''?>>Entregue</option>
                            <option value="Cancelada" <?=($result['status_entrega'] == 'Cancelada')?'selected':''?>>Cancelada</option>
                            <option value="Retorno" <?=($result['status_entrega'] == 'Retorno')?'selected':''?> disabled>Retorno</option>
                        </select>
                        <label for="observacoes"><b class="text-danger">Observações: </b></label>
                        <textarea class="form-control" name="observacoes" cols="30" rows="5"><?= $result['observacoes']; ?></textarea>
                        <label class="mt-2" for="cobranca"><b class="text-danger">Cobrança Extra:</b></label>
                        <input class="form-control" type="number" name="cobranca" step="0.10" value="<?= $result['cobranca_extra']; ?>"></input>
                        <button class="btn btn-lg btn-dark mt-3" name="id_entrega" type="submit" value="<?= $id_entrega; ?>" <?=($result['status_entrega'] == 'Entregue' || $result['status_entrega'] == 'Cancelada' || $result['status_entrega'] == 'Retorno')?'disabled':''?>>Atualizar</button>
                    </form>
                    <p class="mt-2"><b class="text-danger">Atenção!</b><br>Após atualizar para <b class="text-success">Entregue</b> ou <b class="text-danger">Cancelada</b> você 
                    não poderá mais alterar o Status da entrega.</p>
                </div>
            </div>
        </div>
    </main>