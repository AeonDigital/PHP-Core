<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdFloat as stdFloat;

require_once __DIR__ . "/../../../phpunit.php";







class stdFloatTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame("Float", stdFloat::TYPE);
        $this->assertSame(false, stdFloat::IS_CLASS);
        $this->assertSame(true, stdFloat::HAS_LIMIT_RANGE);
    }



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
            $result = stdFloat::toString($originalValues[$i]);
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
            $this->assertTrue(stdFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdFloat::validate($validateFalse[$i]));
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
            "-2147483649", "2147483648", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdFloat::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stdFloat::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdFloat::parseIfValidate(null, true));
        $this->assertSame(0.0, stdFloat::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, stdFloat::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame((float)-2147483648, stdFloat::min());
    }



    public function test_method_max()
    {
        $this->assertSame((float)2147483647, stdFloat::max());
    }
}
