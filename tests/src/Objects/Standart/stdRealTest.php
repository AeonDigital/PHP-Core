<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdReal as stdReal;

require_once __DIR__ . "/../../../phpunit.php";







class stdRealTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stdReal::TYPE);
        $this->assertSame(true, stdReal::IS_CLASS);
        $this->assertSame(true, stdReal::HAS_LIMIT_RANGE);
    }



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
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stdReal::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdReal::parseIfValidate(null, true));
        $this->assertSame("0", (string)stdReal::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0", (string)stdReal::getNullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", (string)stdReal::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", (string)stdReal::getMax());
    }
}
