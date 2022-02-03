<?php

session_start();

//validar se o usuario existe e se ele está ativo

if (!isset($_SESSION["logado"])) {
    header('Location: login.php');
    exit;
}
