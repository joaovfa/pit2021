
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
    <link href="/crud/css/pag.css" rel="stylesheet">
  </head>


  <body>
  <div class="container">
      <header class="masthead mb-auto">
        <div class="inner">        
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="quemsomos.php">Quem somos</a>
            <a class="nav-link" href="login.php">Login</a>
          </nav>
        </div>
      </header>

  <div class="container p-3 my-3 bg-dark text-white">
<form action="pag.php" method="post">

<div class="form-group col-md-4">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" required />
</div>

<div class="form-group col-md-4">
    <label for="nome">Senha</label>
    <input class="form-control" type="text" name="senha" required />
</div>

<button class="btn btn-primary" type="submit">Entrar</button>
<button class="btn btn-success" ><a href="view/usuario_create.php" id="lc">Cadastre-se</a></button>

</form>
  </div>





  </body>

</html>