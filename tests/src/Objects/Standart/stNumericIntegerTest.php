<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\
    {
        stByte, stNByte, stROByte, stRONByte, stUByte, stNUByte, stROUByte, stRONUByte,
        stShort, stNShort, stROShort, stRONShort, stUShort, stNUShort, stROUShort, stRONUShort,
        stInt, stNInt, stROInt, stRONInt, stUInt, stNUInt, stROUInt, stRONUInt,
        stLong, stNLong, stROLong, stRONLong, stULong, stNULong, stROULong, stRONULong,
    };


require_once __DIR__ . "/../../../phpunit.php";





class stNumericIntegerTest extends TestCase
{



    public function test_stByte_constants()
    {
        $this->assertSame("Byte", stByte::TYPE);
        $this->assertSame(false, stByte::NULLABLE);
        $this->assertSame(false, stByte::READONLY);

        $this->assertSame(false, stByte::IS_CLASS);

        $this->assertSame(true, stByte::SIGNED);
        $this->assertSame(false, stByte::UNSIGNED);
        $this->assertSame(null, stByte::EMPTY);
        $this->assertSame(true, stByte::HAS_LIMIT);
        $this->assertSame("-128", stByte::MIN);
        $this->assertSame("127", stByte::MAX);
        $this->assertSame("0", stByte::NULL_EQUIVALENT);
    }
    public function test_stNByte_constants()
    {
        $this->assertSame("Byte", stNByte::TYPE);
        $this->assertSame(true, stNByte::NULLABLE);
        $this->assertSame(false, stNByte::READONLY);

        $this->assertSame(false, stNByte::IS_CLASS);

        $this->assertSame(true, stNByte::SIGNED);
        $this->assertSame(false, stNByte::UNSIGNED);
        $this->assertSame(null, stNByte::EMPTY);
        $this->assertSame(true, stNByte::HAS_LIMIT);
        $this->assertSame("-128", stNByte::MIN);
        $this->assertSame("127", stNByte::MAX);
        $this->assertSame("0", stNByte::NULL_EQUIVALENT);
    }
    public function test_stROByte_constants()
    {
        $this->assertSame("Byte", stROByte::TYPE);
        $this->assertSame(false, stROByte::NULLABLE);
        $this->assertSame(true, stROByte::READONLY);

        $this->assertSame(false, stROByte::IS_CLASS);

        $this->assertSame(true, stROByte::SIGNED);
        $this->assertSame(false, stROByte::UNSIGNED);
        $this->assertSame(null, stROByte::EMPTY);
        $this->assertSame(true, stNByte::HAS_LIMIT);
        $this->assertSame("-128", stNByte::MIN);
        $this->assertSame("127", stNByte::MAX);
        $this->assertSame("0", stNByte::NULL_EQUIVALENT);
    }
    public function test_stRONByte_constants()
    {
        $this->assertSame("Byte", stRONByte::TYPE);
        $this->assertSame(true, stRONByte::NULLABLE);
        $this->assertSame(true, stRONByte::READONLY);

        $this->assertSame(false, stRONByte::IS_CLASS);

        $this->assertSame(true, stRONByte::SIGNED);
        $this->assertSame(false, stRONByte::UNSIGNED);
        $this->assertSame(null, stRONByte::EMPTY);
        $this->assertSame(true, stNByte::HAS_LIMIT);
        $this->assertSame("-128", stNByte::MIN);
        $this->assertSame("127", stNByte::MAX);
        $this->assertSame("0", stNByte::NULL_EQUIVALENT);
    }



