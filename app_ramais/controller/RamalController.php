<?php

require_once '../DAO/conexao.php';
require_once '../DAO/RamalDao.php';
require_once '../model/Ramal.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'novo') {

    $ramal = new Ramal;
    $conexao = new Conexao();

    $ramalDao = new RamalDao($conexao, $ramal);
    $ramais = $ramalDao->recuperar();
}

switch ($acao) {
    case 'inserir':
        //definir ação quando for inserir

        $ramal = new Ramal;           //Model
        //Definir os valores das variaveis no model de Associado
        $ramal->__set('numero', $_POST['numero']);

        $conexao = new Conexao;       //Conexão

        $ramalDao = new RamalDao($conexao, $ramal);
        $ramalDao->inserir();
        header('Location: ../view/novo_ramal.php?inclusao=1');


        break;
    case 'recuperar':

        $ramal = new Ramal;
        $conexao = new Conexao();

        $ramalDao = new RamalDao($conexao, $ramal);
        $ramais = $ramalDao->recuperar();
        break;
    case 'atualizar':
        //definir ação quando for atualizar
        $ramal = new Ramal;     //Model
        $conexao = new Conexao();   //Conexão
        $ramal->__set('id', $_GET['id']);
        $ramalDao = new RamalDao($conexao, $ramal);      //DAO
        $ramalReg = $ramalDao->recuperarUm($ramal->__get('id'));

        break;
    case 'editar':
        //definir ação quando for atualizar
        $ramal = new Ramal;     //Model
        $ramal->__set('id', $_POST['id']);
        $ramal->__set('numero', $_POST['numero']);
        $conexao = new Conexao();   //Conexão
        $ramalDao = new RamalDao($conexao, $ramal);      //DAO
        $ramalDao->atualizar();
        header('Location: ../view/listar_ramal.php?inclusao=1');

        break;
    case 'remover':
        //definir ação quando for deletar
        $ramal = new Ramal;     //Model
        $conexao = new Conexao();   //Conexão
        $ramal->__set('id', $_GET['id']);
        $ramalDao = new RamalDao($conexao, $ramal);      //DAO
        $ramalDao->remover();
        header('location: ../view/listar_ramal.php?remocao=1');
        break;
    default:
        break;
}