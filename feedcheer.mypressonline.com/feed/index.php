<link rel="icon" type="image/x-icon" href="img/logoti.png" />
<a id="link-topo" class="bi  bi-house-fill" href="../index.html"></a>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="./"><img src="img/logo.png" alt="..." width="200" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Sobre nós</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?acao=create">Tire suas duvidas</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Perguntas recentes</a></li>
                        <li class="nav-item"><a class="nav-link" href="calc/index.html">Calculadora TMB/IMC</a></li>
                    </ul>
                </div>
            </div>
        </nav>
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



