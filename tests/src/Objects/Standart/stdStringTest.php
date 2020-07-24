<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdString as stdString;

require_once __DIR__ . "/../../../phpunit.php";







class stdStringTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo",
            undefined, null, []
        ];
        $expectedValues = [
            "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", null, "", ""];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdString::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $convertTrue = [null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", ["1", "2"]];
        $convertFalse = [undefined, new stdClass()];


        for ($i = 0; $i < count($convertTrue); $i++) {
            $this->assertTrue(stdString::validate($convertTrue[$i]));
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $this->assertFalse(stdString::validate($convertFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            null, 1, 2, 0.004, true, false, new DateTime("2000-05-17 17:17:00"), "positivo", [1, 2, 3]
        ];
        $resultConvert = [
            "", "1", "2", "0.004", "1", "0", "2000-05-17 17:17:00", "positivo", "1 2 3"
        ];
        $convertFalse = [
            undefined, new stdClass()
        ];
        $convertFalseError = [
            "error.std.type.unexpected", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdString::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdString::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdString::parseIfValidate(null, true));
        $this->assertSame("", stdString::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame("", stdString::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(null, stdString::min());
    }



    public function test_method_max()
    {
        $this->assertSame(null, stdString::max());
    }










    public function test_instance()
    {
        // Testa a inicialização simples.
        $obj = new stdString();
        $this->assertTrue(is_a($obj, stdString::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isUndefined());
        $this->assertSame("", $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdString(null, true);
        $this->assertTrue(is_a($obj, stdString::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(null, $obj->get());
        $this->assertSame("", $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdString(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set("val01"));
        $this->assertSame("val01", $obj->get());

        $this->assertTrue($obj->set("val02"));
        $this->assertSame("val02", $obj->get());


        // Testa uma instância readonly
        $obj = new stdString("readonly", true, true);
        $this->assertSame("readonly", $obj->get());

        $this->assertFalse($obj->set("try redefine", true, $err));
        $this->assertSame("readonly", $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdString(true, true);
            $obj->set(new stdClass());
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdString\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
