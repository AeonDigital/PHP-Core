<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\scBool as scBool;
use AeonDigital\Objects\Standart\Commom\scNBool as scNBool;
use AeonDigital\Objects\Standart\Commom\scROBool as scROBool;
use AeonDigital\Objects\Standart\Commom\scRONBool as scRONBool;

require_once __DIR__ . "/../../../phpunit.php";







class scBoolTest extends TestCase
{



    public function test_scBool_constants()
    {
        $this->assertSame("Bool", scBool::TYPE);
        $this->assertSame(false, scBool::NULLABLE);
        $this->assertSame(false, scBool::READONLY);

        $this->assertSame(false, scBool::IS_CLASS);

        $this->assertSame(null, scBool::SIGNED);
        $this->assertSame(null, scBool::UNSIGNED);
        $this->assertSame(null, scBool::EMPTY);
        $this->assertSame(false, scBool::HAS_LIMIT);
        $this->assertSame(null, scBool::MIN);
        $this->assertSame(null, scBool::MAX);
        $this->assertSame("0", scBool::NULL_EQUIVALENT);
    }
    public function test_scNBool_constants()
    {
        $this->assertSame("Bool", scNBool::TYPE);
        $this->assertSame(true, scNBool::NULLABLE);
        $this->assertSame(false, scNBool::READONLY);
    }
    public function test_scROBool_constants()
    {
        $this->assertSame("Bool", scROBool::TYPE);
        $this->assertSame(false, scROBool::NULLABLE);
        $this->assertSame(true, scROBool::READONLY);
    }
    public function test_scRONBool_constants()
    {
        $this->assertSame("Bool", scRONBool::TYPE);
        $this->assertSame(true, scRONBool::NULLABLE);
        $this->assertSame(true, scRONBool::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scBool::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }





    public function test_method_validate()
    {
        // scBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scBool::validate($validateFalse[$i]));
        }



        // scNBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off", null];
        $validateFalse = ["", undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scNBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scNBool::validate($validateFalse[$i]));
        }
    }





    public function test_method_parseIfValidate()
    {
        // scBool
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
            $result = scBool::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scBool::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, scBool::parseIfValidate(null));
        $this->assertSame(null, scNBool::parseIfValidate(null));
    }



    public function test_method_min()
    {
        $this->assertSame(null, scBool::getMin());
    }
    public function test_method_max()
    {
        $this->assertSame(null, scBool::getMax());
    }
    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, scBool::getNullEquivalent());
    }
}
