<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Scalar as Scalar;
use AeonDigital\RealType as RealType;

require_once __DIR__ . "/../phpunit.php";





class ScalarTests extends TestCase
{



    public function test_method_getType()
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
            $this->assertEquals(Scalar::getType($value), $key);
        }
    }

    public function test_method_checkType()
    {
        $bValues = [null, true, 1, 10.44, "str", [1, 2, 3]];
        $bTypes = ["null", "bool", "int", "float", "string", "array"];

        for ($i = 0; $i < count($bValues); $i++) {
            $this->assertTrue(Scalar::checkType($bValues[$i], $bTypes[$i]));
        }
    }

    public function test_method_isScalar()
    {
        $bTrue = [null, true, 1, 10.44, "str", [1, 2, 3]];
        $bFalse = [new stdClass(), new \DateTime()];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isScalar($bTrue[$i]));
        }
        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isScalar($bFalse[$i]));
        }
    }










    public function test_method_isNull()
    {
        $bTrue = [null];
        $bFalse = [true, 1, 12.11, "str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isNull($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isNull($bFalse[$i]));
        }
    }

    public function test_method_isBool()
    {
        $bTrue = [true, false];
        $bFalse = [null, 1, 12.11, "str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isBool($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isBool($bFalse[$i]));
        }
    }

    public function test_method_isNumeric()
    {
        $bTrue = [-1, 0, 1, "01", "-223", "938.8277"];
        $bFalse = [null, true, false, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isNumeric($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isNumeric($bFalse[$i]));
        }
    }

    public function test_method_isInt()
    {
        $bTrue = [-1, 0, 1];
        $bFalse = [null, true, false, 1.23, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isInt($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isInt($bFalse[$i]));
        }
    }

    public function test_method_isFloat()
    {
        $bTrue = [-1.1, 0.0, 1.1];
        $bFalse = [null, true, false, -1, 0, 1, "str", "str33", "11str"];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isFloat($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isFloat($bFalse[$i]));
        }
    }

    public function test_method_isString()
    {
        $bTrue = ["str", "str33", "11str"];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isString($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isString($bFalse[$i]));
        }
    }

    public function test_method_isArray()
    {
        $bFalse = [null, true, false, -1, 0, 1, 12.33, "arr"];

        $this->assertTrue(Scalar::isArray([1, 2, 3]));

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isArray($bFalse[$i]));
        }
    }

    public function test_method_isDateTime()
    {
        $bTrue = [new \DateTime()];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isDateTime($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isDateTime($bFalse[$i]));
        }
    }

    public function test_method_isRealType()
    {
        $bTrue = [new RealType("12232.43445")];
        $bFalse = [null, true, false, -1, 0, 1, 12.33];

        for ($i = 0; $i < count($bTrue); $i++) {
            $this->assertTrue(Scalar::isRealType($bTrue[$i]));
        }

        for ($i = 0; $i < count($bFalse); $i++) {
            $this->assertFalse(Scalar::isRealType($bFalse[$i]));
        }
    }
}