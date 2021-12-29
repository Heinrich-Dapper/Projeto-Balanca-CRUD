<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Balança</title>
    <!-- BOOTSTRAP VIA NODEJS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        .jumbotron {
            text-align: center;
            color: white;
            font-size: 100px;
        }
    </style>
  </head>
  <body>

    <h1 class="jumbotron bg-warning">Sistema de Balança</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link active" href="index.php">Home</a>
           </li>

           <li class="nav-item">
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

  </body>
</html>
