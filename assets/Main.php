<?php
require 'assets/Conexao.php';
require 'assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <div class="row ml-auto">
                <!--Menus informativos da página inicial-->
                <div class="col col-12 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <!--Clientes-->
                    <div class="cardInfo" style="background-color: #5289F7;">
                        <div class="row">
                            <div class="col text-light bg-primary cardInfoOne">
                                <a href="?pagina=Clientes">
                                    <svg width="60px" height="60px" viewBox="0 0 16 16" class="text-light bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoTwo">
                                <div class="row">
                                    <h2 class="cardItemCount">
                                        <?php
                                            $sql = "SELECT * FROM `clientes`";
                                            $exec = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($exec);
                                            echo $count;
                                        ?>
                                    </h2>
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
                                        <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoEight">
                                <div class="row">
                                    <h2 class="cardItemCount">
                                        <?php
                                            $sql = "SELECT * FROM `entregas`";
                                            $exec = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($exec);
                                            echo $count;
                                        ?>
                                    </h2>
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
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoSix">
                                <div class="row">
                                    <h2 class="cardItemCount">
                                        <?php
                                            $sql = "SELECT * FROM `ordem_servico`";
                                            $exec = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($exec);
                                            echo $count;
                                        ?>
                                    </h2>
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
                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-8 text-light ml-2" id="cardInfoFour">
                                <div class="row">
                                    <h2 class="cardItemCount">0</h2>
                                    <span class="cardItemText">Retornos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>