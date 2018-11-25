<?php

namespace TDD;

class Carta {

    protected $numero;
    protected $palo;
    protected $tipo;

    public function __construct(string $numero, string $palo){
        $this->palo = $palo;
        $this->numero = $numero;

        $numeroEspañola = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
        $paloEspañola = ["ORO", "ESPADA", "COPA", "PALO"];
        $esEspañola = in_array($numero, $numeroEspañola) && in_array($palo, $paloEspañola);

        $numeroPoker = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "J", "Q", "K"];
        $paloPoker = ["PICA", "TREBOL", "DIAMANTE", "CORAZON"];
        $esPoker = in_array($numero, $numeroPoker) && in_array($palo, $paloPoker);

        if ($esEspañola) {
            $this->tipo = "Española";
        }
        elseif ($esPoker) {
            $this->tipo = "Poker";
        }
        else {
            $this->tipo = "Otra";
        }
    }

    public function verNumero(){
        return $this->numero;
    }

    public function verPalo(){
        return $this->palo;
    }

    public function obtenerTipo() {
        return $this->tipo;
    }

}