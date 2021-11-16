<?php
require_once "inc/config.php";

// procura o usuario no banco de dados
$sql = $con->prepare("SELECT * FROM usuario WHERE email=? AND senha=?");
$sql->execute( array($_POST['email'], sha1($_POST['senha']) ) );

// devolve o registro do usuário procurado
$row = $sql->fetchObject();

// se o usuário foi localizado
if ($row){
    $_SESSION['usuario'] = $row;
    header("Location: ../admin");

// se o usuário não foi foi localizado
}else{
    $_SESSION['msg'] = " <div class='alert alert-danger'>  <strong>Ops!</strong> Acesso negado   </div>";
    header("Location: ../login");
}