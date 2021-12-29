<?php
session_start();
ob_start();
include_once "modelo/balancaTrem.class.php";
include_once "dao/BalancaTremDAO.class.php";
include_once "util/seguranca.class.php";
include_once "util/padronizacao.class.php";


$balancaTrem = new BalancaTrem;
$balancaTrem->empresa = Seguranca::antiXSS(Padronizacao::padronizarPrimeiraLetra($_POST["empresaTrem"]));
$balancaTrem->tipoCarga = Seguranca::antiXSS($_POST["tipoCargaTrem"]);
$balancaTrem->quantidadeVagoes =Seguranca::antiXSS($_POST["quantidadeVagoes"]);
$balancaTrem->pesoVazio = Seguranca::antiXSS($_POST["pesoVazioTrem"]);
$balancaTrem->pesoCheio = Seguranca::antiXSS($_POST["pesoCheioTrem"]);
echo $balancaTrem;

$balancaTremDAO = new BalancaTremDAO;
$balancaTremDAO->cadastrarTrem($balancaTrem);
echo "Trem cadastrado com sucesso!";

  header("location:buscar-trem.php");
