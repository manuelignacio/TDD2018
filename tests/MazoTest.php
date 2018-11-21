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
    /** Primero valida la funcion esVacio(), 
     * que devuelve true si el mazo es Vacio, 
     * luego valida que el mazo tenga cartas
     */
    public function testMazoConCartas() {
            $carta1 = new Carta("6","ORO");
            $carta2 = new Carta("5","COPA");
            $array1= array();
            $mazo = new Mazo($array1);
            $this->assertTrue($mazo->esVacio());
            $array2= array($carta1,$carta2);
            $mazo2 = new Mazo($array2);
            $this->assertFalse($mazo2->esVacio());
    }
    public function testMezclable() {
        $carta1 = new Carta("8","ORO");
        $carta2 = new Carta("5","COPA");
        $carta3 = new Carta("1","COPA");
        $array= array($carta1,$carta2,$carta3);
        $mazo = new Mazo($array);
        $this->assertTrue($mazo->mezclar());
        }

}
