<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_start();
include('../../../DataBase/Connection/connect.php');
include('func/update.php');

// Verificando os Dados Enviados do POST
if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: /');
    exit();
}

// Vars
$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

// Query de Verificacao 
$query = "SELECT * FROM Login where usuario like '$usuario' and senha like '$senha' and ativo = 1";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

// IF de Condicoes do Resultado da Query
if ($row == 1) {
    $resultdata = mysqli_fetch_assoc($result);

    // Adicionando Ultimo Login no Banco
    $update = updateLogin($conexao, $usuario, $senha, $timezone_brasil);
    if (!$update) {
        $_SESSION['erro_interno'] = true;
        header('Location: /');
        exit();
    } else {
        // Definindo Sessoes
        $_SESSION['nome'] = $resultdata['nome'];
        $_SESSION['usuario'] = $resultdata['usuario'];
        $_SESSION['role'] = $resultdata['role_id'];
        $_SESSION['login_id'] = $resultdata['id'];

        header('Location: ../../../Pages/src/Home/');
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: /');
    exit();
}
