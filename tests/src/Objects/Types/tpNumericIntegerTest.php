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
        $this->assertSame("Byte", tpByte::standart()::TYPE);
        $this->assertSame(false, tpByte::standart()::IS_CLASS);
        $this->assertSame(true, tpByte::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Short", tpShort::standart()::TYPE);
        $this->assertSame(false, tpShort::standart()::IS_CLASS);
        $this->assertSame(true, tpShort::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Int", tpInt::standart()::TYPE);
        $this->assertSame(false, tpInt::standart()::IS_CLASS);
        $this->assertSame(true, tpInt::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Long", tpLong::standart()::TYPE);
        $this->assertSame(false, tpLong::standart()::IS_CLASS);
        $this->assertSame(true, tpLong::standart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpByte();
        $this->assertSame(0, $obj->nullEquivalent());
        $this->assertSame(-128, $obj->min());
        $this->assertSame(127, $obj->max());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(0, $obj->get());
        $this->assertSame("0", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "nullable"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpByte(undefined, true);
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame(0, $obj->getNotNull());



        // Teste de inicialização com um tipo arbitrário para "nullEquivalent"
        // Tanto passando "undefined" quando "null" o resultado deverá ser o mesmo
        // definido em ""nullEquivalent"
        $obj = new tpByte(undefined, false, false, 10);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(10, $obj->get());

        $obj = new tpByte(null, false, false, 10);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(10, $obj->get());



        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "nullable"
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
        $obj = new tpByte(2, false, true);
        $this->assertSame(2, $obj->get());

        $this->assertFalse($obj->set(1));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame(2, $obj->get());



        // Teste de uma instância não "nullable" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpByte(undefined, false, false, undefined, 0, 100);
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
