<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\CNPJ as CNPJ;

require_once __DIR__ . "/../../../../phpunit.php";







class BrasilCNPJTest extends TestCase
{





    public function test_method_check()
    {
        $strValidCNPJ = [
            "24.728.035/0001-00",
            "24.728.035/000100",
            "24.728.035000100",
            "24.728035000100",
            "24728035000100"
        ];


        $strInValidCNPJ = [
            "24.728.035/0001-01",
            "24.728.035/000101",
            "24.728.035000101",
            "24.728035000101",
            "24728035000101"
        ];


        for ($i = 0; $i < count($strValidCNPJ); $i++) {
            $result = CNPJ::check($strValidCNPJ[$i]);
            if (!$result) {
                echo $i . " = " . $strValidCNPJ[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInValidCNPJ); $i++) {
            $result = CNPJ::check($strInValidCNPJ[$i]);
            if ($result) {
                echo $i . " = " . $strInValidCNPJ[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("24.728.035/0001-00", CNPJ::format("24728035000100"));
        $this->assertSame("24.728.035/0001-00", CNPJ::format("24.728.035/0001-00"));
        $this->assertSame(null, CNPJ::format("24728035000101"));
        $this->assertSame(null, CNPJ::format(null));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("24728035000100", CNPJ::removeFormat("24.728.035/0001-00"));
        $this->assertSame(null, CNPJ::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("24728035000100", CNPJ::storageFormat("24.728.035/0001-00"));
        $this->assertSame(null, CNPJ::storageFormat("24.728.035/0001-01"));
    }
}
