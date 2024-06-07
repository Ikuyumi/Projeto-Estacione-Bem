<?php

require_once('Banco.class.php');
class Estacionamento{
    public $id;
    public $placa;
    public $celular;
    public $data_entrada;
    public $data_saida;
    public $convenio;
    public $id_usuario;
    public $id_tipo;
    public $observacoes;
    public $pago;

    public function Listar(){
        $sql = "SELECT * FROM estacionamento";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function ListarMensalistas(){
        $sql = "SELECT * FROM estacionamento WHERE convenio=1";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function Cadastrar(){
        $sql = "INSERT INTO estacionamento(placa, celular, data_entrada, data_saida, convenio, id_usuario, id_tipo, observacoes) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        //try{
        $comando->execute([$this->placa, $this->celular, $this->data_entrada, $this->data_saida, $this->convenio, 
        $this->id_usuario, $this->id_tipo, $this->observacoes]);
        Banco::desconectar();
        return $comando->rowCount();
        //}catch(PDOException $e){
            //Banco::desconectar();
            //return 0;
       // }
    }

    public function Editar(){
        $sql = "UPDATE estacionamento SET placa=?, celular=?, data_entrada=?, data_saida=?, convenio=?, 
        id_usuario=?, id_tipo=?, observacoes=? WHERE id=?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        try{
        $comando->execute([$this->placa, $this->celular, $this->data_entrada, $this->data_saida, $this->convenio, 
        $this->id_usuario, $this->id_tipo, $this->observacoes, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Apagar(){
        $sql = "DELETE FROM estacionamento WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }

}
?>