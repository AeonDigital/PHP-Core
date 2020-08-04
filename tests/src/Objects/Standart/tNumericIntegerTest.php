<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\
    {
        tByte, tNByte, tROByte, tRONByte, tUByte, tNUByte, tROUByte, tRONUByte,
        tShort, tNShort, tROShort, tRONShort, tUShort, tNUShort, tROUShort, tRONUShort,
        tInt, tNInt, tROInt, tRONInt, tUInt, tNUInt, tROUInt, tRONUInt,
        tLong, tNLong, tROLong, tRONLong, tULong, tNULong, tROULong, tRONULong,
    };


require_once __DIR__ . "/../../../phpunit.php";





class tNumericIntegerTest extends TestCase
{



    public function test_tByte_constants()
    {
        $this->assertSame("Byte", tByte::TYPE);
        $this->assertSame(false, tByte::NULLABLE);
        $this->assertSame(false, tByte::READONLY);

        $this->assertSame(false, tByte::IS_CLASS);

        $this->assertSame(true, tByte::SIGNED);
        $this->assertSame(false, tByte::UNSIGNED);
        $this->assertSame(null, tByte::EMPTY);
        $this->assertSame(true, tByte::HAS_LIMIT);
        $this->assertSame("-128", tByte::MIN);
        $this->assertSame("127", tByte::MAX);
        $this->assertSame("0", tByte::NULL_EQUIVALENT);
    }
    public function test_tNByte_constants()
    {
        $this->assertSame("Byte", tNByte::TYPE);
        $this->assertSame(true, tNByte::NULLABLE);
        $this->assertSame(false, tNByte::READONLY);

        $this->assertSame(false, tNByte::IS_CLASS);

        $this->assertSame(true, tNByte::SIGNED);
        $this->assertSame(false, tNByte::UNSIGNED);
        $this->assertSame(null, tNByte::EMPTY);
        $this->assertSame(true, tNByte::HAS_LIMIT);
        $this->assertSame("-128", tNByte::MIN);
        $this->assertSame("127", tNByte::MAX);
        $this->assertSame("0", tNByte::NULL_EQUIVALENT);
    }
    public function test_tROByte_constants()
    {
        $this->assertSame("Byte", tROByte::TYPE);
        $this->assertSame(false, tROByte::NULLABLE);
        $this->assertSame(true, tROByte::READONLY);

        $this->assertSame(false, tROByte::IS_CLASS);

        $this->assertSame(true, tROByte::SIGNED);
        $this->assertSame(false, tROByte::UNSIGNED);
        $this->assertSame(null, tROByte::EMPTY);
        $this->assertSame(true, tNByte::HAS_LIMIT);
        $this->assertSame("-128", tNByte::MIN);
        $this->assertSame("127", tNByte::MAX);
        $this->assertSame("0", tNByte::NULL_EQUIVALENT);
    }
    public function test_tRONByte_constants()
    {
        $this->assertSame("Byte", tRONByte::TYPE);
        $this->assertSame(true, tRONByte::NULLABLE);
        $this->assertSame(true, tRONByte::READONLY);

        $this->assertSame(false, tRONByte::IS_CLASS);

        $this->assertSame(true, tRONByte::SIGNED);
        $this->assertSame(false, tRONByte::UNSIGNED);
        $this->assertSame(null, tRONByte::EMPTY);
        $this->assertSame(true, tNByte::HAS_LIMIT);
        $this->assertSame("-128", tNByte::MIN);
        $this->assertSame("127", tNByte::MAX);
        $this->assertSame("0", tNByte::NULL_EQUIVALENT);
    }



