<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\Number as Number;

require_once __DIR__ . "/../../../../phpunit.php";






class BrasilNumberTest extends TestCase
{





    public function test_method_check()
    {
        $strValidNumbers = [
            '0', '+0', '-0', '1', '+1', '-1',
            '123', '+123', '-123', '-1.233,3',
            '1,230', '+1,230', '-1,230',
            '1.230', '+1.230', '-1.230',
            '11,456', '+11,456', '-11,456',
            '11.456', '+11.456', '-11.456',
            '25.698,45687', '+25.698,45687', '-25.698,45687',
            '56.888.000', '+56.888.000', '-56.888.000',
            '56.888,000', '+56.888,000', '-56.888,000',
            '56888000', '568880000', '5688800000', '56888000000',
            '568880000000',
            '5688800000000',
            '56888000000000',
            '568880000000000',
            '5688800000000000',
            '-100000000000000000',
            '-100000000000000000000000000000',
            '-0,1000000000000000000000000000'
        ];


        $strInvalidNumbers = [
            '0+', '0-',
            '1+', '1-',
            '.1', '.10000',
            '.1,000',
            ',1', '1,', '1.',
            '*1', '!1', '=1',
            'a', '10x12', 'FFFFFF',
            '123L', '12..3', '+1,,23',
            '-1,233,3', '-1.233.3'
        ];


        for ($i = 0; $i < count($strValidNumbers); $i++) {
            $result = Number::check($strValidNumbers[$i]);
            if (!$result) {
                echo $i . " = " . $strValidNumbers[$i] . "<br />";
            }
            $this->assertTrue($result);
        }



        for ($i = 0; $i < count($strInvalidNumbers); $i++) {
            $result = Number::check($strInvalidNumbers[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidNumbers[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("1.565.665,58", Number::format("1565665,58"));
        $this->assertSame(null, Number::format("1565,6,65,58"));
        $this->assertSame(null, Number::format(""));
        $this->assertSame(null, Number::format("1565665.58"));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame(1565665.58, Number::removeFormat("1.565.665,58"));
        $this->assertSame(null, Number::removeFormat("1565,6,65,58"));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame(1565665.58, Number::storageFormat("1.565.665,58"));
        $this->assertSame(null, Number::storageFormat("1565,6,65,58"));
    }
}
