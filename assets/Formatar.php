<?php

function FormatarDoc($cpf_cnpj){

    $cpf_cnpj = preg_replace("/[^0-9]/", "", $cpf_cnpj);
    $doc = null;

    if(strlen($cpf_cnpj) == 11){
        $doc = "cpf";
    }
    elseif(strlen($cpf_cnpj) == 14){
        $doc = "cnpj";
    }
    else{
        $docError = "Erro! o formato informado não corresponde a nenhum CPF ou CNPJ";
    }

    switch($doc){
        case "cpf":
            $bloco1 = substr($cpf_cnpj,0,3);
            $bloco2 = substr($cpf_cnpj,3,3);
            $bloco3 = substr($cpf_cnpj,6,3);
            $digito = substr($cpf_cnpj, -2);

            $docFormatado = $bloco1 . "." . $bloco2 . "." . $bloco3 . "-" . $digito; 
        break;
        case "cnpj":
            $bloco1 = substr($cpf_cnpj,0,2);
            $bloco2 = substr($cpf_cnpj,2,3);
            $bloco3 = substr($cpf_cnpj,5,3);
            $bloco4 = substr($cpf_cnpj,8,4);
            $digito = substr($cpf_cnpj, -2);

            $docFormatado = $bloco1 . "." . $bloco2 . "." . $bloco3 . "/" . $bloco4 . "-" . $digito;
        break;
            
        default: $docError; break;
    }
    echo $docFormatado;
}

function FormatarTel($tel){

    $tel = preg_replace("/[^0-9]/", "", $tel);
    $tipo = null;

    if(strlen($tel) == 10){
        $tipo = "fixo";
    }
    elseif(strlen($tel) == 11){
        $tipo = "celular";
    }
    else{
        $tipo = "indefinido";
    }

    switch($tipo){
        case "fixo":
            $bloco1 = substr($tel,0,2);
            $bloco2 = substr($tel,2,4);
            $bloco3 = substr($tel,4,4);
            $resultado = "(" . $bloco1 . ")" . $bloco2 . "-" . $bloco3;
        break;
        case "celular":
            $bloco1 = substr($tel,0,2);
            $bloco2 = substr($tel,2,5);
            $bloco3 = substr($tel,5,4);
            $resultado = "(" . $bloco1 . ")" . $bloco2 . "-" . $bloco3;
        break;
        default:
            $resultado = $tel;
        break;
    }
    echo $resultado;
}
