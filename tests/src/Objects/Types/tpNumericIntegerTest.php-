<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpByte as tpByte;
use AeonDigital\Objects\Types\tpShort as tpShort;
use AeonDigital\Objects\Types\tpInt as tpInt;
use AeonDigital\Objects\Types\tpLong as tpLong;

require_once __DIR__ . "/../../../phpunit.php";




class tpNumericIntegerTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Byte", tpByte::getStandart()::TYPE);
        $this->assertSame(false, tpByte::getStandart()::IS_CLASS);
        $this->assertSame(true, tpByte::getStandart()::HAS_LIMIT_RANGE);

        $this->assertSame("Short", tpShort::getStandart()::TYPE);
        $this->assertSame(false, tpShort::getStandart()::IS_CLASS);
        $this->assertSame(true, tpShort::getStandart()::HAS_LIMIT_RANGE);

        $this->assertSame("Int", tpInt::getStandart()::TYPE);
        $this->assertSame(false, tpInt::getStandart()::IS_CLASS);
        $this->assertSame(true, tpInt::getStandart()::HAS_LIMIT_RANGE);

        $this->assertSame("Long", tpLong::getStandart()::TYPE);
        $this->assertSame(false, tpLong::getStandart()::IS_CLASS);
        $this->assertSame(true, tpLong::getStandart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpByte();
        $this->assertSame(tpByte::getStandart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(-128, $obj->getMin());
        $this->assertSame(127, $obj->getMax());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isIterable());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(0, $obj->get());
        $this->assertSame("0", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "allowNull"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpByte(undefined, true);
        $this->assertTrue($obj->isAllowNull());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame(0, $obj->getNotNull());





        // Teste de inicialização com um tipo arbitrário para "default" e que
        // não aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default".
        $obj = new tpByte(undefined, false, true, false, 10);
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(10, $obj->get());

        // Passando "null" o valor será definido como o "nullEquivalent".
        $obj = new tpByte(null, false, true, false, 10);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0, $obj->get());


        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tpByte(undefined, true, true, false, 10);
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(10, $obj->get());

        // Passando "null" o valor será definido como "null".
        $obj = new tpByte(null, true, true, false, 10);
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());





        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tpByte(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(1));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(1, $obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(-1, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame(-1, $obj->get());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpByte(2, false, true, true);
        $this->assertSame(2, $obj->get());

        $this->assertFalse($obj->set(1));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame(2, $obj->get());



        // Teste de uma instância não "allowNull" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpByte(undefined, false, false, false, undefined, 0, 100);
        $this->assertSame(0, $obj->get());
        $this->assertTrue($obj->set(100));

        $this->assertFalse($obj->set(101));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(100));

        $this->assertFalse($obj->set(-1));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(100));

        $this->assertTrue($obj->set(0));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertTrue($obj->set(0));
    }
}
