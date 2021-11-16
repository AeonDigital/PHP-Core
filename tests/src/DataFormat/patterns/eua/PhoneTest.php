<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\EUA\Phone as Phone;

require_once __DIR__ . "/../../../../phpunit.php";







class EUAPhoneTest extends TestCase
{





    public function test_method_check()
    {

        $strValidPhone = [
            "0099999999",
            "000 999.9999",
            "(000) 999.9999"
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
            "000000000"
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
        $this->assertSame("(000) 123-4567", Phone::format("0001234567"));
        $this->assertSame(null, Phone::format("000123456"));
        $this->assertSame(null, Phone::format("00012345678"));
        $this->assertSame(null, Phone::format(""));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("0001234567", Phone::removeFormat("(000) 123-4567"));
        $this->assertSame(null, Phone::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("0001234567", Phone::storageFormat("(000) 123-4567"));
        $this->assertSame(null, Phone::storageFormat("(000) aaa.bbbb"));
    }
}
