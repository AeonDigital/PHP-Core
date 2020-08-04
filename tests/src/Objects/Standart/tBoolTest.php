<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\tBool as tBool;
use AeonDigital\Objects\Standart\Types\tNBool as tNBool;
use AeonDigital\Objects\Standart\Types\tROBool as tROBool;
use AeonDigital\Objects\Standart\Types\tRONBool as tRONBool;

require_once __DIR__ . "/../../../phpunit.php";







class tBoolTest extends TestCase
{



    public function test_tBool_constants()
    {
        $this->assertSame("Bool", tBool::TYPE);
        $this->assertSame(false, tBool::NULLABLE);
        $this->assertSame(false, tBool::READONLY);

        $this->assertSame(false, tBool::IS_CLASS);

        $this->assertSame(null, tBool::SIGNED);
        $this->assertSame(null, tBool::UNSIGNED);
        $this->assertSame(null, tBool::EMPTY);
        $this->assertSame(false, tBool::HAS_LIMIT);
        $this->assertSame(null, tBool::MIN);
        $this->assertSame(null, tBool::MAX);
        $this->assertSame("0", tBool::NULL_EQUIVALENT);
    }
    public function test_tNBool_constants()
    {
        $this->assertSame("Bool", tNBool::TYPE);
        $this->assertSame(true, tNBool::NULLABLE);
        $this->assertSame(false, tNBool::READONLY);
    }
    public function test_tROBool_constants()
    {
        $this->assertSame("Bool", tROBool::TYPE);
        $this->assertSame(false, tROBool::NULLABLE);
        $this->assertSame(true, tROBool::READONLY);
    }
    public function test_tRONBool_constants()
    {
        $this->assertSame("Bool", tRONBool::TYPE);
        $this->assertSame(true, tRONBool::NULLABLE);
        $this->assertSame(true, tRONBool::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tBool::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }





    public function test_method_validate()
    {
        // tBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tBool::validate($validateFalse[$i]));
        }



        // tNBool
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off", null];
        $validateFalse = ["", undefined, new DateTime()];

        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tNBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tNBool::validate($validateFalse[$i]));
        }
    }





    public function test_method_parseIfValidate()
    {
        // tBool
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
            $result = tBool::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tBool::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, tBool::parseIfValidate(null));
        $this->assertSame(null, tNBool::parseIfValidate(null));
    }



    public function test_method_min()
    {
        $this->assertSame(null, tBool::getMin());
    }
    public function test_method_max()
    {
        $this->assertSame(null, tBool::getMax());
    }
    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, tBool::getNullEquivalent());
    }
}
