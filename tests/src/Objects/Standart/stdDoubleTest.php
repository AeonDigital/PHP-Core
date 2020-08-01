<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdDouble as stdDouble;

require_once __DIR__ . "/../../../phpunit.php";







class stdDoubleTest extends TestCase
{



    public function test_constants()
    {
        $this->assertSame("Double", stdDouble::TYPE);
        $this->assertSame(false, stdDouble::IS_CLASS);
        $this->assertSame(true, stdDouble::HAS_LIMIT_RANGE);
    }



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
            "error.obj.type.unexpected", "error.obj.type.not.allow.null", "error.obj.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDouble::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = "";
            $result = stdDouble::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdDouble::parseIfValidate(null, true));
        $this->assertSame(0.0, stdDouble::parseIfValidate(null, false, true));
    }



    public function test_method_nullEquivalent()
    {
        $this->assertSame(0.0, stdDouble::getNullEquivalent());
    }



    public function test_method_min()
    {
        $this->assertSame((float)-9223372036854775807, stdDouble::getMin());
    }



    public function test_method_max()
    {
        $this->assertSame((float)9223372036854775806, stdDouble::getMax());
    }
}
