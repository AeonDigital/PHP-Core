<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\
    {
        tReal, tNReal, tROReal, tRONReal, tUReal, tNUReal, tROUReal, tRONUReal,
    };


require_once __DIR__ . "/../../../phpunit.php";





class tNumericRealTest extends TestCase
{



    public function test_tReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tReal::TYPE);
        $this->assertSame(false, tReal::NULLABLE);
        $this->assertSame(false, tReal::READONLY);

        $this->assertSame(true, tReal::IS_CLASS);

        $this->assertSame(true, tReal::SIGNED);
        $this->assertSame(false, tReal::UNSIGNED);
        $this->assertSame(null, tReal::EMPTY);
        $this->assertSame(true, tReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", tReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tReal::MAX);
        $this->assertSame("0", tReal::NULL_EQUIVALENT);
    }
    public function test_tNReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tNReal::TYPE);
        $this->assertSame(true, tNReal::NULLABLE);
        $this->assertSame(false, tNReal::READONLY);

        $this->assertSame(true, tNReal::IS_CLASS);

        $this->assertSame(true, tNReal::SIGNED);
        $this->assertSame(false, tNReal::UNSIGNED);
        $this->assertSame(null, tNReal::EMPTY);
        $this->assertSame(true, tNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", tNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tNReal::MAX);
        $this->assertSame("0", tNReal::NULL_EQUIVALENT);
    }
    public function test_tROReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tROReal::TYPE);
        $this->assertSame(false, tROReal::NULLABLE);
        $this->assertSame(true, tROReal::READONLY);

        $this->assertSame(true, tROReal::IS_CLASS);

        $this->assertSame(true, tROReal::SIGNED);
        $this->assertSame(false, tROReal::UNSIGNED);
        $this->assertSame(null, tROReal::EMPTY);
        $this->assertSame(true, tNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", tNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tNReal::MAX);
        $this->assertSame("0", tNReal::NULL_EQUIVALENT);
    }
    public function test_tRONReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tRONReal::TYPE);
        $this->assertSame(true, tRONReal::NULLABLE);
        $this->assertSame(true, tRONReal::READONLY);

        $this->assertSame(true, tRONReal::IS_CLASS);

        $this->assertSame(true, tRONReal::SIGNED);
        $this->assertSame(false, tRONReal::UNSIGNED);
        $this->assertSame(null, tRONReal::EMPTY);
        $this->assertSame(true, tNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", tNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tNReal::MAX);
        $this->assertSame("0", tNReal::NULL_EQUIVALENT);
    }



    public function test_tUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tUReal::TYPE);
        $this->assertSame(false, tUReal::NULLABLE);
        $this->assertSame(false, tUReal::READONLY);

        $this->assertSame(true, tUReal::IS_CLASS);

        $this->assertSame(false, tUReal::SIGNED);
        $this->assertSame(true, tUReal::UNSIGNED);
        $this->assertSame(null, tUReal::EMPTY);
        $this->assertSame(true, tUReal::HAS_LIMIT);
        $this->assertSame("0", tUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tUReal::MAX);
        $this->assertSame("0", tUReal::NULL_EQUIVALENT);
    }
    public function test_tNUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tNUReal::TYPE);
        $this->assertSame(true, tNUReal::NULLABLE);
        $this->assertSame(false, tNUReal::READONLY);

        $this->assertSame(true, tNUReal::IS_CLASS);

        $this->assertSame(false, tNUReal::SIGNED);
        $this->assertSame(true, tNUReal::UNSIGNED);
        $this->assertSame(null, tNUReal::EMPTY);
        $this->assertSame(true, tNUReal::HAS_LIMIT);
        $this->assertSame("0", tNUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tNUReal::MAX);
        $this->assertSame("0", tNUReal::NULL_EQUIVALENT);
    }
    public function test_tROUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tROUReal::TYPE);
        $this->assertSame(false, tROUReal::NULLABLE);
        $this->assertSame(true, tROUReal::READONLY);

        $this->assertSame(true, tROUReal::IS_CLASS);

        $this->assertSame(false, tROUReal::SIGNED);
        $this->assertSame(true, tROUReal::UNSIGNED);
        $this->assertSame(null, tROUReal::EMPTY);
        $this->assertSame(true, tROUReal::HAS_LIMIT);
        $this->assertSame("0", tROUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tROUReal::MAX);
        $this->assertSame("0", tROUReal::NULL_EQUIVALENT);
    }
    public function test_tRONUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", tRONUReal::TYPE);
        $this->assertSame(true, tRONUReal::NULLABLE);
        $this->assertSame(true, tRONUReal::READONLY);

        $this->assertSame(true, tRONUReal::IS_CLASS);

        $this->assertSame(false, tRONUReal::SIGNED);
        $this->assertSame(true, tRONUReal::UNSIGNED);
        $this->assertSame(null, tRONUReal::EMPTY);
        $this->assertSame(true, tRONUReal::HAS_LIMIT);
        $this->assertSame("0", tRONUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", tRONUReal::MAX);
        $this->assertSame("0", tRONUReal::NULL_EQUIVALENT);
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
            $result = tReal::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            $result = tUReal::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            $this->assertTrue(tReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tReal::validate(null));
        $this->assertTrue(tNReal::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, "999999999999999999999999999999999999"
        ];
        $validateFalse = [
            -1, "1000000000000000000000000000000000000"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tUReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tUReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tUReal::validate(null));
        $this->assertTrue(tNUReal::validate(null));
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
            $result = tReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tReal::parseIfValidate(null));
        $this->assertSame(null, tNReal::parseIfValidate(null));





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
            $result = tUReal::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tUReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tUReal::parseIfValidate(null));
        $this->assertSame(null, tNUReal::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", tReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", tNReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", tROReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", tRONReal::getMin()->value());
        $this->assertSame("0", tUReal::getMin()->value());
        $this->assertSame("0", tNUReal::getMin()->value());
        $this->assertSame("0", tROUReal::getMin()->value());
        $this->assertSame("0", tRONUReal::getMin()->value());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", tReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tNReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tROReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tRONReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tNUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tROUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", tRONUReal::getMax()->value());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0", tReal::getNullEquivalent()->value());
        $this->assertSame("0", tNReal::getNullEquivalent()->value());
        $this->assertSame("0", tROReal::getNullEquivalent()->value());
        $this->assertSame("0", tRONReal::getNullEquivalent()->value());
        $this->assertSame("0", tUReal::getNullEquivalent()->value());
        $this->assertSame("0", tNUReal::getNullEquivalent()->value());
        $this->assertSame("0", tROUReal::getNullEquivalent()->value());
        $this->assertSame("0", tRONUReal::getNullEquivalent()->value());
    }
}
