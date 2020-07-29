<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpBool as tpBool;

require_once __DIR__ . "/../../../phpunit.php";







class tpBoolTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Bool", tpBool::standart()::TYPE);
        $this->assertSame(false, tpBool::standart()::IS_CLASS);
        $this->assertSame(false, tpBool::standart()::HAS_LIMIT_RANGE);


        // Testes de inicialização
        $obj = new tpBool();
        $this->assertSame(false, $obj->nullEquivalent());
        $this->assertSame(null, $obj->min());
        $this->assertSame(null, $obj->max());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(false, $obj->get());
        $this->assertSame("0", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "nullable"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpBool(undefined, true);
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame(false, $obj->getNotNull());



        // Teste de inicialização com um tipo arbitrário para "nullEquivalent"
        // Tanto passando "undefined" quando "null" o resultado deverá ser o mesmo
        // definido em ""nullEquivalent"
        $obj = new tpBool(undefined, false, false, true);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());

        $obj = new tpBool(null, false, false, true);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(true, $obj->get());



        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "nullable"
        $obj = new tpBool(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(true));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(true, $obj->get());

        $this->assertTrue($obj->set(false));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(false, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("2"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame(false, $obj->get());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpBool(true, false, true);
        $this->assertSame(true, $obj->get());

        $this->assertFalse($obj->set(false));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame(true, $obj->get());
    }
}
