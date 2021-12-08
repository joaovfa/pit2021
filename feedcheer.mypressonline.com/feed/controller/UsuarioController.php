<?php
class UsuarioController{


    public function all(){
        $obj = new Usuario();
        $comentarios = $obj->all();

        include 'view/usuario_all.php';
    }

    public function create(){
        $obj = new Usuario();

        if( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['mensagem']) ){
            $obj->setNome($_POST['nome']);
            $obj->setEmail($_POST['email']);
            $obj->setTelefone($_POST['telefone']);
            $obj->setMensagem($_POST['mensagem']);
            $obj->create();
        }

        include 'view/usuario_create.php';
    }

    public function read(){

    }

    public function update(){
        if( !isset($_GET['id']) ){
            echo "Id não informado";
            exit;
        }

        $obj = new Usuario();

        $obj->setId($_GET['id']);

        if( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['mensagem']) ){
            $obj->setNome($_POST['nome']);
            $obj->setEmail($_POST['email']);
            $obj->setTelefone($_POST['telefone']);
            $obj->setMensagem($_POST['mensagem']);
            $obj->update();
        }

        $comentario = $obj->read();

        include 'view/usuario_update.php';
    }

    public function delete(){

        if( !isset($_GET['id']) ){
            echo "Id não informado";
            exit;
        }

        $obj = new Usuario();
        $obj->setId($_GET['id']);
        $obj->delete();

        
    }


}