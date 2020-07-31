<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpReal as tpReal;
use AeonDigital\Objects\Realtype as Realtype;

require_once __DIR__ . "/../../../phpunit.php";






class tpNumericRealTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame(Realtype::class, tpReal::standart()::TYPE);
        $this->assertSame(true, tpReal::standart()::IS_CLASS);
        $this->assertSame(true, tpReal::standart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpReal();
        $this->assertSame(tpReal::standart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->default());
        $this->assertSame("-999999999999999999999999999999999999", $obj->min()->value());
        $this->assertSame("999999999999999999999999999999999999", $obj->max()->value());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isIterable());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("0", $obj->get()->value());
        $this->assertSame("0", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "allowNull"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpReal(undefined, true);
        $this->assertTrue($obj->isAllowNull());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame("0", $obj->getNotNull()->value());





        // Teste de inicialização com um tipo arbitrário para "default" e que
        // não aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default".
        $obj = new tpReal(undefined, false, true, false, new Realtype(10));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("10", $obj->get()->value());

        // Passando "null" o valor será definido como o "nullEquivalent".
        $obj = new tpReal(null, false, true, false, new Realtype(10));
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0", $obj->get()->value());


        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tpReal(undefined, true, true, false, new Realtype(10));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("10", $obj->get()->value());

        // Passando "null" o valor será definido como "null".
        $obj = new tpReal(null, true, true, false, new Realtype(10));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());





        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tpReal(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set(1));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("1", $obj->get()->value());

        $this->assertTrue($obj->set(-1));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("-1", $obj->get()->value());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame("-1", $obj->get()->value());



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpReal(2, false, true, true);
        $this->assertSame("2", $obj->get()->value());

        $this->assertFalse($obj->set(1));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame("2", $obj->get()->value());



        // Teste de uma instância não "allowNull" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpReal(undefined, false, false, false, undefined, new Realtype(0), new Realtype(100));
        $this->assertSame("0", $obj->get()->value());
        $this->assertTrue($obj->set(100));

        $this->assertFalse($obj->set(101));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(100));

        $this->assertFalse($obj->set(-1));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set(100));

        $this->assertTrue($obj->set(0));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertTrue($obj->set(0));
    }
}
