<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdByte as stdByte;

require_once __DIR__ . "/../../../phpunit.php";







class stdByteTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame("Byte", stdByte::TYPE);
        $this->assertSame(false, stdByte::IS_CLASS);
        $this->assertSame(true, stdByte::HAS_LIMIT_RANGE);
    }



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
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.nullable", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stdByte::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdByte::parseIfValidate(null, true));
        $this->assertSame(0, stdByte::parseIfValidate(null, false, true));
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
