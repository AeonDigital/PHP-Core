<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tReal, tNReal, tROReal, tRONReal, tUReal, tNUReal, tROUReal, tRONUReal,
};
use AeonDigital\Objects\Realtype as Realtype;

require_once __DIR__ . "/../../../../phpunit.php";






class tNumericRealTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame(Realtype::class, tReal::getStandart()::TYPE);
        $this->assertSame(true, tReal::getStandart()::IS_CLASS);
        $this->assertSame(true, tReal::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tReal();
        $this->assertSame(tReal::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame("0", $obj->getNullEquivalent()->value());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame("-999999999999999999999999999999999999", $obj->getMin()->value());
        $this->assertSame("999999999999999999999999999999999999", $obj->getMax()->value());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame("0", $obj->get()->value());
        $this->assertSame("0", $obj->getNotNull()->value());
        $this->assertSame("0", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetState());
        $this->assertSame("0", $obj->get()->value());

        $this->assertTrue($obj->set(1));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame("1", $obj->get()->value());


        // Define um valor no construtor
        $obj = new tReal(1);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("1", $obj->get()->value());


        // "undefined" no construtor e "default" definido
        $obj = new tReal(undefined, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("1", $obj->get()->value());


        // "null" no construtor, sem default
        $obj = new tReal(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0", $obj->get()->value());


        // "null" no construtor e "default" definido
        $obj = new tReal(null, 1);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0", $obj->get()->value());




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNReal(undefined, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("10", $obj->get()->value());


        // Passando "null" o valor será definido como "null".
        $obj = new tNReal(null, 10);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNReal(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(10.11));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame("10.11", $obj->get()->value());

        $this->assertTrue($obj->set(-10.22));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame("-10.22", $obj->get()->value());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetState());
        $this->assertSame("-10.22", $obj->get()->value());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROReal(10);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("10", $obj->get()->value());

        $this->assertFalse($obj->set(-10));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetState());
        $this->assertSame("10", $obj->get()->value());




        // Testes Min Max
        $obj = new tReal(undefined, null, 10, 100);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0", $obj->get()->value());
        $this->assertTrue($obj->set(100));
        $this->assertSame("100", $obj->get()->value());


        $this->assertFalse($obj->set(101));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame("100", $obj->get()->value());

        $this->assertFalse($obj->set(-1));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastSetState());
        $this->assertSame("100", $obj->get()->value());

        $this->assertTrue($obj->set(50));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame("50", $obj->get()->value());
    }
}
