<?php
class Usuarios extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    public function index() {
        $this->view('usuario/cadastro');
    }

    public function cadastro() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $confirmar_senha = trim($_POST['confirmar_senha']);
        $tipo = ($_POST['tipo'] == "Artista") ? "Artista" : "Apreciador"; // Segurança

        if ($senha === $confirmar_senha) {
            if ($this->usuarioModel->cadastrar($nome, $email, $senha, $tipo)) {
                header("Location: galeria/usuarios/login");
            } else {
                die("Erro ao cadastrar");
            }
        } else {
            die("As senhas não coincidem");
        }
    }
    $this->view("usuario/login");
}


    public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $usuario = $this->usuarioModel->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario->senha)) {
            session_start();
            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['usuario_nome'] = $usuario->nome;
            $_SESSION['usuario_tipo'] = $usuario->tipo; // Adicionando o tipo à sessão
            
            // Redireciona para a página do menu
            header("Location: " . URL . "/pagina/menu");
            exit();
        } else {
            die("Email ou senha inválidos");
        }
    }
    $this->view("usuario/login");
}



    public function logout() {
        session_start();
        session_destroy();
        header("Location: ".URL."/usuarios/login");
    }
}
