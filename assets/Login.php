<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Login.css">

    <title>Login | Pandora Express</title>
  </head>
  <body style="background-color: #38a3a5;">
    <div class="container">
        <div class="text-center mt-5 mb-3">
            
        </div>
        <div class="row mt-4">
            <div class="col col-3">
                <button id="btnMostrarErro" class="btn btn-danger">Mostrar</button>
            </div>
            <div class="col">
                <div class="card mt-5 mb-5">
                    <div class="ml-5 mr-5 mt-5 mb-5">
                        <div class="text-center mb-2">
                            <img class="mb-3" src="img/Logo-Pandora.png" width="200px" alt="">
                            <h4 class="text-warning">Bem vindo Administrador</h4>
                            <span class="font-weight-normal">Por favor digite suas credenciais</span>
                        </div>
                        <form action="assets/Validar_login.php" method="POST">
                            <label class="text-warning text-monospace" for="username">Usuário</label>
                            <input class="form-control" type="text" name="username" id="loginUsername" placeholder="Administrador">
                            <label class="text-warning text-monospace" for="password">Senha</label>
                            <input class="form-control" type="password" name="password" id="loginPassword" placeholder="*************">
                            <button class="mt-2 btn btn-outline-warning btn-lg btn-block" type="submit">Entrar</button>
                            <div id="badgeErroLogin" class="error-ocult">
                                <p class="text-sm text-danger">Senha incorreta!</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-3">

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/Functions.js"></script>
</body>
</html>