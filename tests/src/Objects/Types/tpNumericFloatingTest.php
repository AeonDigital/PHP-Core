<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpFloat as tpFloat;
use AeonDigital\Objects\Types\tpDouble as tpDouble;

require_once __DIR__ . "/../../../phpunit.php";






class tpNumericFloatingTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Float", tpFloat::standart()::TYPE);
        $this->assertSame(false, tpFloat::standart()::IS_CLASS);
        $this->assertSame(true, tpFloat::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Double", tpDouble::standart()::TYPE);
        $this->assertSame(false, tpDouble::standart()::IS_CLASS);
        $this->assertSame(true, tpDouble::standart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpFloat();
        $this->assertSame(0.0, $obj->nullEquivalent());
        $this->assertSame(-2147483648.0, $obj->min());
        $this->assertSame(2147483647.0, $obj->max());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(0.0, $obj->get());
        $this->assertSame("0", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "nullable"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpFloat(undefined, true);
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame(0.0, $obj->getNotNull());



        // Teste de inicialização com um tipo arbitrário para "nullEquivalent"
        // Tanto passando "undefined" quando "null" o resultado deverá ser o mesmo
        // definido em ""nullEquivalent"
        $obj = new tpFloat(undefined, false, false, 10.222);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(10.222, $obj->get());

        $obj = new tpFloat(null, false, false, 10.222);
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(10.222, $obj->get());



        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "nullable"
        $obj = new tpFloat(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(1.222));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(1.222, $obj->get());

        $this->assertTrue($obj->set(-1.222));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(-1.222, $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame(-1.222, $obj->get());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpFloat(2.222, false, true);
        $this->assertSame(2.222, $obj->get());

        $this->assertFalse($obj->set(1.222));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame(2.222, $obj->get());



        // Teste de uma instância não "nullable" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpFloat(undefined, false, false, undefined, 0, 1);
        $this->assertSame(0.0, $obj->get());
        $this->assertTrue($obj->set(0.999));

        $this->assertFalse($obj->set(1.001));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(0.999));

        $this->assertFalse($obj->set(-0.001));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(0.999));

        $this->assertTrue($obj->set(0));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertTrue($obj->set(0));
    }
}