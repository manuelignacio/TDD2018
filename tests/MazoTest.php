<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {
        $array1=array();
        $mazo = new Mazo($array1);
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
    /** Valida que el mazo se puede mezclar 
    */
    public function testMezclable() {
        $carta1 = new Carta("8","ORO");
        $carta2 = new Carta("5","COPA");
        $carta3 = new Carta("1","COPA");
        $array= array($carta1,$carta2,$carta3);
        $mazo = new Mazo($array);
        $this->assertTrue($mazo->mezclar());
        }
    /** Valida que se puede obtener la cantidad de
    todas las cartas de un mazo 
    */
    public function testObtenerCantidad(){
        $carta1 = new Carta("5","ORO");
        $carta2 = new Carta("7","PALO");
        $carta3 = new Carta("9","ESPADA");
        $array= array($carta1,$carta2,$carta3);
        $mazo = new Mazo($array);
        $this->assertEquals($mazo->obtCantidad(),3);
        }
    /** Valida que puedo obtener una carta especifica
    del mazo ingresando sus valores
    */
    public function testobtenerCarta(){
        $carta1 = new Carta("9","PALO");
        $carta2 = new Carta("7","ESPADA");
        $array= array($carta1,$carta2);
        $mazo = new Mazo($array);
        $this->assertEquals($mazo->obtenerCarta(),$carta1);
        }
    /** Valida que puedo agregar una carta al mazo
    y luego cuenta la cantidad de cartas para verificar
    */
     public function testAgregarCarta(){
        $carta1 = new Carta("9","PALO");
        $carta2 = new Carta("4","ORO");
        $carta3 = new Carta("11","COPA");
        $array= array($carta1,$carta2);
        $mazo = new Mazo($array);
        $this->assertTrue($mazo->agregarCarta($carta3));
         $this->assertEquals($mazo->obtCantidad(),3);
        }
}
