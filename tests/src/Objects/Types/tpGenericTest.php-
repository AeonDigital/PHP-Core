<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpGeneric as tpGeneric;

require_once __DIR__ . "/../../../phpunit.php";







class tpGenericTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("iGeneric", tpGeneric::getStandart()::TYPE);
        $this->assertSame(true, tpGeneric::getStandart()::IS_CLASS);
        $this->assertSame(false, tpGeneric::getStandart()::HAS_LIMIT_RANGE);


        $valueDefault = new \DateTime("2020-01-01 00:00:00");

        // Testes de inicialização
        $obj = new tpGeneric(undefined, true, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertSame("DateTime", $obj->getType());
        $this->assertSame($valueDefault, $obj->getDefault());
        $this->assertSame(null, $obj->getMin());
        $this->assertSame(null, $obj->getMax());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isAllowNull());
        $this->assertFalse($obj->isAllowEmpty());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame($valueDefault, $obj->get());
        $this->assertSame("", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "allowNull"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpGeneric(null, true, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertTrue($obj->isAllowNull());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame(null, $obj->getNotNull());





        // Teste de inicialização com um tipo arbitrário para "default" e que
        // não aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default".
        $obj = new tpGeneric(undefined, false, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($valueDefault, $obj->get());

        // Passando "null" o valor será definido como o "default".
        $obj = new tpGeneric(null, false, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($valueDefault, $obj->get());


        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tpGeneric(undefined, true, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame($valueDefault, $obj->get());

        // Passando "null" o valor será definido como "null".
        $obj = new tpGeneric(null, true, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());





        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tpGeneric(null, true, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertNull($obj->get());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $nDT = new DateTime();
        $this->assertTrue($obj->set($nDT));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame($nDT, $obj->get());

        $this->assertTrue($obj->set(null));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpGeneric($nDT, true, true, true, $valueDefault, null, null, null, "DateTime");
        $this->assertSame($nDT, $obj->get());

        $this->assertFalse($obj->set($valueDefault));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame($nDT, $obj->get());
    }
}
