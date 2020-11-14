<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pandora Express | Sistema de gerenciamento</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/Styles.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                    <img class="img-fluid mt-3 mb-3" src="img/Logo-Pandora.png" alt="Logo da Pandora Express" title="Pandora Express" width="200px">
                </div>
                <div class="col col-0 col-md-4 col-lg-4 col-xl-4"></div>
                <div class="col col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="float-right mt-3">
                        <span class="text-muted" style="font-size: 14px;">Olá, <?php echo $_SESSION['administrador'];?><br></span>
                        <?php
                            if($_SESSION['nivel_acesso'] == 3){
                                ?><span class="text-sm text-muted" style="font-size: 12px;">Desenvolvedor<br></span><?php
                            }
                            elseif($_SESSION['nivel_acesso'] == 2){
                                ?><span class="text-sm text-muted" style="font-size: 12px;">Gerente Geral<br></span><?php
                            }
                            else{
                                ?><span class="text-sm text-muted" style="font-size: 12px;">Operador<br></span><?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #495057;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseitem1" aria-controls="collapseitem1" aria-label="Togge navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container">

                <div id="collapseitem1" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="?pagina=Home">Início</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light menuItem" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <a class="dropdown-item" href="?pagina=Clientes">Clientes</a>
                                <a class="dropdown-item" href="?pagina=Motoboys">Motoboys</a>
                                <a class="dropdown-item" href="?pagina=Tabelas">Tabela de Preços</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-toggle" href="#" id="cadNovoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Novo Cadastro
                                </a>
                                <div class="dropdown-menu" aria-labelledby="#cadNovoDropdown">
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-Cliente">Cliente</a>
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-Motoboy">Motoboy</a>
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-Tabela">Tabela de Preços</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light menuItem" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Relatórios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="#">Fechamento - Cliente</a>
                                <a class="dropdown-item" href="#">Fechamento - Motoboy</a>
                                <a class="dropdown-item" href="#">Fechamento - Gerencial</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light menuItem" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Entregas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item" href="?pagina=Ordens-de-Servico">Ordens de Serviço</a>
                                <a class="dropdown-item" href="?pagina=Entregas">Entregas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-toggle" href="#" id="entregaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nova
                                </a>
                                <div class="dropdown-menu" aria-labelledby="#entregaDropdown">
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-Ordem-de-Servico">Ordem de Serviço</a>
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-Entrega">Entrega</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light menuItem" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ocorrências
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                <a class="dropdown-item" href="?pagina=Retornos">Retornos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-toggle" href="#" id="navNovoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nova Ocorrência
                                </a>
                                <div class="dropdown-menu" aria-labelledby="#navNovoDropdown">
                                    <a class="dropdown-item" href="?pagina=Novo-Retorno">Retorno</a>
                                </div>
                            </div>
                        </li>
                        <?php 
                        if($_SESSION['nivel_acesso'] >= 2){?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light menuItem" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                                <a class="dropdown-item" href="?pagina=Usuarios">Usuários</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-toggle" href="#" id="navNovoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Novo
                                </a>
                                <div class="dropdown-menu" aria-labelledby="#navNovoDropdown">
                                    <a class="dropdown-item" href="?pagina=Cadastro-de-usuario">Usuário</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    
                    <span class="float-right"><a href="assets/Logout.php" style="text-decoration: none; color: #fff;">Logout.</a></span>
                </div>
                </div>         
        </nav>
    </header>