    public function test_tUByte_constants()
    {
        $this->assertSame("Byte", tUByte::TYPE);
        $this->assertSame(false, tUByte::NULLABLE);
        $this->assertSame(false, tUByte::READONLY);

        $this->assertSame(false, tUByte::IS_CLASS);

        $this->assertSame(false, tUByte::SIGNED);
        $this->assertSame(true, tUByte::UNSIGNED);
        $this->assertSame(null, tUByte::EMPTY);
        $this->assertSame(true, tUByte::HAS_LIMIT);
        $this->assertSame("0", tUByte::MIN);
        $this->assertSame("255", tUByte::MAX);
        $this->assertSame("0", tUByte::NULL_EQUIVALENT);
    }
    public function test_tNUByte_constants()
    {
        $this->assertSame("Byte", tNUByte::TYPE);
        $this->assertSame(true, tNUByte::NULLABLE);
        $this->assertSame(false, tNUByte::READONLY);

        $this->assertSame(false, tNUByte::IS_CLASS);

        $this->assertSame(false, tNUByte::SIGNED);
        $this->assertSame(true, tNUByte::UNSIGNED);
        $this->assertSame(null, tNUByte::EMPTY);
        $this->assertSame(true, tNUByte::HAS_LIMIT);
        $this->assertSame("0", tNUByte::MIN);
        $this->assertSame("255", tNUByte::MAX);
        $this->assertSame("0", tNUByte::NULL_EQUIVALENT);
    }
    public function test_tROUByte_constants()
    {
        $this->assertSame("Byte", tROUByte::TYPE);
        $this->assertSame(false, tROUByte::NULLABLE);
        $this->assertSame(true, tROUByte::READONLY);

        $this->assertSame(false, tROUByte::IS_CLASS);

        $this->assertSame(false, tROUByte::SIGNED);
        $this->assertSame(true, tROUByte::UNSIGNED);
        $this->assertSame(null, tROUByte::EMPTY);
        $this->assertSame(true, tROUByte::HAS_LIMIT);
        $this->assertSame("0", tROUByte::MIN);
        $this->assertSame("255", tROUByte::MAX);
        $this->assertSame("0", tROUByte::NULL_EQUIVALENT);
    }
    public function test_tRONUByte_constants()
    {
        $this->assertSame("Byte", tRONUByte::TYPE);
        $this->assertSame(true, tRONUByte::NULLABLE);
        $this->assertSame(true, tRONUByte::READONLY);

        $this->assertSame(false, tRONUByte::IS_CLASS);

        $this->assertSame(false, tRONUByte::SIGNED);
        $this->assertSame(true, tRONUByte::UNSIGNED);
        $this->assertSame(null, tRONUByte::EMPTY);
        $this->assertSame(true, tRONUByte::HAS_LIMIT);
        $this->assertSame("0", tRONUByte::MIN);
        $this->assertSame("255", tRONUByte::MAX);
        $this->assertSame("0", tRONUByte::NULL_EQUIVALENT);
    }





    public function test_tShort_constants()
    {
        $this->assertSame("Short", tShort::TYPE);
        $this->assertSame(false, tShort::NULLABLE);
        $this->assertSame(false, tShort::READONLY);

        $this->assertSame(false, tShort::IS_CLASS);

        $this->assertSame(true, tShort::SIGNED);
        $this->assertSame(false, tShort::UNSIGNED);
        $this->assertSame(null, tShort::EMPTY);
        $this->assertSame(true, tShort::HAS_LIMIT);
        $this->assertSame("-32768", tShort::MIN);
        $this->assertSame("32767", tShort::MAX);
        $this->assertSame("0", tShort::NULL_EQUIVALENT);
    }
    public function test_tNShort_constants()
    {
        $this->assertSame("Short", tNShort::TYPE);
        $this->assertSame(true, tNShort::NULLABLE);
        $this->assertSame(false, tNShort::READONLY);

        $this->assertSame(false, tNShort::IS_CLASS);

        $this->assertSame(true, tNShort::SIGNED);
        $this->assertSame(false, tNShort::UNSIGNED);
        $this->assertSame(null, tNShort::EMPTY);
        $this->assertSame(true, tNShort::HAS_LIMIT);
        $this->assertSame("-32768", tNShort::MIN);
        $this->assertSame("32767", tNShort::MAX);
        $this->assertSame("0", tNShort::NULL_EQUIVALENT);
    }
    public function test_tROShort_constants()
    {
        $this->assertSame("Short", tROShort::TYPE);
        $this->assertSame(false, tROShort::NULLABLE);
        $this->assertSame(true, tROShort::READONLY);

        $this->assertSame(false, tROShort::IS_CLASS);

        $this->assertSame(true, tROShort::SIGNED);
        $this->assertSame(false, tROShort::UNSIGNED);
        $this->assertSame(null, tROShort::EMPTY);
        $this->assertSame(true, tNShort::HAS_LIMIT);
        $this->assertSame("-32768", tNShort::MIN);
        $this->assertSame("32767", tNShort::MAX);
        $this->assertSame("0", tNShort::NULL_EQUIVALENT);
    }
    public function test_tRONShort_constants()
    {
        $this->assertSame("Short", tRONShort::TYPE);
        $this->assertSame(true, tRONShort::NULLABLE);
        $this->assertSame(true, tRONShort::READONLY);

        $this->assertSame(false, tRONShort::IS_CLASS);

        $this->assertSame(true, tRONShort::SIGNED);
        $this->assertSame(false, tRONShort::UNSIGNED);
        $this->assertSame(null, tRONShort::EMPTY);
        $this->assertSame(true, tNShort::HAS_LIMIT);
        $this->assertSame("-32768", tNShort::MIN);
        $this->assertSame("32767", tNShort::MAX);
        $this->assertSame("0", tNShort::NULL_EQUIVALENT);
    }



