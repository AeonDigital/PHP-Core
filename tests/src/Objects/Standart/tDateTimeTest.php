<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\
    {
        tDateTime, tNDateTime, tRODateTime, tRONDateTime, tUDateTime, tNUDateTime, tROUDateTime, tRONUDateTime,
    };


require_once __DIR__ . "/../../../phpunit.php";





class tDateTimeTest extends TestCase
{



    public function test_tDateTime_constants()
    {
        $this->assertSame("DateTime", tDateTime::TYPE);
        $this->assertSame(false, tDateTime::NULLABLE);
        $this->assertSame(false, tDateTime::READONLY);

        $this->assertSame(true, tDateTime::IS_CLASS);

        $this->assertSame(true, tDateTime::SIGNED);
        $this->assertSame(false, tDateTime::UNSIGNED);
        $this->assertSame(null, tDateTime::EMPTY);
        $this->assertSame(true, tDateTime::HAS_LIMIT);
        $this->assertSame("-9999-01-01 00:00:00", tDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tDateTime::NULL_EQUIVALENT);
    }
    public function test_tNDateTime_constants()
    {
        $this->assertSame("DateTime", tNDateTime::TYPE);
        $this->assertSame(true, tNDateTime::NULLABLE);
        $this->assertSame(false, tNDateTime::READONLY);

        $this->assertSame(true, tNDateTime::IS_CLASS);

        $this->assertSame(true, tNDateTime::SIGNED);
        $this->assertSame(false, tNDateTime::UNSIGNED);
        $this->assertSame(null, tNDateTime::EMPTY);
        $this->assertSame(true, tNDateTime::HAS_LIMIT);
        $this->assertSame("-9999-01-01 00:00:00", tNDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tNDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tNDateTime::NULL_EQUIVALENT);
    }
    public function test_tRODateTime_constants()
    {
        $this->assertSame("DateTime", tRODateTime::TYPE);
        $this->assertSame(false, tRODateTime::NULLABLE);
        $this->assertSame(true, tRODateTime::READONLY);

        $this->assertSame(true, tRODateTime::IS_CLASS);

        $this->assertSame(true, tRODateTime::SIGNED);
        $this->assertSame(false, tRODateTime::UNSIGNED);
        $this->assertSame(null, tRODateTime::EMPTY);
        $this->assertSame(true, tNDateTime::HAS_LIMIT);
        $this->assertSame("-9999-01-01 00:00:00", tNDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tNDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tNDateTime::NULL_EQUIVALENT);
    }
    public function test_tRONDateTime_constants()
    {
        $this->assertSame("DateTime", tRONDateTime::TYPE);
        $this->assertSame(true, tRONDateTime::NULLABLE);
        $this->assertSame(true, tRONDateTime::READONLY);

        $this->assertSame(true, tRONDateTime::IS_CLASS);

        $this->assertSame(true, tRONDateTime::SIGNED);
        $this->assertSame(false, tRONDateTime::UNSIGNED);
        $this->assertSame(null, tRONDateTime::EMPTY);
        $this->assertSame(true, tNDateTime::HAS_LIMIT);
        $this->assertSame("-9999-01-01 00:00:00", tNDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tNDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tNDateTime::NULL_EQUIVALENT);
    }



