<?php
class usuarios extends model{

    private $uid;

    public function __construct($id = ''){
        parent::__construct();
        if(!empty($id)){
            $this->uid = $id;
        }
    }

    public function isLogged(){

        if(isset($_SESSION['twlg']) && !empty($_SESSION['twlg']) ){
            return true;
        } else {
            return false;
        }
    }

    public function usuarioExiste($email){

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if($sql->rowCount()){
            return true;
        } else {
            return false;
        }
    }

    public function inserirUsuario($nome, $email, $senha){
        $sql = "INSERT INTO usuarios SET nome = :nome , email = :email , senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        $id = $this->db->lastInsertId();
        
        return $id;
    }

    public function fazerLogin($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['twlg'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }

    public function getNome(){
        if(!empty($this->uid)){
            $sql = "SELECT nome FROM usuarios WHERE id = :id ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $this->uid);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                return $sql['nome'];
            }
        }
    }

    public function countSeguidos(){
        
        $sql = "SELECT * FROM relacionamentos WHERE id_seguidor = '".($this->uid)."'";
        $sql = $this->db->query($sql);

        return $sql->rowCount();
    }

    public function countSeguidores(){
        $sql = "SELECT * FROM relacionamentos WHERE id_seguido = '".($this->uid)."'";
        $sql = $this->db->query($sql);

        return $sql->rowCount();
    }

    public function getUsuarios($limite){

        $array = array();

        $sql = "SELECT * FROM usuarios LIMIT $limite";
        $sql = $this->db->query($sql);

        if($sql->rowCount()){
            $array = $sql->fetchAll();
        }

        return $array;
    }

}
//1133771 to 1523886

