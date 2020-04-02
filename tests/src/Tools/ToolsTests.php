<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Tools as Tools;
use AeonDigital\Realtype as Realtype;

require_once __DIR__ . "/../../phpunit.php";






class ToolsTests extends TestCase
{





    public function test_method_getScalarType()
    {
        $bTests = [
            "null" => null,
            "bool" => false,
            "int" => 1,
            "float" => 10.44,
            "string" => "str",
            "array" => [1, 2, 3],
        ];

        foreach ($bTests as $key => $value) {
            $this->assertEquals(Tools::getScalarType($value), $key);
        }
    }
    public function test_method_isScalarType()
    {
        $bValues = [null, true, 1, 10.44, "str", [1, 2, 3]];
        $bTypes = ["null", "bool", "int", "float", "string", "array"];

        for ($i=0; $i<count($bValues); $i++) {
            $this->assertTrue(Tools::isScalarType($bValues[$i], $bTypes[$i]));
        }
    }
    public function test_method_isScalar()
    {
        $bTrue = [null, true, 1, 10.44, "str", [1, 2, 3]];
        $bFalse = [new stdClass(), new \DateTime()];

        for ($i=0; $i<count($bTrue); $i++) {
            $this->assertTrue(Tools::isScalar($bTrue[$i]));
        }
        for ($i=0; $i<count($bFalse); $i++) {
            $this->assertFalse(Tools::isScalar($bFalse[$i]));
        }
    }










