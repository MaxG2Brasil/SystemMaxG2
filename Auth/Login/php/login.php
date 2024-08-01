<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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

// Query de Verificação 
$query = "SELECT * FROM Login WHERE usuario LIKE '$usuario' AND senha LIKE '$senha' AND ativo = 1";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

// IF de Condições do Resultado da Query
if ($row == 1) {
    $resultdata = mysqli_fetch_assoc($result);

    // Adicionando Último Login no Banco
    $update = updateLogin($conexao, $usuario, $senha, $timezone_brasil);
    if (!$update) {
        $_SESSION['erro_interno'] = true;
        header('Location: /');
        exit();
    } else {
        // Definindo Sessões
        $_SESSION['nome'] = $resultdata['nome'];
        $_SESSION['usuario'] = $resultdata['usuario'];
        $_SESSION['role'] = $resultdata['role_id'];
        $_SESSION['login_id'] = $resultdata['id'];

        // Verificando se "Lembrar-me" foi marcado
        if (isset($_POST['remember']) && $_POST['remember'] == 'true') {
            setcookie('nome', $resultdata['nome'], time() + (86400 * 30), "/"); // 30 dias
            setcookie('usuario', $resultdata['usuario'], time() + (86400 * 30), "/");
            setcookie('role', $resultdata['role_id'], time() + (86400 * 30), "/");
            setcookie('login_id', $resultdata['id'], time() + (86400 * 30), "/");
        }

        header('Location: ../../../Pages/src/Home/');
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: /');
    exit();
}
