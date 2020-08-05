<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\stBool as stBool;
use AeonDigital\Objects\Standart\SType\stNBool as stNBool;
use AeonDigital\Objects\Standart\SType\stROBool as stROBool;
use AeonDigital\Objects\Standart\SType\stRONBool as stRONBool;

require_once __DIR__ . "/../../../phpunit.php";







class stBoolTest extends TestCase
{



    public function test_stBool_constants()
    {
        $this->assertSame("Bool", stBool::TYPE);
        $this->assertSame(false, stBool::NULLABLE);
        $this->assertSame(false, stBool::READONLY);

        $this->assertSame(false, stBool::IS_CLASS);

        $this->assertSame(null, stBool::SIGNED);
        $this->assertSame(null, stBool::UNSIGNED);
        $this->assertSame(null, stBool::EMPTY);
        $this->assertSame(false, stBool::HAS_LIMIT);
        $this->assertSame(null, stBool::MIN);
        $this->assertSame(null, stBool::MAX);
        $this->assertSame("0", stBool::NULL_EQUIVALENT);
    }
    public function test_stNBool_constants()
    {
        $this->assertSame("Bool", stNBool::TYPE);
        $this->assertSame(true, stNBool::NULLABLE);
        $this->assertSame(false, stNBool::READONLY);
    }
    public function test_stROBool_constants()
    {
        $this->assertSame("Bool", stROBool::TYPE);
        $this->assertSame(false, stROBool::NULLABLE);
        $this->assertSame(true, stROBool::READONLY);
    }
    public function test_stRONBool_constants()
    {
        $this->assertSame("Bool", stRONBool::TYPE);
        $this->assertSame(true, stRONBool::NULLABLE);
        $this->assertSame(true, stRONBool::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stBool::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }





    public function test_method_validate()
    {
        // stBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stBool::validate($validateFalse[$i]));
        }



        // stNBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off", null];
        $validateFalse = ["", undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stNBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stNBool::validate($validateFalse[$i]));
        }
    }





    public function test_method_parseIfValidate()
    {
        // stBool
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
            "error.obj.type.unexpected",
            "error.obj.type.not.allow.null",
            "error.obj.type.unexpected"
        ];



        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stBool::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stBool::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stBool::parseIfValidate(null));
        $this->assertSame(null, stNBool::parseIfValidate(null));
    }



    public function test_method_min()
    {
        $this->assertSame(null, stBool::getMin());
    }
    public function test_method_max()
    {
        $this->assertSame(null, stBool::getMax());
    }
    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, stBool::getNullEquivalent());
    }
}
