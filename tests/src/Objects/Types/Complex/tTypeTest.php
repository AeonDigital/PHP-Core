<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Complex\{
    tType, tNType, tROType, tRONType
};
use AeonDigital\Objects\Types\Commom\tString as tString;

require_once __DIR__ . "/../../../../phpunit.php";







class tTypeTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", tType::getStandart()::TYPE);
        $this->assertSame(true, tType::getStandart()::IS_CLASS);
        $this->assertSame(false, tType::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $tValue01 = new tString("Instância Filha 01");
        $tValue02 = new tString("Instância Filha 02");

        $obj = new tType();
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", $obj->getType());
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
        $obj = new tType($tValue01);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($tValue01, $obj->get());


        // "null" no construtor
        $obj = new tType(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());




        // Testes Nullable

        // Passando "undefined" o valor será definido como "null".
        $obj = new tNType(undefined);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNType(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNType();
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
        $obj = new tROType($tValue02);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame($tValue02, $obj->get());

        $this->assertFalse($obj->set($tValue01));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetState());
        $this->assertSame($tValue02, $obj->get());



        $obj = tType::fromArray([
            "value" => $tValue02
        ]);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($tValue02, $obj->get());
    }
}
