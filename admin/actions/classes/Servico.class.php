<?php

require_once('Banco.class.php');
class Servico{
    public $id;
    public $servico;
    public $valor;

    public function Listar(){
        $sql = "SELECT * FROM servicos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }

}

?>