<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\
    {
        scFloat, scNFloat, scROFloat, scRONFloat, scUFloat, scNUFloat, scROUFloat, scRONUFloat,
        scDouble, scNDouble, scRODouble, scRONDouble, scUDouble, scNUDouble, scROUDouble, scRONUDouble,
    };


require_once __DIR__ . "/../../../../phpunit.php";





class scNumericFloagintTest extends TestCase
{



    public function test_scFloat_constants()
    {
        $this->assertSame("Float", scFloat::TYPE);
        $this->assertSame(false, scFloat::NULLABLE);
        $this->assertSame(false, scFloat::READONLY);

        $this->assertSame(false, scFloat::IS_CLASS);

        $this->assertSame(true, scFloat::SIGNED);
        $this->assertSame(false, scFloat::UNSIGNED);
        $this->assertSame(null, scFloat::EMPTY);
        $this->assertSame(true, scFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", scFloat::MIN);
        $this->assertSame("2147483647", scFloat::MAX);
        $this->assertSame("0", scFloat::NULL_EQUIVALENT);
    }
    public function test_scNFloat_constants()
    {
        $this->assertSame("Float", scNFloat::TYPE);
        $this->assertSame(true, scNFloat::NULLABLE);
        $this->assertSame(false, scNFloat::READONLY);

        $this->assertSame(false, scNFloat::IS_CLASS);

        $this->assertSame(true, scNFloat::SIGNED);
        $this->assertSame(false, scNFloat::UNSIGNED);
        $this->assertSame(null, scNFloat::EMPTY);
        $this->assertSame(true, scNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", scNFloat::MIN);
        $this->assertSame("2147483647", scNFloat::MAX);
        $this->assertSame("0", scNFloat::NULL_EQUIVALENT);
    }
    public function test_scROFloat_constants()
    {
        $this->assertSame("Float", scROFloat::TYPE);
        $this->assertSame(false, scROFloat::NULLABLE);
        $this->assertSame(true, scROFloat::READONLY);

        $this->assertSame(false, scROFloat::IS_CLASS);

        $this->assertSame(true, scROFloat::SIGNED);
        $this->assertSame(false, scROFloat::UNSIGNED);
        $this->assertSame(null, scROFloat::EMPTY);
        $this->assertSame(true, scNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", scNFloat::MIN);
        $this->assertSame("2147483647", scNFloat::MAX);
        $this->assertSame("0", scNFloat::NULL_EQUIVALENT);
    }
    public function test_scRONFloat_constants()
    {
        $this->assertSame("Float", scRONFloat::TYPE);
        $this->assertSame(true, scRONFloat::NULLABLE);
        $this->assertSame(true, scRONFloat::READONLY);

        $this->assertSame(false, scRONFloat::IS_CLASS);

        $this->assertSame(true, scRONFloat::SIGNED);
        $this->assertSame(false, scRONFloat::UNSIGNED);
        $this->assertSame(null, scRONFloat::EMPTY);
        $this->assertSame(true, scNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", scNFloat::MIN);
        $this->assertSame("2147483647", scNFloat::MAX);
        $this->assertSame("0", scNFloat::NULL_EQUIVALENT);
    }



    public function test_scUFloat_constants()
    {
        $this->assertSame("Float", scUFloat::TYPE);
        $this->assertSame(false, scUFloat::NULLABLE);
        $this->assertSame(false, scUFloat::READONLY);

        $this->assertSame(false, scUFloat::IS_CLASS);

        $this->assertSame(false, scUFloat::SIGNED);
        $this->assertSame(true, scUFloat::UNSIGNED);
        $this->assertSame(null, scUFloat::EMPTY);
        $this->assertSame(true, scUFloat::HAS_LIMIT);
        $this->assertSame("0", scUFloat::MIN);
        $this->assertSame("4294967295", scUFloat::MAX);
        $this->assertSame("0", scUFloat::NULL_EQUIVALENT);
    }
    public function test_scNUFloat_constants()
    {
        $this->assertSame("Float", scNUFloat::TYPE);
        $this->assertSame(true, scNUFloat::NULLABLE);
        $this->assertSame(false, scNUFloat::READONLY);

        $this->assertSame(false, scNUFloat::IS_CLASS);

        $this->assertSame(false, scNUFloat::SIGNED);
        $this->assertSame(true, scNUFloat::UNSIGNED);
        $this->assertSame(null, scNUFloat::EMPTY);
        $this->assertSame(true, scNUFloat::HAS_LIMIT);
        $this->assertSame("0", scNUFloat::MIN);
        $this->assertSame("4294967295", scNUFloat::MAX);
        $this->assertSame("0", scNUFloat::NULL_EQUIVALENT);
    }
    public function test_scROUFloat_constants()
    {
        $this->assertSame("Float", scROUFloat::TYPE);
        $this->assertSame(false, scROUFloat::NULLABLE);
        $this->assertSame(true, scROUFloat::READONLY);

        $this->assertSame(false, scROUFloat::IS_CLASS);

        $this->assertSame(false, scROUFloat::SIGNED);
        $this->assertSame(true, scROUFloat::UNSIGNED);
        $this->assertSame(null, scROUFloat::EMPTY);
        $this->assertSame(true, scROUFloat::HAS_LIMIT);
        $this->assertSame("0", scROUFloat::MIN);
        $this->assertSame("4294967295", scROUFloat::MAX);
        $this->assertSame("0", scROUFloat::NULL_EQUIVALENT);
    }
    public function test_scRONUFloat_constants()
    {
        $this->assertSame("Float", scRONUFloat::TYPE);
        $this->assertSame(true, scRONUFloat::NULLABLE);
        $this->assertSame(true, scRONUFloat::READONLY);

        $this->assertSame(false, scRONUFloat::IS_CLASS);

        $this->assertSame(false, scRONUFloat::SIGNED);
        $this->assertSame(true, scRONUFloat::UNSIGNED);
        $this->assertSame(null, scRONUFloat::EMPTY);
        $this->assertSame(true, scRONUFloat::HAS_LIMIT);
        $this->assertSame("0", scRONUFloat::MIN);
        $this->assertSame("4294967295", scRONUFloat::MAX);
        $this->assertSame("0", scRONUFloat::NULL_EQUIVALENT);
    }





    public function test_scDouble_constants()
    {
        $this->assertSame("Double", scDouble::TYPE);
        $this->assertSame(false, scDouble::NULLABLE);
        $this->assertSame(false, scDouble::READONLY);

        $this->assertSame(false, scDouble::IS_CLASS);

        $this->assertSame(true, scDouble::SIGNED);
        $this->assertSame(false, scDouble::UNSIGNED);
        $this->assertSame(null, scDouble::EMPTY);
        $this->assertSame(true, scDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scDouble::MIN);
        $this->assertSame("9223372036854775806", scDouble::MAX);
        $this->assertSame("0", scDouble::NULL_EQUIVALENT);
    }
    public function test_scNDouble_constants()
    {
        $this->assertSame("Double", scNDouble::TYPE);
        $this->assertSame(true, scNDouble::NULLABLE);
        $this->assertSame(false, scNDouble::READONLY);

        $this->assertSame(false, scNDouble::IS_CLASS);

        $this->assertSame(true, scNDouble::SIGNED);
        $this->assertSame(false, scNDouble::UNSIGNED);
        $this->assertSame(null, scNDouble::EMPTY);
        $this->assertSame(true, scNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNDouble::MIN);
        $this->assertSame("9223372036854775806", scNDouble::MAX);
        $this->assertSame("0", scNDouble::NULL_EQUIVALENT);
    }
    public function test_scRODouble_constants()
    {
        $this->assertSame("Double", scRODouble::TYPE);
        $this->assertSame(false, scRODouble::NULLABLE);
        $this->assertSame(true, scRODouble::READONLY);

        $this->assertSame(false, scRODouble::IS_CLASS);

        $this->assertSame(true, scRODouble::SIGNED);
        $this->assertSame(false, scRODouble::UNSIGNED);
        $this->assertSame(null, scRODouble::EMPTY);
        $this->assertSame(true, scNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNDouble::MIN);
        $this->assertSame("9223372036854775806", scNDouble::MAX);
        $this->assertSame("0", scNDouble::NULL_EQUIVALENT);
    }
    public function test_scRONDouble_constants()
    {
        $this->assertSame("Double", scRONDouble::TYPE);
        $this->assertSame(true, scRONDouble::NULLABLE);
        $this->assertSame(true, scRONDouble::READONLY);

        $this->assertSame(false, scRONDouble::IS_CLASS);

        $this->assertSame(true, scRONDouble::SIGNED);
        $this->assertSame(false, scRONDouble::UNSIGNED);
        $this->assertSame(null, scRONDouble::EMPTY);
        $this->assertSame(true, scNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNDouble::MIN);
        $this->assertSame("9223372036854775806", scNDouble::MAX);
        $this->assertSame("0", scNDouble::NULL_EQUIVALENT);
    }



    public function test_scUDouble_constants()
    {
        $this->assertSame("Double", scUDouble::TYPE);
        $this->assertSame(false, scUDouble::NULLABLE);
        $this->assertSame(false, scUDouble::READONLY);

        $this->assertSame(false, scUDouble::IS_CLASS);

        $this->assertSame(false, scUDouble::SIGNED);
        $this->assertSame(true, scUDouble::UNSIGNED);
        $this->assertSame(null, scUDouble::EMPTY);
        $this->assertSame(true, scUDouble::HAS_LIMIT);
        $this->assertSame("0", scUDouble::MIN);
        $this->assertSame("9223372036854775806", scUDouble::MAX);
        $this->assertSame("0", scUDouble::NULL_EQUIVALENT);
    }
    public function test_scNUDouble_constants()
    {
        $this->assertSame("Double", scNUDouble::TYPE);
        $this->assertSame(true, scNUDouble::NULLABLE);
        $this->assertSame(false, scNUDouble::READONLY);

        $this->assertSame(false, scNUDouble::IS_CLASS);

        $this->assertSame(false, scNUDouble::SIGNED);
        $this->assertSame(true, scNUDouble::UNSIGNED);
        $this->assertSame(null, scNUDouble::EMPTY);
        $this->assertSame(true, scNUDouble::HAS_LIMIT);
        $this->assertSame("0", scNUDouble::MIN);
        $this->assertSame("9223372036854775806", scNUDouble::MAX);
        $this->assertSame("0", scNUDouble::NULL_EQUIVALENT);
    }
    public function test_scROUDouble_constants()
    {
        $this->assertSame("Double", scROUDouble::TYPE);
        $this->assertSame(false, scROUDouble::NULLABLE);
        $this->assertSame(true, scROUDouble::READONLY);

        $this->assertSame(false, scROUDouble::IS_CLASS);

        $this->assertSame(false, scROUDouble::SIGNED);
        $this->assertSame(true, scROUDouble::UNSIGNED);
        $this->assertSame(null, scROUDouble::EMPTY);
        $this->assertSame(true, scROUDouble::HAS_LIMIT);
        $this->assertSame("0", scROUDouble::MIN);
        $this->assertSame("9223372036854775806", scROUDouble::MAX);
        $this->assertSame("0", scROUDouble::NULL_EQUIVALENT);
    }
    public function test_scRONUDouble_constants()
    {
        $this->assertSame("Double", scRONUDouble::TYPE);
        $this->assertSame(true, scRONUDouble::NULLABLE);
        $this->assertSame(true, scRONUDouble::READONLY);

        $this->assertSame(false, scRONUDouble::IS_CLASS);

        $this->assertSame(false, scRONUDouble::SIGNED);
        $this->assertSame(true, scRONUDouble::UNSIGNED);
        $this->assertSame(null, scRONUDouble::EMPTY);
        $this->assertSame(true, scRONUDouble::HAS_LIMIT);
        $this->assertSame("0", scRONUDouble::MIN);
        $this->assertSame("9223372036854775806", scRONUDouble::MAX);
        $this->assertSame("0", scRONUDouble::NULL_EQUIVALENT);
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
            $result = scFloat::toString($originalValues[$i]);
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
            $result = scUFloat::toString($originalValues[$i]);
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
            $this->assertTrue(scFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scFloat::validate(null));
        $this->assertTrue(scNFloat::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 4294967295
        ];
        $validateFalse = [
            -1, 4294967296
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scUFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scUFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scUFloat::validate(null));
        $this->assertTrue(scNUFloat::validate(null));
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
            $result = scFloat::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scFloat::parseIfValidate(null));
        $this->assertSame(null, scNFloat::parseIfValidate(null));





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
            $result = scUFloat::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scUFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scUFloat::parseIfValidate(null));
        $this->assertSame(null, scNUFloat::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-2147483648.0, scFloat::getMin());
        $this->assertSame(-2147483648.0, scNFloat::getMin());
        $this->assertSame(-2147483648.0, scROFloat::getMin());
        $this->assertSame(-2147483648.0, scRONFloat::getMin());
        $this->assertSame(0.0, scUFloat::getMin());
        $this->assertSame(0.0, scNUFloat::getMin());
        $this->assertSame(0.0, scROUFloat::getMin());
        $this->assertSame(0.0, scRONUFloat::getMin());


        $this->assertSame(-9223372036854775807.0, scDouble::getMin());
        $this->assertSame(-9223372036854775807.0, scNDouble::getMin());
        $this->assertSame(-9223372036854775807.0, scRODouble::getMin());
        $this->assertSame(-9223372036854775807.0, scRONDouble::getMin());
        $this->assertSame(0.0, scUDouble::getMin());
        $this->assertSame(0.0, scNUDouble::getMin());
        $this->assertSame(0.0, scROUDouble::getMin());
        $this->assertSame(0.0, scRONUDouble::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(2147483647.0, scFloat::getMax());
        $this->assertSame(2147483647.0, scNFloat::getMax());
        $this->assertSame(2147483647.0, scROFloat::getMax());
        $this->assertSame(2147483647.0, scRONFloat::getMax());
        $this->assertSame(4294967295.0, scUFloat::getMax());
        $this->assertSame(4294967295.0, scNUFloat::getMax());
        $this->assertSame(4294967295.0, scROUFloat::getMax());
        $this->assertSame(4294967295.0, scRONUFloat::getMax());


        $this->assertSame(9223372036854775806.0, scDouble::getMax());
        $this->assertSame(9223372036854775806.0, scNDouble::getMax());
        $this->assertSame(9223372036854775806.0, scRODouble::getMax());
        $this->assertSame(9223372036854775806.0, scRONDouble::getMax());
        $this->assertSame(9223372036854775806.0, scUDouble::getMax());
        $this->assertSame(9223372036854775806.0, scNUDouble::getMax());
        $this->assertSame(9223372036854775806.0, scROUDouble::getMax());
        $this->assertSame(9223372036854775806.0, scRONUDouble::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, scFloat::getNullEquivalent());
        $this->assertSame(0.0, scNFloat::getNullEquivalent());
        $this->assertSame(0.0, scROFloat::getNullEquivalent());
        $this->assertSame(0.0, scRONFloat::getNullEquivalent());
        $this->assertSame(0.0, scUFloat::getNullEquivalent());
        $this->assertSame(0.0, scNUFloat::getNullEquivalent());
        $this->assertSame(0.0, scROUFloat::getNullEquivalent());
        $this->assertSame(0.0, scRONUFloat::getNullEquivalent());


        $this->assertSame(0.0, scDouble::getNullEquivalent());
        $this->assertSame(0.0, scNDouble::getNullEquivalent());
        $this->assertSame(0.0, scRODouble::getNullEquivalent());
        $this->assertSame(0.0, scRONDouble::getNullEquivalent());
        $this->assertSame(0.0, scUDouble::getNullEquivalent());
        $this->assertSame(0.0, scNUDouble::getNullEquivalent());
        $this->assertSame(0.0, scROUDouble::getNullEquivalent());
        $this->assertSame(0.0, scRONUDouble::getNullEquivalent());
    }
}
