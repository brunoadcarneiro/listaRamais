<?php

require '../DAO/Conexao.php';
require '../model/Usuario.php';
require '../dao/UsuarioDAO.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

switch ($acao) {
    case 'inserir':
      //definir ação quando for inserir
  
  
      $usuario = new Usuario;           //Model
      //Definir os valores das variaveis no model de Associado
      $usuario->__set('nome', $_POST['nome']);
      $usuario->__set('senha', MD5($_POST['senha']));
      $usuario->__set('permissao', $_POST['permissao']);
      $usuario->__set('status', $_POST['status']);
     
  
      $conexao = new Conexao;       //Conexão

      $usuarioDao = new UsuarioDAO($conexao, $usuario);
      $usuarioDao->inserir();  
      header('Location: ../view/novo_usuario.php?inclusao=1');

      
      break;
      case 'recuperar':

        $usuario = new Usuario;
        $conexao = new Conexao();

        $usuarioDao = new UsuarioDao($conexao, $usuario);
        $usuarios = $usuarioDao->recuperar();

        /* echo '<pre>';
        var_dump($usuarios);
        echo '</pre>'; */

        break;
    case 'atualizar':
        //definir ação quando for atualizar
        $usuario = new Usuario;     //Model
        $conexao = new Conexao();   //Conexão
        $usuario->__set('id', $_GET['id']);
        $usuarioDao = new UsuarioDao($conexao, $usuario);      //DAO
        $usuarioReg = $usuarioDao->recuperarUm($usuario->__get('id'));

        break;
    case 'editar':
        //definir ação quando for atualizar
        $usuario = new Usuario;     //Model

        $usuario->__set('id', $_POST['id']);
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('senha', MD5($_POST['senha']));
        $usuario->__set('permissao', $_POST['permissao']);
        $usuario->__set('status', $_POST['status']);

        $conexao = new Conexao();   //Conexão

        $usuarioDao = new UsuarioDao($conexao, $usuario);      //DAO
        $usuarioDao->atualizar();
        header('Location: ../view/listar_usuario.php?inclusao=1');

        break;
    case 'remover':
        //definir ação quando for deletar
        $usuario = new Usuario;     //Model
        $conexao = new Conexao();   //Conexão
        $usuario->__set('id', $_GET['id']);
        $usuarioDao = new UsuarioDao($conexao, $usuario);      //DAO
        $usuarioDao->remover();
        header('location: ../view/listar_usuario.php?remocao=1');
        break;
    default:
        break;
  }