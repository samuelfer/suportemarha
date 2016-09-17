<?php
session_start();//INICIANDO A SESSÃO
session_destroy();//DESTRUINDO A SESSÃO
session_unset();//LIMPANDO AS VARIÁVEIS GLOBAIS

header('Location: login.php');
exit();
?>