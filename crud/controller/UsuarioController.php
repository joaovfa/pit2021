<?php
class UsuarioController{

    public function all(){
        $obj = new Usuario();
        $usuarios = $obj->all();

        include 'view/usuario_all.php';
    }

    public function create(){
        $obj = new Usuario();

        if( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
            $obj->setNome($_POST['nome']);
            $obj->setEmail($_POST['email']);
            $obj->setSenha($_POST['senha']);

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

        if( isset($_POST['email']) && isset($_POST['nome']) ){
            $obj->setEmail($_POST['email']);
            $obj->setNome($_POST['nome']);
            $obj->update();
        }

        $usuario = $obj->read();

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
