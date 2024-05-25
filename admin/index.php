<?php
// Painel de administração

session_start();
// Verificar se a sessão não existe:
if (!isset($_SESSION['usuario'])) {
    // Voltar ao login:
    header('Location: login.php');
    die();
}








?>