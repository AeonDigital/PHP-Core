<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\SType\
    {
        stString, stNString, stROString, stRONString, stNEString, stNNEString, stRONEString, stRONNEString,
    };


require_once __DIR__ . "/../../../phpunit.php";





class stStringTest extends TestCase
{



    public function test_stString_constants()
    {
        $this->assertSame("String", stString::TYPE);
        $this->assertSame(false, stString::NULLABLE);
        $this->assertSame(false, stString::READONLY);

        $this->assertSame(false, stString::IS_CLASS);

        $this->assertSame(null, stString::SIGNED);
        $this->assertSame(null, stString::UNSIGNED);
        $this->assertSame(true, stString::EMPTY);
        $this->assertSame(true, stString::HAS_LIMIT);
        $this->assertSame(null, stString::MIN);
        $this->assertSame(null, stString::MAX);
        $this->assertSame("", stString::NULL_EQUIVALENT);
    }
    public function test_stNString_constants()
    {
        $this->assertSame("String", stNString::TYPE);
        $this->assertSame(true, stNString::NULLABLE);
        $this->assertSame(false, stNString::READONLY);

        $this->assertSame(false, stNString::IS_CLASS);

        $this->assertSame(null, stNString::SIGNED);
        $this->assertSame(null, stNString::UNSIGNED);
        $this->assertSame(true, stNString::EMPTY);
        $this->assertSame(true, stNString::HAS_LIMIT);
        $this->assertSame(null, stNString::MIN);
        $this->assertSame(null, stNString::MAX);
        $this->assertSame("", stNString::NULL_EQUIVALENT);
    }
    public function test_stROString_constants()
    {
        $this->assertSame("String", stROString::TYPE);
        $this->assertSame(false, stROString::NULLABLE);
        $this->assertSame(true, stROString::READONLY);

        $this->assertSame(false, stROString::IS_CLASS);

        $this->assertSame(null, stROString::SIGNED);
        $this->assertSame(null, stROString::UNSIGNED);
        $this->assertSame(true, stROString::EMPTY);
        $this->assertSame(true, stROString::HAS_LIMIT);
        $this->assertSame(null, stROString::MIN);
        $this->assertSame(null, stROString::MAX);
        $this->assertSame("", stROString::NULL_EQUIVALENT);
    }
    public function test_stRONString_constants()
    {
        $this->assertSame("String", stRONString::TYPE);
        $this->assertSame(true, stRONString::NULLABLE);
        $this->assertSame(true, stRONString::READONLY);

        $this->assertSame(false, stRONString::IS_CLASS);

        $this->assertSame(null, stRONString::SIGNED);
        $this->assertSame(null, stRONString::UNSIGNED);
        $this->assertSame(true, stRONString::EMPTY);
        $this->assertSame(true, stRONString::HAS_LIMIT);
        $this->assertSame(null, stRONString::MIN);
        $this->assertSame(null, stRONString::MAX);
        $this->assertSame("", stRONString::NULL_EQUIVALENT);
    }



