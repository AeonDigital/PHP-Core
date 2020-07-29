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
        $this->assertSame("", $obj->nullEquivalent());
        $this->assertSame(null, $obj->min());
        $this->assertSame(null, $obj->max());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("", $obj->get());
        $this->assertSame("", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "nullable"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpString(undefined, true);
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame("", $obj->getNotNull());



        // Teste de inicialização com um tipo arbitrário para "nullEquivalent"
        // Tanto passando "undefined" quando "null" o resultado deverá ser o mesmo
        // definido em ""nullEquivalent"
        $obj = new tpString(undefined, false, false, "null");
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("null", $obj->get());

        $obj = new tpString(null, false, false, "null");
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("null", $obj->get());



        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "nullable"
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
        $obj = new tpString("immutable", false, true);
        $this->assertSame("immutable", $obj->get());

        $this->assertFalse($obj->set("try to change"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame("immutable", $obj->get());
    }
}
