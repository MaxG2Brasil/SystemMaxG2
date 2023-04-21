<?php

date_default_timezone_set('America/Sao_Paulo');
$timezone_brasil = date("Y-m-d H:i:s"); 

// PRODUCAO

define('HOST', 'sql540.main-hosting.eu');
define('USUARIO', 'u659419313_maxg2');
define('SENHA', 'D8j7w863saO5tL$RvUaTGLxBW');
define('DB','u659419313_maxg2');
$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('NÃO FOI POSSIVEL CONECTAR COM BANCO DE DADOS');
