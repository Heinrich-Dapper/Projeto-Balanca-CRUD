<?php
require "conexaobanco.class.php";
class BalancaTremDAO
{

  private $conexao = null;

  public function __construct()
  {
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarTrem($balancaTrem)
  {
    try {

      $statement = $this->conexao->prepare("insert into trem(idBalancaTrem,empresa,tipoCarga,quantidadeVagoes,pesoVazio,pesoCheio)values(null,?,?,?,?,?)");

      $statement->bindValue(1, $balancaTrem->empresa);
      $statement->bindValue(2, $balancaTrem->tipoCarga);
      $statement->bindValue(3, $balancaTrem->quantidadeVagoes);
      $statement->bindValue(4, $balancaTrem->pesoVazio);
      $statement->bindValue(5, $balancaTrem->pesoCheio);
      $statement->execute();

    } catch(PDOException $error) {
      echo "Erro ao cadastrar! ".$error;
    }
  }

  public function buscarTrem()
  {
    try {
      $statement = $this->conexao->query("select * from trem");
      $array = $statement->fetchAll(PDO::FETCH_CLASS, 'BalancaTrem');
      return $array;
    } catch(PDOException $error) {
      echo "Erro ao buscar trens! ".$error;
    }
  }

  public function excluirTrem($id)
   {
     try {
       $statement = $this->conexao->prepare("delete from trem where idBalancaTrem = ?");
       $statement->bindValue(1, $id);
       $statement->execute();
     } catch(PDOException $error) {
       echo "Erro ao excluir Trem! ".$error;
     }
   }

   public function filtrarTrem($filtro, $pesquisa)
 {
   try {

     switch($filtro) {
       case "codigo": $query = "where idBalancaTrem =".$pesquisa;
       break;
       case "empresa": $query = "where empresa like '%{$pesquisa}%'";
       break;
       case "tipoCarga": $query = "where tipoCarga like '%{$pesquisa}%'";
       break;
       case "quantidadeVagoes": $query = "where quantidadeVagoes =".$pesquisa;
       break;
       case "pesoVazio": $query = "where pesoVazio =".$pesquisa;
       break;
       case "pesoCheio": $query = "where pesoCheio =".$pesquisa;
       break;
       default: $query = "";
       break;
     }//fecha switch retardado.

     $statement = $this->conexao->query("select * from trem {$query}");
     return $statement->fetchAll(PDO::FETCH_CLASS, 'BalancaTrem');
   } catch(PDOException $error) {
     echo "Erro ao filtrar trens! ".$error;
   }
 }

   public function alterarTrem($balancaTrem)
  {
    try {
      $statement = $this->conexao->prepare("update trem set empresa=?,tipoCarga=?,quantidadeVagoes=?,pesoVazio=?,pesoCheio=? where idBalancaTrem=?");

      $statement->bindValue(1, $balancaTrem->empresa);
      $statement->bindValue(2, $balancaTrem->tipoCarga);
      $statement->bindValue(3, $balancaTrem->quantidadeVagoes);
      $statement->bindValue(4, $balancaTrem->pesoVazio);
      $statement->bindValue(5, $balancaTrem->pesoCheio);
      $statement->bindValue(6, $balancaTrem->idBalancaTrem);
      $statement->execute();

    } catch(PDOException $error) {
      echo "Erro ao alterar trem! ".$error;
    }
  }
}
