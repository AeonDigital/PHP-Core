<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdLong as stdLong;

require_once __DIR__ . "/../../../phpunit.php";







class stdLongTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            -9223372036854775808, 9223372036854775807, undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null, null, null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdLong::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806
        ];
        $validateFalse = [
            -9223372036854775808, 9223372036854775807
        ];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(stdLong::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(stdLong::validate($validateFalse[$i]));
        }



        // Demonstração da perda de precisão para valores fora dos limiares
        // mínimos e máximos.
        // As iterações poderiam ser bem maiores... na casa dos milhões e
        // a comparação ainda assim seria dada como correta.
        $t = 9223372036854775807;
        $strNumber = "9.2233720368548E+18";
        for ($i=0; $i < 10000; $i++) {
            $t = $t + 1;
            $this->assertSame($strNumber, (string)$t);
        }

        $t = -9223372036854775808;
        $strNumber = "-9.2233720368548E+18";
        for ($i=0; $i < 10000; $i++) {
            $t = $t - 1;
            $this->assertSame($strNumber, (string)$t);
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
        ];
        $resultConvert = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
        ];
        $convertFalse = [
            "-9223372036854775808", "9223372036854775807", undefined, null, []
        ];
        $convertFalseError = [
            "error.std.value.out.of.range", "error.std.value.out.of.range",
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdLong::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdLong::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdLong::parseIfValidate(null, true));
        $this->assertSame(0, stdLong::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0, stdLong::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame(-9223372036854775807, stdLong::min());
    }



    public function test_method_max()
    {
        $this->assertSame(9223372036854775806, stdLong::max());
    }










    public function test_instance()
    {
        // Testa a inicialização simples.
        $obj = new stdLong();
        $this->assertTrue(is_a($obj, stdLong::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame(0, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdLong(null, true);
        $this->assertTrue(is_a($obj, stdLong::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame(null, $obj->get());
        $this->assertSame(0, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdLong(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame(1, $obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame(-1, $obj->get());


        // Testa uma instância readonly
        $obj = new stdLong(1, true, true);
        $this->assertSame(1, $obj->get());

        $this->assertFalse($obj->set(2, true, $err));
        $this->assertSame(1, $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdLong(1, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdLong\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
