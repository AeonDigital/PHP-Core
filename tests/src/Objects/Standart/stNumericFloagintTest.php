<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\
    {
        stFloat, stNFloat, stROFloat, stRONFloat, stUFloat, stNUFloat, stROUFloat, stRONUFloat,
        stDouble, stNDouble, stRODouble, stRONDouble, stUDouble, stNUDouble, stROUDouble, stRONUDouble,
    };


require_once __DIR__ . "/../../../phpunit.php";





class stNumericFloagintTest extends TestCase
{



    public function test_stFloat_constants()
    {
        $this->assertSame("Float", stFloat::TYPE);
        $this->assertSame(false, stFloat::NULLABLE);
        $this->assertSame(false, stFloat::READONLY);

        $this->assertSame(false, stFloat::IS_CLASS);

        $this->assertSame(true, stFloat::SIGNED);
        $this->assertSame(false, stFloat::UNSIGNED);
        $this->assertSame(null, stFloat::EMPTY);
        $this->assertSame(true, stFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", stFloat::MIN);
        $this->assertSame("2147483647", stFloat::MAX);
        $this->assertSame("0", stFloat::NULL_EQUIVALENT);
    }
    public function test_stNFloat_constants()
    {
        $this->assertSame("Float", stNFloat::TYPE);
        $this->assertSame(true, stNFloat::NULLABLE);
        $this->assertSame(false, stNFloat::READONLY);

        $this->assertSame(false, stNFloat::IS_CLASS);

        $this->assertSame(true, stNFloat::SIGNED);
        $this->assertSame(false, stNFloat::UNSIGNED);
        $this->assertSame(null, stNFloat::EMPTY);
        $this->assertSame(true, stNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", stNFloat::MIN);
        $this->assertSame("2147483647", stNFloat::MAX);
        $this->assertSame("0", stNFloat::NULL_EQUIVALENT);
    }
    public function test_stROFloat_constants()
    {
        $this->assertSame("Float", stROFloat::TYPE);
        $this->assertSame(false, stROFloat::NULLABLE);
        $this->assertSame(true, stROFloat::READONLY);

        $this->assertSame(false, stROFloat::IS_CLASS);

        $this->assertSame(true, stROFloat::SIGNED);
        $this->assertSame(false, stROFloat::UNSIGNED);
        $this->assertSame(null, stROFloat::EMPTY);
        $this->assertSame(true, stNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", stNFloat::MIN);
        $this->assertSame("2147483647", stNFloat::MAX);
        $this->assertSame("0", stNFloat::NULL_EQUIVALENT);
    }
    public function test_stRONFloat_constants()
    {
        $this->assertSame("Float", stRONFloat::TYPE);
        $this->assertSame(true, stRONFloat::NULLABLE);
        $this->assertSame(true, stRONFloat::READONLY);

        $this->assertSame(false, stRONFloat::IS_CLASS);

        $this->assertSame(true, stRONFloat::SIGNED);
        $this->assertSame(false, stRONFloat::UNSIGNED);
        $this->assertSame(null, stRONFloat::EMPTY);
        $this->assertSame(true, stNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", stNFloat::MIN);
        $this->assertSame("2147483647", stNFloat::MAX);
        $this->assertSame("0", stNFloat::NULL_EQUIVALENT);
    }



    public function test_stUFloat_constants()
    {
        $this->assertSame("Float", stUFloat::TYPE);
        $this->assertSame(false, stUFloat::NULLABLE);
        $this->assertSame(false, stUFloat::READONLY);

        $this->assertSame(false, stUFloat::IS_CLASS);

        $this->assertSame(false, stUFloat::SIGNED);
        $this->assertSame(true, stUFloat::UNSIGNED);
        $this->assertSame(null, stUFloat::EMPTY);
        $this->assertSame(true, stUFloat::HAS_LIMIT);
        $this->assertSame("0", stUFloat::MIN);
        $this->assertSame("4294967295", stUFloat::MAX);
        $this->assertSame("0", stUFloat::NULL_EQUIVALENT);
    }
    public function test_stNUFloat_constants()
    {
        $this->assertSame("Float", stNUFloat::TYPE);
        $this->assertSame(true, stNUFloat::NULLABLE);
        $this->assertSame(false, stNUFloat::READONLY);

        $this->assertSame(false, stNUFloat::IS_CLASS);

        $this->assertSame(false, stNUFloat::SIGNED);
        $this->assertSame(true, stNUFloat::UNSIGNED);
        $this->assertSame(null, stNUFloat::EMPTY);
        $this->assertSame(true, stNUFloat::HAS_LIMIT);
        $this->assertSame("0", stNUFloat::MIN);
        $this->assertSame("4294967295", stNUFloat::MAX);
        $this->assertSame("0", stNUFloat::NULL_EQUIVALENT);
    }
    public function test_stROUFloat_constants()
    {
        $this->assertSame("Float", stROUFloat::TYPE);
        $this->assertSame(false, stROUFloat::NULLABLE);
        $this->assertSame(true, stROUFloat::READONLY);

        $this->assertSame(false, stROUFloat::IS_CLASS);

        $this->assertSame(false, stROUFloat::SIGNED);
        $this->assertSame(true, stROUFloat::UNSIGNED);
        $this->assertSame(null, stROUFloat::EMPTY);
        $this->assertSame(true, stROUFloat::HAS_LIMIT);
        $this->assertSame("0", stROUFloat::MIN);
        $this->assertSame("4294967295", stROUFloat::MAX);
        $this->assertSame("0", stROUFloat::NULL_EQUIVALENT);
    }
    public function test_stRONUFloat_constants()
    {
        $this->assertSame("Float", stRONUFloat::TYPE);
        $this->assertSame(true, stRONUFloat::NULLABLE);
        $this->assertSame(true, stRONUFloat::READONLY);

        $this->assertSame(false, stRONUFloat::IS_CLASS);

        $this->assertSame(false, stRONUFloat::SIGNED);
        $this->assertSame(true, stRONUFloat::UNSIGNED);
        $this->assertSame(null, stRONUFloat::EMPTY);
        $this->assertSame(true, stRONUFloat::HAS_LIMIT);
        $this->assertSame("0", stRONUFloat::MIN);
        $this->assertSame("4294967295", stRONUFloat::MAX);
        $this->assertSame("0", stRONUFloat::NULL_EQUIVALENT);
    }





    public function test_stDouble_constants()
    {
        $this->assertSame("Double", stDouble::TYPE);
        $this->assertSame(false, stDouble::NULLABLE);
        $this->assertSame(false, stDouble::READONLY);

        $this->assertSame(false, stDouble::IS_CLASS);

        $this->assertSame(true, stDouble::SIGNED);
        $this->assertSame(false, stDouble::UNSIGNED);
        $this->assertSame(null, stDouble::EMPTY);
        $this->assertSame(true, stDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stDouble::MIN);
        $this->assertSame("9223372036854775806", stDouble::MAX);
        $this->assertSame("0", stDouble::NULL_EQUIVALENT);
    }
    public function test_stNDouble_constants()
    {
        $this->assertSame("Double", stNDouble::TYPE);
        $this->assertSame(true, stNDouble::NULLABLE);
        $this->assertSame(false, stNDouble::READONLY);

        $this->assertSame(false, stNDouble::IS_CLASS);

        $this->assertSame(true, stNDouble::SIGNED);
        $this->assertSame(false, stNDouble::UNSIGNED);
        $this->assertSame(null, stNDouble::EMPTY);
        $this->assertSame(true, stNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNDouble::MIN);
        $this->assertSame("9223372036854775806", stNDouble::MAX);
        $this->assertSame("0", stNDouble::NULL_EQUIVALENT);
    }
    public function test_stRODouble_constants()
    {
        $this->assertSame("Double", stRODouble::TYPE);
        $this->assertSame(false, stRODouble::NULLABLE);
        $this->assertSame(true, stRODouble::READONLY);

        $this->assertSame(false, stRODouble::IS_CLASS);

        $this->assertSame(true, stRODouble::SIGNED);
        $this->assertSame(false, stRODouble::UNSIGNED);
        $this->assertSame(null, stRODouble::EMPTY);
        $this->assertSame(true, stNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNDouble::MIN);
        $this->assertSame("9223372036854775806", stNDouble::MAX);
        $this->assertSame("0", stNDouble::NULL_EQUIVALENT);
    }
    public function test_stRONDouble_constants()
    {
        $this->assertSame("Double", stRONDouble::TYPE);
        $this->assertSame(true, stRONDouble::NULLABLE);
        $this->assertSame(true, stRONDouble::READONLY);

        $this->assertSame(false, stRONDouble::IS_CLASS);

        $this->assertSame(true, stRONDouble::SIGNED);
        $this->assertSame(false, stRONDouble::UNSIGNED);
        $this->assertSame(null, stRONDouble::EMPTY);
        $this->assertSame(true, stNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNDouble::MIN);
        $this->assertSame("9223372036854775806", stNDouble::MAX);
        $this->assertSame("0", stNDouble::NULL_EQUIVALENT);
    }



    public function test_stUDouble_constants()
    {
        $this->assertSame("Double", stUDouble::TYPE);
        $this->assertSame(false, stUDouble::NULLABLE);
        $this->assertSame(false, stUDouble::READONLY);

        $this->assertSame(false, stUDouble::IS_CLASS);

        $this->assertSame(false, stUDouble::SIGNED);
        $this->assertSame(true, stUDouble::UNSIGNED);
        $this->assertSame(null, stUDouble::EMPTY);
        $this->assertSame(true, stUDouble::HAS_LIMIT);
        $this->assertSame("0", stUDouble::MIN);
        $this->assertSame("9223372036854775806", stUDouble::MAX);
        $this->assertSame("0", stUDouble::NULL_EQUIVALENT);
    }
    public function test_stNUDouble_constants()
    {
        $this->assertSame("Double", stNUDouble::TYPE);
        $this->assertSame(true, stNUDouble::NULLABLE);
        $this->assertSame(false, stNUDouble::READONLY);

        $this->assertSame(false, stNUDouble::IS_CLASS);

        $this->assertSame(false, stNUDouble::SIGNED);
        $this->assertSame(true, stNUDouble::UNSIGNED);
        $this->assertSame(null, stNUDouble::EMPTY);
        $this->assertSame(true, stNUDouble::HAS_LIMIT);
        $this->assertSame("0", stNUDouble::MIN);
        $this->assertSame("9223372036854775806", stNUDouble::MAX);
        $this->assertSame("0", stNUDouble::NULL_EQUIVALENT);
    }
    public function test_stROUDouble_constants()
    {
        $this->assertSame("Double", stROUDouble::TYPE);
        $this->assertSame(false, stROUDouble::NULLABLE);
        $this->assertSame(true, stROUDouble::READONLY);

        $this->assertSame(false, stROUDouble::IS_CLASS);

        $this->assertSame(false, stROUDouble::SIGNED);
        $this->assertSame(true, stROUDouble::UNSIGNED);
        $this->assertSame(null, stROUDouble::EMPTY);
        $this->assertSame(true, stROUDouble::HAS_LIMIT);
        $this->assertSame("0", stROUDouble::MIN);
        $this->assertSame("9223372036854775806", stROUDouble::MAX);
        $this->assertSame("0", stROUDouble::NULL_EQUIVALENT);
    }
    public function test_stRONUDouble_constants()
    {
        $this->assertSame("Double", stRONUDouble::TYPE);
        $this->assertSame(true, stRONUDouble::NULLABLE);
        $this->assertSame(true, stRONUDouble::READONLY);

        $this->assertSame(false, stRONUDouble::IS_CLASS);

        $this->assertSame(false, stRONUDouble::SIGNED);
        $this->assertSame(true, stRONUDouble::UNSIGNED);
        $this->assertSame(null, stRONUDouble::EMPTY);
        $this->assertSame(true, stRONUDouble::HAS_LIMIT);
        $this->assertSame("0", stRONUDouble::MIN);
        $this->assertSame("9223372036854775806", stRONUDouble::MAX);
        $this->assertSame("0", stRONUDouble::NULL_EQUIVALENT);
    }










    public function test_method_toString()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            -2147483648, 10, 0, 56, 2147483647,
            -2147483649, 2147483648, undefined
        ];
        $expectedValues = [
            "-2147483648", "10", "0", "56", "2147483647",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stFloat::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            0, 56, 127, 4294967295, -1, 4294967296, undefined
        ];
        $expectedValues = [
            "0", "56", "127", "4294967295", null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stUFloat::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }


    public function test_method_validate()
    {
        // Numeric Integer Not Nullable Signed
        $validateTrue = [
            -2147483648, 10, 0, 56, 2147483647
        ];
        $validateFalse = [
            -2147483649, 2147483648
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stFloat::validate(null));
        $this->assertTrue(stNFloat::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 4294967295
        ];
        $validateFalse = [
            -1, 4294967296
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stUFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stUFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stUFloat::validate(null));
        $this->assertTrue(stNUFloat::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            "-2147483648", "10", "0", "56", "2147483647"
        ];
        $resultConvert = [
            -2147483648.0, 10.0, 0.0, 56.0, 2147483647.0
        ];
        $convertFalse = [
            "-2147483649", "2147483648", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stFloat::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stFloat::parseIfValidate(null));
        $this->assertSame(null, stNFloat::parseIfValidate(null));





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            "0", "56", "127", "4294967295"
        ];
        $resultConvert = [
            0.0, 56.0, 127.0, 4294967295.0
        ];
        $convertFalse = [
            "-1", "4294967296", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stUFloat::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stUFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stUFloat::parseIfValidate(null));
        $this->assertSame(null, stNUFloat::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-2147483648.0, stFloat::getMin());
        $this->assertSame(-2147483648.0, stNFloat::getMin());
        $this->assertSame(-2147483648.0, stROFloat::getMin());
        $this->assertSame(-2147483648.0, stRONFloat::getMin());
        $this->assertSame(0.0, stUFloat::getMin());
        $this->assertSame(0.0, stNUFloat::getMin());
        $this->assertSame(0.0, stROUFloat::getMin());
        $this->assertSame(0.0, stRONUFloat::getMin());


        $this->assertSame(-9223372036854775807.0, stDouble::getMin());
        $this->assertSame(-9223372036854775807.0, stNDouble::getMin());
        $this->assertSame(-9223372036854775807.0, stRODouble::getMin());
        $this->assertSame(-9223372036854775807.0, stRONDouble::getMin());
        $this->assertSame(0.0, stUDouble::getMin());
        $this->assertSame(0.0, stNUDouble::getMin());
        $this->assertSame(0.0, stROUDouble::getMin());
        $this->assertSame(0.0, stRONUDouble::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(2147483647.0, stFloat::getMax());
        $this->assertSame(2147483647.0, stNFloat::getMax());
        $this->assertSame(2147483647.0, stROFloat::getMax());
        $this->assertSame(2147483647.0, stRONFloat::getMax());
        $this->assertSame(4294967295.0, stUFloat::getMax());
        $this->assertSame(4294967295.0, stNUFloat::getMax());
        $this->assertSame(4294967295.0, stROUFloat::getMax());
        $this->assertSame(4294967295.0, stRONUFloat::getMax());


        $this->assertSame(9223372036854775806.0, stDouble::getMax());
        $this->assertSame(9223372036854775806.0, stNDouble::getMax());
        $this->assertSame(9223372036854775806.0, stRODouble::getMax());
        $this->assertSame(9223372036854775806.0, stRONDouble::getMax());
        $this->assertSame(9223372036854775806.0, stUDouble::getMax());
        $this->assertSame(9223372036854775806.0, stNUDouble::getMax());
        $this->assertSame(9223372036854775806.0, stROUDouble::getMax());
        $this->assertSame(9223372036854775806.0, stRONUDouble::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, stFloat::getNullEquivalent());
        $this->assertSame(0.0, stNFloat::getNullEquivalent());
        $this->assertSame(0.0, stROFloat::getNullEquivalent());
        $this->assertSame(0.0, stRONFloat::getNullEquivalent());
        $this->assertSame(0.0, stUFloat::getNullEquivalent());
        $this->assertSame(0.0, stNUFloat::getNullEquivalent());
        $this->assertSame(0.0, stROUFloat::getNullEquivalent());
        $this->assertSame(0.0, stRONUFloat::getNullEquivalent());


        $this->assertSame(0.0, stDouble::getNullEquivalent());
        $this->assertSame(0.0, stNDouble::getNullEquivalent());
        $this->assertSame(0.0, stRODouble::getNullEquivalent());
        $this->assertSame(0.0, stRONDouble::getNullEquivalent());
        $this->assertSame(0.0, stUDouble::getNullEquivalent());
        $this->assertSame(0.0, stNUDouble::getNullEquivalent());
        $this->assertSame(0.0, stROUDouble::getNullEquivalent());
        $this->assertSame(0.0, stRONUDouble::getNullEquivalent());
    }
}
