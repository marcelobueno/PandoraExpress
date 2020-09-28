<?php
include 'assets/Conexao.php';
?>
    <main class="corpo mt-3 mb-3">
        <div class="container">
            <?php
                echo $_SESSION['administrador'];
                echo $_SESSION['nivel_acesso'];
            ?>
        </div>
    </main>