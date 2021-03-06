<?php

require __DIR__ . "/../../Conexao.php";

$motoboy = $_SESSION['motoboy']['id'];

$bEntregas = "SELECT * FROM entregas 
            WHERE entregas.id_motoboy = $motoboy 
            AND entregas.status_entrega <> 'Entregue' 
            AND entregas.status_entrega <> 'Cancelada'";

$bEntregasExec = mysqli_query($conn, $bEntregas);

?>
<html>

<head>
    <title>Relatório</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap">
    <style>
        @page {
            margin: 70px;
        }

        .center {
            text-align: center;
        }

        .logoEmpresa {
            width: 200px;
        }

        h4 {
            font-family: 'Ubuntu', sans-serif;
        }

        .headerContent {
            font-size: 11px;
        }

        #iptConfirma {
            height: 10px;
            width: 10px;
        }
    </style>
</head>

<body>
    <div class="center">
        <img class="logoEmpresa" src="https://i.imgur.com/ZRbEkKR.png">
    </div>
    <div class="text-center mt-3">
        <h4>Relatório de entregas</h4>
    </div>
    <br>
    <div class="dropdown-divider"></div>
    <div>
        <small><b class="text-warning">Motoboy: </b></small>
        <small class="font-weight-light"><?= $_SESSION['motoboy']['nome']; ?></small>
        <br>
        <small><b class="text-warning">CPF/CNPJ: </b></small>
        <small class="font-weight-light"><?= FormatarDoc($_SESSION['motoboy']['cpf']); ?></small>
    </div>
    <div class="dropdown-divider"></div>
    <br>
    <div>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th width="50px"><small>ID</small></th>
                    <th width="70px"><small>NF</small></th>
                    <th><small>Cliente</small></th>
                    <th width="100px" class="text-center"><small>Entregue?</small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($bEntregasExec)) { ?>
                    <tr>
                        <td><small><?= $row['id_entrega']; ?></small></td>
                        <td><small><?= $row['nf_origem']; ?></small></td>
                        <td><small>
                                <?php
                                $bCliente = "SELECT nome_cliente FROM clientes WHERE id_cliente = {$row['id_cliente']}";
                                $bClienteExec = mysqli_query($conn, $bCliente);
                                $bClienteResult = mysqli_fetch_assoc($bClienteExec);

                                echo $bClienteResult['nome_cliente'];
                                ?>
                            </small></td>
                        <td class="text-center">
                            <div>
                                <small>
                                    <input class="mr-auto ml-auto form-control" type="text" id="iptConfirma">
                                </small>
                            </div>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>