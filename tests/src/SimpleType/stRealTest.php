<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stReal as stReal;

require_once __DIR__ . "/../../phpunit.php";






class stRealTest extends TestCase
{





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
            $this->assertTrue(stReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stReal::validate($validateFalse[$i]));
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
            $result = stReal::toString($originalValues[$i]);
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
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
        ];
        $convertFalse = [
            undefined, null, []
        ];
        $convertFalseError = [
            "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
