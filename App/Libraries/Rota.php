<?php
class Rota {
    private $controladorAtual = 'Paginas'; // Controlador padrão
    private $metodoAtual = 'index';
    private $parametros = [];

    public function __construct() {
        $url = $this->getUrl();

        // Verifica se o controlador existe
        if (isset($url[0]) && file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
            $this->controladorAtual = ucwords($url[0]);
            unset($url[0]);
        }

        require_once "../app/controllers/{$this->controladorAtual}.php";
        $this->controladorAtual = new $this->controladorAtual;

        // Verifica se o método existe
        if (isset($url[1]) && method_exists($this->controladorAtual, $url[1])) {
            $this->metodoAtual = $url[1];
            unset($url[1]);
        }

        // Obtém os parâmetros
        $this->parametros = $url ? array_values($url) : [];

        // Chama o controlador e o método com os parâmetros
        call_user_func_array([$this->controladorAtual, $this->metodoAtual], $this->parametros);
    }

    private function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
