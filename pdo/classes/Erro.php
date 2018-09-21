<?php

/**
 *
 */
class Erro {

  public static function trataErro(Exception $ex) {
    if(DEBUG) {
      echo '<pre>';
      print_r($ex);
      echo '</pre>';
    } else {
      echo $ex->getMessage();
    }
    exit;
  }
}
