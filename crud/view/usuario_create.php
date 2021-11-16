
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container p-3 my-3 bg-dark text-white">

        <h1>Cadastre-se</h1>

        <form action="" method="POST">
          <div class="form-row">

          <div class="form-group col-md-12">
            <label for="email">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome completo" name="nome" required>
            </div>

            <div class="form-group col-md-12">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Digite o email" name="email" required>
            </div>

          <div class="form-group col-md-6">
          <label for="email">Digite sua senha:</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="senha" required>
          </div>

          <div class="form-group col-md-6">
          <label for="email">Confirme sua senha:</label>
            <input type="password" class="form-control" id="passc" placeholder="Confirme sua senha" name="senhac" required>
          </div>
          </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
       </div>

    </div>

</body>

</html>
