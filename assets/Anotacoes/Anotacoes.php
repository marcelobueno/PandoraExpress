<?php

require __DIR__ . "/../Conexao.php";
require __DIR__ . "/../Verifica_login.php";

?>
<main class="corpo">
    <div class="container">
        <br>
        <span class="text-center">
            <h4>Anotações</h4>
        </span>
        <?php
        $query = "SELECT * FROM `anotacoes` ORDER BY anotacoes.id_anotacao DESC LIMIT 10";
        $busca = mysqli_query($conn, $query);
        while ($linha = mysqli_fetch_assoc($busca)) {
            if ($linha['nivel_urgencia'] == 'Baixo') { ?>
                <div class="mt-2 mb-2 alert alert-success" role="alert">
                    <span class="text-dark font-weight-bold">
                        <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                    </span>
                    <br>
                    <span><?= $linha['anotacao']; ?></span>
                </div>
            <?php } elseif ($linha['nivel_urgencia'] == 'Medio') { ?>
                <div class="mt-2 mb-2 alert alert-warning" role="alert">
                    <span class="text-dark font-weight-bold">
                        <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                    </span>
                    <br>
                    <span><?= $linha['anotacao']; ?></span>
                </div>
            <?php } else { ?>
                <div class="mt-2 mb-2 alert alert-danger" role="alert">
                    <span class="text-dark font-weight-bold">
                        <?= $linha['data']; ?> - Nível de urgência: <?= $linha['nivel_urgencia']; ?>
                    </span>
                    <br>
                    <span><?= $linha['anotacao']; ?></span>
                </div>
        <?php }
        } ?>
    </div>
</main>