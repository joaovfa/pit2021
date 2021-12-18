<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Modern Business - Start Bootstrap Template</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
  <!--Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--Modal Header-->
        <div class="modal-header">
          <h4 class="modal-title">Exclusão</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!--Modal body-->
        <div class="modal-body">
          Tem certeza que deseja excluir o registro?
        </div>

        <!--Modal footer-->
        <div class="modal-footer">
          <a id="modal-btn-excluir" href="" class="btn btn-primary">Sim</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
        </div>

      </div>
    </div>
  </div>
  <main class="flex-shrink-0">
    <!-- Navigation-->
    <!-- Navigation-->

    <!-- Page Content-->
    <section class="py-5">
      <div class="container px-5 my-5">
        <div class="text-center mb-5">
          <h1 class="fw-bolder">Perguntas recentes</h1>
          <span style="float:center">
            <a href="?acao=create" id="botaoi" class="btn btn-lg px-4 me-sm-3">Tire suas dúvidas</a>
          </span>
        </div>
        <div class="row gx-5">
          <?php $i = 1;
          foreach ($comentarios as $comentario) { ?>
            <div class="col-xl-8">
              <!-- FAQ Accordion 1-->
              <h2 class="fw-bolder mb-3">Comentario de <?= $comentario->nome ?></h2>
              <div class="accordion mb-5" id="accordionExample">
                <div class="accordion-item">
                  <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="text"><?= $i++ ?>º comentário</button></h3>
                  <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>Em sua pergunta, <?= $comentario->nome ?> disse: </strong>
                      "<?= $comentario->mensagem ?>"
                      <code>Em analise</code>
                      Vamos responder assim que possivel.
                    </div>
                    <a href="?acao=update&id=<?= $comentario->id ?>" class="btn btn-warning">Editar</a>

                    <!--a href="?acao=delete&id=< ?=$usuario->id?>" class="btn btn-danger">Excluir</a-->

                    <!--Button to Open the Modal -->
                    <button type="button" class="btn btn-danger btn-excluir" data-toggle="modal" data-target="#myModal" data-id="<?= $comentario->id ?>">
                      Excluir
                    </button>
                  </div>
                </div>


              </div>
            </div>
          <?php } ?>


        </div>
      </div>
    </section>
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Exclusão</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Tem certeza que deseja excluir o registro?
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a id="modal-btn-excluir" href="" class="btn btn-primary">Sim</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
          </div>

        </div>
      </div>
    </div>
  </main>
  <!-- Footer-->
  <footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0 text-white">&copy; FeedCheer 2021</div>
        </div>

      </div>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      $("#modal-btn-excluir").attr('href', './?acao=delete&id=' + id);
    });
  </script>
</body>

</html>