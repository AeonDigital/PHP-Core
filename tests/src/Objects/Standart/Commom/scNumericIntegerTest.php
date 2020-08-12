<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\
    {
        scByte, scNByte, scROByte, scRONByte, scUByte, scNUByte, scROUByte, scRONUByte,
        scShort, scNShort, scROShort, scRONShort, scUShort, scNUShort, scROUShort, scRONUShort,
        scInt, scNInt, scROInt, scRONInt, scUInt, scNUInt, scROUInt, scRONUInt,
        scLong, scNLong, scROLong, scRONLong, scULong, scNULong, scROULong, scRONULong,
    };


require_once __DIR__ . "/../../../../phpunit.php";





class scNumericIntegerTest extends TestCase
{



    public function test_scByte_constants()
    {
        $this->assertSame("Byte", scByte::TYPE);
        $this->assertSame(false, scByte::NULLABLE);
        $this->assertSame(false, scByte::READONLY);

        $this->assertSame(false, scByte::IS_CLASS);

        $this->assertSame(true, scByte::SIGNED);
        $this->assertSame(false, scByte::UNSIGNED);
        $this->assertSame(null, scByte::EMPTY);
        $this->assertSame(true, scByte::HAS_LIMIT);
        $this->assertSame("-128", scByte::MIN);
        $this->assertSame("127", scByte::MAX);
        $this->assertSame("0", scByte::NULL_EQUIVALENT);
    }
    public function test_scNByte_constants()
    {
        $this->assertSame("Byte", scNByte::TYPE);
        $this->assertSame(true, scNByte::NULLABLE);
        $this->assertSame(false, scNByte::READONLY);

        $this->assertSame(false, scNByte::IS_CLASS);

        $this->assertSame(true, scNByte::SIGNED);
        $this->assertSame(false, scNByte::UNSIGNED);
        $this->assertSame(null, scNByte::EMPTY);
        $this->assertSame(true, scNByte::HAS_LIMIT);
        $this->assertSame("-128", scNByte::MIN);
        $this->assertSame("127", scNByte::MAX);
        $this->assertSame("0", scNByte::NULL_EQUIVALENT);
    }
    public function test_scROByte_constants()
    {
        $this->assertSame("Byte", scROByte::TYPE);
        $this->assertSame(false, scROByte::NULLABLE);
        $this->assertSame(true, scROByte::READONLY);

        $this->assertSame(false, scROByte::IS_CLASS);

        $this->assertSame(true, scROByte::SIGNED);
        $this->assertSame(false, scROByte::UNSIGNED);
        $this->assertSame(null, scROByte::EMPTY);
        $this->assertSame(true, scNByte::HAS_LIMIT);
        $this->assertSame("-128", scNByte::MIN);
        $this->assertSame("127", scNByte::MAX);
        $this->assertSame("0", scNByte::NULL_EQUIVALENT);
    }
    public function test_scRONByte_constants()
    {
        $this->assertSame("Byte", scRONByte::TYPE);
        $this->assertSame(true, scRONByte::NULLABLE);
        $this->assertSame(true, scRONByte::READONLY);

        $this->assertSame(false, scRONByte::IS_CLASS);

        $this->assertSame(true, scRONByte::SIGNED);
        $this->assertSame(false, scRONByte::UNSIGNED);
        $this->assertSame(null, scRONByte::EMPTY);
        $this->assertSame(true, scNByte::HAS_LIMIT);
        $this->assertSame("-128", scNByte::MIN);
        $this->assertSame("127", scNByte::MAX);
        $this->assertSame("0", scNByte::NULL_EQUIVALENT);
    }



