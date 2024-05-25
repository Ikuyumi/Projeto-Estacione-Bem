<?php

require_once('Banco.class.php');
class Tipo{
    public $id;
    public $tipo;

    public function Listar(){
        $sql = "SELECT * FROM tipo";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }




}



?>