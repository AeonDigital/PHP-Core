<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Commom\
    {
        scString, scNString, scROString, scRONString, scNEString, scNNEString, scRONEString, scRONNEString,
    };


require_once __DIR__ . "/../../../phpunit.php";





class scStringTest extends TestCase
{



    public function test_scString_constants()
    {
        $this->assertSame("String", scString::TYPE);
        $this->assertSame(false, scString::NULLABLE);
        $this->assertSame(false, scString::READONLY);

        $this->assertSame(false, scString::IS_CLASS);

        $this->assertSame(null, scString::SIGNED);
        $this->assertSame(null, scString::UNSIGNED);
        $this->assertSame(true, scString::EMPTY);
        $this->assertSame(true, scString::HAS_LIMIT);
        $this->assertSame(null, scString::MIN);
        $this->assertSame(null, scString::MAX);
        $this->assertSame("", scString::NULL_EQUIVALENT);
    }
    public function test_scNString_constants()
    {
        $this->assertSame("String", scNString::TYPE);
        $this->assertSame(true, scNString::NULLABLE);
        $this->assertSame(false, scNString::READONLY);

        $this->assertSame(false, scNString::IS_CLASS);

        $this->assertSame(null, scNString::SIGNED);
        $this->assertSame(null, scNString::UNSIGNED);
        $this->assertSame(true, scNString::EMPTY);
        $this->assertSame(true, scNString::HAS_LIMIT);
        $this->assertSame(null, scNString::MIN);
        $this->assertSame(null, scNString::MAX);
        $this->assertSame("", scNString::NULL_EQUIVALENT);
    }
    public function test_scROString_constants()
    {
        $this->assertSame("String", scROString::TYPE);
        $this->assertSame(false, scROString::NULLABLE);
        $this->assertSame(true, scROString::READONLY);

        $this->assertSame(false, scROString::IS_CLASS);

        $this->assertSame(null, scROString::SIGNED);
        $this->assertSame(null, scROString::UNSIGNED);
        $this->assertSame(true, scROString::EMPTY);
        $this->assertSame(true, scROString::HAS_LIMIT);
        $this->assertSame(null, scROString::MIN);
        $this->assertSame(null, scROString::MAX);
        $this->assertSame("", scROString::NULL_EQUIVALENT);
    }
    public function test_scRONString_constants()
    {
        $this->assertSame("String", scRONString::TYPE);
        $this->assertSame(true, scRONString::NULLABLE);
        $this->assertSame(true, scRONString::READONLY);

        $this->assertSame(false, scRONString::IS_CLASS);

        $this->assertSame(null, scRONString::SIGNED);
        $this->assertSame(null, scRONString::UNSIGNED);
        $this->assertSame(true, scRONString::EMPTY);
        $this->assertSame(true, scRONString::HAS_LIMIT);
        $this->assertSame(null, scRONString::MIN);
        $this->assertSame(null, scRONString::MAX);
        $this->assertSame("", scRONString::NULL_EQUIVALENT);
    }



    public function test_scNEString_constants()
    {
        $this->assertSame("String", scNEString::TYPE);
        $this->assertSame(false, scNEString::NULLABLE);
        $this->assertSame(false, scNEString::READONLY);

        $this->assertSame(false, scNEString::IS_CLASS);

        $this->assertSame(null, scNEString::SIGNED);
        $this->assertSame(null, scNEString::UNSIGNED);
        $this->assertSame(false, scNEString::EMPTY);
        $this->assertSame(true, scNEString::HAS_LIMIT);
        $this->assertSame("1", scNEString::MIN);
        $this->assertSame(null, scNEString::MAX);
        $this->assertSame(" ", scNEString::NULL_EQUIVALENT);
    }
    public function test_scNNEString_constants()
    {
        $this->assertSame("String", scNNEString::TYPE);
        $this->assertSame(true, scNNEString::NULLABLE);
        $this->assertSame(false, scNNEString::READONLY);

        $this->assertSame(false, scNNEString::IS_CLASS);

        $this->assertSame(null, scNNEString::SIGNED);
        $this->assertSame(null, scNNEString::UNSIGNED);
        $this->assertSame(false, scNNEString::EMPTY);
        $this->assertSame(true, scNNEString::HAS_LIMIT);
        $this->assertSame("1", scNNEString::MIN);
        $this->assertSame(null, scNNEString::MAX);
        $this->assertSame(" ", scNNEString::NULL_EQUIVALENT);
    }
    public function test_scRONEString_constants()
    {
        $this->assertSame("String", scRONEString::TYPE);
        $this->assertSame(false, scRONEString::NULLABLE);
        $this->assertSame(true, scRONEString::READONLY);

        $this->assertSame(false, scRONEString::IS_CLASS);

        $this->assertSame(null, scRONEString::SIGNED);
        $this->assertSame(null, scRONEString::UNSIGNED);
        $this->assertSame(false, scRONEString::EMPTY);
        $this->assertSame(true, scRONEString::HAS_LIMIT);
        $this->assertSame("1", scRONEString::MIN);
        $this->assertSame(null, scRONEString::MAX);
        $this->assertSame(" ", scRONEString::NULL_EQUIVALENT);
    }
    public function test_scRONNEString_constants()
    {
        $this->assertSame("String", scRONNEString::TYPE);
        $this->assertSame(true, scRONNEString::NULLABLE);
        $this->assertSame(true, scRONNEString::READONLY);

        $this->assertSame(false, scRONNEString::IS_CLASS);

        $this->assertSame(null, scRONNEString::SIGNED);
        $this->assertSame(null, scRONNEString::UNSIGNED);
        $this->assertSame(false, scRONNEString::EMPTY);
        $this->assertSame(true, scRONNEString::HAS_LIMIT);
        $this->assertSame("1", scRONNEString::MIN);
        $this->assertSame(null, scRONNEString::MAX);
        $this->assertSame(" ", scRONNEString::NULL_EQUIVALENT);
    }









