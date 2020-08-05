<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\
    {
        stReal, stNReal, stROReal, stRONReal, stUReal, stNUReal, stROUReal, stRONUReal,
    };


require_once __DIR__ . "/../../../phpunit.php";





class stNumericRealTest extends TestCase
{



    public function test_stReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stReal::TYPE);
        $this->assertSame(false, stReal::NULLABLE);
        $this->assertSame(false, stReal::READONLY);

        $this->assertSame(true, stReal::IS_CLASS);

        $this->assertSame(true, stReal::SIGNED);
        $this->assertSame(false, stReal::UNSIGNED);
        $this->assertSame(null, stReal::EMPTY);
        $this->assertSame(true, stReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", stReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stReal::MAX);
        $this->assertSame("0", stReal::NULL_EQUIVALENT);
    }
    public function test_stNReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stNReal::TYPE);
        $this->assertSame(true, stNReal::NULLABLE);
        $this->assertSame(false, stNReal::READONLY);

        $this->assertSame(true, stNReal::IS_CLASS);

        $this->assertSame(true, stNReal::SIGNED);
        $this->assertSame(false, stNReal::UNSIGNED);
        $this->assertSame(null, stNReal::EMPTY);
        $this->assertSame(true, stNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", stNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stNReal::MAX);
        $this->assertSame("0", stNReal::NULL_EQUIVALENT);
    }
    public function test_stROReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stROReal::TYPE);
        $this->assertSame(false, stROReal::NULLABLE);
        $this->assertSame(true, stROReal::READONLY);

        $this->assertSame(true, stROReal::IS_CLASS);

        $this->assertSame(true, stROReal::SIGNED);
        $this->assertSame(false, stROReal::UNSIGNED);
        $this->assertSame(null, stROReal::EMPTY);
        $this->assertSame(true, stNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", stNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stNReal::MAX);
        $this->assertSame("0", stNReal::NULL_EQUIVALENT);
    }
    public function test_stRONReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stRONReal::TYPE);
        $this->assertSame(true, stRONReal::NULLABLE);
        $this->assertSame(true, stRONReal::READONLY);

        $this->assertSame(true, stRONReal::IS_CLASS);

        $this->assertSame(true, stRONReal::SIGNED);
        $this->assertSame(false, stRONReal::UNSIGNED);
        $this->assertSame(null, stRONReal::EMPTY);
        $this->assertSame(true, stNReal::HAS_LIMIT);
        $this->assertSame("-999999999999999999999999999999999999", stNReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stNReal::MAX);
        $this->assertSame("0", stNReal::NULL_EQUIVALENT);
    }



    public function test_stUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stUReal::TYPE);
        $this->assertSame(false, stUReal::NULLABLE);
        $this->assertSame(false, stUReal::READONLY);

        $this->assertSame(true, stUReal::IS_CLASS);

        $this->assertSame(false, stUReal::SIGNED);
        $this->assertSame(true, stUReal::UNSIGNED);
        $this->assertSame(null, stUReal::EMPTY);
        $this->assertSame(true, stUReal::HAS_LIMIT);
        $this->assertSame("0", stUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stUReal::MAX);
        $this->assertSame("0", stUReal::NULL_EQUIVALENT);
    }
    public function test_stNUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stNUReal::TYPE);
        $this->assertSame(true, stNUReal::NULLABLE);
        $this->assertSame(false, stNUReal::READONLY);

        $this->assertSame(true, stNUReal::IS_CLASS);

        $this->assertSame(false, stNUReal::SIGNED);
        $this->assertSame(true, stNUReal::UNSIGNED);
        $this->assertSame(null, stNUReal::EMPTY);
        $this->assertSame(true, stNUReal::HAS_LIMIT);
        $this->assertSame("0", stNUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stNUReal::MAX);
        $this->assertSame("0", stNUReal::NULL_EQUIVALENT);
    }
    public function test_stROUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stROUReal::TYPE);
        $this->assertSame(false, stROUReal::NULLABLE);
        $this->assertSame(true, stROUReal::READONLY);

        $this->assertSame(true, stROUReal::IS_CLASS);

        $this->assertSame(false, stROUReal::SIGNED);
        $this->assertSame(true, stROUReal::UNSIGNED);
        $this->assertSame(null, stROUReal::EMPTY);
        $this->assertSame(true, stROUReal::HAS_LIMIT);
        $this->assertSame("0", stROUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stROUReal::MAX);
        $this->assertSame("0", stROUReal::NULL_EQUIVALENT);
    }
    public function test_stRONUReal_constants()
    {
        $this->assertSame("AeonDigital\Objects\Realtype", stRONUReal::TYPE);
        $this->assertSame(true, stRONUReal::NULLABLE);
        $this->assertSame(true, stRONUReal::READONLY);

        $this->assertSame(true, stRONUReal::IS_CLASS);

        $this->assertSame(false, stRONUReal::SIGNED);
        $this->assertSame(true, stRONUReal::UNSIGNED);
        $this->assertSame(null, stRONUReal::EMPTY);
        $this->assertSame(true, stRONUReal::HAS_LIMIT);
        $this->assertSame("0", stRONUReal::MIN);
        $this->assertSame("999999999999999999999999999999999999", stRONUReal::MAX);
        $this->assertSame("0", stRONUReal::NULL_EQUIVALENT);
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
            $result = stReal::toString($originalValues[$i]);
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
            $result = stUReal::toString($originalValues[$i]);
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
            $this->assertTrue(stReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stReal::validate(null));
        $this->assertTrue(stNReal::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, "999999999999999999999999999999999999"
        ];
        $validateFalse = [
            -1, "1000000000000000000000000000000000000"
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stUReal::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stUReal::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stUReal::validate(null));
        $this->assertTrue(stNUReal::validate(null));
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
            $result = stReal::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stReal::parseIfValidate(null));
        $this->assertSame(null, stNReal::parseIfValidate(null));





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
            $result = stUReal::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->value(), $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stUReal::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stUReal::parseIfValidate(null));
        $this->assertSame(null, stNUReal::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("-999999999999999999999999999999999999", stReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", stNReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", stROReal::getMin()->value());
        $this->assertSame("-999999999999999999999999999999999999", stRONReal::getMin()->value());
        $this->assertSame("0", stUReal::getMin()->value());
        $this->assertSame("0", stNUReal::getMin()->value());
        $this->assertSame("0", stROUReal::getMin()->value());
        $this->assertSame("0", stRONUReal::getMin()->value());
    }



    public function test_method_max()
    {
        $this->assertSame("999999999999999999999999999999999999", stReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stNReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stROReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stRONReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stNUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stROUReal::getMax()->value());
        $this->assertSame("999999999999999999999999999999999999", stRONUReal::getMax()->value());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0", stReal::getNullEquivalent()->value());
        $this->assertSame("0", stNReal::getNullEquivalent()->value());
        $this->assertSame("0", stROReal::getNullEquivalent()->value());
        $this->assertSame("0", stRONReal::getNullEquivalent()->value());
        $this->assertSame("0", stUReal::getNullEquivalent()->value());
        $this->assertSame("0", stNUReal::getNullEquivalent()->value());
        $this->assertSame("0", stROUReal::getNullEquivalent()->value());
        $this->assertSame("0", stRONUReal::getNullEquivalent()->value());
    }
}
