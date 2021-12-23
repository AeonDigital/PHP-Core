<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stBool as stBool;

require_once __DIR__ . "/../../phpunit.php";







class stBoolTest extends TestCase
{





    public function test_method_validate()
    {
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stBool::validate($validateFalse[$i]));
        }
    }



    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stBool::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            "error.st.unexpected.type",
            "error.st.unexpected.type",
            "error.st.unexpected.type"
        ];



        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stBool::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stBool::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
