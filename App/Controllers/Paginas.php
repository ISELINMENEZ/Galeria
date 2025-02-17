<?php
class Paginas extends Controller{
    public function index(){
      $dados = ['titulo'=>'Pagina Inicial',
                 'descricao'=> 'Aula de PHP'
               ];
        $this->view('pagina/home', $dados);
    }
    public function sobre(){
      $dados = ['titulo'=>'Sobre nós...',
                'descricao'=>'Esta aula é sobre PHP 
                 orientado a objetos com MVC'];
     $this->view('pagina/sobre', $dados);
    }
    public function categoria(){
      $dados = ['titulo'=>'Sobre nós...',
                'descricao'=>'Esta aula é sobre PHP 
                 orientado a objetos com MVC'];
     $this->view('pagina/categoria', $dados);
    }
    public function menu() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: " . URL . "/usuarios/login");
            exit();
        }
        $this->view('pagina/menu');
    }
    
}//fim da classe Paginas

?>