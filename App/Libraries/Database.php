<?php
class Database {
    private $host = 'localhost'; // Altere se necessário
    private $usuario = 'root'; // Usuário do banco
    private $senha = ''; // Senha do banco
    private $banco = 'galeria'; // Nome do banco de dados
    private $pdo;
    private $stmt;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->banco};charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $this->usuario, $this->senha, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function query($sql) {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo = null) {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function executa() {
        return $this->stmt->execute();
    }

    public function resultado() {
        $this->executa();
        return $this->stmt->fetch();
    }

    public function resultados() {
        $this->executa();
        return $this->stmt->fetchAll();
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
