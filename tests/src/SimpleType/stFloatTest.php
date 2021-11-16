<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stFloat as stFloat;

require_once __DIR__ . "/../../phpunit.php";







class stFloatTest extends TestCase
{





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
            $this->assertTrue(stFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stFloat::validate($validateFalse[$i]));
        }
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
            $result = stFloat::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            "error.st.value.out.of.range", "error.st.value.out.of.range", "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stFloat::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
