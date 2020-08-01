<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpDateTime as tpDateTime;

require_once __DIR__ . "/../../../phpunit.php";







class tpGeneralDateTime extends TestCase
{



    public function test_instance()
    {
        $this->assertSame(DateTime::class, tpDateTime::getStandart()::TYPE);
        $this->assertSame(true, tpDateTime::getStandart()::IS_CLASS);
        $this->assertSame(true, tpDateTime::getStandart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpDateTime();
        $this->assertSame(tpDateTime::getStandart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->getDefault());
        $this->assertSame("-9999-12-31 23:59:59", $obj->getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", $obj->getMax()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isIterable());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("0001-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "allowNull"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpDateTime(undefined, true);
        $this->assertTrue($obj->isAllowNull());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame("0001-01-01 00:00:00", $obj->getNotNull()->format("Y-m-d H:i:s"));





        // Teste de inicialização com um tipo arbitrário para "default" e que
        // não aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default".
        $obj = new tpDateTime(undefined, false, true, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("2020-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));

        // Passando "null" o valor será definido como o "nullEquivalent".
        $obj = new tpDateTime(null, false, true, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0001-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));


        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tpDateTime(undefined, true, true, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("2020-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));

        // Passando "null" o valor será definido como "null".
        $obj = new tpDateTime(null, true, true, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());





        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tpDateTime(null, true);
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set("2020-01-01 01:00:00"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("2020-01-01 01:00:00", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->set("2020-01-01 02:00:00"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));



        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após ser iniciada.
        $obj = new tpDateTime("2020-01-01 02:00:00", false, true, true);
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertFalse($obj->set("2020-01-01 01:00:00"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));



        // Teste de uma instância não "allowNull" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpDateTime(undefined, false, false, false, undefined,
            new DateTime("2020-01-01 01:00:01"),
            new DateTime("2020-01-01 10:00:00")
        );
        $this->assertSame("2020-01-01 01:00:01", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertSame("2020-01-01 01:00:01", $obj->getNotNull()->format("Y-m-d H:i:s"));
        $this->assertTrue($obj->set("2020-01-01 10:00:00"));

        $this->assertFalse($obj->set("2020-01-01 10:00:01"));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set("2020-01-01 10:00:00"));

        $this->assertFalse($obj->set("2020-01-01 01:00:00"));
        $this->assertSame("error.obj.out.of.range", $obj->getLastSetError());
        $this->assertTrue($obj->set("2020-01-01 10:00:00"));

        $this->assertTrue($obj->set("2020-01-01 01:00:01"));
        $this->assertSame("", $obj->getLastSetError());
        $this->assertTrue($obj->set("2020-01-01 10:00:00"));
    }
}
