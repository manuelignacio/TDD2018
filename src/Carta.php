<?php

namespace TDD;

class Carta {

protected $numero;
protected $palo;

public function constructor(int $numero,string $palo){
if($this->PaloValido($palo)){
  $this->palo = $palo;
}
else{
  $this->palo="Espada";
}
if($numero <= 12 && $numero > 0){
  $this->numero = $numero;
}
else{
  $this->numero = 1;
}
}
public function PaloValido($palo){
switch(strtolower($palo)){
    case "COPA":
    case "PALO":
    case "ESPADA":
    case "ORO":
      return TRUE;
  }
  return FALSE;
}
public function verPalo(){
  return $this->palo;
}
public function verNumero(){
  return $this->numero;
}

}