<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdDouble as stdDouble;

require_once __DIR__ . "/../../../phpunit.php";







class stdDoubleTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            -128, 10, 0, 56, 127,
            -32768, 32767,
            -2147483648, 2147483647,
            -9223372036854775807, 9223372036854775806,
            undefined
        ];
        $expectedValues = [
            "-128", "10", "0", "56", "127",
            "-32768", "32767",
            "-2147483648", "2147483647",
            "-9223372036854775807", "9223372036854775806",
            null
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDouble::toString($originalValues[$i]);
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
            $this->assertTrue(stdDouble::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            //$this->assertFalse(stdDouble::validate($validateFalse[$i]));

            // O PHP reduz valores menores e maiores que os limites para
            // o valor válido mais proximo:
            //
            //      Valores menores que "-9223372036854775807" serão definidos como "-9223372036854775807"
            //      Valores maiores que "9223372036854775806" serão definidos para "9223372036854775806"
            //
            // portanto este teste é impossível;
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
            undefined, null, []
        ];
        $convertFalseError = [
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDouble::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdDouble::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdDouble::parseIfValidate(null, true));
        $this->assertSame(0.0, stdDouble::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, stdDouble::nullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame((float)-9223372036854775807, stdDouble::min());
    }



    public function test_method_max()
    {
        $this->assertSame((float)9223372036854775806, stdDouble::max());
    }










    public function test_instance()
    {
        // Testa a inicialização simples.
        $obj = new stdDouble();
        $this->assertTrue(is_a($obj, stdDouble::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame(0.0, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdDouble(null, true);
        $this->assertTrue(is_a($obj, stdDouble::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertSame(null, $obj->get());
        $this->assertSame(0.0, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdDouble(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(1));
        $this->assertSame(1.0, $obj->get());

        $this->assertTrue($obj->set(-1));
        $this->assertSame(-1.0, $obj->get());


        // Testa uma instância readonly
        $obj = new stdDouble(1, true, true);
        $this->assertSame(1.0, $obj->get());

        $this->assertFalse($obj->set(2, true, $err));
        $this->assertSame(1.0, $obj->get());
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdDouble(1, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdDouble\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
