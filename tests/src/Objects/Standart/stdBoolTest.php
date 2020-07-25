<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdBool as stdBool;

require_once __DIR__ . "/../../../phpunit.php";







class stdBoolTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [true, "yes", 1, "1", "on", false, "no", 0, "0", "off", 2, undefined, null, []];
        $expectedValues = ["1", "1", "1", "1", "1", "0", "0", "0", "0", "0", "1", null, null, null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdBool::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [true, "yes", 1, "1", 2, "on", false, "no", 0, "0", "off"];
        $validateFalse = ["", null, undefined, new DateTime()];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdBool::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdBool::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            true, "yes", 1, "1", "on",
            false, "no", 0, "0", "off"
        ];
        $resultConvert = [
            true, true, true, true, true,
            false, false, false, false, false
        ];
        $convertFalse = [
            "", null, undefined
        ];
        $convertFalseError = [
            "error.std.type.unexpected",
            "error.std.type.not.nullable",
            "error.std.type.unexpected"
        ];



        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdBool::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdBool::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdBool::parseIfValidate(null, true));
        $this->assertSame(false, stdBool::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(false, stdBool::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(null, stdBool::min());
    }



    public function test_method_max()
    {
        $this->assertSame(null, stdBool::max());
    }










    public function test_instance()
    {
        $this->assertSame("Bool", stdBool::TYPE);
        $this->assertSame(false, stdBool::IS_CLASS);
        $this->assertSame(false, stdBool::HAS_LIMIT_RANGE);

        // Testa a inicialização simples.
        $obj = new stdBool();
        $this->assertTrue(is_a($obj, stdBool::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isUndefined());
        $this->assertSame(false, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdBool(null, true);
        $this->assertTrue(is_a($obj, stdBool::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(null, $obj->get());
        $this->assertSame(false, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdBool(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(true));
        $this->assertSame(true, $obj->get());

        $this->assertTrue($obj->set(false));
        $this->assertSame(false, $obj->get());


        // Testa uma instância readonly
        $obj = new stdBool(true, true, true);
        $this->assertSame(true, $obj->get());

        $this->assertFalse($obj->set(false, true, $err));
        $this->assertSame(true, $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdBool(true, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdBool\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
