<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\stGeneric as stGeneric;
use AeonDigital\Objects\Standart\SType\stNGeneric as stNGeneric;
use AeonDigital\Objects\Standart\SType\stROGeneric as stROGeneric;
use AeonDigital\Objects\Standart\SType\stRONGeneric as stRONGeneric;

require_once __DIR__ . "/../../../phpunit.php";







class stGenericTest extends TestCase
{



    public function test_stGeneric_constants()
    {
        $this->assertSame("iPGeneric", stGeneric::TYPE);
        $this->assertSame(false, stGeneric::NULLABLE);
        $this->assertSame(false, stGeneric::READONLY);

        $this->assertSame(true, stGeneric::IS_CLASS);

        $this->assertSame(null, stGeneric::SIGNED);
        $this->assertSame(null, stGeneric::UNSIGNED);
        $this->assertSame(null, stGeneric::EMPTY);
        $this->assertSame(false, stGeneric::HAS_LIMIT);
        $this->assertSame(null, stGeneric::MIN);
        $this->assertSame(null, stGeneric::MAX);
        $this->assertSame(null, stGeneric::NULL_EQUIVALENT);
    }
    public function test_stNGeneric_constants()
    {
        $this->assertSame("iPGeneric", stNGeneric::TYPE);
        $this->assertSame(true, stNGeneric::NULLABLE);
        $this->assertSame(false, stNGeneric::READONLY);
    }
    public function test_stROGeneric_constants()
    {
        $this->assertSame("iPGeneric", stROGeneric::TYPE);
        $this->assertSame(false, stROGeneric::NULLABLE);
        $this->assertSame(true, stROGeneric::READONLY);
    }
    public function test_stRONGeneric_constants()
    {
        $this->assertSame("iPGeneric", stRONGeneric::TYPE);
        $this->assertSame(true, stRONGeneric::NULLABLE);
        $this->assertSame(true, stRONGeneric::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [new \DateTime("2020-01-01 00:00:00")];
        $expectedValues = [null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stGeneric::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        // stGeneric
        $validateTrue = [new \stdClass(), new \DateTime()];
        $validateFalse = ["", null, undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stGeneric::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stGeneric::validate($validateFalse[$i]));
        }



        // stNGeneric
        $validateTrue = [new \stdClass(), new \DateTime(), null];
        $validateFalse = ["", undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stNGeneric::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stNGeneric::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        // stGeneric
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
            $result = stGeneric::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stGeneric::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stGeneric::parseIfValidate(null));
        $this->assertSame($oSTD, stGeneric::parseIfValidate($oSTD));
    }
}