    public function test_stUByte_constants()
    {
        $this->assertSame("Byte", stUByte::TYPE);
        $this->assertSame(false, stUByte::NULLABLE);
        $this->assertSame(false, stUByte::READONLY);

        $this->assertSame(false, stUByte::IS_CLASS);

        $this->assertSame(false, stUByte::SIGNED);
        $this->assertSame(true, stUByte::UNSIGNED);
        $this->assertSame(null, stUByte::EMPTY);
        $this->assertSame(true, stUByte::HAS_LIMIT);
        $this->assertSame("0", stUByte::MIN);
        $this->assertSame("255", stUByte::MAX);
        $this->assertSame("0", stUByte::NULL_EQUIVALENT);
    }
    public function test_stNUByte_constants()
    {
        $this->assertSame("Byte", stNUByte::TYPE);
        $this->assertSame(true, stNUByte::NULLABLE);
        $this->assertSame(false, stNUByte::READONLY);

        $this->assertSame(false, stNUByte::IS_CLASS);

        $this->assertSame(false, stNUByte::SIGNED);
        $this->assertSame(true, stNUByte::UNSIGNED);
        $this->assertSame(null, stNUByte::EMPTY);
        $this->assertSame(true, stNUByte::HAS_LIMIT);
        $this->assertSame("0", stNUByte::MIN);
        $this->assertSame("255", stNUByte::MAX);
        $this->assertSame("0", stNUByte::NULL_EQUIVALENT);
    }
    public function test_stROUByte_constants()
    {
        $this->assertSame("Byte", stROUByte::TYPE);
        $this->assertSame(false, stROUByte::NULLABLE);
        $this->assertSame(true, stROUByte::READONLY);

        $this->assertSame(false, stROUByte::IS_CLASS);

        $this->assertSame(false, stROUByte::SIGNED);
        $this->assertSame(true, stROUByte::UNSIGNED);
        $this->assertSame(null, stROUByte::EMPTY);
        $this->assertSame(true, stROUByte::HAS_LIMIT);
        $this->assertSame("0", stROUByte::MIN);
        $this->assertSame("255", stROUByte::MAX);
        $this->assertSame("0", stROUByte::NULL_EQUIVALENT);
    }
    public function test_stRONUByte_constants()
    {
        $this->assertSame("Byte", stRONUByte::TYPE);
        $this->assertSame(true, stRONUByte::NULLABLE);
        $this->assertSame(true, stRONUByte::READONLY);

        $this->assertSame(false, stRONUByte::IS_CLASS);

        $this->assertSame(false, stRONUByte::SIGNED);
        $this->assertSame(true, stRONUByte::UNSIGNED);
        $this->assertSame(null, stRONUByte::EMPTY);
        $this->assertSame(true, stRONUByte::HAS_LIMIT);
        $this->assertSame("0", stRONUByte::MIN);
        $this->assertSame("255", stRONUByte::MAX);
        $this->assertSame("0", stRONUByte::NULL_EQUIVALENT);
    }





    public function test_stShort_constants()
    {
        $this->assertSame("Short", stShort::TYPE);
        $this->assertSame(false, stShort::NULLABLE);
        $this->assertSame(false, stShort::READONLY);

        $this->assertSame(false, stShort::IS_CLASS);

        $this->assertSame(true, stShort::SIGNED);
        $this->assertSame(false, stShort::UNSIGNED);
        $this->assertSame(null, stShort::EMPTY);
        $this->assertSame(true, stShort::HAS_LIMIT);
        $this->assertSame("-32768", stShort::MIN);
        $this->assertSame("32767", stShort::MAX);
        $this->assertSame("0", stShort::NULL_EQUIVALENT);
    }
    public function test_stNShort_constants()
    {
        $this->assertSame("Short", stNShort::TYPE);
        $this->assertSame(true, stNShort::NULLABLE);
        $this->assertSame(false, stNShort::READONLY);

        $this->assertSame(false, stNShort::IS_CLASS);

        $this->assertSame(true, stNShort::SIGNED);
        $this->assertSame(false, stNShort::UNSIGNED);
        $this->assertSame(null, stNShort::EMPTY);
        $this->assertSame(true, stNShort::HAS_LIMIT);
        $this->assertSame("-32768", stNShort::MIN);
        $this->assertSame("32767", stNShort::MAX);
        $this->assertSame("0", stNShort::NULL_EQUIVALENT);
    }
    public function test_stROShort_constants()
    {
        $this->assertSame("Short", stROShort::TYPE);
        $this->assertSame(false, stROShort::NULLABLE);
        $this->assertSame(true, stROShort::READONLY);

        $this->assertSame(false, stROShort::IS_CLASS);

        $this->assertSame(true, stROShort::SIGNED);
        $this->assertSame(false, stROShort::UNSIGNED);
        $this->assertSame(null, stROShort::EMPTY);
        $this->assertSame(true, stNShort::HAS_LIMIT);
        $this->assertSame("-32768", stNShort::MIN);
        $this->assertSame("32767", stNShort::MAX);
        $this->assertSame("0", stNShort::NULL_EQUIVALENT);
    }
    public function test_stRONShort_constants()
    {
        $this->assertSame("Short", stRONShort::TYPE);
        $this->assertSame(true, stRONShort::NULLABLE);
        $this->assertSame(true, stRONShort::READONLY);

        $this->assertSame(false, stRONShort::IS_CLASS);

        $this->assertSame(true, stRONShort::SIGNED);
        $this->assertSame(false, stRONShort::UNSIGNED);
        $this->assertSame(null, stRONShort::EMPTY);
        $this->assertSame(true, stNShort::HAS_LIMIT);
        $this->assertSame("-32768", stNShort::MIN);
        $this->assertSame("32767", stNShort::MAX);
        $this->assertSame("0", stNShort::NULL_EQUIVALENT);
    }



