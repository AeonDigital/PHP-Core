<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stShort as stShort;

require_once __DIR__ . "/../../phpunit.php";






class stShortTest extends TestCase
{





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
            $this->assertTrue(stShort::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stShort::validate($validateFalse[$i]));
        }
    }



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
            $result = stShort::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            "error.st.value.out.of.range", "error.st.value.out.of.range", "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stShort::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stShort::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