    public function test_tUShort_constants()
    {
        $this->assertSame("Short", tUShort::TYPE);
        $this->assertSame(false, tUShort::NULLABLE);
        $this->assertSame(false, tUShort::READONLY);

        $this->assertSame(false, tUShort::IS_CLASS);

        $this->assertSame(false, tUShort::SIGNED);
        $this->assertSame(true, tUShort::UNSIGNED);
        $this->assertSame(null, tUShort::EMPTY);
        $this->assertSame(true, tUShort::HAS_LIMIT);
        $this->assertSame("0", tUShort::MIN);
        $this->assertSame("65535", tUShort::MAX);
        $this->assertSame("0", tUShort::NULL_EQUIVALENT);
    }
    public function test_tNUShort_constants()
    {
        $this->assertSame("Short", tNUShort::TYPE);
        $this->assertSame(true, tNUShort::NULLABLE);
        $this->assertSame(false, tNUShort::READONLY);

        $this->assertSame(false, tNUShort::IS_CLASS);

        $this->assertSame(false, tNUShort::SIGNED);
        $this->assertSame(true, tNUShort::UNSIGNED);
        $this->assertSame(null, tNUShort::EMPTY);
        $this->assertSame(true, tNUShort::HAS_LIMIT);
        $this->assertSame("0", tNUShort::MIN);
        $this->assertSame("65535", tNUShort::MAX);
        $this->assertSame("0", tNUShort::NULL_EQUIVALENT);
    }
    public function test_tROUShort_constants()
    {
        $this->assertSame("Short", tROUShort::TYPE);
        $this->assertSame(false, tROUShort::NULLABLE);
        $this->assertSame(true, tROUShort::READONLY);

        $this->assertSame(false, tROUShort::IS_CLASS);

        $this->assertSame(false, tROUShort::SIGNED);
        $this->assertSame(true, tROUShort::UNSIGNED);
        $this->assertSame(null, tROUShort::EMPTY);
        $this->assertSame(true, tROUShort::HAS_LIMIT);
        $this->assertSame("0", tROUShort::MIN);
        $this->assertSame("65535", tROUShort::MAX);
        $this->assertSame("0", tROUShort::NULL_EQUIVALENT);
    }
    public function test_tRONUShort_constants()
    {
        $this->assertSame("Short", tRONUShort::TYPE);
        $this->assertSame(true, tRONUShort::NULLABLE);
        $this->assertSame(true, tRONUShort::READONLY);

        $this->assertSame(false, tRONUShort::IS_CLASS);

        $this->assertSame(false, tRONUShort::SIGNED);
        $this->assertSame(true, tRONUShort::UNSIGNED);
        $this->assertSame(null, tRONUShort::EMPTY);
        $this->assertSame(true, tRONUShort::HAS_LIMIT);
        $this->assertSame("0", tRONUShort::MIN);
        $this->assertSame("65535", tRONUShort::MAX);
        $this->assertSame("0", tRONUShort::NULL_EQUIVALENT);
    }