    public function test_tUDateTime_constants()
    {
        $this->assertSame("DateTime", tUDateTime::TYPE);
        $this->assertSame(false, tUDateTime::NULLABLE);
        $this->assertSame(false, tUDateTime::READONLY);

        $this->assertSame(true, tUDateTime::IS_CLASS);

        $this->assertSame(false, tUDateTime::SIGNED);
        $this->assertSame(true, tUDateTime::UNSIGNED);
        $this->assertSame(null, tUDateTime::EMPTY);
        $this->assertSame(true, tUDateTime::HAS_LIMIT);
        $this->assertSame("0001-01-01 00:00:00", tUDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tUDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tUDateTime::NULL_EQUIVALENT);
    }
    public function test_tNUDateTime_constants()
    {
        $this->assertSame("DateTime", tNUDateTime::TYPE);
        $this->assertSame(true, tNUDateTime::NULLABLE);
        $this->assertSame(false, tNUDateTime::READONLY);

        $this->assertSame(true, tNUDateTime::IS_CLASS);

        $this->assertSame(false, tNUDateTime::SIGNED);
        $this->assertSame(true, tNUDateTime::UNSIGNED);
        $this->assertSame(null, tNUDateTime::EMPTY);
        $this->assertSame(true, tNUDateTime::HAS_LIMIT);
        $this->assertSame("0001-01-01 00:00:00", tNUDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tNUDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tNUDateTime::NULL_EQUIVALENT);
    }
    public function test_tROUDateTime_constants()
    {
        $this->assertSame("DateTime", tROUDateTime::TYPE);
        $this->assertSame(false, tROUDateTime::NULLABLE);
        $this->assertSame(true, tROUDateTime::READONLY);

        $this->assertSame(true, tROUDateTime::IS_CLASS);

        $this->assertSame(false, tROUDateTime::SIGNED);
        $this->assertSame(true, tROUDateTime::UNSIGNED);
        $this->assertSame(null, tROUDateTime::EMPTY);
        $this->assertSame(true, tROUDateTime::HAS_LIMIT);
        $this->assertSame("0001-01-01 00:00:00", tROUDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tROUDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tROUDateTime::NULL_EQUIVALENT);
    }
    public function test_tRONUDateTime_constants()
    {
        $this->assertSame("DateTime", tRONUDateTime::TYPE);
        $this->assertSame(true, tRONUDateTime::NULLABLE);
        $this->assertSame(true, tRONUDateTime::READONLY);

        $this->assertSame(true, tRONUDateTime::IS_CLASS);

        $this->assertSame(false, tRONUDateTime::SIGNED);
        $this->assertSame(true, tRONUDateTime::UNSIGNED);
        $this->assertSame(null, tRONUDateTime::EMPTY);
        $this->assertSame(true, tRONUDateTime::HAS_LIMIT);
        $this->assertSame("0001-01-01 00:00:00", tRONUDateTime::MIN);
        $this->assertSame("9999-01-01 23:59:59", tRONUDateTime::MAX);
        $this->assertSame("0001-01-01 00:00:00", tRONUDateTime::NULL_EQUIVALENT);
    }









    public function test_method_toString()
    {
        // DateTime Not Nullable Signed
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00"
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tDateTime::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }





        // DateTime Not Nullable Unsigned
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00"),
            null
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUDateTime::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }


    public function test_method_validate()
    {
        // DateTime Not Nullable Signed
        $validateTrue = [
            "1980-05-17 09:45",
            "1980-05-17 09:45:15",
            "1980-05-17",
            new \DateTime("1980-05-17 9:45:15")
        ];

        $validateFalse = [
            null,
            [],
            new StdClass(),
            "17/05/1980"
        ];


        foreach ($validateTrue as $dt) {
            $this->assertTrue(tDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(tDateTime::validate($dt));
        }

        // Nullable
        $this->assertFalse(tDateTime::validate(null));
        $this->assertTrue(tNDateTime::validate(null));






        // DateTime Not Nullable Unsigned
        $validateTrue = [
            "1980-05-17 09:45",
            "1980-05-17 09:45:15",
            "1980-05-17",
            new \DateTime("1980-05-17 9:45:15")
        ];

        $validateFalse = [
            null,
            [],
            new StdClass(),
            "17/05/1980"
        ];


        foreach ($validateTrue as $dt) {
            $this->assertTrue(tUDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(tUDateTime::validate($dt));
        }

        // Nullable
        $this->assertFalse(tUDateTime::validate(null));
        $this->assertTrue(tNUDateTime::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // DateTime Not Nullable Signed
        $originalValues = [
            "1980-05-17 09:45:15",
            "2000-01-01"
        ];
        $resultConvert = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $convertFalse = [
            undefined, null, []
        ];
        $convertFalseError = [
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tDateTime::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, tDateTime::parseIfValidate(null));





        // DateTime Not Nullable Unsigned
        $originalValues = [
            "1980-05-17 09:45:15",
            "2000-01-01"
        ];
        $resultConvert = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $convertFalse = [
            undefined, null, [], new \DateTime("-1980-05-17 09:45:15"),
        ];
        $convertFalseError = [
            "error.obj.type.unexpected", "error.obj.type.not.allow.null",
            "error.obj.type.unexpected", "error.obj.value.out.of.range"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = tUDateTime::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = tUDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, tUDateTime::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("-9999-01-01 00:00:00", tDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("-9999-01-01 00:00:00", tNDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("-9999-01-01 00:00:00", tRODateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("-9999-01-01 00:00:00", tRONDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tUDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tNUDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tROUDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tRONUDateTime::getMin()->format("Y-m-d H:i:s"));
    }



    public function test_method_max()
    {
        $this->assertSame("9999-01-01 23:59:59", tDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tNDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tRODateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tRONDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tUDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tNUDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tROUDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-01-01 23:59:59", tRONUDateTime::getMax()->format("Y-m-d H:i:s"));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0001-01-01 00:00:00", tDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tNDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tRODateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tRONDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tUDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tNUDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tROUDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0001-01-01 00:00:00", tRONUDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
    }
}
