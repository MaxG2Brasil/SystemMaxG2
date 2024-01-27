<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
session_start();
include('../../../DataBase/Connection/connect.php');
include('func/insert.php');

// Verificando os Dados Enviados do POST
if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: /');
    exit();
}

// Variaveis
$nome = mysqli_real_escape_string($conexao, $_POST['name']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

// Query de Verificacao 
$query = "SELECT * FROM Login where email like '$email' and ativo = 1";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

// IF de Condicoes do Resultado da Query
if ($row == 1) {
    $_SESSION['conta_existente'] = true;
    header('Location: ../');
    exit();
} elseif (!$row) {
    $insert = insertLogin($conexao, $nome, $usuario, $email, $senha, $timezone_brasil);
    if (!$insert) {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../');
        exit();
    } else {
        $insert_perfil = insertPerfil($conexao, $nome);
        if (!$insert_perfil) {
            $_SESSION['nao_autenticado'] = true;
            header('Location: ../');
            exit();
        } else {
            $_SESSION['conta_cadastrada'] = true;
            header('Location: ../');
            exit();
        }
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../');
    exit();
}