    public function test_method_isNull()
    {
        $bTrue = [null];
        $bFalse = [true, 1, 12.11, "str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isNull($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isNull($bFalse[$i]));
        }
    }
    public function test_method_isBool()
    {
        $bTrue = [true, false];
        $bFalse = [null, 1, 12.11, "str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isBool($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isBool($bFalse[$i]));
        }
    }
    public function test_method_isNumeric()
    {
        $bTrue = [-1, 0, 1, "01", "-223", "938.8277"];
        $bFalse = [null, true, false, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isNumeric($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isNumeric($bFalse[$i]));
        }
    }
    public function test_method_isInt()
    {
        $bTrue = [-1, 0, 1];
        $bFalse = [null, true, false, 1.23, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isInt($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isInt($bFalse[$i]));
        }
    }
    public function test_method_isFloat()
    {
        $bTrue = [-1.1, 0.0, 1.1];
        $bFalse = [null, true, false, -1, 0, 1, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isFloat($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isFloat($bFalse[$i]));
        }
    }
    public function test_method_isString()
    {
        $bTrue = ["str", "str33", "11str"];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isString($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isString($bFalse[$i]));
        }
    }
    public function test_method_isArray()
    {
        $bFalse = [null, true, false, -1, 0, 1, 12.33, "arr"];

        $this->assertTrue(Tools::isArray([1, 2, 3]));

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isArray($bFalse[$i]));
        }
    }
    public function test_method_isDateTime()
    {
        $bTrue = [new \DateTime()];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isDateTime($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isDateTime($bFalse[$i]));
        }
    }
    public function test_method_isRealType()
    {
        $bTrue = [new Realtype("12232.43445")];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::isRealType($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::isRealType($bFalse[$i]));
        }
    }










    public function test_method_toBool()
    {
        $bTrue = [true, "yes", 1, "1", "on"];
        $bFalse = [false, "no", 0, "0", "off"];
        $bNull = ["", null, undefined, new DateTime()];


        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Tools::toBool($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Tools::toBool($bFalse[$i]));
        }

        for ($i = 0; $i < count($bNull); $i++) {
            $this->assertNull(Tools::toBool($bNull[$i]));
        }
    }
    public function test_method_toNumeric()
    {
        $convertTrue = [-1, 0, 1, 0.0002, "-1", "0", "1", "0.0002", false, true];
        $resultConvert = [-1, 0, 1, 0.0002, -1, 0, 1, 0.0002, 0, 1];
        $convertFalse = ["", undefined, new DateTime()];



        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Tools::toNumeric($convertTrue[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toNumeric($convertFalse[$i]);
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
            $result = Tools::toInt($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toInt($convertFalse[$i]);
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
            $result = Tools::toFloat($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toFloat($convertFalse[$i]);
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
            $result = Tools::toString($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toString($convertFalse[$i]);
            $this->assertNull($result);
        }


        $this->assertSame("0", Tools::toString(0.0));
        $nReal = new Realtype("12");
        $this->assertSame("12", Tools::toString($nReal));
    }
    public function test_method_toArray()
    {
        $convertTrue = [null, true, 1, 1.2, "str", [1, 2, 3]];
        $resultConvert = [[null], [true], [1], [1.2], ["str"], [1, 2, 3]];
        $convertFalse = [new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Tools::toArray($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toArray($convertFalse[$i]);
            $this->assertNull($result);
        }
    }
    public function test_method_toArrayStr()
    {
        $convertTrue = [true, 1, 1.9, "str", new \DateTime("2020-01-01 00:00:00")];
        $expectedTrue = ["1", "1", "1.9", "str", "2020-01-01 00:00:00"];
        $this->assertEquals(Tools::toArrayStr($convertTrue), $expectedTrue);

        $convertFalse = [null, new \stdClass(), true, 1, 1.9, "str", new \DateTime("2020-01-01 00:00:00")];
        $this->assertEquals(Tools::toArrayStr($convertFalse), null);

        $expectedForceTrue = ["", "stdClass", "1", "1", "1.9", "str", "2020-01-01 00:00:00"];
        $this->assertEquals(Tools::toArrayStr($convertFalse, true), $expectedForceTrue);
    }
    public function test_method_toDateTime()
    {
        date_default_timezone_set("America/Sao_Paulo");

        $convertTrue = ["0", "1980-05-17 09:45", new \DateTime("1980-05-17 9:45:15"),];
        $convertFormat = ["", "Y-m-d H:i", ""];
        $resultConvert = [
            ["1969-12-31", null],
            ["1980-05-17", "09:45:00"],
            ["1980-05-17", "09:45:15"],
        ];
        $convertFalse = [
            undefined, "", new \stdClass()
        ];

        $t = new \DateTime();


        for ($i = 0; $i < count($convertTrue); $i++) {
            $dTemp = Tools::toDateTime($convertTrue[$i], $convertFormat[$i]);
            $this->assertEquals($dTemp->format("Y-m-d"), $resultConvert[$i][0]);
            if ($resultConvert[$i][1] !== null) {
                $this->assertEquals($dTemp->format("h:i:s"), $resultConvert[$i][1]);
            }
        }


        for ($i = 0; $i < count($convertFalse); $i++) {
            $dTemp = Tools::toDateTime($convertFalse[$i]);
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
            $dTemp = Tools::toDateTimeString($convertTrue[$i], $convertFormat[$i], $finalFormat[$i]);
            $this->assertEquals($dTemp, $resultConvert[$i]);
        }


        for ($i = 0; $i < count($convertFalse); $i++) {
            $dTemp = Tools::toDateTimeString($convertFalse[$i], $convertFormat[$i], $finalFormat[$i]);
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
            $result = Tools::toRealType($convertTrue[$i]);
            $this->assertEquals($result->value(), strval($resultConvert[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toRealType($convertFalse[$i]);
            $this->assertNull($result);
        }
    }










    public function test_method_toJson()
    {
        $convertTrue = [null, true, false, 1, 1.2, "str", [1, 2, 3]];
        $resultConvert = ["null", "true", "false", "1", "1.2", '"str"', "[1,2,3]"];
        $convertFalse = [new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $result = Tools::toJson($convertTrue[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $result = Tools::toJson($convertFalse[$i]);
            $this->assertNull($result);
        }
    }
}
