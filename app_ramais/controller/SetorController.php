<?php

require_once '../DAO/conexao.php';
require_once '../DAO/SetorDao.php';
require_once '../model/Setor.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'novo') {

    $setor = new Setor;
    $conexao = new Conexao();

    $setorDao = new SetorDao($conexao, $setor);
    $setores = $setorDao->recuperar();
}

switch ($acao) {
    case 'inserir':
        //definir ação quando for inserir

        $setor = new Setor;           //Model
        //Definir os valores das variaveis no model de Associado
        $setor->__set('setor', $_POST['setor']);

        $conexao = new Conexao;       //Conexão

        $setorDao = new SetorDao($conexao, $setor);
        $setorDao->inserir();
        header('Location: ../view/novo_setor.php?inclusao=1');


        break;
    case 'recuperar':

        $setor = new Setor;
        $conexao = new Conexao();

        $setorDao = new SetorDao($conexao, $setor);
        $setores = $setorDao->recuperar();
        break;
    case 'atualizar':
        //definir ação quando for atualizar
        $setor = new Setor;     //Model
        $conexao = new Conexao();   //Conexão
        $setor->__set('id', $_GET['id']);
        $setorDao = new SetorDao($conexao, $setor);      //DAO
        $setorReg = $setorDao->recuperarUm($setor->__get('id'));

        break;
    case 'editar':
        //definir ação quando for atualizar
        $setor = new Setor;     //Model
        $setor->__set('id', $_POST['id']);
        $setor->__set('setor', $_POST['setor']);
        $conexao = new Conexao();   //Conexão
        $setorDao = new SetorDao($conexao, $setor);      //DAO
        $setorDao->atualizar();
        header('Location: ../view/listar_setor.php?inclusao=1');

        break;
    case 'remover':
        //definir ação quando for deletar
        $setor = new Setor;     //Model
        $conexao = new Conexao();   //Conexão
        $setor->__set('id', $_GET['id']);
        $setorDao = new SetorDao($conexao, $setor);      //DAO
        $setorDao->remover();
        header('location: ../view/listar_setor.php?remocao=1');
        break;
    default:
        break;
}