    public function test_tInt_constants()
    {
        $this->assertSame("Int", tInt::TYPE);
        $this->assertSame(false, tInt::NULLABLE);
        $this->assertSame(false, tInt::READONLY);

        $this->assertSame(false, tInt::IS_CLASS);

        $this->assertSame(true, tInt::SIGNED);
        $this->assertSame(false, tInt::UNSIGNED);
        $this->assertSame(null, tInt::EMPTY);
        $this->assertSame(true, tInt::HAS_LIMIT);
        $this->assertSame("-2147483648", tInt::MIN);
        $this->assertSame("2147483647", tInt::MAX);
        $this->assertSame("0", tInt::NULL_EQUIVALENT);
    }
    public function test_tNInt_constants()
    {
        $this->assertSame("Int", tNInt::TYPE);
        $this->assertSame(true, tNInt::NULLABLE);
        $this->assertSame(false, tNInt::READONLY);

        $this->assertSame(false, tNInt::IS_CLASS);

        $this->assertSame(true, tNInt::SIGNED);
        $this->assertSame(false, tNInt::UNSIGNED);
        $this->assertSame(null, tNInt::EMPTY);
        $this->assertSame(true, tNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", tNInt::MIN);
        $this->assertSame("2147483647", tNInt::MAX);
        $this->assertSame("0", tNInt::NULL_EQUIVALENT);
    }
    public function test_tROInt_constants()
    {
        $this->assertSame("Int", tROInt::TYPE);
        $this->assertSame(false, tROInt::NULLABLE);
        $this->assertSame(true, tROInt::READONLY);

        $this->assertSame(false, tROInt::IS_CLASS);

        $this->assertSame(true, tROInt::SIGNED);
        $this->assertSame(false, tROInt::UNSIGNED);
        $this->assertSame(null, tROInt::EMPTY);
        $this->assertSame(true, tNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", tNInt::MIN);
        $this->assertSame("2147483647", tNInt::MAX);
        $this->assertSame("0", tNInt::NULL_EQUIVALENT);
    }
    public function test_tRONInt_constants()
    {
        $this->assertSame("Int", tRONInt::TYPE);
        $this->assertSame(true, tRONInt::NULLABLE);
        $this->assertSame(true, tRONInt::READONLY);

        $this->assertSame(false, tRONInt::IS_CLASS);

        $this->assertSame(true, tRONInt::SIGNED);
        $this->assertSame(false, tRONInt::UNSIGNED);
        $this->assertSame(null, tRONInt::EMPTY);
        $this->assertSame(true, tNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", tNInt::MIN);
        $this->assertSame("2147483647", tNInt::MAX);
        $this->assertSame("0", tNInt::NULL_EQUIVALENT);
    }



    public function test_tUInt_constants()
    {
        $this->assertSame("Int", tUInt::TYPE);
        $this->assertSame(false, tUInt::NULLABLE);
        $this->assertSame(false, tUInt::READONLY);

        $this->assertSame(false, tUInt::IS_CLASS);

        $this->assertSame(false, tUInt::SIGNED);
        $this->assertSame(true, tUInt::UNSIGNED);
        $this->assertSame(null, tUInt::EMPTY);
        $this->assertSame(true, tUInt::HAS_LIMIT);
        $this->assertSame("0", tUInt::MIN);
        $this->assertSame("4294967295", tUInt::MAX);
        $this->assertSame("0", tUInt::NULL_EQUIVALENT);
    }
    public function test_tNUInt_constants()
    {
        $this->assertSame("Int", tNUInt::TYPE);
        $this->assertSame(true, tNUInt::NULLABLE);
        $this->assertSame(false, tNUInt::READONLY);

        $this->assertSame(false, tNUInt::IS_CLASS);

        $this->assertSame(false, tNUInt::SIGNED);
        $this->assertSame(true, tNUInt::UNSIGNED);
        $this->assertSame(null, tNUInt::EMPTY);
        $this->assertSame(true, tNUInt::HAS_LIMIT);
        $this->assertSame("0", tNUInt::MIN);
        $this->assertSame("4294967295", tNUInt::MAX);
        $this->assertSame("0", tNUInt::NULL_EQUIVALENT);
    }
    public function test_tROUInt_constants()
    {
        $this->assertSame("Int", tROUInt::TYPE);
        $this->assertSame(false, tROUInt::NULLABLE);
        $this->assertSame(true, tROUInt::READONLY);

        $this->assertSame(false, tROUInt::IS_CLASS);

        $this->assertSame(false, tROUInt::SIGNED);
        $this->assertSame(true, tROUInt::UNSIGNED);
        $this->assertSame(null, tROUInt::EMPTY);
        $this->assertSame(true, tROUInt::HAS_LIMIT);
        $this->assertSame("0", tROUInt::MIN);
        $this->assertSame("4294967295", tROUInt::MAX);
        $this->assertSame("0", tROUInt::NULL_EQUIVALENT);
    }
    public function test_tRONUInt_constants()
    {
        $this->assertSame("Int", tRONUInt::TYPE);
        $this->assertSame(true, tRONUInt::NULLABLE);
        $this->assertSame(true, tRONUInt::READONLY);

        $this->assertSame(false, tRONUInt::IS_CLASS);

        $this->assertSame(false, tRONUInt::SIGNED);
        $this->assertSame(true, tRONUInt::UNSIGNED);
        $this->assertSame(null, tRONUInt::EMPTY);
        $this->assertSame(true, tRONUInt::HAS_LIMIT);
        $this->assertSame("0", tRONUInt::MIN);
        $this->assertSame("4294967295", tRONUInt::MAX);
        $this->assertSame("0", tRONUInt::NULL_EQUIVALENT);
    }





    public function test_tLong_constants()
    {
        $this->assertSame("Long", tLong::TYPE);
        $this->assertSame(false, tLong::NULLABLE);
        $this->assertSame(false, tLong::READONLY);

        $this->assertSame(false, tLong::IS_CLASS);

        $this->assertSame(true, tLong::SIGNED);
        $this->assertSame(false, tLong::UNSIGNED);
        $this->assertSame(null, tLong::EMPTY);
        $this->assertSame(true, tLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tLong::MIN);
        $this->assertSame("9223372036854775806", tLong::MAX);
        $this->assertSame("0", tLong::NULL_EQUIVALENT);
    }
    public function test_tNLong_constants()
    {
        $this->assertSame("Long", tNLong::TYPE);
        $this->assertSame(true, tNLong::NULLABLE);
        $this->assertSame(false, tNLong::READONLY);

        $this->assertSame(false, tNLong::IS_CLASS);

        $this->assertSame(true, tNLong::SIGNED);
        $this->assertSame(false, tNLong::UNSIGNED);
        $this->assertSame(null, tNLong::EMPTY);
        $this->assertSame(true, tNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNLong::MIN);
        $this->assertSame("9223372036854775806", tNLong::MAX);
        $this->assertSame("0", tNLong::NULL_EQUIVALENT);
    }
    public function test_tROLong_constants()
    {
        $this->assertSame("Long", tROLong::TYPE);
        $this->assertSame(false, tROLong::NULLABLE);
        $this->assertSame(true, tROLong::READONLY);

        $this->assertSame(false, tROLong::IS_CLASS);

        $this->assertSame(true, tROLong::SIGNED);
        $this->assertSame(false, tROLong::UNSIGNED);
        $this->assertSame(null, tROLong::EMPTY);
        $this->assertSame(true, tNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNLong::MIN);
        $this->assertSame("9223372036854775806", tNLong::MAX);
        $this->assertSame("0", tNLong::NULL_EQUIVALENT);
    }
    public function test_tRONLong_constants()
    {
        $this->assertSame("Long", tRONLong::TYPE);
        $this->assertSame(true, tRONLong::NULLABLE);
        $this->assertSame(true, tRONLong::READONLY);

        $this->assertSame(false, tRONLong::IS_CLASS);

        $this->assertSame(true, tRONLong::SIGNED);
        $this->assertSame(false, tRONLong::UNSIGNED);
        $this->assertSame(null, tRONLong::EMPTY);
        $this->assertSame(true, tNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", tNLong::MIN);
        $this->assertSame("9223372036854775806", tNLong::MAX);
        $this->assertSame("0", tNLong::NULL_EQUIVALENT);
    }



    public function test_tULong_constants()
    {
        $this->assertSame("Long", tULong::TYPE);
        $this->assertSame(false, tULong::NULLABLE);
        $this->assertSame(false, tULong::READONLY);

        $this->assertSame(false, tULong::IS_CLASS);

        $this->assertSame(false, tULong::SIGNED);
        $this->assertSame(true, tULong::UNSIGNED);
        $this->assertSame(null, tULong::EMPTY);
        $this->assertSame(true, tULong::HAS_LIMIT);
        $this->assertSame("0", tULong::MIN);
        $this->assertSame("9223372036854775806", tULong::MAX);
        $this->assertSame("0", tULong::NULL_EQUIVALENT);
    }
    public function test_tNULong_constants()
    {
        $this->assertSame("Long", tNULong::TYPE);
        $this->assertSame(true, tNULong::NULLABLE);
        $this->assertSame(false, tNULong::READONLY);

        $this->assertSame(false, tNULong::IS_CLASS);

        $this->assertSame(false, tNULong::SIGNED);
        $this->assertSame(true, tNULong::UNSIGNED);
        $this->assertSame(null, tNULong::EMPTY);
        $this->assertSame(true, tNULong::HAS_LIMIT);
        $this->assertSame("0", tNULong::MIN);
        $this->assertSame("9223372036854775806", tNULong::MAX);
        $this->assertSame("0", tNULong::NULL_EQUIVALENT);
    }
    public function test_tROULong_constants()
    {
        $this->assertSame("Long", tROULong::TYPE);
        $this->assertSame(false, tROULong::NULLABLE);
        $this->assertSame(true, tROULong::READONLY);

        $this->assertSame(false, tROULong::IS_CLASS);

        $this->assertSame(false, tROULong::SIGNED);
        $this->assertSame(true, tROULong::UNSIGNED);
        $this->assertSame(null, tROULong::EMPTY);
        $this->assertSame(true, tROULong::HAS_LIMIT);
        $this->assertSame("0", tROULong::MIN);
        $this->assertSame("9223372036854775806", tROULong::MAX);
        $this->assertSame("0", tROULong::NULL_EQUIVALENT);
    }
    public function test_tRONULong_constants()
    {
        $this->assertSame("Long", tRONULong::TYPE);
        $this->assertSame(true, tRONULong::NULLABLE);
        $this->assertSame(true, tRONULong::READONLY);

        $this->assertSame(false, tRONULong::IS_CLASS);

        $this->assertSame(false, tRONULong::SIGNED);
        $this->assertSame(true, tRONULong::UNSIGNED);
        $this->assertSame(null, tRONULong::EMPTY);
        $this->assertSame(true, tRONULong::HAS_LIMIT);
        $this->assertSame("0", tRONULong::MIN);
        $this->assertSame("9223372036854775806", tRONULong::MAX);
        $this->assertSame("0", tRONULong::NULL_EQUIVALENT);
    }










    public function test_method_toString()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            -128, 10, 0, 56, 127,
            -129, 128, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tByte::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            0, 56, 127, 255, -1, 256, undefined
        ];
        $expectedValues = [
            "0", "56", "127", "255", null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUByte::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }


    public function test_method_validate()
    {
        // Numeric Integer Not Nullable Signed
        $validateTrue = [
            -128, 10, 0, 56, 127
        ];
        $validateFalse = [
            -129, 128
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tByte::validate(null));
        $this->assertTrue(tNByte::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 255
        ];
        $validateFalse = [
            -1, 256
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(tUByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(tUByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(tUByte::validate(null));
        $this->assertTrue(tNUByte::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // Numeric Integer Not Nullable Signed
        $originalValues = [
            "-128", "10", "0", "56", "127"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127
        ];
        $convertFalse = [
            "-129", "128", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tByte::parseIfValidate(null));
        $this->assertSame(null, tNByte::parseIfValidate(null));





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            "0", "56", "127", "255"
        ];
        $resultConvert = [
            0, 56, 127, 255
        ];
        $convertFalse = [
            "-1", "256", undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.value.out.of.range", "error.obj.value.out.of.range",
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tUByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, tUByte::parseIfValidate(null));
        $this->assertSame(null, tNUByte::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-128, tByte::getMin());
        $this->assertSame(-128, tNByte::getMin());
        $this->assertSame(-128, tROByte::getMin());
        $this->assertSame(-128, tRONByte::getMin());
        $this->assertSame(0, tUByte::getMin());
        $this->assertSame(0, tNUByte::getMin());
        $this->assertSame(0, tROUByte::getMin());
        $this->assertSame(0, tRONUByte::getMin());


        $this->assertSame(-32768, tShort::getMin());
        $this->assertSame(-32768, tNShort::getMin());
        $this->assertSame(-32768, tROShort::getMin());
        $this->assertSame(-32768, tRONShort::getMin());
        $this->assertSame(0, tUShort::getMin());
        $this->assertSame(0, tNUShort::getMin());
        $this->assertSame(0, tROUShort::getMin());
        $this->assertSame(0, tRONUShort::getMin());


        $this->assertSame(-2147483648, tInt::getMin());
        $this->assertSame(-2147483648, tNInt::getMin());
        $this->assertSame(-2147483648, tROInt::getMin());
        $this->assertSame(-2147483648, tRONInt::getMin());
        $this->assertSame(0, tUInt::getMin());
        $this->assertSame(0, tNUInt::getMin());
        $this->assertSame(0, tROUInt::getMin());
        $this->assertSame(0, tRONUInt::getMin());


        $this->assertSame(-9223372036854775807, tLong::getMin());
        $this->assertSame(-9223372036854775807, tNLong::getMin());
        $this->assertSame(-9223372036854775807, tROLong::getMin());
        $this->assertSame(-9223372036854775807, tRONLong::getMin());
        $this->assertSame(0, tULong::getMin());
        $this->assertSame(0, tNULong::getMin());
        $this->assertSame(0, tROULong::getMin());
        $this->assertSame(0, tRONULong::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(127, tByte::getMax());
        $this->assertSame(127, tNByte::getMax());
        $this->assertSame(127, tROByte::getMax());
        $this->assertSame(127, tRONByte::getMax());
        $this->assertSame(255, tUByte::getMax());
        $this->assertSame(255, tNUByte::getMax());
        $this->assertSame(255, tROUByte::getMax());
        $this->assertSame(255, tRONUByte::getMax());


        $this->assertSame(32767, tShort::getMax());
        $this->assertSame(32767, tNShort::getMax());
        $this->assertSame(32767, tROShort::getMax());
        $this->assertSame(32767, tRONShort::getMax());
        $this->assertSame(65535, tUShort::getMax());
        $this->assertSame(65535, tNUShort::getMax());
        $this->assertSame(65535, tROUShort::getMax());
        $this->assertSame(65535, tRONUShort::getMax());


        $this->assertSame(2147483647, tInt::getMax());
        $this->assertSame(2147483647, tNInt::getMax());
        $this->assertSame(2147483647, tROInt::getMax());
        $this->assertSame(2147483647, tRONInt::getMax());
        $this->assertSame(4294967295, tUInt::getMax());
        $this->assertSame(4294967295, tNUInt::getMax());
        $this->assertSame(4294967295, tROUInt::getMax());
        $this->assertSame(4294967295, tRONUInt::getMax());


        $this->assertSame(9223372036854775806, tLong::getMax());
        $this->assertSame(9223372036854775806, tNLong::getMax());
        $this->assertSame(9223372036854775806, tROLong::getMax());
        $this->assertSame(9223372036854775806, tRONLong::getMax());
        $this->assertSame(9223372036854775806, tULong::getMax());
        $this->assertSame(9223372036854775806, tNULong::getMax());
        $this->assertSame(9223372036854775806, tROULong::getMax());
        $this->assertSame(9223372036854775806, tRONULong::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, tByte::getNullEquivalent());
        $this->assertSame(0, tNByte::getNullEquivalent());
        $this->assertSame(0, tROByte::getNullEquivalent());
        $this->assertSame(0, tRONByte::getNullEquivalent());
        $this->assertSame(0, tUByte::getNullEquivalent());
        $this->assertSame(0, tNUByte::getNullEquivalent());
        $this->assertSame(0, tROUByte::getNullEquivalent());
        $this->assertSame(0, tRONUByte::getNullEquivalent());


        $this->assertSame(0, tShort::getNullEquivalent());
        $this->assertSame(0, tNShort::getNullEquivalent());
        $this->assertSame(0, tROShort::getNullEquivalent());
        $this->assertSame(0, tRONShort::getNullEquivalent());
        $this->assertSame(0, tUShort::getNullEquivalent());
        $this->assertSame(0, tNUShort::getNullEquivalent());
        $this->assertSame(0, tROUShort::getNullEquivalent());
        $this->assertSame(0, tRONUShort::getNullEquivalent());


        $this->assertSame(0, tInt::getNullEquivalent());
        $this->assertSame(0, tNInt::getNullEquivalent());
        $this->assertSame(0, tROInt::getNullEquivalent());
        $this->assertSame(0, tRONInt::getNullEquivalent());
        $this->assertSame(0, tUInt::getNullEquivalent());
        $this->assertSame(0, tNUInt::getNullEquivalent());
        $this->assertSame(0, tROUInt::getNullEquivalent());
        $this->assertSame(0, tRONUInt::getNullEquivalent());


        $this->assertSame(0, tLong::getNullEquivalent());
        $this->assertSame(0, tNLong::getNullEquivalent());
        $this->assertSame(0, tROLong::getNullEquivalent());
        $this->assertSame(0, tRONLong::getNullEquivalent());
        $this->assertSame(0, tULong::getNullEquivalent());
        $this->assertSame(0, tNULong::getNullEquivalent());
        $this->assertSame(0, tROULong::getNullEquivalent());
        $this->assertSame(0, tRONULong::getNullEquivalent());
    }
}