    public function test_scUByte_constants()
    {
        $this->assertSame("Byte", scUByte::TYPE);
        $this->assertSame(false, scUByte::NULLABLE);
        $this->assertSame(false, scUByte::READONLY);

        $this->assertSame(false, scUByte::IS_CLASS);

        $this->assertSame(false, scUByte::SIGNED);
        $this->assertSame(true, scUByte::UNSIGNED);
        $this->assertSame(null, scUByte::EMPTY);
        $this->assertSame(true, scUByte::HAS_LIMIT);
        $this->assertSame("0", scUByte::MIN);
        $this->assertSame("255", scUByte::MAX);
        $this->assertSame("0", scUByte::NULL_EQUIVALENT);
    }
    public function test_scNUByte_constants()
    {
        $this->assertSame("Byte", scNUByte::TYPE);
        $this->assertSame(true, scNUByte::NULLABLE);
        $this->assertSame(false, scNUByte::READONLY);

        $this->assertSame(false, scNUByte::IS_CLASS);

        $this->assertSame(false, scNUByte::SIGNED);
        $this->assertSame(true, scNUByte::UNSIGNED);
        $this->assertSame(null, scNUByte::EMPTY);
        $this->assertSame(true, scNUByte::HAS_LIMIT);
        $this->assertSame("0", scNUByte::MIN);
        $this->assertSame("255", scNUByte::MAX);
        $this->assertSame("0", scNUByte::NULL_EQUIVALENT);
    }
    public function test_scROUByte_constants()
    {
        $this->assertSame("Byte", scROUByte::TYPE);
        $this->assertSame(false, scROUByte::NULLABLE);
        $this->assertSame(true, scROUByte::READONLY);

        $this->assertSame(false, scROUByte::IS_CLASS);

        $this->assertSame(false, scROUByte::SIGNED);
        $this->assertSame(true, scROUByte::UNSIGNED);
        $this->assertSame(null, scROUByte::EMPTY);
        $this->assertSame(true, scROUByte::HAS_LIMIT);
        $this->assertSame("0", scROUByte::MIN);
        $this->assertSame("255", scROUByte::MAX);
        $this->assertSame("0", scROUByte::NULL_EQUIVALENT);
    }
    public function test_scRONUByte_constants()
    {
        $this->assertSame("Byte", scRONUByte::TYPE);
        $this->assertSame(true, scRONUByte::NULLABLE);
        $this->assertSame(true, scRONUByte::READONLY);

        $this->assertSame(false, scRONUByte::IS_CLASS);

        $this->assertSame(false, scRONUByte::SIGNED);
        $this->assertSame(true, scRONUByte::UNSIGNED);
        $this->assertSame(null, scRONUByte::EMPTY);
        $this->assertSame(true, scRONUByte::HAS_LIMIT);
        $this->assertSame("0", scRONUByte::MIN);
        $this->assertSame("255", scRONUByte::MAX);
        $this->assertSame("0", scRONUByte::NULL_EQUIVALENT);
    }





    public function test_scShort_constants()
    {
        $this->assertSame("Short", scShort::TYPE);
        $this->assertSame(false, scShort::NULLABLE);
        $this->assertSame(false, scShort::READONLY);

        $this->assertSame(false, scShort::IS_CLASS);

        $this->assertSame(true, scShort::SIGNED);
        $this->assertSame(false, scShort::UNSIGNED);
        $this->assertSame(null, scShort::EMPTY);
        $this->assertSame(true, scShort::HAS_LIMIT);
        $this->assertSame("-32768", scShort::MIN);
        $this->assertSame("32767", scShort::MAX);
        $this->assertSame("0", scShort::NULL_EQUIVALENT);
    }
    public function test_scNShort_constants()
    {
        $this->assertSame("Short", scNShort::TYPE);
        $this->assertSame(true, scNShort::NULLABLE);
        $this->assertSame(false, scNShort::READONLY);

        $this->assertSame(false, scNShort::IS_CLASS);

        $this->assertSame(true, scNShort::SIGNED);
        $this->assertSame(false, scNShort::UNSIGNED);
        $this->assertSame(null, scNShort::EMPTY);
        $this->assertSame(true, scNShort::HAS_LIMIT);
        $this->assertSame("-32768", scNShort::MIN);
        $this->assertSame("32767", scNShort::MAX);
        $this->assertSame("0", scNShort::NULL_EQUIVALENT);
    }
    public function test_scROShort_constants()
    {
        $this->assertSame("Short", scROShort::TYPE);
        $this->assertSame(false, scROShort::NULLABLE);
        $this->assertSame(true, scROShort::READONLY);

        $this->assertSame(false, scROShort::IS_CLASS);

        $this->assertSame(true, scROShort::SIGNED);
        $this->assertSame(false, scROShort::UNSIGNED);
        $this->assertSame(null, scROShort::EMPTY);
        $this->assertSame(true, scNShort::HAS_LIMIT);
        $this->assertSame("-32768", scNShort::MIN);
        $this->assertSame("32767", scNShort::MAX);
        $this->assertSame("0", scNShort::NULL_EQUIVALENT);
    }
    public function test_scRONShort_constants()
    {
        $this->assertSame("Short", scRONShort::TYPE);
        $this->assertSame(true, scRONShort::NULLABLE);
        $this->assertSame(true, scRONShort::READONLY);

        $this->assertSame(false, scRONShort::IS_CLASS);

        $this->assertSame(true, scRONShort::SIGNED);
        $this->assertSame(false, scRONShort::UNSIGNED);
        $this->assertSame(null, scRONShort::EMPTY);
        $this->assertSame(true, scNShort::HAS_LIMIT);
        $this->assertSame("-32768", scNShort::MIN);
        $this->assertSame("32767", scNShort::MAX);
        $this->assertSame("0", scNShort::NULL_EQUIVALENT);
    }



