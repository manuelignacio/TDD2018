<?php

namespace TDD;

class Mazo {

    protected $tipo = NULL;
    protected $cartas;
    protected $cant = 0;

    private function reglasDeCartasEnPlural(string $tipo) {
        if (in_array($tipo, ['Española', 'Otra'])) {
            return true;
        }
        return false;
    }

    public function __construct(array $cartas = array()) {
        $cartasFiltradas = array();
        if (!empty($cartas)) {
            $this->tipo = $cartas[0]->obtenerTipo();
            $i = 0;
            foreach ($cartas as $carta) {
                if ($carta->obtenerTipo() == $this->tipo) {
                    $cartasFiltradas[$i] = $carta;
                    ++$i;
                }
            }
            $cartasFiltradas = array_unique($cartasFiltradas, SORT_REGULAR);
        }
        $this->cartas = $cartasFiltradas;
        $this->cant = count($cartasFiltradas);
    }

    public function obtenerTipo() {
        if (!empty($this->tipo)) {
            if ($this->reglasDeCartasEnPlural($this->tipo)) {
                return ($this->tipo . "s");
            }
        }
        return $this->tipo;
    }

    public function obtenerCantidad(){
        return $this->cant;
    }

    public function obtenerPrimeraCarta(){
        if (isset($this->cartas[0])) {
            return $this->cartas[0];
        }
        return false;
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
        if($this->cant != 0){ 
            return false;
        }
        return true;
    }

    public function agregarCarta(Carta $carta){
        if ($carta->obtenerTipo() == $this->tipo && !in_array($carta, $this->cartas)) {
            ++$this->cant;
            $this->cartas[$this->cant] = $carta;
            return true;
        }
        return false;
    }

    public function mezclar() {
        shuffle($this->cartas);
        return true;
    }
}
