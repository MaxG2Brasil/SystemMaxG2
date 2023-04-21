<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

function updateLogin($conexao, $usuario, $senha, $timezone_brasil) {

    // Gravar o SQL
    $sql = "UPDATE Login set data_login = '$timezone_brasil' where usuario = '$usuario' and senha = '$senha' and ativo = 1";
    $ok = mysqli_query($conexao, $sql);

    // Verificar se o Insert foi Registrado no Banco de Dados
    if ($conexao->affected_rows==1){
        return 1;
    }
    else {
        return null;
    }
}