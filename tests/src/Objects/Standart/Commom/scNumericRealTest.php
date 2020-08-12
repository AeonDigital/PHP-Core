<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\
    {
        scReal, scNReal, scROReal, scRONReal, scUReal, scNUReal, scROUReal, scRONUReal,
    };


require_once __DIR__ . "/../../../../phpunit.php";





class scNumericRealTest extends TestCase
{



    public function test_scReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scReal::TYPE);
        $this->assertSame(false, scReal::NULLABLE);
        $this->assertSame(false, scReal::READONLY);

        $this->assertSame(true, scReal::IS_CLASS);

        $this->assertSame(true, scReal::SIGNED);
        $this->assertSame(false, scReal::UNSIGNED);
        $this->assertSame(null, scReal::EMPTY);
        $this->assertSame(true, scReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", scReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scReal::MAX);
        $this->assertSame("0", scReal::NULL_EQUIVALENT);
    }
    public function test_scNReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scNReal::TYPE);
        $this->assertSame(true, scNReal::NULLABLE);
        $this->assertSame(false, scNReal::READONLY);

        $this->assertSame(true, scNReal::IS_CLASS);

        $this->assertSame(true, scNReal::SIGNED);
        $this->assertSame(false, scNReal::UNSIGNED);
        $this->assertSame(null, scNReal::EMPTY);
        $this->assertSame(true, scNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", scNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scNReal::MAX);
        $this->assertSame("0", scNReal::NULL_EQUIVALENT);
    }
    public function test_scROReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scROReal::TYPE);
        $this->assertSame(false, scROReal::NULLABLE);
        $this->assertSame(true, scROReal::READONLY);

        $this->assertSame(true, scROReal::IS_CLASS);

        $this->assertSame(true, scROReal::SIGNED);
        $this->assertSame(false, scROReal::UNSIGNED);
        $this->assertSame(null, scROReal::EMPTY);
        $this->assertSame(true, scNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", scNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scNReal::MAX);
        $this->assertSame("0", scNReal::NULL_EQUIVALENT);
    }
    public function test_scRONReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scRONReal::TYPE);
        $this->assertSame(true, scRONReal::NULLABLE);
        $this->assertSame(true, scRONReal::READONLY);

        $this->assertSame(true, scRONReal::IS_CLASS);

        $this->assertSame(true, scRONReal::SIGNED);
        $this->assertSame(false, scRONReal::UNSIGNED);
        $this->assertSame(null, scRONReal::EMPTY);
        $this->assertSame(true, scNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", scNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scNReal::MAX);
        $this->assertSame("0", scNReal::NULL_EQUIVALENT);
    }



    public function test_scUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scUReal::TYPE);
        $this->assertSame(false, scUReal::NULLABLE);
        $this->assertSame(false, scUReal::READONLY);

        $this->assertSame(true, scUReal::IS_CLASS);

        $this->assertSame(false, scUReal::SIGNED);
        $this->assertSame(true, scUReal::UNSIGNED);
        $this->assertSame(null, scUReal::EMPTY);
        $this->assertSame(true, scUReal::HAS_LIMIT);
        $this->assertSame("0", scUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scUReal::MAX);
        $this->assertSame("0", scUReal::NULL_EQUIVALENT);
    }
    public function test_scNUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scNUReal::TYPE);
        $this->assertSame(true, scNUReal::NULLABLE);
        $this->assertSame(false, scNUReal::READONLY);

        $this->assertSame(true, scNUReal::IS_CLASS);

        $this->assertSame(false, scNUReal::SIGNED);
        $this->assertSame(true, scNUReal::UNSIGNED);
        $this->assertSame(null, scNUReal::EMPTY);
        $this->assertSame(true, scNUReal::HAS_LIMIT);
        $this->assertSame("0", scNUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scNUReal::MAX);
        $this->assertSame("0", scNUReal::NULL_EQUIVALENT);
    }
    public function test_scROUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scROUReal::TYPE);
        $this->assertSame(false, scROUReal::NULLABLE);
        $this->assertSame(true, scROUReal::READONLY);

        $this->assertSame(true, scROUReal::IS_CLASS);

        $this->assertSame(false, scROUReal::SIGNED);
        $this->assertSame(true, scROUReal::UNSIGNED);
        $this->assertSame(null, scROUReal::EMPTY);
        $this->assertSame(true, scROUReal::HAS_LIMIT);
        $this->assertSame("0", scROUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scROUReal::MAX);
        $this->assertSame("0", scROUReal::NULL_EQUIVALENT);
    }
    public function test_scRONUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", scRONUReal::TYPE);
        $this->assertSame(true, scRONUReal::NULLABLE);
        $this->assertSame(true, scRONUReal::READONLY);

        $this->assertSame(true, scRONUReal::IS_CLASS);

        $this->assertSame(false, scRONUReal::SIGNED);
        $this->assertSame(true, scRONUReal::UNSIGNED);
        $this->assertSame(null, scRONUReal::EMPTY);
        $this->assertSame(true, scRONUReal::HAS_LIMIT);
        $this->assertSame("0", scRONUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", scRONUReal::MAX);
        $this->assertSame("0", scRONUReal::NULL_EQUIVALENT);
    }









    public function test_method_toString()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scReal::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            10, 0, 56, 127,
            32767,
            2147483647,
            9223372036854775806,
            undefined
        ];
        $expectedValues = [
            "10", "0", "56", "127",
            "32767",
            "2147483647",
            "9223372036854775806",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scUReal::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }


    public function test_method_validate()
    {
        // Numeric Integer Not Nullable Signed
        $validateTrue = [
            "-999999999999999999999999999999999999", 10, 0, 56, "999999999999999999999999999999999999"
        ];
        $validateFalse = [
            "-1000000000000000000000000000000000000", "1000000000000000000000000000000000000"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scReal::validate(null));
        $this->assertTrue(scNReal::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, "999999999999999999999999999999999999"
        ];
        $validateFalse = [
            -1, "1000000000000000000000000000000000000"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scUReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scUReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scUReal::validate(null));
        $this->assertTrue(scNUReal::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            "-999999999999999999999999999999999999", "10", "0", "56", "999999999999999999999999999999999999"
        ];
        $resultConvert = [
            "-999999999999999999999999999999999999", "10", "0", "56", "999999999999999999999999999999999999"
        ];
        $convertFalse = [
            "-1000000000000000000000000000000000000", "1000000000000000000000000000000000000", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scReal::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scReal::parseIfValidate(null));
        $this->assertSame(null, scNReal::parseIfValidate(null));





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            "0", "56", "127", "999999999999999999999999999999999999"
        ];
        $resultConvert = [
            "0", "56", "127", "999999999999999999999999999999999999"
        ];
        $convertFalse = [
            "-1", "1000000000000000000000000000000000000", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scUReal::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scUReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scUReal::parseIfValidate(null));
        $this->assertSame(null, scNUReal::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", scReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", scNReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", scROReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", scRONReal::getMin()->value());
        $this->assertSame("0", scUReal::getMin()->value());
        $this->assertSame("0", scNUReal::getMin()->value());
        $this->assertSame("0", scROUReal::getMin()->value());
        $this->assertSame("0", scRONUReal::getMin()->value());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", scReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scNReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scROReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scRONReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scNUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scROUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", scRONUReal::getMax()->value());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0", scReal::getNullEquivalent()->value());
        $this->assertSame("0", scNReal::getNullEquivalent()->value());
        $this->assertSame("0", scROReal::getNullEquivalent()->value());
        $this->assertSame("0", scRONReal::getNullEquivalent()->value());
        $this->assertSame("0", scUReal::getNullEquivalent()->value());
        $this->assertSame("0", scNUReal::getNullEquivalent()->value());
        $this->assertSame("0", scROUReal::getNullEquivalent()->value());
        $this->assertSame("0", scRONUReal::getNullEquivalent()->value());
    }
}
