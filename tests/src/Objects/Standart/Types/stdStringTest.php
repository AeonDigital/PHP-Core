<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdString as stdString;

require_once __DIR__ . "/../../../../phpunit.php";







class stdStringTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo",
            undefined, null, []
        ];
        $expectedValues = [
            "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", null, "", ""];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdString::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $convertTrue = [null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(stdString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(stdString::validate($convertFalse[$i]));
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
            "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdString::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("", stdString::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(null, stdString::min());
    }



    public function test_method_max()
    {
        $this->assertSame(null, stdString::max());
    }
}
