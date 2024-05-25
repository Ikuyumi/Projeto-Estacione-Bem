<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Usuario.class.php');

    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->telefone = strip_tags($_POST['telefone']);
    $u->senha = strip_tags($_POST['senha']);
   
    // Verificar por dados inválidos:
    if($u->nome == "" || $u->email == "" || $u->senha == ""){
        header('Location: ../login.php?falha=cadastrousuario');

        die();
    }

    if($u->Cadastrar() == 1){
        // Redirecionar de volta para login:
        header('Location: ../login.php?sucesso=cadastrousuario');
        
    }else{
        echo ('Location: ../login.php?falha=cadastrousuario');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}

?>