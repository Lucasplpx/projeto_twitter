<?php
class homeController extends Controller {

    public function __construct(){
        parent::__construct();

        $u = new usuarios();

        if(!$u->isLogged()){
            header("Location: /twitter/login");
        }

    }

    public function index() {
        $data = array(
            'nome' => ''
        );

        $u = new usuarios($_SESSION['twlg']);
        $data['nome'] = $u->getNome();
        $data['qt_seguidos'] = $u->countSeguidos();
        $data['qt_seguidores'] = $u->countSeguidores();
        $data['sugestao'] = $u->getUsuarios(5);

        $this->loadTemplate('home', $data);
    }

}