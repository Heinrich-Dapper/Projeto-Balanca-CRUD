<?php
require "conexaobanco.class.php";
class BalancaCaminhaoDAO
{

  private $conexao = null;

  public function __construct()
  {
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarCaminhao($balancaCaminhao)
  {
    try {

      $statement = $this->conexao->prepare("insert into caminhao(idBalancaCaminhao,empresa,tipoCarga,tamanho,pesoVazio,pesoCheio)values(null,?,?,?,?,?)");

      $statement->bindValue(1, $balancaCaminhao->empresa);
      $statement->bindValue(2, $balancaCaminhao->tipoCarga);
      $statement->bindValue(3, $balancaCaminhao->tamanho);
      $statement->bindValue(4, $balancaCaminhao->pesoVazio);
      $statement->bindValue(5, $balancaCaminhao->pesoCheio);
      $statement->execute();

    } catch(PDOException $error) {
      echo "Erro ao cadastrar! ".$error;
    }
  }

  public function buscarCaminhao()
  {
    try {
      $statement = $this->conexao->query("select * from caminhao");
      $array = $statement->fetchAll(PDO::FETCH_CLASS, 'BalancaCaminhao');
      return $array;
    } catch(PDOException $error) {
      echo "Erro ao buscar caminhões! ".$error;
    }
  }

  public function excluirCaminhao($id)
   {
     try {
       $statement = $this->conexao->prepare("delete from caminhao where idBalancaCaminhao = ?");
       $statement->bindValue(1, $id);
       $statement->execute();
     } catch(PDOException $error) {
       echo "Erro ao excluir Caminhão! ".$error;
     }
   }

   public function filtrarCaminhoes($filtro, $pesquisa)
 {
   try {

     switch($filtro) {
       case "codigo": $query = "where idBalancaCaminhao =".$pesquisa;
       break;
       case "empresa": $query = "where empresa like '%{$pesquisa}%'";
       break;
       case "tipoCarga": $query = "where tipoCarga like '%{$pesquisa}%'";
       break;
       case "tamanho": $query = "where tamanho =".$pesquisa;
       break;
       case "pesoVazio": $query = "where pesoVazio =".$pesquisa;
       break;
       case "pesoCheio": $query = "where pesoCheio =".$pesquisa;
       break;
       default: $query = "";
       break;
     }//fecha switch retardado.

     $statement = $this->conexao->query("select * from caminhao {$query}");
     return $statement->fetchAll(PDO::FETCH_CLASS, 'BalancaCaminhao');
   } catch(PDOException $error) {
     echo "Erro ao filtrar caminhões! ".$error;
   }
 }

   public function alterarCaminhao($balancaCaminhao)
  {
    try {
      $statement = $this->conexao->prepare("update caminhao set empresa=?,tipoCarga=?,tamanho=?,pesoVazio=?,pesoCheio=? where idBalancaCaminhao=?");

      $statement->bindValue(1, $balancaCaminhao->empresa);
      $statement->bindValue(2, $balancaCaminhao->tipoCarga);
      $statement->bindValue(3, $balancaCaminhao->tamanho);
      $statement->bindValue(4, $balancaCaminhao->pesoVazio);
      $statement->bindValue(5, $balancaCaminhao->pesoCheio);
      $statement->bindValue(6, $balancaCaminhao->idBalancaCaminhao);
      $statement->execute();

    } catch(PDOException $error) {
      echo "Erro ao alterar Caminhão! ".$error;
    }
  }
}
