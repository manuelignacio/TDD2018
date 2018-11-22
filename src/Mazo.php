<?php

namespace TDD;

class Mazo {

  protected $cartas;
  protected $cant;

  public function construct($num){
    $this->cartas = $num;
    foreach ($this->cartas as &$valor) {
      $this->cant= $this->cant+1;
    }
    }
    public function obtCantidad(){
      return $this->cant;
    }
    public function obtenerCarta($num, $palo){
      $Carta1 = new Carta($num, $palo);
      foreach ($this->cartas as &$valor) {
        if($valor == $Carta1){
          return $valor;
        }
          }
      return FALSE;
        }
        public function esVacio(){
          if($this->cant != NULL){ 
        return FALSE;
        }	
      return TRUE;
      }
      public function agregarCarta(Carta $carta){
          $this->cartas[$this->obtCantidad()+1]=$carta;
          $this->cant+1;
          return TRUE;
      }
      public function mezclar() {
        shuffle($this->cartas);
        return TRUE;
      }
}
