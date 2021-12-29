<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastro de caminhão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BOOTSTRAP VIA NPM -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/ajax/lib/ajax.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <style>
        .jumbotron {
            text-align: center;
            color: white;
            font-size: 70px;
        }
    </style>

  </head>
  <body>
    <h1 class="jumbotron bg-warning">Cadastro de Caminhão</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " href="index.php">Home</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="cadastroCaminhao.php">Cadastro de Caminhão<span class="sr-only"></span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="cadastroTrem.php">Cadastro de Trem<span class="sr-only"></span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="buscar-caminhao.php">Consultar Caminhão<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="buscar-trem.php">Consultar Trem<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
          </nav>
       </nav>

    <form name="cadastroCaminhao" method="post" action="controleCaminhao.php">
      <div class="form-group">
        <input type="text" name="empresaCaminhao" placeholder="Digite a empresa" autofocus class="form-control" pattern="^[a-zá-ù ç]{2,100}$">
      </div>

      <div class="form-group">
        <input type="text" name="tipoCargaCaminhao" placeholder="Digite o tipo de carga" class="form-control" pattern="^[a-zá-ù ç]{2,100}$">
      </div>

      <div class="form-group">
        <input type="text" name="tamanho" placeholder="Digite o tamanho do caminhão" class="form-control" pattern="^[0-9]{1,3}$">
      </div>

      <div class="form-group">
        <input type="text" name="pesoVazioCaminhao" placeholder="Digite o peso do caminhão vazio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$">
      </div>

      <div class="form-group">
        <input type="text" name="pesoCheioCaminhao" placeholder="Digite o peso do caminhão cheio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$">
      </div>


      <div class="form-group">
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
      </div>
    </form>
  </body>
</html>
