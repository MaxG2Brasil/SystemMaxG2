<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

function pesquisarPerfil($conexao, $login_id) {
    // Search
    $sql = "SELECT * FROM Perfil where login_id = '$login_id'";
    $result = mysqli_query($conexao, $sql);
    $resultdata = mysqli_fetch_assoc($result);

    return $resultdata;
}