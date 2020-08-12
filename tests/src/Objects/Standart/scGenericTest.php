<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\scGeneric as scGeneric;
use AeonDigital\Objects\Standart\Commom\scNGeneric as scNGeneric;
use AeonDigital\Objects\Standart\Commom\scROGeneric as scROGeneric;
use AeonDigital\Objects\Standart\Commom\scRONGeneric as scRONGeneric;

require_once __DIR__ . "/../../../phpunit.php";







class scGenericTest extends TestCase
{



    public function test_scGeneric_constants()
    {
        $this->assertSame("iPGeneric", scGeneric::TYPE);
        $this->assertSame(false, scGeneric::NULLABLE);
        $this->assertSame(false, scGeneric::READONLY);

        $this->assertSame(true, scGeneric::IS_CLASS);

        $this->assertSame(null, scGeneric::SIGNED);
        $this->assertSame(null, scGeneric::UNSIGNED);
        $this->assertSame(null, scGeneric::EMPTY);
        $this->assertSame(false, scGeneric::HAS_LIMIT);
        $this->assertSame(null, scGeneric::MIN);
        $this->assertSame(null, scGeneric::MAX);
        $this->assertSame(null, scGeneric::NULL_EQUIVALENT);
    }
    public function test_scNGeneric_constants()
    {
        $this->assertSame("iPGeneric", scNGeneric::TYPE);
        $this->assertSame(true, scNGeneric::NULLABLE);
        $this->assertSame(false, scNGeneric::READONLY);
    }
    public function test_scROGeneric_constants()
    {
        $this->assertSame("iPGeneric", scROGeneric::TYPE);
        $this->assertSame(false, scROGeneric::NULLABLE);
        $this->assertSame(true, scROGeneric::READONLY);
    }
    public function test_scRONGeneric_constants()
    {
        $this->assertSame("iPGeneric", scRONGeneric::TYPE);
        $this->assertSame(true, scRONGeneric::NULLABLE);
        $this->assertSame(true, scRONGeneric::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [new \DateTime("2020-01-01 00:00:00")];
        $expectedValues = [null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scGeneric::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        // scGeneric
        $validateTrue = [new \stdClass(), new \DateTime()];
        $validateFalse = ["", null, undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scGeneric::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scGeneric::validate($validateFalse[$i]));
        }



        // scNGeneric
        $validateTrue = [new \stdClass(), new \DateTime(), null];
        $validateFalse = ["", undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scNGeneric::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scNGeneric::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        // scGeneric
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
            $result = scGeneric::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scGeneric::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, scGeneric::parseIfValidate(null));
        $this->assertSame($oSTD, scGeneric::parseIfValidate($oSTD));
    }
}
