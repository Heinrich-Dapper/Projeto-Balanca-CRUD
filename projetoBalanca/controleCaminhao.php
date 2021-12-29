<?php
include_once "modelo/BalancaCaminhao.class.php";
include_once "dao/BalancaCaminhaoDAO.class.php";
include_once "util/seguranca.class.php";
include_once "util/padronizacao.class.php";

  $balancaCaminhao = new BalancaCaminhao;
  $balancaCaminhao->empresa = Padronizacao::padronizarPrimeiraLetra($_POST["empresaCaminhao"]);
  $balancaCaminhao->tipoCarga = Seguranca::antiXSS($_POST["tipoCargaCaminhao"]);
  $balancaCaminhao->tamanho = Seguranca::antiXSS($_POST["tamanho"]);
  $balancaCaminhao->pesoVazio = Seguranca::antiXSS($_POST["pesoVazioCaminhao"]);
  $balancaCaminhao->pesoCheio = Seguranca::antiXSS($_POST["pesoCheioCaminhao"]);
  echo $balancaCaminhao;


$balancaCaminhaoDAO = new BalancaCaminhaoDAO;
$balancaCaminhaoDAO->cadastrarCaminhao($balancaCaminhao);
echo "Caminhão cadastrado com sucesso!";

header("location:buscar-caminhao.php");
