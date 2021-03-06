<?php
#-------------------------------------------------------------------------------------------------------------------------------------------
# Este arquivo recebe as informações vindas do link dos motoboys da página inicial. Ele mostra as entregas em aberto para o boy selecionado
# Autor: Marcelo Bueno
# Data da Última revisão: 30/12/2020
#-------------------------------------------------------------------------------------------------------------------------------------------

require __DIR__ . "/../../Conexao.php";
require __DIR__ . "/../../Verifica_login.php";

if (!isset($_POST['boy_id'])) {
    echo '<div class="alert alert-danger" role="alert">ID de motoboy não encontrado!</div>';
} else {
    $boy = $_POST['boy_id'];
    $nome = $_POST['boy_name'];
}

$bEntregas = "SELECT `id_entrega`, `id_motoboy`, `id_cliente`, `nf_origem`, `status_entrega` FROM entregas 
        WHERE entregas.id_motoboy = $boy 
        AND status_entrega <> 'Entregue' 
        AND status_entrega <> 'Retorno' 
        AND status_entrega <> 'Cancelada'";
$bEntregasExec = mysqli_query($conn, $bEntregas); ?>

<main class="corpo">
    <div class="container">
        <br>
        <div class="row">
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                <span class="text-center my-5">
                    <h4>Entregas do motoboy:<br> <b class="text-danger"><?= $nome; ?></b></h4>
                </span>
            </div>
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4">
                <div class="float-right">
                    <div class="align-bottom">
                        <form action="./assets/Entregas/View/Processar_Ent.php" method="post" target="_blank">
                            <button class="btn btn-sm btn-light" title="Imprimir" type="submit" name="motoboy" value="<?= $boy; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-sm table-striped table-bordered display">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Cliente</th>
                    <th>NF de venda</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Complementos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($bEntregasExec)) { ?>
                    <tr>
                        <td class="text-center"><?= $row['id_entrega']; ?></td>
                        <td>
                            <?php
                            $bCliente = "SELECT `nome_cliente` FROM clientes WHERE clientes.id_cliente = {$row['id_cliente']}";
                            $bClienteExec = mysqli_query($conn, $bCliente);
                            $result = mysqli_fetch_assoc($bClienteExec);

                            echo $result['nome_cliente'];
                            ?>
                        </td>
                        <td><?= $row['nf_origem']; ?></td>
                        <?php if ($row['status_entrega'] == "Em aberto") { ?>
                            <td class="text-center text-info"><b>
                                    <?php echo $row['status_entrega']; ?>
                                </b></td>
                        <?php } elseif ($row['status_entrega'] == "Em andamento") { ?>
                            <td class="text-center text-warning"><b>
                                    <?php echo $row['status_entrega']; ?>
                                </b></td>
                        <?php } elseif ($row['status_entrega'] == "Entregue") { ?>
                            <td class="text-center text-success"><b>
                                    <?php echo $row['status_entrega']; ?>
                                </b></td>
                        <?php } else { ?>
                            <td class="text-center text-danger"><b>
                                    <?php echo $row['status_entrega']; ?>
                                </b></td>
                        <?php } ?>
                        <td class="text-center">
                            <form action="?pagina=Detalhes-Entrega" method="post">
                                <button class="btn btn-sm btn-info" title="Visualizar os detalhes" type="submit" name="entrega" value="<?= $row['id_entrega']; ?>">Complementos
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> <br>
    </div>
</main>