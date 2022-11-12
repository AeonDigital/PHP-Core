<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\SimpleType\stDateTime as stDateTime;

require_once __DIR__ . "/../../phpunit.php";







class stDateTimeTest extends TestCase
{





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
            new stdClass(),
            "17/05/1980"
        ];


        foreach ($validateTrue as $dt) {
            $this->assertTrue(stDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(stDateTime::validate($dt));
        }
    }



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
            $result = stDateTime::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
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
            "error.st.unexpected.type", "error.st.unexpected.type", "error.st.unexpected.type"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stDateTime::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stDateTime::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }
    }
}
