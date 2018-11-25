<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {

    /**
     * Valida que se puedan crear cartas.
     */
    public function testExiste() {
        $carta = new Carta("2","PALO");
        $this->assertTrue(isset($carta));
    }

    /**
     * Valida que se puede obtener
     * el numero de una carta
     */
	public function testVerNumero() {
        $carta = new Carta("7","ESPADA");
        $this->assertEquals($carta->verNumero(),7);
    }

    /**
     * Valida que se puede ver el palo de una carta
     */
    public function testVerPalo() {
        $carta = new Carta("5","COPA");
        $this->assertEquals($carta->verPalo(),"COPA");
    }
    
    /**
     * Valida que el tipo de carta devuelto sea Española,
     * de Poker u Otra carta, dependiendo de sus valores
     */
    public function testObtenerTipo() {
        $cartaEspañola = new Carta("5", "COPA");
        $cartaPoker1 = new Carta("5", "PICA");
        $cartaPoker2 = new Carta("K", "TREBOL");
        $cartaOtra1 = new Carta("1", "DIAMANTE"); // no es de Poker ya que no es un As
        $cartaOtra2 = new Carta("Comodín", "Cambio de color"); // es una carta de Uno
        
        $this->assertEquals($cartaEspañola->obtenerTipo(), "Española");
        $this->assertEquals($cartaPoker1->obtenerTipo(), "Poker");
        $this->assertEquals($cartaPoker2->obtenerTipo(), "Poker");
        $this->assertEquals($cartaOtra1->obtenerTipo(), "Otra");
        $this->assertEquals($cartaOtra2->obtenerTipo(), "Otra");
    }
}
