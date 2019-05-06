<?php
class homeController extends Controller {

    public function __construct(){
        parent::__construct();

        global $config;
		global $db;
		$this->db = $db;

        $u = new usuarios();

        if(!$u->isLogged()){
            header("Location: /twitter/login");
        }

    }

    public function index() {
        $data = array(
            'nome' => '',
            'feed' => array()
        );

        $p = new posts();

        if(!empty($_POST['msg']) && isset($_POST['msg'])){
            $msg = addslashes($_POST['msg']);
            $p->inserirPost($msg);

        }

        $u = new usuarios($_SESSION['twlg']);
        $data['nome'] = $u->getNome();
        $data['qt_seguidos'] = $u->countSeguidos();
        $data['qt_seguidores'] = $u->countSeguidores();
        $data['sugestao'] = $u->getUsuarios(5);

        $lista = $u->getSeguidos();
        $lista[] = $_SESSION['twlg'];

        

        $data['feed'] = $p->getFeed($lista, 10);
        
        

        $this->loadTemplate('home', $data);
    }

    public function seguir($id){

        if(!empty($id)){
            $sql = "SELECT * FROM usuarios WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){

                $r = new relacionamentos();
                $r->seguir($_SESSION['twlg'], $id);

            }
        }
        header("Location: /twitter");
    }

    public function deseguir($id){

        if(!empty($id)){
            $sql = "SELECT * FROM usuarios WHERE id = '$id'";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){

                $r = new relacionamentos();
                $r->deseguir($_SESSION['twlg'], $id);

            }
        }
        header("Location: /twitter");
    }

}