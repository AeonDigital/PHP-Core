<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stByte as stByte;

require_once __DIR__ . "/../../phpunit.php";






class stByteTest extends TestCase
{





    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127
        ];
        $validateFalse = [
            -129, 128
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stByte::validate($validateFalse[$i]));
        }
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
            $result = stByte::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            "error.st.value.out.of.range", "error.st.value.out.of.range", "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
