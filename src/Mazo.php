<?php

namespace TDD;

class Mazo {

    protected $cartas = array();
    protected $cant;

    public function __construct($num = array()){
        $this->cartas = $num;
        foreach ($this->cartas as $valor) {
            $this->cant++;
        }
    }

    public function obtCantidad(){
        return $this->cant;
    }

    public function obtenerPrimeraCarta(){
        return $this->cartas[0];
    }

    public function obtenerCarta(string $nro, string $palo) {
        foreach ($this->cartas as $carta) {
            if ($carta->verNumero() == $nro && $carta->verPalo() == $palo) {
                return $carta;
            }
        }
        return false;
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
