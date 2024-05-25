<?php

require_once('Banco.class.php');
class Usuario{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $senha;

    public function Logar(){
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);
        $comando->execute([$this->email, $hash]);

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }

    public function Cadastrar(){
        $sql = "INSERT INTO usuarios(nome, email, telefone, senha) 
        VALUES (?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash("sha256", $this->senha);

        try{
        $comando->execute([$this->nome, $this->email, $this->telefone, $hash]);
        Banco::desconectar();
        return $comando->rowCount();
        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

}
?>