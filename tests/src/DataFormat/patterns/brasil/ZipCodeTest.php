<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\ZipCode as ZipCode;

require_once __DIR__ . "/../../../../phpunit.php";







class BrasilZipCodeTest extends TestCase
{





    public function test_method_check()
    {

        $strValidZip = [
            "00000-000",
            "00.000-000",
            "00000000"
        ];


        $strInvalidZip = [
            "0",
            "00",
            "000",
            "0000",
            "00000",
            "000000",
            "0000000",
            "00000_000",
            "00000 000",
            "A0000-000",
            "997776666",
            "9977766666"
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
        $this->assertSame("00.000-000", ZipCode::format("00000000"));
        $this->assertSame(null, ZipCode::format("123456789"));
        $this->assertSame(null, ZipCode::format("0000000a"));
        $this->assertSame(null, ZipCode::format(""));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("00000000", ZipCode::removeFormat("00.000-000"));
        $this->assertSame("00000000", ZipCode::removeFormat("00000-000"));
        $this->assertSame(null, ZipCode::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("00000000", ZipCode::storageFormat("00.000-000"));
        $this->assertSame(null, ZipCode::storageFormat("aa.bbb-ccc"));
    }
}