    public function test_stUShort_constants()
    {
        $this->assertSame("Short", stUShort::TYPE);
        $this->assertSame(false, stUShort::NULLABLE);
        $this->assertSame(false, stUShort::READONLY);

        $this->assertSame(false, stUShort::IS_CLASS);

        $this->assertSame(false, stUShort::SIGNED);
        $this->assertSame(true, stUShort::UNSIGNED);
        $this->assertSame(null, stUShort::EMPTY);
        $this->assertSame(true, stUShort::HAS_LIMIT);
        $this->assertSame("0", stUShort::MIN);
        $this->assertSame("65535", stUShort::MAX);
        $this->assertSame("0", stUShort::NULL_EQUIVALENT);
    }
    public function test_stNUShort_constants()
    {
        $this->assertSame("Short", stNUShort::TYPE);
        $this->assertSame(true, stNUShort::NULLABLE);
        $this->assertSame(false, stNUShort::READONLY);

        $this->assertSame(false, stNUShort::IS_CLASS);

        $this->assertSame(false, stNUShort::SIGNED);
        $this->assertSame(true, stNUShort::UNSIGNED);
        $this->assertSame(null, stNUShort::EMPTY);
        $this->assertSame(true, stNUShort::HAS_LIMIT);
        $this->assertSame("0", stNUShort::MIN);
        $this->assertSame("65535", stNUShort::MAX);
        $this->assertSame("0", stNUShort::NULL_EQUIVALENT);
    }
    public function test_stROUShort_constants()
    {
        $this->assertSame("Short", stROUShort::TYPE);
        $this->assertSame(false, stROUShort::NULLABLE);
        $this->assertSame(true, stROUShort::READONLY);

        $this->assertSame(false, stROUShort::IS_CLASS);

        $this->assertSame(false, stROUShort::SIGNED);
        $this->assertSame(true, stROUShort::UNSIGNED);
        $this->assertSame(null, stROUShort::EMPTY);
        $this->assertSame(true, stROUShort::HAS_LIMIT);
        $this->assertSame("0", stROUShort::MIN);
        $this->assertSame("65535", stROUShort::MAX);
        $this->assertSame("0", stROUShort::NULL_EQUIVALENT);
    }
    public function test_stRONUShort_constants()
    {
        $this->assertSame("Short", stRONUShort::TYPE);
        $this->assertSame(true, stRONUShort::NULLABLE);
        $this->assertSame(true, stRONUShort::READONLY);

        $this->assertSame(false, stRONUShort::IS_CLASS);

        $this->assertSame(false, stRONUShort::SIGNED);
        $this->assertSame(true, stRONUShort::UNSIGNED);
        $this->assertSame(null, stRONUShort::EMPTY);
        $this->assertSame(true, stRONUShort::HAS_LIMIT);
        $this->assertSame("0", stRONUShort::MIN);
        $this->assertSame("65535", stRONUShort::MAX);
        $this->assertSame("0", stRONUShort::NULL_EQUIVALENT);
    }





