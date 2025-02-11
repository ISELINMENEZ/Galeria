<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checarEmail($email)
    {
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuarios(arti_nome, arti_email , arti_senha) VALUES (:nome, :email, :senha)");

        $this->db->bind("arti_nome", $dados['nome']);
        $this->db->bind("arti_email", $dados['email']);
        $this->db->bind("arti_senha", $dados['senha']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }
    
    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM usuarios WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->resultado();
    }//fim da função lerUsuarioPorId

}