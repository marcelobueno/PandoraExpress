<?php
include './assets/Conexao.php';
include './assets/Verifica_login.php';
?>
    <main class="corpo">
        <div class="container">
            <div class="text-center">
                <span><br></span>
                <h2 class="mb-3">Nova Ordem de Serviço</h2>
            </div>
            <?php 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
            <form action="assets/Entregas/Nova/CadOs.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-normal" for="cliente">Cliente: </label>
                            <select class="form-control" name="cliente" id="iptCadOsCliente" required>
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
                            <label class="font-weight-normal" for="data">Data: </label>
                            <input class="form-control" type="date" name="data" id="iptCadOsData" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-outline-dark" type="submit">Registrar</button>
            </form>           
        </div>
    </main>