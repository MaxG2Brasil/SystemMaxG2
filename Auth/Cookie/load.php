<?php 

if (isset($_COOKIE['usuario']) && isset($_COOKIE['login_id'])) {
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['usuario'] = $_COOKIE['usuario'];
    $_SESSION['role'] = $_COOKIE['role'];
    $_SESSION['login_id'] = $_COOKIE['login_id'];
    header('Location: Pages/src/Home/');
    exit();
}