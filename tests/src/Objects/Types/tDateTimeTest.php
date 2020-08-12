<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tDateTime, tNDateTime, tRODateTime, tRONDateTime,
};

require_once __DIR__ . "/../../../phpunit.php";





class tDateTimeTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame(\DateTime::class, tDateTime::getStandart()::TYPE);
        $this->assertSame(true, tDateTime::getStandart()::IS_CLASS);
        $this->assertSame(true, tDateTime::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tDateTime();
        $this->assertSame(tDateTime::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame("0000-01-01 00:00:00", $obj->getNullEquivalent()->format("Y-m-d H:i:s"));

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame("0000-01-01 00:00:00", $obj->getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", $obj->getMax()->format("Y-m-d H:i:s"));
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("0000-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", $obj->getNotNull()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastValidateError());
        $this->assertSame("0000-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->set("2020-02-02 22:22:22"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));


        // Define um valor no construtor
        $obj = new tDateTime("2020-02-02 22:22:22");
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));


        // "undefined" no construtor e "default" definido
        $obj = new tDateTime(undefined, "2020-02-02 22:22:22");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));


        // "null" no construtor, sem default
        $obj = new tDateTime(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0000-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));


        // "null" no construtor e "default" definido
        $obj = new tDateTime(null, "2020-02-02 22:22:22");
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0000-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNDateTime(undefined, "2020-02-02 22:22:22");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));


        // Passando "null" o valor será definido como "null".
        $obj = new tNDateTime(null, "2020-02-02 22:22:22");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNDateTime(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set("2020-02-02 22:22:22"));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->set("1010-01-01 11:11:11"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("1010-01-01 11:11:11", $obj->get()->format("Y-m-d H:i:s"));

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastValidateError());
        $this->assertSame("1010-01-01 11:11:11", $obj->get()->format("Y-m-d H:i:s"));




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tRODateTime("1010-01-01 11:11:11");
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("1010-01-01 11:11:11", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertFalse($obj->set("2020-02-02 22:22:22"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastValidateError());
        $this->assertSame("1010-01-01 11:11:11", $obj->get()->format("Y-m-d H:i:s"));




        // Testes Min Max
        $obj = new tDateTime(undefined, null, "2020-01-01 00:00:11", "2020-01-01 00:00:20");
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("0000-01-01 00:00:00", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertTrue($obj->set("2020-01-01 00:00:20"));
        $this->assertSame("2020-01-01 00:00:20", $obj->get()->format("Y-m-d H:i:s"));


        $this->assertFalse($obj->set("2020-01-01 00:00:21"));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastValidateError());
        $this->assertSame("2020-01-01 00:00:20", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertFalse($obj->set("2020-01-01 00:00:10"));
        $this->assertSame("error.obj.value.out.of.range", $obj->getLastValidateError());
        $this->assertSame("2020-01-01 00:00:20", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->set("2020-01-01 00:00:15"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("2020-01-01 00:00:15", $obj->get()->format("Y-m-d H:i:s"));
    }
}
