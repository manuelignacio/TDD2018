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
}