    public function test_method_validate()
    {
        // String Not Nullable Empty
        $convertTrue = [1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [null, undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(scString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(scString::validate($convertFalse[$i]));
        }


        // Nullable
        $this->assertFalse(scString::validate(null));
        $this->assertTrue(scNString::validate(null));






        // String Not Nullable Not Empty
        $convertTrue = [1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [null, "", undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(scNEString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(scNEString::validate($convertFalse[$i]));
        }


        // Nullable
        $this->assertFalse(scNEString::validate(null));
        $this->assertTrue(scNNEString::validate(null));
    }



    public function test_method_parseIfValidate()
    {
        // String Not Nullable Empty
        $originalValues = [
            1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $resultConvert = [
            "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];
        $convertFalse = [
            undefined, new stdClass()
        ];
        $convertFalseError = [
            "error.obj.type.unexpected", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scString::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scString::parseIfValidate(null));
        $this->assertSame(null, scNString::parseIfValidate(null));






        // String Not Nullable Not Empty
        $originalValues = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $resultConvert = [
            null, "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];
        $convertFalse = [
            "", undefined, new stdClass()
        ];
        $convertFalseError = [
            "error.obj.type.not.allow.empty", "error.obj.type.unexpected", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scNEString::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = scNEString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, scNEString::parseIfValidate(null));
        $this->assertSame(null, scNNEString::parseIfValidate(null));






        // String Not Nullable Empty with InputFormat
        $err = "";
        $result = scString::parseIfValidate(
            "invalid brasil zipcode", $err, null, null, null,
            "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
        );
        $this->assertSame("invalid brasil zipcode", $result);
        $this->assertSame("error.obj.value.invalid.input.format", $err);

        $err = "";
        $result = scString::parseIfValidate(
            "96080150", $err, null, null, null,
            "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
        );
        $this->assertSame("96080150", $result);
        $this->assertSame("", $err);
    }










    public function test_method_min()
    {
        $this->assertSame(0, scString::getMin());
        $this->assertSame(0, scNString::getMin());
        $this->assertSame(0, scROString::getMin());
        $this->assertSame(0, scRONString::getMin());
        $this->assertSame(1, scNEString::getMin());
        $this->assertSame(1, scNNEString::getMin());
        $this->assertSame(1, scRONEString::getMin());
        $this->assertSame(1, scRONNEString::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(0, scString::getMax());
        $this->assertSame(0, scNString::getMax());
        $this->assertSame(0, scROString::getMax());
        $this->assertSame(0, scRONString::getMax());
        $this->assertSame(0, scNEString::getMax());
        $this->assertSame(0, scNNEString::getMax());
        $this->assertSame(0, scRONEString::getMax());
        $this->assertSame(0, scRONNEString::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("", scString::getNullEquivalent());
        $this->assertSame("", scNString::getNullEquivalent());
        $this->assertSame("", scROString::getNullEquivalent());
        $this->assertSame("", scRONString::getNullEquivalent());
        $this->assertSame(" ", scNEString::getNullEquivalent());
        $this->assertSame(" ", scNNEString::getNullEquivalent());
        $this->assertSame(" ", scRONEString::getNullEquivalent());
        $this->assertSame(" ", scRONNEString::getNullEquivalent());
    }
}
