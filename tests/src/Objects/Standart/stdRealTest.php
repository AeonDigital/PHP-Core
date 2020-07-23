<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdReal as stdReal;

require_once __DIR__ . "/../../../phpunit.php";







class stdRealTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdReal::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -999999999999999999, 999999999999999999,
            -"999999999999999999.999999999999999999", "999999999999999999.999999999999999999"
        ];
        $validateFalse = [
            null, false, true, undefined
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdReal::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
        ];
        $resultConvert = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806"
        ];
        $convertFalse = [
            "-1000000000000000000000000000000000000", "1000000000000000000000000000000000000",
            undefined, null, [],
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdReal::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdReal::parseIfValidate(null, true));
        $this->assertSame("0", (string)stdReal::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0", (string)stdReal::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", (string)stdReal::min());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", (string)stdReal::max());
    }










    public function test_instance()
    {
        // Testa a inicialização simples.
        $obj = new stdReal();
        $this->assertTrue(is_a($obj, stdReal::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame("0", (string)$obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdReal(null, true);
        $this->assertTrue(is_a($obj, stdReal::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame(null, $obj->get());
        $this->assertSame("0", (string)$obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdReal(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame("1", (string)$obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame("-1", (string)$obj->get());


        // Testa uma instância readonly
        $obj = new stdReal(1, true, true);
        $this->assertSame("1", (string)$obj->get());

        $this->assertFalse($obj->set(2, true, $err));
        $this->assertSame("1", (string)$obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdReal("1", true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdReal\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
