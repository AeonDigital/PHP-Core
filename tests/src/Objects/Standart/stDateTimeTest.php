<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\
    {
        stDateTime, stNDateTime, stRODateTime, stRONDateTime
    };


require_once __DIR__ . "/../../../phpunit.php";





class stDateTimeTest extends TestCase
{



    public function test_stDateTime_constants()
    {
        $this->assertSame("DateTime", stDateTime::TYPE);
        $this->assertSame(false, stDateTime::NULLABLE);
        $this->assertSame(false, stDateTime::READONLY);

        $this->assertSame(true, stDateTime::IS_CLASS);

        $this->assertSame(false, stDateTime::SIGNED);
        $this->assertSame(true, stDateTime::UNSIGNED);
        $this->assertSame(null, stDateTime::EMPTY);
        $this->assertSame(true, stDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", stDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", stDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", stDateTime::NULL_EQUIVALENT);
    }
    public function test_stNDateTime_constants()
    {
        $this->assertSame("DateTime", stNDateTime::TYPE);
        $this->assertSame(true, stNDateTime::NULLABLE);
        $this->assertSame(false, stNDateTime::READONLY);

        $this->assertSame(true, stNDateTime::IS_CLASS);

        $this->assertSame(false, stDateTime::SIGNED);
        $this->assertSame(true, stDateTime::UNSIGNED);
        $this->assertSame(null, stNDateTime::EMPTY);
        $this->assertSame(true, stNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", stNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::NULL_EQUIVALENT);
    }
    public function test_stRODateTime_constants()
    {
        $this->assertSame("DateTime", stRODateTime::TYPE);
        $this->assertSame(false, stRODateTime::NULLABLE);
        $this->assertSame(true, stRODateTime::READONLY);

        $this->assertSame(true, stRODateTime::IS_CLASS);

        $this->assertSame(false, stDateTime::SIGNED);
        $this->assertSame(true, stDateTime::UNSIGNED);
        $this->assertSame(null, stRODateTime::EMPTY);
        $this->assertSame(true, stNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", stNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::NULL_EQUIVALENT);
    }
    public function test_stRONDateTime_constants()
    {
        $this->assertSame("DateTime", stRONDateTime::TYPE);
        $this->assertSame(true, stRONDateTime::NULLABLE);
        $this->assertSame(true, stRONDateTime::READONLY);

        $this->assertSame(true, stRONDateTime::IS_CLASS);

        $this->assertSame(false, stDateTime::SIGNED);
        $this->assertSame(true, stDateTime::UNSIGNED);
        $this->assertSame(null, stRONDateTime::EMPTY);
        $this->assertSame(true, stNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", stNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::NULL_EQUIVALENT);
    }









    public function test_method_toString()
    {
        // DateTime Not Nullable
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00"
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stDateTime::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }


    public function test_method_validate()
    {
        // DateTime Not Nullable
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
            $this->assertTrue(stDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(stDateTime::validate($dt));
        }

        // Nullable
        $this->assertFalse(stDateTime::validate(null));
        $this->assertTrue(stNDateTime::validate(null));
    }


    public function test_method_parseIfValidate()
    {
        // DateTime Not Nullable
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
            $result = stDateTime::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->format("Y-m-d H:i:s"), $resultConvert[$i]->format("Y-m-d H:i:s"));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stDateTime::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("0000-01-01 00:00:00", stDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stRODateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stRONDateTime::getMin()->format("Y-m-d H:i:s"));
    }



    public function test_method_max()
    {
        $this->assertSame("9999-12-31 23:59:59", stDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", stNDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", stRODateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", stRONDateTime::getMax()->format("Y-m-d H:i:s"));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0000-01-01 00:00:00", stDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stNDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stRODateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", stRONDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
    }
}
