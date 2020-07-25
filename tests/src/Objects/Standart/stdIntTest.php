<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdInt as stdInt;

require_once __DIR__ . "/../../../phpunit.php";







class stdIntTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -2147483649, 2147483648, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdInt::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647
        ];
        $validateFalse = [
            -2147483649, 2147483648
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdInt::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdInt::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647
        ];
        $convertFalse = [
            "-2147483649", "2147483648",
            undefined, null, []
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdInt::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdInt::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdInt::parseIfValidate(null, true));
        $this->assertSame(0, stdInt::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stdInt::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(-2147483648, stdInt::min());
    }



    public function test_method_max()
    {
        $this->assertSame(2147483647, stdInt::max());
    }










    public function test_instance()
    {
        $this->assertSame("Int", stdInt::TYPE);
        $this->assertSame(false, stdInt::IS_CLASS);
        $this->assertSame(true, stdInt::HAS_LIMIT_RANGE);

        // Testa a inicialização simples.
        $obj = new stdInt();
        $this->assertTrue(is_a($obj, stdInt::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isUndefined());
        $this->assertSame(0, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdInt(null, true);
        $this->assertTrue(is_a($obj, stdInt::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(null, $obj->get());
        $this->assertSame(0, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdInt(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame(1, $obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame(-1, $obj->get());


        // Testa uma instância readonly
        $obj = new stdInt(1, true, true);
        $this->assertSame(1, $obj->get());

        $this->assertFalse($obj->set(2, true, $err));
        $this->assertSame(1, $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdInt(1, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdInt\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
