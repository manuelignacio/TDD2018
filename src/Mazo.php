<?php

namespace TDD;

class Mazo {

    protected $cartas = array();
    protected $cant;

    public function __construct($num){
        $this->cartas = $num;
        foreach ($this->cartas as &$valor) {
            $this->cant = $this->cant+1;
        }
    }

    public function obtCantidad(){
        return $this->cant;
    }

    public function obtenerCarta(){
        return $this->cartas[0];
    }

    public function esVacio(){
        if($this->cant != NULL){ 
            return FALSE;
        }	
        return TRUE;
    }

    public function agregarCarta(Carta $carta){
        $this->cant = $this->cant+1;
        $this->cartas[$this->cant] = $carta;
        return TRUE;
    }

    public function mezclar() {
        shuffle($this->cartas);
        return TRUE;
    }
}
