<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\
    {
        tFloat, tNFloat, tROFloat, tRONFloat, tUFloat, tNUFloat, tROUFloat, tRONUFloat,
        tDouble, tNDouble, tRODouble, tRONDouble, tUDouble, tNUDouble, tROUDouble, tRONUDouble,
    };


require_once __DIR__ . "/../../../phpunit.php";





class tNumericFloagintTest extends TestCase
{



    public function test_tFloat_constants()
    {
        $this->assertSame("Float", tFloat::TYPE);
        $this->assertSame(false, tFloat::NULLABLE);
        $this->assertSame(false, tFloat::READONLY);

        $this->assertSame(false, tFloat::IS_CLASS);

        $this->assertSame(true, tFloat::SIGNED);
        $this->assertSame(false, tFloat::UNSIGNED);
        $this->assertSame(null, tFloat::EMPTY);
        $this->assertSame(true, tFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", tFloat::MIN);
        $this->assertSame("2147483647", tFloat::MAX);
        $this->assertSame("0", tFloat::NULL_EQUIVALENT);
    }
    public function test_tNFloat_constants()
    {
        $this->assertSame("Float", tNFloat::TYPE);
        $this->assertSame(true, tNFloat::NULLABLE);
        $this->assertSame(false, tNFloat::READONLY);

        $this->assertSame(false, tNFloat::IS_CLASS);

        $this->assertSame(true, tNFloat::SIGNED);
        $this->assertSame(false, tNFloat::UNSIGNED);
        $this->assertSame(null, tNFloat::EMPTY);
        $this->assertSame(true, tNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", tNFloat::MIN);
        $this->assertSame("2147483647", tNFloat::MAX);
        $this->assertSame("0", tNFloat::NULL_EQUIVALENT);
    }
    public function test_tROFloat_constants()
    {
        $this->assertSame("Float", tROFloat::TYPE);
        $this->assertSame(false, tROFloat::NULLABLE);
        $this->assertSame(true, tROFloat::READONLY);

        $this->assertSame(false, tROFloat::IS_CLASS);

        $this->assertSame(true, tROFloat::SIGNED);
        $this->assertSame(false, tROFloat::UNSIGNED);
        $this->assertSame(null, tROFloat::EMPTY);
        $this->assertSame(true, tNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", tNFloat::MIN);
        $this->assertSame("2147483647", tNFloat::MAX);
        $this->assertSame("0", tNFloat::NULL_EQUIVALENT);
    }
    public function test_tRONFloat_constants()
    {
        $this->assertSame("Float", tRONFloat::TYPE);
        $this->assertSame(true, tRONFloat::NULLABLE);
        $this->assertSame(true, tRONFloat::READONLY);

        $this->assertSame(false, tRONFloat::IS_CLASS);

        $this->assertSame(true, tRONFloat::SIGNED);
        $this->assertSame(false, tRONFloat::UNSIGNED);
        $this->assertSame(null, tRONFloat::EMPTY);
        $this->assertSame(true, tNFloat::HAS_LIMIT);
        $this->assertSame("-2147483648", tNFloat::MIN);
        $this->assertSame("2147483647", tNFloat::MAX);
        $this->assertSame("0", tNFloat::NULL_EQUIVALENT);
    }



    public function test_tUFloat_constants()
    {
        $this->assertSame("Float", tUFloat::TYPE);
        $this->assertSame(false, tUFloat::NULLABLE);
        $this->assertSame(false, tUFloat::READONLY);

        $this->assertSame(false, tUFloat::IS_CLASS);

        $this->assertSame(false, tUFloat::SIGNED);
        $this->assertSame(true, tUFloat::UNSIGNED);
        $this->assertSame(null, tUFloat::EMPTY);
        $this->assertSame(true, tUFloat::HAS_LIMIT);
        $this->assertSame("0", tUFloat::MIN);
        $this->assertSame("4294967295", tUFloat::MAX);
        $this->assertSame("0", tUFloat::NULL_EQUIVALENT);
    }
    public function test_tNUFloat_constants()
    {
        $this->assertSame("Float", tNUFloat::TYPE);
        $this->assertSame(true, tNUFloat::NULLABLE);
        $this->assertSame(false, tNUFloat::READONLY);

        $this->assertSame(false, tNUFloat::IS_CLASS);

        $this->assertSame(false, tNUFloat::SIGNED);
        $this->assertSame(true, tNUFloat::UNSIGNED);
        $this->assertSame(null, tNUFloat::EMPTY);
        $this->assertSame(true, tNUFloat::HAS_LIMIT);
        $this->assertSame("0", tNUFloat::MIN);
        $this->assertSame("4294967295", tNUFloat::MAX);
        $this->assertSame("0", tNUFloat::NULL_EQUIVALENT);
    }
    public function test_tROUFloat_constants()
    {
        $this->assertSame("Float", tROUFloat::TYPE);
        $this->assertSame(false, tROUFloat::NULLABLE);
        $this->assertSame(true, tROUFloat::READONLY);

        $this->assertSame(false, tROUFloat::IS_CLASS);

        $this->assertSame(false, tROUFloat::SIGNED);
        $this->assertSame(true, tROUFloat::UNSIGNED);
        $this->assertSame(null, tROUFloat::EMPTY);
        $this->assertSame(true, tROUFloat::HAS_LIMIT);
        $this->assertSame("0", tROUFloat::MIN);
        $this->assertSame("4294967295", tROUFloat::MAX);
        $this->assertSame("0", tROUFloat::NULL_EQUIVALENT);
    }
    public function test_tRONUFloat_constants()
    {
        $this->assertSame("Float", tRONUFloat::TYPE);
        $this->assertSame(true, tRONUFloat::NULLABLE);
        $this->assertSame(true, tRONUFloat::READONLY);

        $this->assertSame(false, tRONUFloat::IS_CLASS);

        $this->assertSame(false, tRONUFloat::SIGNED);
        $this->assertSame(true, tRONUFloat::UNSIGNED);
        $this->assertSame(null, tRONUFloat::EMPTY);
        $this->assertSame(true, tRONUFloat::HAS_LIMIT);
        $this->assertSame("0", tRONUFloat::MIN);
        $this->assertSame("4294967295", tRONUFloat::MAX);
        $this->assertSame("0", tRONUFloat::NULL_EQUIVALENT);
    }





    public function test_tDouble_constants()
    {
        $this->assertSame("Double", tDouble::TYPE);
        $this->assertSame(false, tDouble::NULLABLE);
        $this->assertSame(false, tDouble::READONLY);

        $this->assertSame(false, tDouble::IS_CLASS);

        $this->assertSame(true, tDouble::SIGNED);
        $this->assertSame(false, tDouble::UNSIGNED);
        $this->assertSame(null, tDouble::EMPTY);
        $this->assertSame(true, tDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tDouble::MIN);
        $this->assertSame("9223372036854775806", tDouble::MAX);
        $this->assertSame("0", tDouble::NULL_EQUIVALENT);
    }
    public function test_tNDouble_constants()
    {
        $this->assertSame("Double", tNDouble::TYPE);
        $this->assertSame(true, tNDouble::NULLABLE);
        $this->assertSame(false, tNDouble::READONLY);

        $this->assertSame(false, tNDouble::IS_CLASS);

        $this->assertSame(true, tNDouble::SIGNED);
        $this->assertSame(false, tNDouble::UNSIGNED);
        $this->assertSame(null, tNDouble::EMPTY);
        $this->assertSame(true, tNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNDouble::MIN);
        $this->assertSame("9223372036854775806", tNDouble::MAX);
        $this->assertSame("0", tNDouble::NULL_EQUIVALENT);
    }
    public function test_tRODouble_constants()
    {
        $this->assertSame("Double", tRODouble::TYPE);
        $this->assertSame(false, tRODouble::NULLABLE);
        $this->assertSame(true, tRODouble::READONLY);

        $this->assertSame(false, tRODouble::IS_CLASS);

        $this->assertSame(true, tRODouble::SIGNED);
        $this->assertSame(false, tRODouble::UNSIGNED);
        $this->assertSame(null, tRODouble::EMPTY);
        $this->assertSame(true, tNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNDouble::MIN);
        $this->assertSame("9223372036854775806", tNDouble::MAX);
        $this->assertSame("0", tNDouble::NULL_EQUIVALENT);
    }
    public function test_tRONDouble_constants()
    {
        $this->assertSame("Double", tRONDouble::TYPE);
        $this->assertSame(true, tRONDouble::NULLABLE);
        $this->assertSame(true, tRONDouble::READONLY);

        $this->assertSame(false, tRONDouble::IS_CLASS);

        $this->assertSame(true, tRONDouble::SIGNED);
        $this->assertSame(false, tRONDouble::UNSIGNED);
        $this->assertSame(null, tRONDouble::EMPTY);
        $this->assertSame(true, tNDouble::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNDouble::MIN);
        $this->assertSame("9223372036854775806", tNDouble::MAX);
        $this->assertSame("0", tNDouble::NULL_EQUIVALENT);
    }



    public function test_tUDouble_constants()
    {
        $this->assertSame("Double", tUDouble::TYPE);
        $this->assertSame(false, tUDouble::NULLABLE);
        $this->assertSame(false, tUDouble::READONLY);

        $this->assertSame(false, tUDouble::IS_CLASS);

        $this->assertSame(false, tUDouble::SIGNED);
        $this->assertSame(true, tUDouble::UNSIGNED);
        $this->assertSame(null, tUDouble::EMPTY);
        $this->assertSame(true, tUDouble::HAS_LIMIT);
        $this->assertSame("0", tUDouble::MIN);
        $this->assertSame("9223372036854775806", tUDouble::MAX);
        $this->assertSame("0", tUDouble::NULL_EQUIVALENT);
    }
    public function test_tNUDouble_constants()
    {
        $this->assertSame("Double", tNUDouble::TYPE);
        $this->assertSame(true, tNUDouble::NULLABLE);
        $this->assertSame(false, tNUDouble::READONLY);

        $this->assertSame(false, tNUDouble::IS_CLASS);

        $this->assertSame(false, tNUDouble::SIGNED);
        $this->assertSame(true, tNUDouble::UNSIGNED);
        $this->assertSame(null, tNUDouble::EMPTY);
        $this->assertSame(true, tNUDouble::HAS_LIMIT);
        $this->assertSame("0", tNUDouble::MIN);
        $this->assertSame("9223372036854775806", tNUDouble::MAX);
        $this->assertSame("0", tNUDouble::NULL_EQUIVALENT);
    }
    public function test_tROUDouble_constants()
    {
        $this->assertSame("Double", tROUDouble::TYPE);
        $this->assertSame(false, tROUDouble::NULLABLE);
        $this->assertSame(true, tROUDouble::READONLY);

        $this->assertSame(false, tROUDouble::IS_CLASS);

        $this->assertSame(false, tROUDouble::SIGNED);
        $this->assertSame(true, tROUDouble::UNSIGNED);
        $this->assertSame(null, tROUDouble::EMPTY);
        $this->assertSame(true, tROUDouble::HAS_LIMIT);
        $this->assertSame("0", tROUDouble::MIN);
        $this->assertSame("9223372036854775806", tROUDouble::MAX);
        $this->assertSame("0", tROUDouble::NULL_EQUIVALENT);
    }
    public function test_tRONUDouble_constants()
    {
        $this->assertSame("Double", tRONUDouble::TYPE);
        $this->assertSame(true, tRONUDouble::NULLABLE);
        $this->assertSame(true, tRONUDouble::READONLY);

        $this->assertSame(false, tRONUDouble::IS_CLASS);

        $this->assertSame(false, tRONUDouble::SIGNED);
        $this->assertSame(true, tRONUDouble::UNSIGNED);
        $this->assertSame(null, tRONUDouble::EMPTY);
        $this->assertSame(true, tRONUDouble::HAS_LIMIT);
        $this->assertSame("0", tRONUDouble::MIN);
        $this->assertSame("9223372036854775806", tRONUDouble::MAX);
        $this->assertSame("0", tRONUDouble::NULL_EQUIVALENT);
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
            $result = tFloat::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            0, 56, 127, 4294967295, -1, 4294967296, undefined
        ];
        $expectedValues = [
            "0", "56", "127", "4294967295", null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUFloat::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            $this->assertTrue(tFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tFloat::validate(null));
        $this->assertTrue(tNFloat::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 4294967295
        ];
        $validateFalse = [
            -1, 4294967296
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tUFloat::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tUFloat::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tUFloat::validate(null));
        $this->assertTrue(tNUFloat::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            "-2147483648", "10", "0", "56", "2147483647"
        ];
        $resultConvert = [
            -2147483648, 10, 0, 56, 2147483647
        ];
        $convertFalse = [
            "-2147483649", "2147483648", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tFloat::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tFloat::parseIfValidate(null));
        $this->assertSame(null, tNFloat::parseIfValidate(null));





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            "0", "56", "127", "4294967295"
        ];
        $resultConvert = [
            0, 56, 127, 4294967295
        ];
        $convertFalse = [
            "-1", "4294967296", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUFloat::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tUFloat::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tUFloat::parseIfValidate(null));
        $this->assertSame(null, tNUFloat::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-2147483648.0, tFloat::getMin());
        $this->assertSame(-2147483648.0, tNFloat::getMin());
        $this->assertSame(-2147483648.0, tROFloat::getMin());
        $this->assertSame(-2147483648.0, tRONFloat::getMin());
        $this->assertSame(0.0, tUFloat::getMin());
        $this->assertSame(0.0, tNUFloat::getMin());
        $this->assertSame(0.0, tROUFloat::getMin());
        $this->assertSame(0.0, tRONUFloat::getMin());


        $this->assertSame(-9223372036854775807.0, tDouble::getMin());
        $this->assertSame(-9223372036854775807.0, tNDouble::getMin());
        $this->assertSame(-9223372036854775807.0, tRODouble::getMin());
        $this->assertSame(-9223372036854775807.0, tRONDouble::getMin());
        $this->assertSame(0.0, tUDouble::getMin());
        $this->assertSame(0.0, tNUDouble::getMin());
        $this->assertSame(0.0, tROUDouble::getMin());
        $this->assertSame(0.0, tRONUDouble::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(2147483647.0, tFloat::getMax());
        $this->assertSame(2147483647.0, tNFloat::getMax());
        $this->assertSame(2147483647.0, tROFloat::getMax());
        $this->assertSame(2147483647.0, tRONFloat::getMax());
        $this->assertSame(4294967295.0, tUFloat::getMax());
        $this->assertSame(4294967295.0, tNUFloat::getMax());
        $this->assertSame(4294967295.0, tROUFloat::getMax());
        $this->assertSame(4294967295.0, tRONUFloat::getMax());


        $this->assertSame(9223372036854775806.0, tDouble::getMax());
        $this->assertSame(9223372036854775806.0, tNDouble::getMax());
        $this->assertSame(9223372036854775806.0, tRODouble::getMax());
        $this->assertSame(9223372036854775806.0, tRONDouble::getMax());
        $this->assertSame(9223372036854775806.0, tUDouble::getMax());
        $this->assertSame(9223372036854775806.0, tNUDouble::getMax());
        $this->assertSame(9223372036854775806.0, tROUDouble::getMax());
        $this->assertSame(9223372036854775806.0, tRONUDouble::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, tFloat::getNullEquivalent());
        $this->assertSame(0.0, tNFloat::getNullEquivalent());
        $this->assertSame(0.0, tROFloat::getNullEquivalent());
        $this->assertSame(0.0, tRONFloat::getNullEquivalent());
        $this->assertSame(0.0, tUFloat::getNullEquivalent());
        $this->assertSame(0.0, tNUFloat::getNullEquivalent());
        $this->assertSame(0.0, tROUFloat::getNullEquivalent());
        $this->assertSame(0.0, tRONUFloat::getNullEquivalent());


        $this->assertSame(0.0, tDouble::getNullEquivalent());
        $this->assertSame(0.0, tNDouble::getNullEquivalent());
        $this->assertSame(0.0, tRODouble::getNullEquivalent());
        $this->assertSame(0.0, tRONDouble::getNullEquivalent());
        $this->assertSame(0.0, tUDouble::getNullEquivalent());
        $this->assertSame(0.0, tNUDouble::getNullEquivalent());
        $this->assertSame(0.0, tROUDouble::getNullEquivalent());
        $this->assertSame(0.0, tRONUDouble::getNullEquivalent());
    }
}
