<?php
include_once "modelo/balancaCaminhao.class.php";
include_once "dao/balancaCaminhaodao.class.php";
include_once "util/seguranca.class.php";
include_once "util/padronizacao.class.php";

//filtrar id
if(isset($_GET['id'])) {


  $balancaCaminhaoDAO = new BalancaCaminhaoDAO;
  $caminhoes = $balancaCaminhaoDAO->filtrarCaminhoes("codigo", $_GET['id']);
  //var_dump($caminhoes);
  $balancaCaminhao = $caminhoes[0];
  //echo $balancaCaminhao;
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alterar Caminhão</title>
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
    <h1 class="jumbotron bg-warning">Alterar Caminhão</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link" href="index.php">Home</a>
           </li>

           <li class="nav-item active">
             <a class="nav-link" href="buscar-caminhao.php">Consultar Caminhão<span class="sr-only">(current)</span></a>
           </li>
         </ul>
       </div>
    </nav>

    <form name="alterar" method="post" action="">
      <div class="form-group">
        <input type="text" name="codigo" class="form-control"
        value="<?php echo $balancaCaminhao->idBalancaCaminhao ?? ""; ?>" hidden readonly>
      </div>

      <div class="form-group">
        <input type="text" name="empresa" placeholder="Digite a empresa" autofocus class="form-control" pattern="^[a-zá-ù ç]{2,100}$"
        value="<?php echo $balancaCaminhao->empresa ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="text" name="tipoCarga" placeholder="Digite o tipo de carga" autofocus class="form-control" pattern="^[a-zá-ù ç]{2,100}$"
        value="<?php echo $balancaCaminhao->tipoCarga ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="number" name="tamanho" placeholder="Digite o tamanho" class="form-control" pattern="^[0-9]{1,3}$"
        value="<?php echo $balancaCaminhao->tamanho ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="number" name="pesoVazio" placeholder="Digite o peso vazio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$"
        value="<?php echo $balancaCaminhao->pesoVazio ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="number" name="pesoCheio" placeholder="Digite o peso cheio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$"
        value="<?php echo $balancaCaminhao->pesoCheio ?? ""; ?>">
      </div>

      	<div class="form-group">
        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
      </div>
    </form>

    <?php
    if(isset($_POST['alterar'])) {
      $balancaCaminhao = new BalancaCaminhao;
      $balancaCaminhao->idBalancaCaminhao = $_POST["codigo"]; //<<-- ESSENCIAL!
      $balancaCaminhao->empresa = Padronizacao::padronizarPrimeiraLetra($_POST["empresa"]);
      $balancaCaminhao->tipoCarga = Seguranca::antiXSS($_POST["tipoCarga"]);//Seguranca::antiXSS($_POST["titulo"]);
      $balancaCaminhao->tamanho = Seguranca::antiXSS($_POST["tamanho"]);
      $balancaCaminhao->pesoVazio = Seguranca::antiXSS($_POST["pesoVazio"]);
      $balancaCaminhao->pesoCheio = Seguranca::antiXSS($_POST["pesoCheio"]);

      echo $balancaCaminhao;

      //validar.... back e front
      //padronizar.

      $balancaCaminhaoDAO = new BalancaCaminhaoDAO; //<<----
      $balancaCaminhaoDAO->alterarCaminhao($balancaCaminhao);
      echo "Caminhão alterado com sucesso!";

      header("location:buscar-caminhao.php");
    }
    ?>
  </body>
</html>
