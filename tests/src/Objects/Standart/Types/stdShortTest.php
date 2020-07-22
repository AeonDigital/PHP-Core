<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdShort as stdShort;

require_once __DIR__ . "/../../../../phpunit.php";







class stdShortTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -32769, 32768, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdShort::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127,
            -32768, 32767
        ];
        $validateFalse = [
            -32769, 32768
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdShort::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdShort::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127,
            -32768, 32767
        ];
        $convertFalse = [
            "-32769", "32768", undefined, null, []
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdShort::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdShort::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stdShort::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(-32768, stdShort::min());
    }



    public function test_method_max()
    {
        $this->assertSame(32767, stdShort::max());
    }
}
