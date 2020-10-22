<?php
require './assets/Conexao.php';
require './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container mb-3">
            <div class="text-center">
                <span><br></span>
                <h2 class="mb-3 text-dark">Usuários do Sistema</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <table id="" class="display table table-bordered" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th class="" width="100px">ID</th>
                        <th width="150px">Login</th>
                        <th>Usuário</th>
                        <th width="200px">Nível de Acesso</th>
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
                                <td class=""><?php echo $row['login_usuario']; ?></td>
                                <td class=""><?php echo $row['nome_usuario']; ?></td>
                                <td class=""><?php 
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
        </div>
    </main>