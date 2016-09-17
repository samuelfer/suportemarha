<?php
session_start();//INICIANDO A SESSÃO
session_destroy();//DESTRUINDO A SESSÃO
session_unset();//LIMPANDO AS VARIÁVEIS GLOBAIS

echo "<script>alert('Você se deslogou com sucesso!');;top.location.href='login.php';</script>";
?>