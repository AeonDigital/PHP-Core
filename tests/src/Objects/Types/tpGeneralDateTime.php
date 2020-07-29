<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpDateTime as tpDateTime;

require_once __DIR__ . "/../../../phpunit.php";







class tpGeneralDateTime extends TestCase
{



    public function test_instance()
    {
        $this->assertSame(DateTime::class, tpDateTime::standart()::TYPE);
        $this->assertSame(true, tpDateTime::standart()::IS_CLASS);
        $this->assertSame(true, tpDateTime::standart()::HAS_LIMIT_RANGE);





        // Testes de inicialização
        $obj = new tpDateTime();
        $this->assertSame("0001-01-01 00:00:00", $obj->nullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("-9999-12-31 23:59:59", $obj->min()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", $obj->max()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame("0001-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", $obj->toString());



        // Teste de inicialização com "undefined" em um tipo "nullable"
        // Objetivo é verificar se, neste caso, o valor incialmente definido para
        // a instância tornar-se-a "null"
        $obj = new tpDateTime(undefined, true);
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertNull($obj->get());
        $this->assertSame("0001-01-01 00:00:00", $obj->getNotNull()->format("Y-m-d H:i:s"));



        // Teste de inicialização com um tipo arbitrário para "nullEquivalent"
        // Tanto passando "undefined" quando "null" o resultado deverá ser o mesmo
        // definido em ""nullEquivalent"
        $obj = new tpDateTime(undefined, false, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("2020-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));

        $obj = new tpDateTime(null, false, false, new DateTime("2020-01-01 00:00:00"));
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("2020-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));



        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "nullable"
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
        $obj = new tpDateTime("2020-01-01 02:00:00", false, true);
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertFalse($obj->set("2020-01-01 01:00:00"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastSetError());
        $this->assertSame("2020-01-01 02:00:00", $obj->get()->format("Y-m-d H:i:s"));



        // Teste de uma instância não "nullable" com um intervalo arbitrário de números
        // válidos definidos.
        $obj = new tpDateTime(undefined, false, false, undefined,
            new DateTime("2020-01-01 01:00:01"),
            new DateTime("2020-01-01 10:00:00")
        );
        $this->assertSame(null, $obj->get());
        $this->assertSame("0001-01-01 00:00:00", $obj->getNotNull()->format("Y-m-d H:i:s"));
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
