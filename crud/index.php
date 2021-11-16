<?php

require_once "inc/config.php";
require_once "controller/UsuarioController.php";
require_once "model/Usuario.php";

$app = new UsuarioController();

if ( isset($_GET['acao']) ){

    if( $_GET['acao']=='create' ){
        $app->create();
    }else if ( $_GET['acao']=='update' ){
        $app->update();
    }else if ( $_GET['acao']=='delete'){
        $app->delete();
    }

}else{
    $app->all();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Projeto Pit</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Template Customizado -->
    <link href="/crud/css/style.css" rel="stylesheet">
  </head>


  <body>





  </body>

</html>
