<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-3">Cadastro de Tabela de Preço</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <form action="assets/Cadastros/Novo/CadTbl.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="cliente">Selecione o Cliente: </label>
                            <select class="form-control" name="cliente" id="iptCadTblCliente">
                                <?php 
                                    $sql = "SELECT `id_cliente`, `nome_cliente` FROM `clientes` ORDER BY `nome_cliente`";
                                    $exec = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($exec))
                                    { ?>
                                        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nome_cliente']; ?></option><?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="font-weight-normal" for="nome_tabela">Nome da Tabela: </label>
                            <input class="form-control" type="text" name="nome_tabela" id="iptCadTblNome" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="tipo_cobranca">Cobrar por: </label>
                            <select class="form-control" name="tipo_cobranca" id="iptCadTblCobranca" required>
                                <option value="entrega">Entrega</option>
                                <option value="hora">Hora</option>
                                <option value="distancia">Distância</option>
                            </select>
                        </div>
                        <div class="col col-3">
                            <label class="font-weight-normal" for="valor_cobranca">Valor a ser cobrado R$: </label>
                            <input class="form-control" type="number" step="0.10" name="valor_cobranca" id="iptCadTblValor" required>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <button class="btn btn-lg btn-outline-dark" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>