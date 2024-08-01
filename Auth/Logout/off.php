<?php
session_start();
session_destroy();
setcookie('nome', '', time() - 3600, "/");
setcookie('usuario', '', time() - 3600, "/");
setcookie('role', '', time() - 3600, "/");
setcookie('login_id', '', time() - 3600, "/");
header('Location: /');
exit();
