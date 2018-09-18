<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {
        $mazo = new Mazo;
        $this->assertTrue(isset($mazo));
    }

    public function testVerYMezclar() {
        $mazo = new Mazo;
        $cartas = [1,2,3,4,5,6,7,8,9,10,11,12];
        $mazo->agregarCartas($cartas);
        $this->assertTrue($mazo->mezclar());
        $this->assertNotEquals($mazo->obtenerMazo(),$cartas);
    }


}
