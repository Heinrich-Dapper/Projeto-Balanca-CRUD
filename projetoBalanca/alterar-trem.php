<?php
include_once "modelo/balancaTrem.class.php";
include_once "dao/balancaTremdao.class.php";
include_once "util/seguranca.class.php";
include_once "util/padronizacao.class.php";

//filtrar id
if(isset($_GET['id'])) {


  $balancaTremDAO = new BalancaTremDAO;
  $trens = $balancaTremDAO->filtrarTrem("codigo", $_GET['id']);
  //var_dump($trens);
  $balancaTrem = $trens[0];
  //echo $balancaTrem;
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alterar Trem</title>
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
    <h1 class="jumbotron bg-warning">Alterar Trem</h1>

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
             <a class="nav-link" href="buscar-trem.php">Consultar trem<span class="sr-only">(current)</span></a>
           </li>
         </ul>
       </div>
    </nav>

    <form name="alterar" method="post" action="">
      <div class="form-group">
        <input type="text" name="codigo" class="form-control"
        value="<?php echo $balancaTrem->idBalancaTrem ?? ""; ?>" hidden readonly>
      </div>

      <div class="form-group">
        <input type="text" name="empresa" placeholder="Digite a empresa" autofocus class="form-control" pattern="^[a-zá-ù ç]{2,100}$"
        value="<?php echo $balancaTrem->empresa ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="text" name="tipoCarga" placeholder="Digite o tipo de carga" autofocus class="form-control" pattern="^[a-zá-ù ç]{2,100}$"
        value="<?php echo $balancaTrem->tipoCarga ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="number" name="quantidadeVagoes" placeholder="Digite a quantidade de vagões" class="form-control" pattern="^[0-9]{1,3}$"
        value="<?php echo $balancaTrem->quantidadeVagoes ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="text" name="pesoVazio" placeholder="Digite o peso vazio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$"
        value="<?php echo $balancaTrem->pesoVazio ?? ""; ?>">
      </div>

      <div class="form-group">
        <input type="text" name="pesoCheio" placeholder="Digite o peso cheio" class="form-control" pattern="^([0-9]\d*)(\.\d+)$"
        value="<?php echo $balancaTrem->pesoCheio ?? ""; ?>">
      </div>

      	<div class="form-group">
        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
      </div>
    </form>

    <?php
    if(isset($_POST['alterar'])) {
      $balancaTrem = new BalancaTrem;
      $balancaTrem->idBalancaTrem = $_POST["codigo"]; //<<-- ESSENCIAL!
      $balancaTrem->empresa = Padronizacao::padronizarPrimeiraLetra($_POST["empresa"]);//Seguranca::antiXSS($_POST["titulo"]);
      $balancaTrem->tipoCarga = Seguranca::antiXSS($_POST["tipoCarga"]);
      $balancaTrem->quantidadeVagoes = Seguranca::antiXSS($_POST["quantidadeVagoes"]);
      $balancaTrem->pesoVazio = Seguranca::antiXSS($_POST["pesoVazio"]);
      $balancaTrem->pesoCheio = Seguranca::antiXSS($_POST["pesoCheio"]);

      echo $balancaTrem;

      //validar.... back e front
      //padronizar.

      $balancaTremDAO = new BalancaTremDAO; //<<----
      $balancaTremDAO->alterarTrem($balancaTrem);
      echo "Trem alterado com sucesso!";

      header("location:buscar-trem.php");
    }
    ?>
  </body>
</html>
