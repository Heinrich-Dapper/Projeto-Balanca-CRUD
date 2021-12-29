<?php
include_once "modelo/balancaCaminhao.class.php";
include_once "dao/balancaCaminhaodao.class.php";
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta de caminhões</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP VIA NODEJS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <style>
        .jumbotron {
            text-align: center;
            color: white;
            font-size: 60px;
        }
    </style>

  </head>
  <body>
    <h1 class="jumbotron bg-warning">Consulta de caminhões</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link" href="index.php">Home</a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="cadastroCaminhao.php">Cadastro de Caminhão<span class="sr-only"></span></a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="cadastroTrem.php">Cadastro de Trem<span class="sr-only"></span></a>
           </li>

           <li class="nav-item active">
             <a class="nav-link" href="buscar-caminhao.php">Consultar Caminhão<span class="sr-only">(current)</span></a>

             <li class="nav-item">
               <a class="nav-link" href="buscar-trem.php">Consultar Trem<span class="sr-only">(current)</span></a>
             </li>
           </li>
         </ul>
       </div>
     </nav>

    <?php
    $balancaCaminhaoDAO = new BalancaCaminhaoDAO;
    $caminhoes = $balancaCaminhaoDAO->buscarCaminhao();
    //var_dump($caminhoes);

    if(count($caminhoes) == 0) {
      echo "<h2>Não há caminhões cadastrados</h2>";
      echo "</body>";
      echo "</html>";
      die();
    }
    ?>

    <form name="pesquisa" method="post" action="">
    <div class="row">
      <div class="form-group col-md-6">
        <input type="text" name="pesquisa" class="form-control" placeholder="Digite sua pesquisa">
      </div>
      <div class="form-group col-md-6">
        <select name="filtro" class="form-control">
          <option value="todos">Todos</option>
          <option value="codigo">Código</option>
          <option value="empresa">Empresa</option>
          <option value="tipoCarga">Tipo de carga</option>
          <option value="tamanho">Tamanho</option>
          <option value="pesoVazio">Peso Vazio</option>
          <option value="pesoCheio">Peso Cheio</option>

        </select>
      </div>
    </div>

    <div class="form-group">
      <input type="submit" name="filtrar" value="Filtrar"
      class="btn btn-primary btn-block">
    </div>
  </form>

  <?php
  //Filtrar
  if(isset($_POST['filtrar'])) {
    // echo "oi";
    $balancaCaminhaoDAO = new BalancaCaminhaoDAO;
    $caminhoes = $balancaCaminhaoDAO->filtrarCaminhoes($_POST['filtro'], $_POST['pesquisa']);
    // var_dump($livros);
    unset($_POST['filtrar']);
    if(count($caminhoes) == 0) {
      echo "<h2>Sua consulta não retornou caminhões cadastrados</h2>";
      echo "</body>";
      echo "</html>";
      die();
    }
  }
  ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Código</th>
            <th>Empresa</th>
            <th>Tipo de Carga</th>
            <th>Tamanho</th>
            <th>Peso Vazio</th>
            <th>Peso Cheio</th>
            <th>Alterar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Código</th>
            <th>Empresa</th>
            <th>Tipo de Carga</th>
            <th>Tamanho</th>
            <th>Peso Vazio</th>
            <th>Peso Cheio</th>
            <th>Alterar</th>
            <th>Excluir</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach($caminhoes as $caminhao) {
            echo "<tr>";
              echo "<td>$caminhao->idBalancaCaminhao</td>";
              echo "<td>$caminhao->empresa</td>";
              echo "<td>$caminhao->tipoCarga</td>";
              echo "<td>$caminhao->tamanho</td>";
              echo "<td>$caminhao->pesoVazio</td>";
              echo "<td>$caminhao->pesoCheio</td>";
              echo "<td><a href='alterar-caminhao.php?id=$caminhao->idBalancaCaminhao' class='btn btn-warning'>Alterar</a></td>";
              echo "<td><a href='buscar-caminhao.php?id=$caminhao->idBalancaCaminhao' class='btn btn-danger'>Excluir</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div><!-- table-responsive-->

    <?php
    //Excluir
    if(isset($_GET['id'])) {
      $balancaCaminhaoDAO = new BalancaCaminhaoDAO;
      $balancaCaminhaoDAO->excluirCaminhao($_GET['id']);
      header("location:buscar-caminhao.php");
    }
    ?>

  </body>
</html>
