<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdBool as stdBool;

require_once __DIR__ . "/../../../../phpunit.php";







class stdBoolTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdBool::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdBool::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            true, "yes", 1, "1", "on",
            false, "no", 0, "0", "off"
        ];
        $resultConvert = [
            true, true, true, true, true,
            false, false, false, false, false
        ];
        $convertFalse = [
            "", null, undefined
        ];
        $convertFalseError = [
            "error.std.type.unexpected",
            "error.std.type.unexpected",
            "error.std.type.unexpected"
        ];



        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdBool::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdBool::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, stdBool::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(null, stdBool::min());
    }



    public function test_method_max()
    {
        $this->assertSame(null, stdBool::max());
    }
}
