<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tFloat, tNFloat, tROFloat, tRONFloat, tUFloat, tNUFloat, tROUFloat, tRONUFloat,
    tDouble, tNDouble, tRODouble, tRONDouble, tUDouble, tNUDouble, tROUDouble, tRONUDouble,
};

require_once __DIR__ . "/../../../../phpunit.php";




class tNumericFloatingTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Float", tFloat::getStandart()::TYPE);
        $this->assertSame(false, tFloat::getStandart()::IS_CLASS);
        $this->assertSame(true, tFloat::getStandart()::HAS_LIMIT);

        $this->assertSame("Double", tDouble::getStandart()::TYPE);
        $this->assertSame(false, tDouble::getStandart()::IS_CLASS);
        $this->assertSame(true, tDouble::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tFloat();
        $this->assertSame(tFloat::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame(0.0, $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(-2147483648.0, $obj->getMin());
        $this->assertSame(2147483647.0, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(0.0, $obj->get());
        $this->assertSame(0.0, $obj->getNotNull());
        $this->assertSame("0", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetState());
        $this->assertSame(0.0, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(1.0, $obj->get());


        // Define um valor no construtor
        $obj = new tFloat(1);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(1.0, $obj->get());


        // "undefined" no construtor e "default" definido
        $obj = new tFloat(undefined, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(1.0, $obj->get());


        // "null" no construtor, sem default
        $obj = new tFloat(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0.0, $obj->get());


        // "null" no construtor e "default" definido
        $obj = new tFloat(null, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0.0, $obj->get());




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNFloat(undefined, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(10.0, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNFloat(null, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNFloat(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(10.11));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(10.11, $obj->get());

        $this->assertTrue($obj->set(-10.22));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(-10.22, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetState());
        $this->assertSame(-10.22, $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROFloat(10);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(10.0, $obj->get());

        $this->assertFalse($obj->set(-10));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetState());
        $this->assertSame(10.0, $obj->get());




        // Testes Min Max
        $obj = new tFloat(undefined, null, 10, 100);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(0.0, $obj->get());
        $this->assertTrue($obj->set(100));
        $this->assertSame(100.0, $obj->get());


        $this->assertFalse($obj->set(101));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame(100.0, $obj->get());

        $this->assertFalse($obj->set(-1));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame(100.0, $obj->get());

        $this->assertTrue($obj->set(50));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(50.0, $obj->get());
    }
}
