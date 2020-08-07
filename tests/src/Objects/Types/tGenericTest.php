<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\{
    tGeneric, tNGeneric, tROGeneric, tRONGeneric
};

require_once __DIR__ . "/../../../phpunit.php";







class tGenericTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("iPGeneric", tGeneric::getStandart()::TYPE);
        $this->assertSame(true, tGeneric::getStandart()::IS_CLASS);
        $this->assertSame(false, tGeneric::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tGeneric("DateTime");
        $this->assertSame("DateTime", $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame(null, $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(null, $obj->getMin());
        $this->assertSame(null, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());
        $this->assertSame(null, $obj->getNotNull());
        $this->assertSame("", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(new \DateTime("2020-01-01 00:00:00")));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("2020-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));


        // Define um valor no construtor
        $nDT = new DateTime();

        $obj = new tGeneric("DateTime", $nDT);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($nDT, $obj->get());


        // "null" no construtor
        $obj = new tGeneric("DateTime", null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());




        // Testes Nullable

        // Passando "undefined" o valor será definido como "null".
        $obj = new tNGeneric("DateTime", undefined);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNGeneric("DateTime", null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNGeneric("DateTime");
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set($nDT));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame($nDT, $obj->get());

        $this->assertTrue($obj->set(null));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("2"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROGeneric("DateTime", $nDT);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame($nDT, $obj->get());

        $this->assertFalse($obj->set(false));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame($nDT, $obj->get());



        $obj = tGeneric::fromArray([
            "type"  => "DateTime",
            "value" => $nDT
        ]);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($nDT, $obj->get());
    }
}