    public function test_stInt_constants()
    {
        $this->assertSame("Int", stInt::TYPE);
        $this->assertSame(false, stInt::NULLABLE);
        $this->assertSame(false, stInt::READONLY);

        $this->assertSame(false, stInt::IS_CLASS);

        $this->assertSame(true, stInt::SIGNED);
        $this->assertSame(false, stInt::UNSIGNED);
        $this->assertSame(null, stInt::EMPTY);
        $this->assertSame(true, stInt::HAS_LIMIT);
        $this->assertSame("-2147483648", stInt::MIN);
        $this->assertSame("2147483647", stInt::MAX);
        $this->assertSame("0", stInt::NULL_EQUIVALENT);
    }
    public function test_stNInt_constants()
    {
        $this->assertSame("Int", stNInt::TYPE);
        $this->assertSame(true, stNInt::NULLABLE);
        $this->assertSame(false, stNInt::READONLY);

        $this->assertSame(false, stNInt::IS_CLASS);

        $this->assertSame(true, stNInt::SIGNED);
        $this->assertSame(false, stNInt::UNSIGNED);
        $this->assertSame(null, stNInt::EMPTY);
        $this->assertSame(true, stNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", stNInt::MIN);
        $this->assertSame("2147483647", stNInt::MAX);
        $this->assertSame("0", stNInt::NULL_EQUIVALENT);
    }
    public function test_stROInt_constants()
    {
        $this->assertSame("Int", stROInt::TYPE);
        $this->assertSame(false, stROInt::NULLABLE);
        $this->assertSame(true, stROInt::READONLY);

        $this->assertSame(false, stROInt::IS_CLASS);

        $this->assertSame(true, stROInt::SIGNED);
        $this->assertSame(false, stROInt::UNSIGNED);
        $this->assertSame(null, stROInt::EMPTY);
        $this->assertSame(true, stNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", stNInt::MIN);
        $this->assertSame("2147483647", stNInt::MAX);
        $this->assertSame("0", stNInt::NULL_EQUIVALENT);
    }
    public function test_stRONInt_constants()
    {
        $this->assertSame("Int", stRONInt::TYPE);
        $this->assertSame(true, stRONInt::NULLABLE);
        $this->assertSame(true, stRONInt::READONLY);

        $this->assertSame(false, stRONInt::IS_CLASS);

        $this->assertSame(true, stRONInt::SIGNED);
        $this->assertSame(false, stRONInt::UNSIGNED);
        $this->assertSame(null, stRONInt::EMPTY);
        $this->assertSame(true, stNInt::HAS_LIMIT);
        $this->assertSame("-2147483648", stNInt::MIN);
        $this->assertSame("2147483647", stNInt::MAX);
        $this->assertSame("0", stNInt::NULL_EQUIVALENT);
    }



    public function test_stUInt_constants()
    {
        $this->assertSame("Int", stUInt::TYPE);
        $this->assertSame(false, stUInt::NULLABLE);
        $this->assertSame(false, stUInt::READONLY);

        $this->assertSame(false, stUInt::IS_CLASS);

        $this->assertSame(false, stUInt::SIGNED);
        $this->assertSame(true, stUInt::UNSIGNED);
        $this->assertSame(null, stUInt::EMPTY);
        $this->assertSame(true, stUInt::HAS_LIMIT);
        $this->assertSame("0", stUInt::MIN);
        $this->assertSame("4294967295", stUInt::MAX);
        $this->assertSame("0", stUInt::NULL_EQUIVALENT);
    }
    public function test_stNUInt_constants()
    {
        $this->assertSame("Int", stNUInt::TYPE);
        $this->assertSame(true, stNUInt::NULLABLE);
        $this->assertSame(false, stNUInt::READONLY);

        $this->assertSame(false, stNUInt::IS_CLASS);

        $this->assertSame(false, stNUInt::SIGNED);
        $this->assertSame(true, stNUInt::UNSIGNED);
        $this->assertSame(null, stNUInt::EMPTY);
        $this->assertSame(true, stNUInt::HAS_LIMIT);
        $this->assertSame("0", stNUInt::MIN);
        $this->assertSame("4294967295", stNUInt::MAX);
        $this->assertSame("0", stNUInt::NULL_EQUIVALENT);
    }
    public function test_stROUInt_constants()
    {
        $this->assertSame("Int", stROUInt::TYPE);
        $this->assertSame(false, stROUInt::NULLABLE);
        $this->assertSame(true, stROUInt::READONLY);

        $this->assertSame(false, stROUInt::IS_CLASS);

        $this->assertSame(false, stROUInt::SIGNED);
        $this->assertSame(true, stROUInt::UNSIGNED);
        $this->assertSame(null, stROUInt::EMPTY);
        $this->assertSame(true, stROUInt::HAS_LIMIT);
        $this->assertSame("0", stROUInt::MIN);
        $this->assertSame("4294967295", stROUInt::MAX);
        $this->assertSame("0", stROUInt::NULL_EQUIVALENT);
    }
    public function test_stRONUInt_constants()
    {
        $this->assertSame("Int", stRONUInt::TYPE);
        $this->assertSame(true, stRONUInt::NULLABLE);
        $this->assertSame(true, stRONUInt::READONLY);

        $this->assertSame(false, stRONUInt::IS_CLASS);

        $this->assertSame(false, stRONUInt::SIGNED);
        $this->assertSame(true, stRONUInt::UNSIGNED);
        $this->assertSame(null, stRONUInt::EMPTY);
        $this->assertSame(true, stRONUInt::HAS_LIMIT);
        $this->assertSame("0", stRONUInt::MIN);
        $this->assertSame("4294967295", stRONUInt::MAX);
        $this->assertSame("0", stRONUInt::NULL_EQUIVALENT);
    }





    public function test_stLong_constants()
    {
        $this->assertSame("Long", stLong::TYPE);
        $this->assertSame(false, stLong::NULLABLE);
        $this->assertSame(false, stLong::READONLY);

        $this->assertSame(false, stLong::IS_CLASS);

        $this->assertSame(true, stLong::SIGNED);
        $this->assertSame(false, stLong::UNSIGNED);
        $this->assertSame(null, stLong::EMPTY);
        $this->assertSame(true, stLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stLong::MIN);
        $this->assertSame("9223372036854775806", stLong::MAX);
        $this->assertSame("0", stLong::NULL_EQUIVALENT);
    }
    public function test_stNLong_constants()
    {
        $this->assertSame("Long", stNLong::TYPE);
        $this->assertSame(true, stNLong::NULLABLE);
        $this->assertSame(false, stNLong::READONLY);

        $this->assertSame(false, stNLong::IS_CLASS);

        $this->assertSame(true, stNLong::SIGNED);
        $this->assertSame(false, stNLong::UNSIGNED);
        $this->assertSame(null, stNLong::EMPTY);
        $this->assertSame(true, stNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNLong::MIN);
        $this->assertSame("9223372036854775806", stNLong::MAX);
        $this->assertSame("0", stNLong::NULL_EQUIVALENT);
    }
    public function test_stROLong_constants()
    {
        $this->assertSame("Long", stROLong::TYPE);
        $this->assertSame(false, stROLong::NULLABLE);
        $this->assertSame(true, stROLong::READONLY);

        $this->assertSame(false, stROLong::IS_CLASS);

        $this->assertSame(true, stROLong::SIGNED);
        $this->assertSame(false, stROLong::UNSIGNED);
        $this->assertSame(null, stROLong::EMPTY);
        $this->assertSame(true, stNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNLong::MIN);
        $this->assertSame("9223372036854775806", stNLong::MAX);
        $this->assertSame("0", stNLong::NULL_EQUIVALENT);
    }
    public function test_stRONLong_constants()
    {
        $this->assertSame("Long", stRONLong::TYPE);
        $this->assertSame(true, stRONLong::NULLABLE);
        $this->assertSame(true, stRONLong::READONLY);

        $this->assertSame(false, stRONLong::IS_CLASS);

        $this->assertSame(true, stRONLong::SIGNED);
        $this->assertSame(false, stRONLong::UNSIGNED);
        $this->assertSame(null, stRONLong::EMPTY);
        $this->assertSame(true, stNLong::HAS_LIMIT);
        $this->assertSame("-9223372036854775807", stNLong::MIN);
        $this->assertSame("9223372036854775806", stNLong::MAX);
        $this->assertSame("0", stNLong::NULL_EQUIVALENT);
    }



    public function test_stULong_constants()
    {
        $this->assertSame("Long", stULong::TYPE);
        $this->assertSame(false, stULong::NULLABLE);
        $this->assertSame(false, stULong::READONLY);

        $this->assertSame(false, stULong::IS_CLASS);

        $this->assertSame(false, stULong::SIGNED);
        $this->assertSame(true, stULong::UNSIGNED);
        $this->assertSame(null, stULong::EMPTY);
        $this->assertSame(true, stULong::HAS_LIMIT);
        $this->assertSame("0", stULong::MIN);
        $this->assertSame("9223372036854775806", stULong::MAX);
        $this->assertSame("0", stULong::NULL_EQUIVALENT);
    }
    public function test_stNULong_constants()
    {
        $this->assertSame("Long", stNULong::TYPE);
        $this->assertSame(true, stNULong::NULLABLE);
        $this->assertSame(false, stNULong::READONLY);

        $this->assertSame(false, stNULong::IS_CLASS);

        $this->assertSame(false, stNULong::SIGNED);
        $this->assertSame(true, stNULong::UNSIGNED);
        $this->assertSame(null, stNULong::EMPTY);
        $this->assertSame(true, stNULong::HAS_LIMIT);
        $this->assertSame("0", stNULong::MIN);
        $this->assertSame("9223372036854775806", stNULong::MAX);
        $this->assertSame("0", stNULong::NULL_EQUIVALENT);
    }
    public function test_stROULong_constants()
    {
        $this->assertSame("Long", stROULong::TYPE);
        $this->assertSame(false, stROULong::NULLABLE);
        $this->assertSame(true, stROULong::READONLY);

        $this->assertSame(false, stROULong::IS_CLASS);

        $this->assertSame(false, stROULong::SIGNED);
        $this->assertSame(true, stROULong::UNSIGNED);
        $this->assertSame(null, stROULong::EMPTY);
        $this->assertSame(true, stROULong::HAS_LIMIT);
        $this->assertSame("0", stROULong::MIN);
        $this->assertSame("9223372036854775806", stROULong::MAX);
        $this->assertSame("0", stROULong::NULL_EQUIVALENT);
    }
    public function test_stRONULong_constants()
    {
        $this->assertSame("Long", stRONULong::TYPE);
        $this->assertSame(true, stRONULong::NULLABLE);
        $this->assertSame(true, stRONULong::READONLY);

        $this->assertSame(false, stRONULong::IS_CLASS);

        $this->assertSame(false, stRONULong::SIGNED);
        $this->assertSame(true, stRONULong::UNSIGNED);
        $this->assertSame(null, stRONULong::EMPTY);
        $this->assertSame(true, stRONULong::HAS_LIMIT);
        $this->assertSame("0", stRONULong::MIN);
        $this->assertSame("9223372036854775806", stRONULong::MAX);
        $this->assertSame("0", stRONULong::NULL_EQUIVALENT);
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
            $result = stByte::toString($originalValues[$i]);
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
            $result = stUByte::toString($originalValues[$i]);
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
            $this->assertTrue(stByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stByte::validate(null));
        $this->assertTrue(stNByte::validate(null));






        // Numeric Integer Not Nullable Unsigned
        $validateTrue = [
            0, 56, 127, 255
        ];
        $validateFalse = [
            -1, 256
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stUByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stUByte::validate($validateFalse[$i]));
        }

        // Nullable
        $this->assertFalse(stUByte::validate(null));
        $this->assertTrue(stNUByte::validate(null));
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
            $result = stByte::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stByte::parseIfValidate(null));
        $this->assertSame(null, stNByte::parseIfValidate(null));





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
            $result = stUByte::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stUByte::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stUByte::parseIfValidate(null));
        $this->assertSame(null, stNUByte::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame(-128, stByte::getMin());
        $this->assertSame(-128, stNByte::getMin());
        $this->assertSame(-128, stROByte::getMin());
        $this->assertSame(-128, stRONByte::getMin());
        $this->assertSame(0, stUByte::getMin());
        $this->assertSame(0, stNUByte::getMin());
        $this->assertSame(0, stROUByte::getMin());
        $this->assertSame(0, stRONUByte::getMin());


        $this->assertSame(-32768, stShort::getMin());
        $this->assertSame(-32768, stNShort::getMin());
        $this->assertSame(-32768, stROShort::getMin());
        $this->assertSame(-32768, stRONShort::getMin());
        $this->assertSame(0, stUShort::getMin());
        $this->assertSame(0, stNUShort::getMin());
        $this->assertSame(0, stROUShort::getMin());
        $this->assertSame(0, stRONUShort::getMin());


        $this->assertSame(-2147483648, stInt::getMin());
        $this->assertSame(-2147483648, stNInt::getMin());
        $this->assertSame(-2147483648, stROInt::getMin());
        $this->assertSame(-2147483648, stRONInt::getMin());
        $this->assertSame(0, stUInt::getMin());
        $this->assertSame(0, stNUInt::getMin());
        $this->assertSame(0, stROUInt::getMin());
        $this->assertSame(0, stRONUInt::getMin());


        $this->assertSame(-9223372036854775807, stLong::getMin());
        $this->assertSame(-9223372036854775807, stNLong::getMin());
        $this->assertSame(-9223372036854775807, stROLong::getMin());
        $this->assertSame(-9223372036854775807, stRONLong::getMin());
        $this->assertSame(0, stULong::getMin());
        $this->assertSame(0, stNULong::getMin());
        $this->assertSame(0, stROULong::getMin());
        $this->assertSame(0, stRONULong::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(127, stByte::getMax());
        $this->assertSame(127, stNByte::getMax());
        $this->assertSame(127, stROByte::getMax());
        $this->assertSame(127, stRONByte::getMax());
        $this->assertSame(255, stUByte::getMax());
        $this->assertSame(255, stNUByte::getMax());
        $this->assertSame(255, stROUByte::getMax());
        $this->assertSame(255, stRONUByte::getMax());


        $this->assertSame(32767, stShort::getMax());
        $this->assertSame(32767, stNShort::getMax());
        $this->assertSame(32767, stROShort::getMax());
        $this->assertSame(32767, stRONShort::getMax());
        $this->assertSame(65535, stUShort::getMax());
        $this->assertSame(65535, stNUShort::getMax());
        $this->assertSame(65535, stROUShort::getMax());
        $this->assertSame(65535, stRONUShort::getMax());


        $this->assertSame(2147483647, stInt::getMax());
        $this->assertSame(2147483647, stNInt::getMax());
        $this->assertSame(2147483647, stROInt::getMax());
        $this->assertSame(2147483647, stRONInt::getMax());
        $this->assertSame(4294967295, stUInt::getMax());
        $this->assertSame(4294967295, stNUInt::getMax());
        $this->assertSame(4294967295, stROUInt::getMax());
        $this->assertSame(4294967295, stRONUInt::getMax());


        $this->assertSame(9223372036854775806, stLong::getMax());
        $this->assertSame(9223372036854775806, stNLong::getMax());
        $this->assertSame(9223372036854775806, stROLong::getMax());
        $this->assertSame(9223372036854775806, stRONLong::getMax());
        $this->assertSame(9223372036854775806, stULong::getMax());
        $this->assertSame(9223372036854775806, stNULong::getMax());
        $this->assertSame(9223372036854775806, stROULong::getMax());
        $this->assertSame(9223372036854775806, stRONULong::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stByte::getNullEquivalent());
        $this->assertSame(0, stNByte::getNullEquivalent());
        $this->assertSame(0, stROByte::getNullEquivalent());
        $this->assertSame(0, stRONByte::getNullEquivalent());
        $this->assertSame(0, stUByte::getNullEquivalent());
        $this->assertSame(0, stNUByte::getNullEquivalent());
        $this->assertSame(0, stROUByte::getNullEquivalent());
        $this->assertSame(0, stRONUByte::getNullEquivalent());


        $this->assertSame(0, stShort::getNullEquivalent());
        $this->assertSame(0, stNShort::getNullEquivalent());
        $this->assertSame(0, stROShort::getNullEquivalent());
        $this->assertSame(0, stRONShort::getNullEquivalent());
        $this->assertSame(0, stUShort::getNullEquivalent());
        $this->assertSame(0, stNUShort::getNullEquivalent());
        $this->assertSame(0, stROUShort::getNullEquivalent());
        $this->assertSame(0, stRONUShort::getNullEquivalent());


        $this->assertSame(0, stInt::getNullEquivalent());
        $this->assertSame(0, stNInt::getNullEquivalent());
        $this->assertSame(0, stROInt::getNullEquivalent());
        $this->assertSame(0, stRONInt::getNullEquivalent());
        $this->assertSame(0, stUInt::getNullEquivalent());
        $this->assertSame(0, stNUInt::getNullEquivalent());
        $this->assertSame(0, stROUInt::getNullEquivalent());
        $this->assertSame(0, stRONUInt::getNullEquivalent());


        $this->assertSame(0, stLong::getNullEquivalent());
        $this->assertSame(0, stNLong::getNullEquivalent());
        $this->assertSame(0, stROLong::getNullEquivalent());
        $this->assertSame(0, stRONLong::getNullEquivalent());
        $this->assertSame(0, stULong::getNullEquivalent());
        $this->assertSame(0, stNULong::getNullEquivalent());
        $this->assertSame(0, stROULong::getNullEquivalent());
        $this->assertSame(0, stRONULong::getNullEquivalent());
    }
}
