<?php
include './assets/Conexao.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col col-2"></div>
                <div class="col">
                    <h2 class="text-center text-dark">Usuários do Sistema</h2>
                    <br>
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Login</th>
                                <th class="text-center">Usuário</th>
                                <th class="text-center">Nível de Acesso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM `usuarios`";
                            $exec = mysqli_query($conn, $sql);
                            if(!$exec){
                                echo 'Falha ao localizar usuários' . mysqli_error($exec);
                            }
                            else{
                                while($row = mysqli_fetch_assoc($exec)){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['id_usuario']; ?></td>
                                        <td class="text-center"><?php echo $row['login_usuario']; ?></td>
                                        <td class="text-center"><?php echo $row['nome_usuario']; ?></td>
                                        <td class="text-center"><?php 
                                            if($row['nivel_acesso'] == 3){
                                                echo 'Desenvolvedor';
                                            }
                                            elseif($row['nivel_acesso'] == 2){
                                                echo 'Gerente';
                                            }
                                            else{
                                                echo 'Operador';
                                            }?></td>
                                    </tr>
                            <?php } 
                            } ?>
                        </tbody>
                    </table>
                    <div>
                        <a href="?pagina=Cadastro-de-usuario" class="float-right btn btn-sm btn-dark">Cadastrar Usuário</a>
                    </div>
                </div>
                <div class="col col-2"></div>
            </div>
        </div>
    </main>