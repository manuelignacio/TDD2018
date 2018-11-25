<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {
        $array1 = array();
        $mazo = new Mazo($array1);
        $this->assertTrue(isset($mazo));
    }

    /**
     * Primero valida la funcion esVacio(), 
     * que devuelve true si el mazo es Vacio, 
     * luego valida que el mazo tenga cartas
     */
    public function testMazoConCartas() {
        $carta1 = new Carta("6","ORO");
        $carta2 = new Carta("5","COPA");
        $array1 = array();
        $mazo = new Mazo($array1);
        $this->assertTrue($mazo->esVacio());
        $array2 = array($carta1,$carta2);
        $mazo2 = new Mazo($array2);
        $this->assertFalse($mazo2->esVacio());
    }

    /**
     * Valida que el mazo se puede mezclar 
     */
    public function testMezclable() {
        $carta1 = new Carta("8","ORO");
        $carta2 = new Carta("5","COPA");
        $carta3 = new Carta("1","COPA");
        $array = array($carta1,$carta2,$carta3);
        $mazo = new Mazo($array);
        $this->assertTrue($mazo->mezclar());
    }

    /**
     * Valida que se puede obtener la cantidad de
     * todas las cartas de un mazo. Además, se fija
     * si al crear un mazo con cartas de distinto
     * tipo, se filtran por las del tipo de la
     * primera carta.
     */
    public function testObtenerCantidad() {
        $carta1 = new Carta("5", "ORO");
        $carta2 = new Carta("7", "PALO");
        $carta3 = new Carta("9", "ESPADA");
        $array = array($carta1, $carta2, $carta3);
        $mazo = new Mazo($array);
        $this->assertEquals($mazo->obtenerCantidad(), 3);

        $carta2 = new Carta("+2", "ROJO"); // sobreescribe la carta 2 con una de tipo 'Otra'
        $array = array($carta1, $carta2, $carta3);
        $mazo = new Mazo($array);
        $this->assertEquals($mazo->obtenerCantidad(), 2); // la carta 2 no se agregó
    }

    /**
     * Valida que el mazo contenga cartas de un solo tipo,
     * y lo indique mediante obtenerTipo. No tendrá tipo
     * si el mazo no tiene cartas.
     */
    public function testTipoDeMazo() {
        $mazoVacio = new Mazo();
        $this->assertNull($mazoVacio->obtenerTipo());

        $carta1 = new Carta("5", "ORO");
        $carta2 = new Carta("6", "ORO");
        $cartas = array($carta1, $carta2);
        $mazo = new Mazo($cartas);
        $this->assertEquals("Españolas", $mazo->obtenerTipo());

        $carta1 = new Carta("5", "PICA");
        $carta2 = new Carta("6", "TREBOL");
        $cartas = array($carta1, $carta2);
        $mazo = new Mazo($cartas);
        $this->assertEquals("Poker", $mazo->obtenerTipo());

        $carta1 = new Carta("5", "PICA");
        $carta2 = new Carta("7", "AMARILLO");
        $carta3 = new Carta("6", "TREBOL");
        $cartas = array($carta1, $carta2, $carta3);
        $mazo = new Mazo($cartas);
        $this->assertEquals("Poker", $mazo->obtenerTipo());

        $carta1 = $carta2;
        $carta2 = new Carta("5", "PICA");
        $carta3 = new Carta("6", "TREBOL");
        $cartas = array($carta1, $carta2, $carta3);
        $mazo = new Mazo($cartas);
        $this->assertEquals("Otras", $mazo->obtenerTipo());
    }

    /**
     * Valida que puedo obtener la primera carta de un mazo
     * y tambien una carta especifica ingresando sus
     * valores, salvo que el mazo este vacio o la carta
     * especifica no se encuentre
     */
    public function testObtenerCarta() {
        $mazoVacio = new Mazo();

        $this->assertFalse($mazoVacio->obtenerPrimeraCarta());
        $this->assertFalse($mazoVacio->obtenerCarta("2", "COPA"));

        $carta1 = new Carta("9", "PALO");
        $carta2 = new Carta("7", "ESPADA");
        $carta3 = new Carta("2", "COPA");
        $carta4 = new Carta("3", "ESPADA");
        $array = array($carta1, $carta2, $carta3, $carta4);
        $mazo = new Mazo($array);

        $this->assertEquals($mazo->obtenerPrimeraCarta(), $carta1);
        $this->assertEquals($mazo->obtenerCarta("2", "COPA"), $carta3);
        $this->assertFalse($mazo->obtenerCarta("4", "PALO"));
    }

    /**
     * Valida que puedo agregar una carta al mazo solo si son
     * del mismo tipo y no existe una igual ya en el mazo.
     */
    public function testAgregarCarta() {
        $carta1 = new Carta("9", "PALO");
        $carta2 = new Carta("4", "ORO");
        $carta3 = new Carta("11", "COPA");
        $array1 = array($carta1, $carta2);
        $mazo = new Mazo($array1);

        $this->assertTrue($mazo->agregarCarta($carta3));
        $this->assertEquals($mazo->obtenerCantidad(), 3);

        $carta4 = new Carta("2", "PICA"); // una carta de distinto tipo

        $this->assertFalse($mazo->agregarCarta($carta4));
        $this->assertEquals($mazo->obtenerCantidad(), 3);

        $carta5 = new Carta("4", "ORO");   // dos cartas con los mismos valores
        $carta6 = new Carta("11", "COPA"); // que otras dos ya existentes

        $this->assertFalse($mazo->agregarCarta($carta5));
        $this->assertEquals($mazo->obtenerCantidad(), 3);
        $this->assertFalse($mazo->agregarCarta($carta6));
        $this->assertEquals($mazo->obtenerCantidad(), 3);

        $carta7 = new Carta("9", "ORO"); // una carta distinta y del mismo tipo, pero con numero y palo ya existente
        $this->assertTrue($mazo->agregarCarta($carta7));
        $this->assertEquals($mazo->obtenerCantidad(), 4);
    }
}
