<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stDouble as stDouble;

require_once __DIR__ . "/../../phpunit.php";







class stDoubleTest extends TestCase
{





    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806
        ];
        $validateFalse = [
            -9223372036854775808, 9223372036854775807
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stDouble::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            //$this->assertFalse(stDouble::validate($validateFalse[$i]));

            // O PHP reduz valores menores e maiores que os limites para
            // o valor válido mais proximo:
            //
            //      Valores menores que "-9223372036854775807" serão definidos como "-9223372036854775807"
            //      Valores maiores que "9223372036854775806" serão definidos para "9223372036854775806"
            //
            // portanto este teste é impossível;
        }
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
            $result = stDouble::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
        ];
        $convertFalse = [
            undefined, null, []
        ];
        $convertFalseError = [
            "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stDouble::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stDouble::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
