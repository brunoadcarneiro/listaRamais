<?php

require_once '../DAO/conexao.php';
require_once '../DAO/UsuarioDao.php';
require_once '../model/Usuario.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

switch ($acao) {
    case 'login':
        //definir ação quando for inserir

        session_start();

        $usuario = new Usuario;           //Model
        //Definir os valores das variaveis no model de Associado
        $usuario->__set('nome', $_POST["nome"]);
        $usuario->__set('senha', md5(trim($_POST["senha"])));

        $conexao = new Conexao;       //Conexão

        $usuarioDao = new UsuarioDao($conexao, $usuario);
        $usuarioLogado = $usuarioDao->logon($usuario->__get('nome'));
        echo '<pre>';
        var_dump($usuarioLogado);
        echo '</pre>';

        if ($usuarioLogado) {

            // Agora verifica a senha
            /* 	
                    Veja o uso da função strcmp na comparação das senhas. 
                    Ela está comparando as duas senhas já criptografadas em hash MD5. 
                    Lembrando que a função strcmp retorna ZERO caso 2 strings sejam iguais, por isso o uso do operador NOT (!) na frente da mesma. 
                */

            if (!strcmp($usuario->__get('senha'), $usuarioLogado["senha"])) {
                // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
                $_SESSION["id"] = $usuarioLogado["id"];
                $_SESSION["nome"] = stripslashes($usuarioLogado["nome"]);
                $_SESSION["permissao"] = $usuarioLogado["permissao"];
                $_SESSION["status"] = $usuarioLogado["status"];
                $_SESSION["logado"] = true;
                $_SESSION['msglogado'] = $usuarioLogado["nome"];
                header("Location: ../view/home.php");
                exit;
            }/* Senha inválida */ else {
                $_SESSION['erro_senha'] = true;
                header('Location: ../view/login.php');
                exit;
            }
        }/* Login inválido */ else {
            $_SESSION['erro_user'] = true;
            header('Location: ../view/login.php');
            exit;
        }

        break;
    case 'logout':

        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit();
        
        break;
        
    default:
        break;
}