    public function test_scUShort_constants()
    {
        $this->assertSame("Short", scUShort::TYPE);
        $this->assertSame(false, scUShort::NULLABLE);
        $this->assertSame(false, scUShort::READONLY);

        $this->assertSame(false, scUShort::IS_CLASS);

        $this->assertSame(false, scUShort::SIGNED);
        $this->assertSame(true, scUShort::UNSIGNED);
        $this->assertSame(null, scUShort::EMPTY);
        $this->assertSame(true, scUShort::HAS_LIMIT);
        $this->assertSame("0", scUShort::MIN);
        $this->assertSame("65535", scUShort::MAX);
        $this->assertSame("0", scUShort::NULL_EQUIVALENT);
    }
    public function test_scNUShort_constants()
    {
        $this->assertSame("Short", scNUShort::TYPE);
        $this->assertSame(true, scNUShort::NULLABLE);
        $this->assertSame(false, scNUShort::READONLY);

        $this->assertSame(false, scNUShort::IS_CLASS);

        $this->assertSame(false, scNUShort::SIGNED);
        $this->assertSame(true, scNUShort::UNSIGNED);
        $this->assertSame(null, scNUShort::EMPTY);
        $this->assertSame(true, scNUShort::HAS_LIMIT);
        $this->assertSame("0", scNUShort::MIN);
        $this->assertSame("65535", scNUShort::MAX);
        $this->assertSame("0", scNUShort::NULL_EQUIVALENT);
    }
    public function test_scROUShort_constants()
    {
        $this->assertSame("Short", scROUShort::TYPE);
        $this->assertSame(false, scROUShort::NULLABLE);
        $this->assertSame(true, scROUShort::READONLY);

        $this->assertSame(false, scROUShort::IS_CLASS);

        $this->assertSame(false, scROUShort::SIGNED);
        $this->assertSame(true, scROUShort::UNSIGNED);
        $this->assertSame(null, scROUShort::EMPTY);
        $this->assertSame(true, scROUShort::HAS_LIMIT);
        $this->assertSame("0", scROUShort::MIN);
        $this->assertSame("65535", scROUShort::MAX);
        $this->assertSame("0", scROUShort::NULL_EQUIVALENT);
    }
    public function test_scRONUShort_constants()
    {
        $this->assertSame("Short", scRONUShort::TYPE);
        $this->assertSame(true, scRONUShort::NULLABLE);
        $this->assertSame(true, scRONUShort::READONLY);

        $this->assertSame(false, scRONUShort::IS_CLASS);

        $this->assertSame(false, scRONUShort::SIGNED);
        $this->assertSame(true, scRONUShort::UNSIGNED);
        $this->assertSame(null, scRONUShort::EMPTY);
        $this->assertSame(true, scRONUShort::HAS_LIMIT);
        $this->assertSame("0", scRONUShort::MIN);
        $this->assertSame("65535", scRONUShort::MAX);
        $this->assertSame("0", scRONUShort::NULL_EQUIVALENT);
    }





