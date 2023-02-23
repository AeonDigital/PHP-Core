<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Convert as Convert;
use AeonDigital\RealType as RealType;

require_once __DIR__ . "/../phpunit.php";





class ConvertTests extends TestCase
{



    public function test_method_toBool()
    {
        $bTrue = [true, "yes", 1, "1", "on"];
        $bFalse = [false, "no", 0, "0", "off"];
        $bNull = ["", null, undefined, new DateTime()];


        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Convert::toBool($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Convert::toBool($bFalse[$i]));
        }

        for ($i = 0; $i < count($bNull); $i++) {
            $this->assertNull(Convert::toBool($bNull[$i]));
        }
    }

    public function test_method_toNumeric()
    {
        $convertTrue = [-1, 0, 1, 0.0002, "-1", "0", "1", "0.0002", false, true];
        $resultConvert = [-1, 0, 1, 0.0002, -1, 0, 1, 0.0002, 0, 1];
        $convertFalse = ["", undefined, new DateTime()];



        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toNumeric($convertTrue[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toNumeric($convertFalse[$i]);
            $this->assertNull($result);
        }
    }

    public function test_method_toInt()
    {
        $convertTrue = [
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            "1", "1.1", "1.2", "1.3", "1.4", "1.5", "1.6", "1.7", "1.8", "1.999999", "2",
            true, false
        ];
        $resultConvert = [
            1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2,
            1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2,
            1, 0
        ];

        $convertFalse = ["", null, undefined, "teste", [], "false", "true", "11111c", "1@"];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toInt($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toInt($convertFalse[$i]);
            $this->assertNull($result);
        }
    }

    public function test_method_toFloat()
    {
        $convertTrue = [
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            "1", "1.1", "1.2", "1.3", "1.4", "1.5", "1.6", "1.7", "1.8", "1.999999", "2",
            true, false
        ];
        $resultConvert = [
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            1, 0
        ];

        $convertFalse = ["", null, undefined, "teste", [], "false", "true", "11111c", "1@"];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toFloat($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toFloat($convertFalse[$i]);
            $this->assertNull($result);
        }
    }

    public function test_method_toString()
    {
        $convertTrue = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo",
            999.987656745654, ["1", "2", "3"]
        ];
        $resultConvert = [
            "", "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo",
            "999.987656745654", "1 2 3"
        ];
        $convertFalse = [undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toString($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toString($convertFalse[$i]);
            $this->assertNull($result);
        }


        $this->assertSame("0", Convert::toString(0.0));
        $nReal = new RealType("12");
        $this->assertSame("12", Convert::toString($nReal));
    }

    public function test_method_toArray()
    {
        $convertTrue = [null, true, 1, 1.2, "str", [1, 2, 3]];
        $resultConvert = [[null], [true], [1], [1.2], ["str"], [1, 2, 3]];
        $convertFalse = [new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toArray($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toArray($convertFalse[$i]);
            $this->assertNull($result);
        }
    }

    public function test_method_toArrayStr()
    {
        $convertTrue = [true, 1, 1.9, "str", new \DateTime("2020-01-01 00:00:00")];
        $expectedTrue = ["1", "1", "1.9", "str", "2020-01-01 00:00:00"];
        $this->assertEquals(Convert::toArrayStr($convertTrue), $expectedTrue);

        $convertFalse = [null, new \stdClass(), true, 1, 1.9, "str", new \DateTime("2020-01-01 00:00:00")];
        $this->assertEquals(Convert::toArrayStr($convertFalse), null);

        $expectedForceTrue = ["", "stdClass", "1", "1", "1.9", "str", "2020-01-01 00:00:00"];
        $this->assertEquals(Convert::toArrayStr($convertFalse, true), $expectedForceTrue);
    }

    public function test_method_toDateTime()
    {
        date_default_timezone_set("America/Sao_Paulo");

        $convertTrue = ["0", "1980-05-17 09:45", new \DateTime("1980-05-17 9:45:15"), "17-05-1980"];
        $convertFormat = ["", "Y-m-d H:i", "", "d-m-Y"];
        $resultConvert = [
            ["1969-12-31", null],
            ["1980-05-17", "09:45:00"],
            ["1980-05-17", "09:45:15"],
            ["1980-05-17", "00:00:00"]
        ];
        $convertFalse = [
            undefined, "", new \stdClass()
        ];

        $t = new \DateTime();


        for ($i = 0; $i < count($convertTrue); $i++) {
            $dTemp = Convert::toDateTime($convertTrue[$i], $convertFormat[$i]);
            $this->assertEquals($dTemp->format("Y-m-d"), $resultConvert[$i][0]);
            if ($resultConvert[$i][1] !== null) {
                $this->assertEquals($dTemp->format("H:i:s"), $resultConvert[$i][1]);
            }
        }


        for ($i = 0; $i < count($convertFalse); $i++) {
            $dTemp = Convert::toDateTime($convertFalse[$i]);
            $this->assertNull($dTemp);
        }
    }

    public function test_method_toDateTimeString()
    {
        date_default_timezone_set("America/Sao_Paulo");

        $convertTrue = ["0", "1980-05-17 09:45", new \DateTime("1980-05-17 9:45:15"),];
        $convertFormat = ["", "Y-m-d H:i", ""];
        $finalFormat = ["d-m-Y", "d-m-Y h:i", "m-d-Y"];
        $resultConvert = ["31-12-1969", "17-05-1980 09:45", "05-17-1980"];
        $convertFalse = [
            undefined, "", new \stdClass()
        ];

        $t = new \DateTime();


        for ($i = 0; $i < count($convertTrue); $i++) {
            $dTemp = Convert::toDateTimeString($convertTrue[$i], $convertFormat[$i], $finalFormat[$i]);
            $this->assertEquals($dTemp, $resultConvert[$i]);
        }


        for ($i = 0; $i < count($convertFalse); $i++) {
            $dTemp = Convert::toDateTimeString($convertFalse[$i], $convertFormat[$i], $finalFormat[$i]);
            $this->assertNull($dTemp);
        }
    }

    public function test_method_toRealType()
    {
        $convertTrue = [
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            "1", "1.1", "1.2", "1.3", "1.4", "1.5", "1.6", "1.7", "1.8", "1.999999", "2"
        ];
        $resultConvert = [
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2,
            1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.999999, 2
        ];

        $convertFalse = [true, false, "", null, undefined, "teste", [], "false", "true", "11111c", "1@"];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toRealType($convertTrue[$i]);
            $this->assertEquals($result->value(), strval($resultConvert[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toRealType($convertFalse[$i]);
            $this->assertNull($result);
        }
    }










    public function test_method_toJson()
    {
        $convertTrue = [null, true, false, 1, 1.2, "str", [1, 2, 3]];
        $resultConvert = ["null", "true", "false", "1", "1.2", '"str"', "[1,2,3]"];
        $convertFalse = [new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Convert::toJson($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Convert::toJson($convertFalse[$i]);
            $this->assertNull($result);
        }
    }
}