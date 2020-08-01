<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpString as tpString;

require_once __DIR__ . "/../../../phpunit.php";







class tpStringTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("String", tpString::standart()::TYPE);
        $this->assertSame(false, tpString::standart()::IS_CLASS);
        $this->assertSame(false, tpString::standart()::HAS_LIMIT_RANGE);


        // Testes de inicialização
        $obj = new tpString();
        $this->assertSame(tpString::standart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->default());
        $this->assertSame(null, $obj->min());
        $this->assertSame(null, $obj->max());
        $this->assertSame(null, $obj->length());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isIterable());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("", $obj->get());
        $this->assertSame("", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "allowNull"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpString(undefined, true);
        $this->assertTrue($obj->isAllowNull());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame("", $obj->getNotNull());





        // Teste de inicialização com um tipo arbitrário para "default" e que
        // não aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default".
        $obj = new tpString(undefined, false, true, false, "null");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("null", $obj->get());

        // Passando "null" o valor será definido como o "nullEquivalent".
        $obj = new tpString(null, false, true, false, "null");
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("", $obj->get());


        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tpString(undefined, true, true, false, "null");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("null", $obj->get());

        // Passando "null" o valor será definido como "null".
        $obj = new tpString(null, true, true, false, "null");
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());





        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tpString(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set("change 1"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("change 1", $obj->get());

        $this->assertTrue($obj->set("change 2"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("change 2", $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set(new stdClass()));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame("change 2", $obj->get());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpString("immutable", false, true, true);
        $this->assertSame("immutable", $obj->get());

        $this->assertFalse($obj->set("try to change"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame("immutable", $obj->get());



        // Teste de uma instância em que "allowEmpty" é "false" e
        // onde há um valor padrão definido.
        $obj = new tpString("", false, false, false, "notEmpty");
        $this->assertSame("notEmpty", $obj->default());
        $this->assertSame("notEmpty", $obj->get());

        $this->assertFalse($obj->set(""));
        $this->assertSame("error.obj.type.not.allow.empty", $obj->getLastSetError());
        $this->assertSame("notEmpty", $obj->get());



        // Teste de uma instância em que "allowEmpty" é "false" e
        // "allowNull" é "true" contendo também um valor especificado.
        // Demonstra assim que nestes casos, como "" não é válido, na construção
        // ele será substituido pelo valor "default" mas ao ser setado ""
        // o mesmo será convertido para "null".
        $obj = new tpString("", true, false, false, "notEmpty");
        $this->assertSame("notEmpty", $obj->default());
        $this->assertSame("notEmpty", $obj->get());

        $this->assertTrue($obj->set(""));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());



        // Teste de uma instância em que há um limite definido para o tamanho
        // que a "string" pode possuir.
        $obj = new tpString("", true, false, false, "notEmpty", null, null, 10);
        $this->assertSame(10, $obj->length());
        $this->assertSame("notEmpty", $obj->default());
        $this->assertSame("notEmpty", $obj->get());

        $this->assertFalse($obj->set("value exceeded length"));
        $this->assertSame("error.obj.max.length.exceeded", $obj->getLastSetError());
        $this->assertSame("notEmpty", $obj->get());

        $this->assertTrue($obj->set("value OK"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("value OK", $obj->get());
    }
}
