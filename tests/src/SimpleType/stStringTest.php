<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stString as stString;

require_once __DIR__ . "/../../phpunit.php";






class stStringTest extends TestCase
{





    public function test_method_validate()
    {
        $convertTrue = [null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(stString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(stString::validate($convertFalse[$i]));
        }
    }



    public function test_method_toString()
    {
        $originalValues = [
            1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo",
            undefined, null, []
        ];
        $expectedValues = [
            "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", null, "", ""
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stString::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $resultConvert = [
            "", "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];
        $convertFalse = [
            undefined, new stdClass()
        ];
        $convertFalseError = [
            "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stString::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
