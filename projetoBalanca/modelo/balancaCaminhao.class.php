<?php
class BalancaCaminhao
{

  private $idBalancaCaminhao;
  private $empresa;
  private $tipoCarga;
  private $tamanho;
  private $pesoVazio;
  private $pesoCheio;


  public function __construct() {
  }

  public function __destruct() {
  }

  public function __get($atributo) {
    return $this->$atributo;
  }

  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
  }

  public function __toString() {
    return nl2br("Empresa: $this->empresa
                  Tipo de Carga: $this->tipoCarga
                  Tamanho: $this->tamanho
                  Peso Vazio: $this->pesoVazio
                  Peso Cheio: $this->pesoCheio
                  ");
  }

}
