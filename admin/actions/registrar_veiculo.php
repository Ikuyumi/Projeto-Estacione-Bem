<?php

// Verificar a sessão:
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "Falha! Você precisa estar logado(a).";
        die();
    }

if($_SERVER['REQUESTED METHOD'] === 'POST'){
    require_once('classes/Estacionamento.class.php');
    $v = new Estacionamento();
    $v->placa = strip_tags($_POST['placa']);
    $v->celular = strip_tags($_POST['celular']);
    $v->data_entrada = strip_tags($_POST['data_entrada']);
    $v->data_saida = strip_tags($_POST['data_saida']);
    $v->convenio = strip_tags($_POST['convenio']);
    $v->id_usuario = strip_tags($_SESSION['usuario'],['id']);
    $v->id_tipo = strip_tags($_POST['id_tipo']);
    $v->observacoes = strip_tags($_POST['observacoes']);

     // Verificar por dados inválidos:
        if(strlen($v->placa) !=7 || $v->celular == ""){
            header('Location: ../index.php');
            die();
        }

        if ($p->Cadastrar() === 1) {
            header('Location: ../index.php?sucesso=registroveiculo');
        } else {
            header('Location: ../index.php?falha=registroveiculo');
        }
}
?>