<?php

require_once '../DAO/conexao.php';
require_once '../DAO/FuncionarioDao.php';
require_once '../model/Funcionario.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'novo') {

    $funcionario = new Funcionario;
    $conexao = new Conexao();

    $funcionarioDao = new FuncionarioDao($conexao, $funcionario);
    $funcionarios = $funcionarioDao->recuperar();
    $ramais = $funcionarioDao->recuperarRamal();
    $setores = $funcionarioDao->recuperarSetor();
}

switch ($acao) {
    case 'inserir':
        //definir ação quando for inserir
        
        $funcionario = new Funcionario;           //Model
        //Definir os valores das variaveis no model de Associado
        $funcionario->__set('nome', $_POST['nome']);
        $funcionario->__set('ramal_id', $_POST['ramal_id']);
        $funcionario->__set('setor_id', $_POST['setor_id']);

        $conexao = new Conexao;       //Conexão

        $funcionarioDao = new FuncionarioDao($conexao, $funcionario);
        $funcionarioDao->inserir();
        header('Location: ../view/novo_funcionario.php?inclusao=1');


        break;
    case 'recuperar':

        $funcionario = new Funcionario;
        $conexao = new Conexao();

        $funcionarioDao = new FuncionarioDao($conexao, $funcionario);
        $funcionarios = $funcionarioDao->recuperar();
        break;
    case 'atualizar':
        //definir ação quando for atualizar
        $funcionario = new Funcionario;     //Model
        $conexao = new Conexao();   //Conexão
        $funcionario->__set('id', $_GET['id']);
        $funcionarioDao = new FuncionarioDAO($conexao, $funcionario);      //DAO
        $funcionarioReg = $funcionarioDao->recuperarUm($funcionario->__get('id'));
        $ramais = $funcionarioDao->recuperarRamal();
        $setores = $funcionarioDao->recuperarSetor();

        break;
    case 'editar':
        //definir ação quando for atualizar
        $funcionario = new Funcionario;     //Model

        $funcionario->__set('id', $_POST['id']);
        $funcionario->__set('nome', $_POST['nome']);
        $funcionario->__set('ramal_id', $_POST['ramal_id']);
        $funcionario->__set('setor_id', $_POST['setor_id']);
        
        $conexao = new Conexao();   //Conexão
        $funcionarioDao = new FuncionarioDAO($conexao, $funcionario);      //DAO
        $funcionarioDao->atualizar();
        header('Location: ../view/listar_funcionarios.php?inclusao=1');

        break;
    case 'remover':
        //definir ação quando for deletar
        $funcionario = new Funcionario;     //Model
        $conexao = new Conexao();   //Conexão
        $funcionario->__set('id', $_GET['id']);
        $funcionarioDao = new FuncionarioDAO($conexao, $funcionario);      //DAO
        $funcionarioDao->remover();
        header('location: ../view/listar_funcionarios.php?remocao=1');
        break;
    default:
        break;
}
