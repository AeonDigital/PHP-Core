<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Types\stdDateTime as stdDateTime;

require_once __DIR__ . "/../../../../phpunit.php";







class stdDateTimeTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00"
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDateTime::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
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
            $this->assertTrue(stdDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(stdDateTime::validate($dt));
        }
    }



    public function test_method_parseIfValidate()
    {
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
            "error.std.type.unexpected", "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDateTime::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }



    public function test_method_nullEquivalent()
    {
        $dtExpe = new \DateTime("0001-01-01 00:00:00");
        $nulEqu = stdDateTime::nullEquivalent();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }



    public function test_method_min()
    {
        $dtExpe = new \DateTime("-9999-12-31 23:59:59");
        $nulEqu = stdDateTime::min();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }



    public function test_method_max()
    {
        $dtExpe = new \DateTime("9999-12-31 23:59:59");
        $nulEqu = stdDateTime::max();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }
}
