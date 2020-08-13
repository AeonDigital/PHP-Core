<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tByte, tNByte, tROByte, tRONByte, tUByte, tNUByte, tROUByte, tRONUByte,
    tShort, tNShort, tROShort, tRONShort, tUShort, tNUShort, tROUShort, tRONUShort,
    tInt, tNInt, tROInt, tRONInt, tUInt, tNUInt, tROUInt, tRONUInt,
    tLong, tNLong, tROLong, tRONLong, tULong, tNULong, tROULong, tRONULong,
};

require_once __DIR__ . "/../../../../phpunit.php";




class tNumericIntegerTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Byte", tByte::getStandart()::TYPE);
        $this->assertSame(false, tByte::getStandart()::IS_CLASS);
        $this->assertSame(true, tByte::getStandart()::HAS_LIMIT);

        $this->assertSame("Short", tShort::getStandart()::TYPE);
        $this->assertSame(false, tShort::getStandart()::IS_CLASS);
        $this->assertSame(true, tShort::getStandart()::HAS_LIMIT);

        $this->assertSame("Int", tInt::getStandart()::TYPE);
        $this->assertSame(false, tInt::getStandart()::IS_CLASS);
        $this->assertSame(true, tInt::getStandart()::HAS_LIMIT);

        $this->assertSame("Long", tLong::getStandart()::TYPE);
        $this->assertSame(false, tLong::getStandart()::IS_CLASS);
        $this->assertSame(true, tLong::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tByte();
        $this->assertSame(tByte::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame(0, $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(-128, $obj->getMin());
        $this->assertSame(127, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(0, $obj->get());
        $this->assertSame(0, $obj->getNotNull());
        $this->assertSame("0", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetState());
        $this->assertSame(0, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(1, $obj->get());


        // Define um valor no construtor
        $obj = new tByte(1);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(1, $obj->get());


        // "undefined" no construtor e "default" definido
        $obj = new tByte(undefined, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(1, $obj->get());


        // "null" no construtor, sem default
        $obj = new tByte(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0, $obj->get());


        // "null" no construtor e "default" definido
        $obj = new tByte(null, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0, $obj->get());




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNByte(undefined, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(10, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNByte(null, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNByte(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(10));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(10, $obj->get());

        $this->assertTrue($obj->set(-10));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(-10, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetState());
        $this->assertSame(-10, $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROByte(10);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(10, $obj->get());

        $this->assertFalse($obj->set(-10));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetState());
        $this->assertSame(10, $obj->get());




        // Testes Min Max
        $obj = new tByte(undefined, null, 10, 100);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0, $obj->get());
        $this->assertTrue($obj->set(100));
        $this->assertSame(100, $obj->get());


        $this->assertFalse($obj->set(101));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame(100, $obj->get());

        $this->assertFalse($obj->set(-1));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame(100, $obj->get());

        $this->assertTrue($obj->set(50));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(50, $obj->get());
    }
}
