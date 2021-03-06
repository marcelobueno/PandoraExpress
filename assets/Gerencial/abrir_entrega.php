<?php

require __DIR__."/../Conexao.php";
require __DIR__."/../Verifica_login.php";

?>
<main class="corpo">
    <div class="container">
        <br>
        <?php
            if(isset($_SESSION['alert']))
            {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        ?>
        <h4 class="text-center">Abrir entrega</h4>
        <div class="row">
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
            <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card my-3 shadow">
                    <div class="my-2 mx-2">
                        <div class="text-center">
                            <p><small>Preencha a informação abaixo</small></p>
                        </div>
                        <form action="?pagina=Liberar-Entrega" method="post">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark" for="id_entrega">ID da entrega</label>
                                <input class="form-control" type="text" name="id_entrega" placeholder="EX: 1000">
                            </div>
                            <div class="dropdown-divider"></div>
<!--                            <div class="form-group">-->
<!--                                <label class="font-weight-bold text-dark" for="nf_origem">Número da NF</label>-->
<!--                                <input class="form-control" type="text" name="nf_origem" placeholder="EX: 389512">-->
<!--                            </div>-->
                            <div class="form-group">
                                <button class="form-control btn btn-sm btn-outline-dark" type="submit">Abrir entrega</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
        </div>
    </div>
</main>