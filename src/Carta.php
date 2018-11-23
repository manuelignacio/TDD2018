<?php

namespace TDD;

class Carta {

    protected $numero;
    protected $palo;

    public function __construct($numero, $palo){
        $this->palo = $palo;
        $this->numero = $numero;
    }

    public function verPalo(){
        return $this->palo;
    }
    public function verNumero(){
        return $this->numero;
    }

}