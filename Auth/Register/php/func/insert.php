<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

function insertLogin($conexao, $nome, $usuario, $email, $senha, $timezone_brasil)
{
    // Vars
    $nome = strtoupper($nome);
    $email = strtolower($email);

    // Gravar o SQL
    $sql = "INSERT INTO Login (usuario, nome, email, senha, ativo, role_id, data_login) VALUES ('$usuario', '$nome', '$email', '$senha', 1, 3, '$timezone_brasil')";
    $ok = mysqli_query($conexao, $sql);

    // Verificar se o Insert foi Registrado no Banco de Dados
    if ($conexao->affected_rows == 1) {
        return 1;
    } else {
        return null;
    }
}

function insertPerfil($conexao, $nome)
{
    // Obtém o último ID inserido
    $query = "SELECT MAX(id) AS last_id FROM Login";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $login_id = $row['last_id'];
        mysqli_free_result($result);

        // Gravar o SQL
        $sql = "INSERT INTO Perfil (nome, login_id) VALUES ('$nome', $login_id)";
        $ok = mysqli_query($conexao, $sql);

        // Verificar se o Insert foi Registrado no Banco de Dados
        if ($conexao->affected_rows == 1) {
            return 1;
        } else {
            return null;
        }
    } else {
        // Trate o erro, se necessário
        return null;
    }
}
