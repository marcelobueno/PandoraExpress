<?php

session_start();

require __DIR__. '/vendor/autoload.php';

if(!isset($_SESSION['administrador'])){
    $_SESSION['administrador'] = null;
}
if(!isset($_SESSION['nivel_acesso'])){
    $_SESSION['nivel_acesso'] = null;
}

if($_SESSION['administrador'] == null){
    include 'assets/Login.php';
}
else{
    include 'assets/Header.php';

    $_SESSION['title'] = "Pandora Express";
    
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    else{
        $pagina = 'Home';
    }

    switch($pagina){
        case 'Login': include 'assets/Login.php'; break;
        case 'Home': include 'assets/Main.php'; break;
        case 'Clientes': include 'assets/Cadastros/Clientes.php'; break;
        case 'Motoboys': include 'assets/Cadastros/Motoboys.php'; break;
        case 'Tabelas': include 'assets/Cadastros/Tabelas_Preco.php'; break;
        case 'Usuarios': include 'assets/Usuarios/Usuarios.php'; break;
        case 'Retornos': include 'assets/Ocorrencias/Retornos.php'; break;
        case 'Novo-Retorno': include 'assets/Ocorrencias/Novo/Retorno.php'; break;
        case 'Confirmar-Retorno': include 'assets/Ocorrencias/Novo/Novo_ret.php'; break;
        case 'Detalhes-Retorno': include 'assets/Ocorrencias/view/Detalhes_Ret.php'; break;
        case 'Ordens-de-Servico': include 'assets/Entregas/Ordens_Servico.php'; break;
        case 'Entregas': include 'assets/Entregas/Entregas.php'; break;
        case 'Cadastro-de-usuario': include 'assets/Usuarios/Cad_Usuario.php'; break;
        case 'Cadastro-de-Cliente': include 'assets/Cadastros/Novo/Cliente.php'; break;
        case 'Cadastro-de-Motoboy': include 'assets/Cadastros/Novo/Motoboy.php'; break;
        case 'Cadastro-de-Tabela': include 'assets/Cadastros/Novo/Tabela_Preco.php'; break;
        case 'Cadastro-de-Ordem-de-Servico': include 'assets/Entregas/Nova/Ordem_Servico.php'; break;
        case 'Cadastro-de-Entrega': include 'assets/Entregas/Nova/Entrega.php'; break;
        case 'Visualizar-Cliente': include 'assets/Cadastros/Views/View_Cliente.php'; break;
        case 'Editar-Cliente': include 'assets/Cadastros/Views/View_Cliente.php'; break;
        case 'Deletar-Cliente': include 'assets/Cadastros/Views/View_Cliente.php'; break;
        case 'Visualizar-Motoboy': include 'assets/Cadastros/Views/View_Motoboy.php'; break;
        case 'Editar-Motoboy': include 'assets/Cadastros/Views/View_Motoboy.php'; break;
        case 'Deletar-Motoboy': include 'assets/Cadastros/Views/View_Motoboy.php'; break;
        case 'Visualizar-Tabela': include 'assets/Cadastros/Views/View_Tabela.php'; break;
        case 'Editar-Tabela': include 'assets/Cadastros/Views/View_Tabela.php'; break;
        case 'Deletar-Tabela': include 'assets/Cadastros/Views/View_Tabela.php'; break;
        case 'Nova-Ocorrencia': include 'assets/Ocorrencias/Novo/Retorno.php'; break;
        case 'Visualizar-Entregas': include 'assets/Entregas/View/ViewOs.php'; break;
        case 'Detalhes-Entrega': include 'assets/Entregas/View/ViewEnt.php'; break;
        case 'Lancamento-Entrega': include 'assets/Entregas/Nova/Lancar_entrega.php'; break;
        case 'Entregas-Lancadas': include 'assets/Entregas/Nova/Lancamentos.php'; break;
        case 'Entregas-Por-Motoboy': include 'assets/Entregas/View/ViewEntBoy.php'; break;
        case 'Fechamento-Cliente': include 'assets/Relatorios/Relatorio_Cliente.php'; break;
        case 'Fechamento-Retornos': include 'assets/Relatorios/Relatorio_Retornos.php'; break;
        case 'Fechamento-Motoboy': include 'assets/Relatorios/Relatorio_Motoboy.php'; break;
        case 'Fechamento-Gerencial': include 'assets/Relatorios/Relatorio_Gerencial.php'; break;
        case 'Anotacoes': include 'assets/Anotacoes/Anotacoes.php'; break;
        case 'Relatorio-Entrega-Motoboy': include 'assets/Entregas/View/Processar_Ent.php'; break;
        case 'Abrir-Entrega': include  'assets/Gerencial/abrir_entrega.php'; break;
        case 'Liberar-Entrega': include  'assets/Gerencial/atl_entrega.php'; break;
        case 'Desconto-Cliente': include 'assets/Gerencial/descontos_clientes.php'; break;
        case 'Gravar-Desconto-Cliente': include 'assets/Gerencial/gravar_desconto_cliente.php'; break;
        case 'Gravar-Desconto-Motoboy': include 'assets/Gerencial/gravar_desconto_motoboy.php'; break;
        case 'Desconto-Motoboy': include  'assets/Gerencial/descontos_motoboys.php'; break;
        case 'Ajuda-Motoboy': include 'assets/Gerencial/ajuda_motoboys.php'; break;
        case 'Gravar-Ajuda-Motoboy': include 'assets/Gerencial/gravar_ajuda_motoboy.php'; break;
        case 'Historico-de-Retornos': include 'assets/Ocorrencias/historico_retornos.php'; break;
        default: include 'assets/Login.php'; break;
    }

include 'assets/Footer.php';
}
