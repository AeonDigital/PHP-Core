<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdReal as stdReal;

require_once __DIR__ . "/../../../../phpunit.php";







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
            "error.std.type.unexpected", "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("", stdReal::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", stdReal::min());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", stdReal::max());
    }
}