    public function test_scInt_constants()
    {
        $this->assertSame("Int", scInt::TYPE);
        $this->assertSame(false, scInt::NULLABLE);
        $this->assertSame(false, scInt::READONLY);

        $this->assertSame(false, scInt::IS_CLASS);

        $this->assertSame(true, scInt::SIGNED);
        $this->assertSame(false, scInt::UNSIGNED);
        $this->assertSame(null, scInt::EMPTY);
        $this->assertSame(true, scInt::HAS_LIMIT);
        $this->assertSame("-2147483648", scInt::MIN);
        $this->assertSame("2147483647", scInt::MAX);
        $this->assertSame("0", scInt::NULL_EQUIVALENT);
    }
    public function test_scNInt_constants()
    {
        $this->assertSame("Int", scNInt::TYPE);
        $this->assertSame(true, scNInt::NULLABLE);
        $this->assertSame(false, scNInt::READONLY);

        $this->assertSame(false, scNInt::IS_CLASS);

        $this->assertSame(true, scNInt::SIGNED);
        $this->assertSame(false, scNInt::UNSIGNED);
        $this->assertSame(null, scNInt::EMPTY);
        $this->assertSame(true, scNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", scNInt::MIN);
        $this->assertSame("2147483647", scNInt::MAX);
        $this->assertSame("0", scNInt::NULL_EQUIVALENT);
    }
    public function test_scROInt_constants()
    {
        $this->assertSame("Int", scROInt::TYPE);
        $this->assertSame(false, scROInt::NULLABLE);
        $this->assertSame(true, scROInt::READONLY);

        $this->assertSame(false, scROInt::IS_CLASS);

        $this->assertSame(true, scROInt::SIGNED);
        $this->assertSame(false, scROInt::UNSIGNED);
        $this->assertSame(null, scROInt::EMPTY);
        $this->assertSame(true, scNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", scNInt::MIN);
        $this->assertSame("2147483647", scNInt::MAX);
        $this->assertSame("0", scNInt::NULL_EQUIVALENT);
    }
    public function test_scRONInt_constants()
    {
        $this->assertSame("Int", scRONInt::TYPE);
        $this->assertSame(true, scRONInt::NULLABLE);
        $this->assertSame(true, scRONInt::READONLY);

        $this->assertSame(false, scRONInt::IS_CLASS);

        $this->assertSame(true, scRONInt::SIGNED);
        $this->assertSame(false, scRONInt::UNSIGNED);
        $this->assertSame(null, scRONInt::EMPTY);
        $this->assertSame(true, scNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", scNInt::MIN);
        $this->assertSame("2147483647", scNInt::MAX);
        $this->assertSame("0", scNInt::NULL_EQUIVALENT);
    }



    public function test_scUInt_constants()
    {
        $this->assertSame("Int", scUInt::TYPE);
        $this->assertSame(false, scUInt::NULLABLE);
        $this->assertSame(false, scUInt::READONLY);

        $this->assertSame(false, scUInt::IS_CLASS);

        $this->assertSame(false, scUInt::SIGNED);
        $this->assertSame(true, scUInt::UNSIGNED);
        $this->assertSame(null, scUInt::EMPTY);
        $this->assertSame(true, scUInt::HAS_LIMIT);
        $this->assertSame("0", scUInt::MIN);
        $this->assertSame("4294967295", scUInt::MAX);
        $this->assertSame("0", scUInt::NULL_EQUIVALENT);
    }
    public function test_scNUInt_constants()
    {
        $this->assertSame("Int", scNUInt::TYPE);
        $this->assertSame(true, scNUInt::NULLABLE);
        $this->assertSame(false, scNUInt::READONLY);

        $this->assertSame(false, scNUInt::IS_CLASS);

        $this->assertSame(false, scNUInt::SIGNED);
        $this->assertSame(true, scNUInt::UNSIGNED);
        $this->assertSame(null, scNUInt::EMPTY);
        $this->assertSame(true, scNUInt::HAS_LIMIT);
        $this->assertSame("0", scNUInt::MIN);
        $this->assertSame("4294967295", scNUInt::MAX);
        $this->assertSame("0", scNUInt::NULL_EQUIVALENT);
    }
    public function test_scROUInt_constants()
    {
        $this->assertSame("Int", scROUInt::TYPE);
        $this->assertSame(false, scROUInt::NULLABLE);
        $this->assertSame(true, scROUInt::READONLY);

        $this->assertSame(false, scROUInt::IS_CLASS);

        $this->assertSame(false, scROUInt::SIGNED);
        $this->assertSame(true, scROUInt::UNSIGNED);
        $this->assertSame(null, scROUInt::EMPTY);
        $this->assertSame(true, scROUInt::HAS_LIMIT);
        $this->assertSame("0", scROUInt::MIN);
        $this->assertSame("4294967295", scROUInt::MAX);
        $this->assertSame("0", scROUInt::NULL_EQUIVALENT);
    }
    public function test_scRONUInt_constants()
    {
        $this->assertSame("Int", scRONUInt::TYPE);
        $this->assertSame(true, scRONUInt::NULLABLE);
        $this->assertSame(true, scRONUInt::READONLY);

        $this->assertSame(false, scRONUInt::IS_CLASS);

        $this->assertSame(false, scRONUInt::SIGNED);
        $this->assertSame(true, scRONUInt::UNSIGNED);
        $this->assertSame(null, scRONUInt::EMPTY);
        $this->assertSame(true, scRONUInt::HAS_LIMIT);
        $this->assertSame("0", scRONUInt::MIN);
        $this->assertSame("4294967295", scRONUInt::MAX);
        $this->assertSame("0", scRONUInt::NULL_EQUIVALENT);
    }





    public function test_scLong_constants()
    {
        $this->assertSame("Long", scLong::TYPE);
        $this->assertSame(false, scLong::NULLABLE);
        $this->assertSame(false, scLong::READONLY);

        $this->assertSame(false, scLong::IS_CLASS);

        $this->assertSame(true, scLong::SIGNED);
        $this->assertSame(false, scLong::UNSIGNED);
        $this->assertSame(null, scLong::EMPTY);
        $this->assertSame(true, scLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scLong::MIN);
        $this->assertSame("9223372036854775806", scLong::MAX);
        $this->assertSame("0", scLong::NULL_EQUIVALENT);
    }
    public function test_scNLong_constants()
    {
        $this->assertSame("Long", scNLong::TYPE);
        $this->assertSame(true, scNLong::NULLABLE);
        $this->assertSame(false, scNLong::READONLY);

        $this->assertSame(false, scNLong::IS_CLASS);

        $this->assertSame(true, scNLong::SIGNED);
        $this->assertSame(false, scNLong::UNSIGNED);
        $this->assertSame(null, scNLong::EMPTY);
        $this->assertSame(true, scNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNLong::MIN);
        $this->assertSame("9223372036854775806", scNLong::MAX);
        $this->assertSame("0", scNLong::NULL_EQUIVALENT);
    }
    public function test_scROLong_constants()
    {
        $this->assertSame("Long", scROLong::TYPE);
        $this->assertSame(false, scROLong::NULLABLE);
        $this->assertSame(true, scROLong::READONLY);

        $this->assertSame(false, scROLong::IS_CLASS);

        $this->assertSame(true, scROLong::SIGNED);
        $this->assertSame(false, scROLong::UNSIGNED);
        $this->assertSame(null, scROLong::EMPTY);
        $this->assertSame(true, scNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNLong::MIN);
        $this->assertSame("9223372036854775806", scNLong::MAX);
        $this->assertSame("0", scNLong::NULL_EQUIVALENT);
    }
    public function test_scRONLong_constants()
    {
        $this->assertSame("Long", scRONLong::TYPE);
        $this->assertSame(true, scRONLong::NULLABLE);
        $this->assertSame(true, scRONLong::READONLY);

        $this->assertSame(false, scRONLong::IS_CLASS);

        $this->assertSame(true, scRONLong::SIGNED);
        $this->assertSame(false, scRONLong::UNSIGNED);
        $this->assertSame(null, scRONLong::EMPTY);
        $this->assertSame(true, scNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", scNLong::MIN);
        $this->assertSame("9223372036854775806", scNLong::MAX);
        $this->assertSame("0", scNLong::NULL_EQUIVALENT);
    }



    public function test_scULong_constants()
    {
        $this->assertSame("Long", scULong::TYPE);
        $this->assertSame(false, scULong::NULLABLE);
        $this->assertSame(false, scULong::READONLY);

        $this->assertSame(false, scULong::IS_CLASS);

        $this->assertSame(false, scULong::SIGNED);
        $this->assertSame(true, scULong::UNSIGNED);
        $this->assertSame(null, scULong::EMPTY);
        $this->assertSame(true, scULong::HAS_LIMIT);
        $this->assertSame("0", scULong::MIN);
        $this->assertSame("9223372036854775806", scULong::MAX);
        $this->assertSame("0", scULong::NULL_EQUIVALENT);
    }
    public function test_scNULong_constants()
    {
        $this->assertSame("Long", scNULong::TYPE);
        $this->assertSame(true, scNULong::NULLABLE);
        $this->assertSame(false, scNULong::READONLY);

        $this->assertSame(false, scNULong::IS_CLASS);

        $this->assertSame(false, scNULong::SIGNED);
        $this->assertSame(true, scNULong::UNSIGNED);
        $this->assertSame(null, scNULong::EMPTY);
        $this->assertSame(true, scNULong::HAS_LIMIT);
        $this->assertSame("0", scNULong::MIN);
        $this->assertSame("9223372036854775806", scNULong::MAX);
        $this->assertSame("0", scNULong::NULL_EQUIVALENT);
    }
    public function test_scROULong_constants()
    {
        $this->assertSame("Long", scROULong::TYPE);
        $this->assertSame(false, scROULong::NULLABLE);
        $this->assertSame(true, scROULong::READONLY);

        $this->assertSame(false, scROULong::IS_CLASS);

        $this->assertSame(false, scROULong::SIGNED);
        $this->assertSame(true, scROULong::UNSIGNED);
        $this->assertSame(null, scROULong::EMPTY);
        $this->assertSame(true, scROULong::HAS_LIMIT);
        $this->assertSame("0", scROULong::MIN);
        $this->assertSame("9223372036854775806", scROULong::MAX);
        $this->assertSame("0", scROULong::NULL_EQUIVALENT);
    }
    public function test_scRONULong_constants()
    {
        $this->assertSame("Long", scRONULong::TYPE);
        $this->assertSame(true, scRONULong::NULLABLE);
        $this->assertSame(true, scRONULong::READONLY);

        $this->assertSame(false, scRONULong::IS_CLASS);

        $this->assertSame(false, scRONULong::SIGNED);
        $this->assertSame(true, scRONULong::UNSIGNED);
        $this->assertSame(null, scRONULong::EMPTY);
        $this->assertSame(true, scRONULong::HAS_LIMIT);
        $this->assertSame("0", scRONULong::MIN);
        $this->assertSame("9223372036854775806", scRONULong::MAX);
        $this->assertSame("0", scRONULong::NULL_EQUIVALENT);
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
            $result = scByte::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }





        // Numeric Integer Not Nullable Unsigned
        $originalValues = [
            0, 56, 127, 255, -1, 256, undefined
        ];
        $expectedValues = [
            "0", "56", "127", "255", null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scUByte::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
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
            $this->assertTrue(scByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scByte::validate(null));
        $this->assertTrue(scNByte::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 255
        ];
        $validateFalse = [
            -1, 256
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scUByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scUByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(scUByte::validate(null));
        $this->assertTrue(scNUByte::validate(null));
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
            $result = scByte::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scByte::parseIfValidate(null));
        $this->assertSame(null, scNByte::parseIfValidate(null));





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
            $result = scUByte::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scUByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scUByte::parseIfValidate(null));
        $this->assertSame(null, scNUByte::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-128, scByte::getMin());
        $this->assertSame(-128, scNByte::getMin());
        $this->assertSame(-128, scROByte::getMin());
        $this->assertSame(-128, scRONByte::getMin());
        $this->assertSame(0, scUByte::getMin());
        $this->assertSame(0, scNUByte::getMin());
        $this->assertSame(0, scROUByte::getMin());
        $this->assertSame(0, scRONUByte::getMin());


        $this->assertSame(-32768, scShort::getMin());
        $this->assertSame(-32768, scNShort::getMin());
        $this->assertSame(-32768, scROShort::getMin());
        $this->assertSame(-32768, scRONShort::getMin());
        $this->assertSame(0, scUShort::getMin());
        $this->assertSame(0, scNUShort::getMin());
        $this->assertSame(0, scROUShort::getMin());
        $this->assertSame(0, scRONUShort::getMin());


        $this->assertSame(-2147483648, scInt::getMin());
        $this->assertSame(-2147483648, scNInt::getMin());
        $this->assertSame(-2147483648, scROInt::getMin());
        $this->assertSame(-2147483648, scRONInt::getMin());
        $this->assertSame(0, scUInt::getMin());
        $this->assertSame(0, scNUInt::getMin());
        $this->assertSame(0, scROUInt::getMin());
        $this->assertSame(0, scRONUInt::getMin());


        $this->assertSame(-9223372036854775807, scLong::getMin());
        $this->assertSame(-9223372036854775807, scNLong::getMin());
        $this->assertSame(-9223372036854775807, scROLong::getMin());
        $this->assertSame(-9223372036854775807, scRONLong::getMin());
        $this->assertSame(0, scULong::getMin());
        $this->assertSame(0, scNULong::getMin());
        $this->assertSame(0, scROULong::getMin());
        $this->assertSame(0, scRONULong::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(127, scByte::getMax());
        $this->assertSame(127, scNByte::getMax());
        $this->assertSame(127, scROByte::getMax());
        $this->assertSame(127, scRONByte::getMax());
        $this->assertSame(255, scUByte::getMax());
        $this->assertSame(255, scNUByte::getMax());
        $this->assertSame(255, scROUByte::getMax());
        $this->assertSame(255, scRONUByte::getMax());


        $this->assertSame(32767, scShort::getMax());
        $this->assertSame(32767, scNShort::getMax());
        $this->assertSame(32767, scROShort::getMax());
        $this->assertSame(32767, scRONShort::getMax());
        $this->assertSame(65535, scUShort::getMax());
        $this->assertSame(65535, scNUShort::getMax());
        $this->assertSame(65535, scROUShort::getMax());
        $this->assertSame(65535, scRONUShort::getMax());


        $this->assertSame(2147483647, scInt::getMax());
        $this->assertSame(2147483647, scNInt::getMax());
        $this->assertSame(2147483647, scROInt::getMax());
        $this->assertSame(2147483647, scRONInt::getMax());
        $this->assertSame(4294967295, scUInt::getMax());
        $this->assertSame(4294967295, scNUInt::getMax());
        $this->assertSame(4294967295, scROUInt::getMax());
        $this->assertSame(4294967295, scRONUInt::getMax());


        $this->assertSame(9223372036854775806, scLong::getMax());
        $this->assertSame(9223372036854775806, scNLong::getMax());
        $this->assertSame(9223372036854775806, scROLong::getMax());
        $this->assertSame(9223372036854775806, scRONLong::getMax());
        $this->assertSame(9223372036854775806, scULong::getMax());
        $this->assertSame(9223372036854775806, scNULong::getMax());
        $this->assertSame(9223372036854775806, scROULong::getMax());
        $this->assertSame(9223372036854775806, scRONULong::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, scByte::getNullEquivalent());
        $this->assertSame(0, scNByte::getNullEquivalent());
        $this->assertSame(0, scROByte::getNullEquivalent());
        $this->assertSame(0, scRONByte::getNullEquivalent());
        $this->assertSame(0, scUByte::getNullEquivalent());
        $this->assertSame(0, scNUByte::getNullEquivalent());
        $this->assertSame(0, scROUByte::getNullEquivalent());
        $this->assertSame(0, scRONUByte::getNullEquivalent());


        $this->assertSame(0, scShort::getNullEquivalent());
        $this->assertSame(0, scNShort::getNullEquivalent());
        $this->assertSame(0, scROShort::getNullEquivalent());
        $this->assertSame(0, scRONShort::getNullEquivalent());
        $this->assertSame(0, scUShort::getNullEquivalent());
        $this->assertSame(0, scNUShort::getNullEquivalent());
        $this->assertSame(0, scROUShort::getNullEquivalent());
        $this->assertSame(0, scRONUShort::getNullEquivalent());


        $this->assertSame(0, scInt::getNullEquivalent());
        $this->assertSame(0, scNInt::getNullEquivalent());
        $this->assertSame(0, scROInt::getNullEquivalent());
        $this->assertSame(0, scRONInt::getNullEquivalent());
        $this->assertSame(0, scUInt::getNullEquivalent());
        $this->assertSame(0, scNUInt::getNullEquivalent());
        $this->assertSame(0, scROUInt::getNullEquivalent());
        $this->assertSame(0, scRONUInt::getNullEquivalent());


        $this->assertSame(0, scLong::getNullEquivalent());
        $this->assertSame(0, scNLong::getNullEquivalent());
        $this->assertSame(0, scROLong::getNullEquivalent());
        $this->assertSame(0, scRONLong::getNullEquivalent());
        $this->assertSame(0, scULong::getNullEquivalent());
        $this->assertSame(0, scNULong::getNullEquivalent());
        $this->assertSame(0, scROULong::getNullEquivalent());
        $this->assertSame(0, scRONULong::getNullEquivalent());
    }
}
