<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Complex\{
    tField, tNField, tROField, tRONField
};
use AeonDigital\Objects\Field\Commom\fString as fString;

require_once __DIR__ . "/../../../../phpunit.php";







class tFieldTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", tField::getStandart()::TYPE);
        $this->assertSame(true, tField::getStandart()::IS_CLASS);
        $this->assertSame(false, tField::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $tValue01 = new fString("name1");
        $tValue02 = new fString("name2");

        $obj = new tField();
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", $obj->getType());
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

        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetState());
        $this->assertSame(null, $obj->get());
        $this->assertSame(null, $obj->getNotNull());
        $this->assertSame("", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastSetState());
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set($tValue01));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame($tValue01, $obj->get());


        // Define um valor no construtor
        $obj = new tField($tValue01);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($tValue01, $obj->get());


        // "null" no construtor
        $obj = new tField(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());




        // Testes Nullable

        // Passando "undefined" o valor será definido como "null".
        $obj = new tNField(undefined);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNField(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNField();
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isDefined());
        $this->assertNull($obj->get());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set($tValue02));
        $this->assertFalse($obj->isUndefined());
        $this->assertTrue($obj->isDefined());
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame($tValue02, $obj->get());

        $this->assertTrue($obj->set(null));
        $this->assertSame("valid", $obj->getLastSetState());
        $this->assertSame(null, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("2"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetState());
        $this->assertSame(null, $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROField($tValue02);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame($tValue02, $obj->get());

        $this->assertFalse($obj->set($tValue01));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetState());
        $this->assertSame($tValue02, $obj->get());



        $obj = tField::fromArray([
            "value" => $tValue02
        ]);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($tValue02, $obj->get());
    }
}
