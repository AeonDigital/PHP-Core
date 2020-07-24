<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdByte as stdByte;

require_once __DIR__ . "/../../../phpunit.php";







class stdByteTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -129, 128, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdByte::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $this->assertEquals(0, stdByte::nullEquivalent());

        $validateTrue = [
            -128, 10, 0, 56, 127
        ];
        $validateFalse = [
            -129, 128
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdByte::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdByte::validate($validateFalse[$i]));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127"
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127
        ];
        $convertFalse = [
            "-129", "128", undefined, null, []
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdByte::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdByte::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdByte::parseIfValidate(null, true));
        $this->assertSame(0, stdByte::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stdByte::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(-128, stdByte::min());
    }



    public function test_method_max()
    {
        $this->assertSame(127, stdByte::max());
    }










    public function test_instance()
    {
        // Testa a inicialização simples.
        $obj = new stdByte();
        $this->assertTrue(is_a($obj, stdByte::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isUndefined());
        $this->assertSame(0, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdByte(null, true);
        $this->assertTrue(is_a($obj, stdByte::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(null, $obj->get());
        $this->assertSame(0, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdByte(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame(1, $obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame(-1, $obj->get());


        // Testa uma instância readonly
        $obj = new stdByte(1, true, true);
        $this->assertSame(1, $obj->get());

        $this->assertFalse($obj->set(2, true, $err));
        $this->assertSame(1, $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdByte(1, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdByte\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
