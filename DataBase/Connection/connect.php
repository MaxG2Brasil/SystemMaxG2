<?php
date_default_timezone_set('America/Sao_Paulo');
$timezone_brasil = date("Y-m-d H:i:s"); 

// PRODUCAO

define('HOST', 'srv812.hstgr.io');
define('USUARIO', 'u504179132_root');
define('SENHA', 'D8j7w863saO5tL$RvUaTGLxBW');
define('DB','u504179132_maxg2');
$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('NÃO FOI POSSIVEL CONECTAR COM BANCO DE DADOS');