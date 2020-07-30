<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdGeneric as stdGeneric;

require_once __DIR__ . "/../../../phpunit.php";







class stdGenericTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame("iGeneric", stdGeneric::TYPE);
        $this->assertSame(true, stdGeneric::IS_CLASS);
        $this->assertSame(false, stdGeneric::HAS_LIMIT_RANGE);
    }



    public function test_method_toString()
    {
        $originalValues = [new \DateTime("2020-01-01 00:00:00")];
        $expectedValues = [null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdGeneric::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [new \stdClass(), new \DateTime()];
        $validateFalse = ["", null, undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdGeneric::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdGeneric::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $oSTD = new \stdClass();
        $oDT = new \DateTime();

        $originalValues = [
            $oSTD, $oDT
        ];
        $resultConvert = [
            $oSTD, $oDT
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
            $result = stdGeneric::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stdGeneric::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdGeneric::parseIfValidate(null, true));
        $this->assertSame($oSTD, stdGeneric::parseIfValidate($oSTD, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(null, stdGeneric::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(null, stdGeneric::min());
    }



    public function test_method_max()
    {
        $this->assertSame(null, stdGeneric::max());
    }
}