    public function test_stNEString_constants()
    {
        $this->assertSame("String", stNEString::TYPE);
        $this->assertSame(false, stNEString::NULLABLE);
        $this->assertSame(false, stNEString::READONLY);

        $this->assertSame(false, stNEString::IS_CLASS);

        $this->assertSame(null, stNEString::SIGNED);
        $this->assertSame(null, stNEString::UNSIGNED);
        $this->assertSame(false, stNEString::EMPTY);
        $this->assertSame(true, stNEString::HAS_LIMIT);
        $this->assertSame("1", stNEString::MIN);
        $this->assertSame(null, stNEString::MAX);
        $this->assertSame(" ", stNEString::NULL_EQUIVALENT);
    }
    public function test_stNNEString_constants()
    {
        $this->assertSame("String", stNNEString::TYPE);
        $this->assertSame(true, stNNEString::NULLABLE);
        $this->assertSame(false, stNNEString::READONLY);

        $this->assertSame(false, stNNEString::IS_CLASS);

        $this->assertSame(null, stNNEString::SIGNED);
        $this->assertSame(null, stNNEString::UNSIGNED);
        $this->assertSame(false, stNNEString::EMPTY);
        $this->assertSame(true, stNNEString::HAS_LIMIT);
        $this->assertSame("1", stNNEString::MIN);
        $this->assertSame(null, stNNEString::MAX);
        $this->assertSame(" ", stNNEString::NULL_EQUIVALENT);
    }
    public function test_stRONEString_constants()
    {
        $this->assertSame("String", stRONEString::TYPE);
        $this->assertSame(false, stRONEString::NULLABLE);
        $this->assertSame(true, stRONEString::READONLY);

        $this->assertSame(false, stRONEString::IS_CLASS);

        $this->assertSame(null, stRONEString::SIGNED);
        $this->assertSame(null, stRONEString::UNSIGNED);
        $this->assertSame(false, stRONEString::EMPTY);
        $this->assertSame(true, stRONEString::HAS_LIMIT);
        $this->assertSame("1", stRONEString::MIN);
        $this->assertSame(null, stRONEString::MAX);
        $this->assertSame(" ", stRONEString::NULL_EQUIVALENT);
    }
    public function test_stRONNEString_constants()
    {
        $this->assertSame("String", stRONNEString::TYPE);
        $this->assertSame(true, stRONNEString::NULLABLE);
        $this->assertSame(true, stRONNEString::READONLY);

        $this->assertSame(false, stRONNEString::IS_CLASS);

        $this->assertSame(null, stRONNEString::SIGNED);
        $this->assertSame(null, stRONNEString::UNSIGNED);
        $this->assertSame(false, stRONNEString::EMPTY);
        $this->assertSame(true, stRONNEString::HAS_LIMIT);
        $this->assertSame("1", stRONNEString::MIN);
        $this->assertSame(null, stRONNEString::MAX);
        $this->assertSame(" ", stRONNEString::NULL_EQUIVALENT);
    }









    public function test_method_validate()
    {
        // String Not Nullable Empty
        $convertTrue = [1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [null, undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(stString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(stString::validate($convertFalse[$i]));
        }


        // Nullable
        $this->assertFalse(stString::validate(null));
        $this->assertTrue(stNString::validate(null));






        // String Not Nullable Not Empty
        $convertTrue = [1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [null, "", undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(stNEString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(stNEString::validate($convertFalse[$i]));
        }


        // Nullable
        $this->assertFalse(stNEString::validate(null));
        $this->assertTrue(stNNEString::validate(null));
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
            $result = stString::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stString::parseIfValidate(null));
        $this->assertSame(null, stNString::parseIfValidate(null));






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
            $result = stNEString::parseIfValidate($originalValues[$i]);
            $this->assertSame($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stNEString::parseIfValidate($convertFalse[$i], $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        // Nullable
        $this->assertSame(null, stNEString::parseIfValidate(null));
        $this->assertSame(null, stNNEString::parseIfValidate(null));






        // String Not Nullable Empty with InputFormat
        $err = "";
        $result = stString::parseIfValidate(
            "invalid brasil zipcode", $err, null, null, null,
            "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
        );
        $this->assertSame("invalid brasil zipcode", $result);
        $this->assertSame("error.obj.value.invalid.input.format", $err);

        $err = "";
        $result = stString::parseIfValidate(
            "96080150", $err, null, null, null,
            "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
        );
        $this->assertSame("96080150", $result);
        $this->assertSame("", $err);
    }










    public function test_method_min()
    {
        $this->assertSame(0, stString::getMin());
        $this->assertSame(0, stNString::getMin());
        $this->assertSame(0, stROString::getMin());
        $this->assertSame(0, stRONString::getMin());
        $this->assertSame(1, stNEString::getMin());
        $this->assertSame(1, stNNEString::getMin());
        $this->assertSame(1, stRONEString::getMin());
        $this->assertSame(1, stRONNEString::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame(0, stString::getMax());
        $this->assertSame(0, stNString::getMax());
        $this->assertSame(0, stROString::getMax());
        $this->assertSame(0, stRONString::getMax());
        $this->assertSame(0, stNEString::getMax());
        $this->assertSame(0, stNNEString::getMax());
        $this->assertSame(0, stRONEString::getMax());
        $this->assertSame(0, stRONNEString::getMax());
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("", stString::getNullEquivalent());
        $this->assertSame("", stNString::getNullEquivalent());
        $this->assertSame("", stROString::getNullEquivalent());
        $this->assertSame("", stRONString::getNullEquivalent());
        $this->assertSame(" ", stNEString::getNullEquivalent());
        $this->assertSame(" ", stNNEString::getNullEquivalent());
        $this->assertSame(" ", stRONEString::getNullEquivalent());
        $this->assertSame(" ", stRONNEString::getNullEquivalent());
    }
}
