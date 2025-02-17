<?php
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function cadastrar($nome, $email, $senha, $tipo) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)");
        $this->db->bind(":nome", $nome);
        $this->db->bind(":email", $email);
        $this->db->bind(":senha", $senhaHash);
        $this->db->bind(":tipo", $tipo);
        return $this->db->executa();
    }


    public function buscarPorEmail($email) {
        $this->db->query("SELECT * FROM usuarios WHERE email = :email");
        $this->db->bind(":email", $email);
        return $this->db->resultado();
    }
}
