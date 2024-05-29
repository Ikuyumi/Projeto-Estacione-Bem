<?php

// Verificar se a sessão existe:
session_start();
if(!isset($_SESSION['usuario'])){
    echo "Você não está logado.";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Usuario.class.php');

    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->telefone = strip_tags($_POST['telefone']);
    $u->senha = strip_tags($_POST['senha']);
    $u->id = strip_tags($_SESSION['usuario']['id']);

    // Verificar por dados inválidos:
        if($u->nome == "" || $u->email == "" || $u->telefone == "" || $u->senha == ""){
           header('Location: ../index.php?falha=editarusuario');
            die();
        }

        if($u->Editar() === 1){
            header ('Location: ../index.php?sucesso=editarusuario');
            die();
        }
        else{
            header ('Location: ../index.php?falha=editarusuario');
            die();
        }

}
else{
    echo "Erro. A página deve ser carregada por POST.";
}

?>