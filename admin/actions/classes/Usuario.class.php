<?php

require_once('Banco.class.php');
class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $senha;
    public $foto;

    public function Logar()
    {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);
        $comando->execute([$this->email, $hash]);

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }

    public function CadastrarSemFoto()
    {
        $sql = "INSERT INTO usuarios(nome, email, telefone, senha) 
        VALUES (?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash("sha256", $this->senha);

        try {
            $comando->execute([$this->nome, $this->email, $this->telefone, $hash]);
            Banco::desconectar();
            return $comando->rowCount();
        } catch (PDOException $e) {
            Banco::desconectar();
            return 0;
        }
    }

    public function CadastrarComFoto()
    {
        $sql = "INSERT INTO usuarios(nome, email, telefone, senha, foto) 
        VALUES (?, ?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash("sha256", $this->senha);

        try {
            $comando->execute([$this->nome, $this->email, $this->telefone, $hash, $this->foto]);
            Banco::desconectar();
            return $comando->rowCount();
        } catch (PDOException $e) {
            Banco::desconectar();
            return 0;
        }
    }

    public function Editar()
    {
        $sql = "UPDATE usuarios SET nome=?, email=?, telefone=?, senha=? WHERE id=?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash("sha256", $this->senha);

        try {
            $comando->execute([$this->nome, $this->email, $this->telefone, $hash, $this->id]);
            Banco::desconectar();
            return $comando->rowCount();
        } catch (PDOException $e) {
            Banco::desconectar();
            return 0;
        }
    }
}
