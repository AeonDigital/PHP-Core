<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\Phone as Phone;

require_once __DIR__ . "/../../../../phpunit.php";







class BrasilPhoneTest extends TestCase
{





    public function test_method_check()
    {

        $strValidPhone = [
            "0099998888",
            "00 99998888",
            "(0099998888",
            "00)99998888",
            "(00)99998888",
            "(00) 99998888",
            "(00) 9.9998888",
            "(00) 99.998888",
            "(00) 999.98888",
            "(00) 9999.8888",
            "(00) 99998.888",
            "(00) 999988.88",
            "(00) 9999888.8",


            "00999888777",
            "00 999888777",
            "(00)999888777",
            "(00) 999888777",
            "(00) 9.99888777",
            "(00) 99.9888777",
            "(00) 999.888777",
            "(00) 9998.88777",
            "(00) 99988.8777",
            "(00) 999888.777",
            "(00) 9998887.77",
            "(00) 99988877.7",

            "(00) 9.99888777",
            "(00) 9.9.9888777",
            "(00) 9.99.888777",
            "(00) 9.998.88777",
            "(00) 9.9988.8777",
            "(00) 9.99888.777",
            "(00) 9.998887.77",
            "(00) 9.9988877.7"
        ];


        $strInvalidPhone = [
            null,
            "0",
            "00",
            "000",
            "0000",
            "00000",
            "000000",
            "0000000",
            "00000000",
            "000000000",
            "000000000000"
        ];


        for ($i = 0; $i < count($strValidPhone); $i++) {
            $result = Phone::check($strValidPhone[$i]);
            if (!$result) {
                echo $i . " = " . $strValidPhone[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidPhone); $i++) {
            $result = Phone::check($strInvalidPhone[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidPhone[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("(00) 99999.8888", Phone::format("00999998888"));
        $this->assertSame("(00) 9988.7766", Phone::format("0099887766"));
        $this->assertSame(null, Phone::format("009988776"));
        $this->assertSame(null, Phone::format("009998887776"));
        $this->assertSame(null, Phone::format(""));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("00999998888", Phone::removeFormat("(00) 99999.8888"));
        $this->assertSame("0099887766", Phone::removeFormat("(00) 99.88.77.66"));
        $this->assertSame(null, Phone::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("00999998888", Phone::storageFormat("(00) 99999.8888"));
        $this->assertSame(null, Phone::storageFormat("(00) aaa.bbb.ccc"));
    }
}
