<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stLong as stLong;

require_once __DIR__ . "/../../phpunit.php";







class stLongTest extends TestCase
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
            $this->assertTrue(stLong::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stLong::validate($validateFalse[$i]));
        }



        // Demonstração da perda de precisão para valores fora dos limiares
        // mínimos e máximos.
        // As iterações poderiam ser bem maiores... na casa dos milhões e
        // a comparação ainda assim seria dada como correta.
        $t = 9223372036854775807;
        $strNumber = "9.2233720368548E+18";
        for ($i=0; $i < 10000; $i++) {
            $t = $t + 1;
            $this->assertSame($strNumber, (string)$t);
        }

        $t = -9223372036854775808;
        $strNumber = "-9.2233720368548E+18";
        for ($i=0; $i < 10000; $i++) {
            $t = $t - 1;
            $this->assertSame($strNumber, (string)$t);
        }
    }



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            -9223372036854775808, 9223372036854775807, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stLong::toString($originalValues[$i]);
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
            "-9223372036854775808", "9223372036854775807", undefined, null, []
        ];
        $convertFalseError = [
            "error.st.value.out.of.range", "error.st.value.out.of.range", "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stLong::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stLong::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
