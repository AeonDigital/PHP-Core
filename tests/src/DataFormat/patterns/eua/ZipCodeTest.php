<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\EUA\ZipCode as ZipCode;

require_once __DIR__ . "/../../../../phpunit.php";







class EUAZipCodeTest extends TestCase
{





    public function test_method_check()
    {

        $strValidZip = [
            "00000",
            "000000000",
            "00000-0000"
        ];


        $strInvalidZip = [
            "0",
            "00",
            "000",
            "0000",
            "000000",
            "0000000",
            "00000000",
            "00000_0000",
            "00000 0000",
            "A0000-0000",
        ];

        for ($i = 0; $i < count($strValidZip); $i++) {
            $result = ZipCode::check($strValidZip[$i]);
            if (!$result) {
                echo $i . " = " . $strValidZip[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidZip); $i++) {
            $result = ZipCode::check($strInvalidZip[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidZip[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("99888", ZipCode::format("99888"));
        $this->assertSame("12345-6789", ZipCode::format("123456789"));
        $this->assertSame(null, ZipCode::format("12345678"));
        $this->assertSame(null, ZipCode::format("1234567890"));
        $this->assertSame(null, ZipCode::format("0000000a"));
        $this->assertSame(null, ZipCode::format(""));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("123456789", ZipCode::removeFormat("12345-6789"));
        $this->assertSame(null, ZipCode::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("123456789", ZipCode::storageFormat("12345-6789"));
        $this->assertSame(null, ZipCode::storageFormat("aaaaa-bbbb"));
    }
}
