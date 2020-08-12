<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\
    {
        scDateTime, scNDateTime, scRODateTime, scRONDateTime
    };


require_once __DIR__ . "/../../../phpunit.php";





class scDateTimeTest extends TestCase
{



    public function test_scDateTime_constants()
    {
        $this->assertSame("DateTime", scDateTime::TYPE);
        $this->assertSame(false, scDateTime::NULLABLE);
        $this->assertSame(false, scDateTime::READONLY);

        $this->assertSame(true, scDateTime::IS_CLASS);

        $this->assertSame(false, scDateTime::SIGNED);
        $this->assertSame(true, scDateTime::UNSIGNED);
        $this->assertSame(null, scDateTime::EMPTY);
        $this->assertSame(true, scDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", scDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", scDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", scDateTime::NULL_EQUIVALENT);
    }
    public function test_scNDateTime_constants()
    {
        $this->assertSame("DateTime", scNDateTime::TYPE);
        $this->assertSame(true, scNDateTime::NULLABLE);
        $this->assertSame(false, scNDateTime::READONLY);

        $this->assertSame(true, scNDateTime::IS_CLASS);

        $this->assertSame(false, scDateTime::SIGNED);
        $this->assertSame(true, scDateTime::UNSIGNED);
        $this->assertSame(null, scNDateTime::EMPTY);
        $this->assertSame(true, scNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", scNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::NULL_EQUIVALENT);
    }
    public function test_scRODateTime_constants()
    {
        $this->assertSame("DateTime", scRODateTime::TYPE);
        $this->assertSame(false, scRODateTime::NULLABLE);
        $this->assertSame(true, scRODateTime::READONLY);

        $this->assertSame(true, scRODateTime::IS_CLASS);

        $this->assertSame(false, scDateTime::SIGNED);
        $this->assertSame(true, scDateTime::UNSIGNED);
        $this->assertSame(null, scRODateTime::EMPTY);
        $this->assertSame(true, scNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", scNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::NULL_EQUIVALENT);
    }
    public function test_scRONDateTime_constants()
    {
        $this->assertSame("DateTime", scRONDateTime::TYPE);
        $this->assertSame(true, scRONDateTime::NULLABLE);
        $this->assertSame(true, scRONDateTime::READONLY);

        $this->assertSame(true, scRONDateTime::IS_CLASS);

        $this->assertSame(false, scDateTime::SIGNED);
        $this->assertSame(true, scDateTime::UNSIGNED);
        $this->assertSame(null, scRONDateTime::EMPTY);
        $this->assertSame(true, scNDateTime::HAS_LIMIT);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::MIN);
        $this->assertSame("9999-12-31 23:59:59", scNDateTime::MAX);
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::NULL_EQUIVALENT);
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
            $result = scDateTime::toString($originalValues[$i]);
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
            $this->assertTrue(scDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(scDateTime::validate($dt));
        }

        // Nullable
        $this->assertFalse(scDateTime::validate(null));
        $this->assertTrue(scNDateTime::validate(null));
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
            $result = scDateTime::parseIfValidate($originalValues[$i]);
            $this->assertSame($result->format("Y-m-d H:i:s"), $resultConvert[$i]->format("Y-m-d H:i:s"));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, scDateTime::parseIfValidate(null));
    }










    public function test_method_min()
    {
        $this->assertSame("0000-01-01 00:00:00", scDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scRODateTime::getMin()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scRONDateTime::getMin()->format("Y-m-d H:i:s"));
    }



    public function test_method_max()
    {
        $this->assertSame("9999-12-31 23:59:59", scDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", scNDateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", scRODateTime::getMax()->format("Y-m-d H:i:s"));
        $this->assertSame("9999-12-31 23:59:59", scRONDateTime::getMax()->format("Y-m-d H:i:s"));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("0000-01-01 00:00:00", scDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scNDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scRODateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
        $this->assertSame("0000-01-01 00:00:00", scRONDateTime::getNullEquivalent()->format("Y-m-d H:i:s"));
    }
}
