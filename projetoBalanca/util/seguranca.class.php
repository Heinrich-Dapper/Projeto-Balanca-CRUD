<?php
class Seguranca
{

  public static function antiXSS($valor)
  {
    return htmlentities($valor);
  }
}
