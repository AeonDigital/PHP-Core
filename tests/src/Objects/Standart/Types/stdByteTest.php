<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdByte as stdByte;

require_once __DIR__ . "/../../../../phpunit.php";







class stdByteTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -129, 128, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdByte::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $this->assertEquals(0, stdByte::nullEquivalent());

        $validateTrue = [
            -128, 10, 0, 56, 127
        ];
        $validateFalse = [
            -129, 128
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdByte::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127
        ];
        $convertFalse = [
            "-129", "128", undefined, null, []
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stdByte::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(-128, stdByte::min());
    }



    public function test_method_max()
    {
        $this->assertSame(127, stdByte::max());
    }
}
