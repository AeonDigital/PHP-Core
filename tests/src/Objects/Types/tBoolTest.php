<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tBool, tNBool, tROBool, tRONBool
};

require_once __DIR__ . "/../../../phpunit.php";







class tBoolTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Bool", tBool::getStandart()::TYPE);
        $this->assertSame(false, tBool::getStandart()::IS_CLASS);
        $this->assertSame(false, tBool::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tBool();
        $this->assertSame(tBool::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame(false, $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(null, $obj->getMin());
        $this->assertSame(null, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(false, $obj->get());
        $this->assertSame(false, $obj->getNotNull());
        $this->assertSame("0", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastValidateError());
        $this->assertSame(false, $obj->get());

        $this->assertTrue($obj->set(true));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(true, $obj->get());


        // Define um valor no construtor
        $obj = new tBool(true);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());


        // "undefined" no construtor e "default" definido
        $obj = new tBool(undefined, true);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());


        // "null" no construtor, sem default
        $obj = new tBool(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(false, $obj->get());


        // "null" no construtor e "default" definido
        $obj = new tBool(null, true);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(false, $obj->get());




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNBool(undefined, true);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNBool(null, true);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNBool(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(true));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(true, $obj->get());

        $this->assertTrue($obj->set(false));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(false, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("2"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastValidateError());
        $this->assertSame(false, $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROBool(true);
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(true, $obj->get());

        $this->assertFalse($obj->set(false));
        $this->assertSame("error.obj.type.readonly", $obj->getLastValidateError());
        $this->assertSame(true, $obj->get());



        $obj = tBool::fromArray([
            "value" => true
        ]);
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());
    }
}
