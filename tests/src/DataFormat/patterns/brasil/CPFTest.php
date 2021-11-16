<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\CPF as CPF;

require_once __DIR__ . "/../../../../phpunit.php";







class BrasilCPFTest extends TestCase
{





    public function test_method_check()
    {
        $strValidCPF = [
            "444.945.490-10",
            "44494549010",
            "444945490-10",
            "444945.490-10",
            "011.310.510-09",
            "617.384.920-87",
            "161.510.890-49"
        ];


        $strInValidCPF = [
            "444.945.490-11",
            "44494549011",
            "444945490-11",
            "444945.490-11",
            "011.310.511-09",
            "617.384.921-87",
            "161.510.891-49"
        ];


        for ($i = 0; $i < count($strValidCPF); $i++) {
            $result = CPF::check($strValidCPF[$i]);
            if (!$result) {
                echo $i . " = " . $strValidCPF[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInValidCPF); $i++) {
            $result = CPF::check($strInValidCPF[$i]);
            if ($result) {
                echo $i . " = " . $strInValidCPF[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("444.945.490-10", CPF::format("44494549010"));
        $this->assertSame("444.945.490-10", CPF::format("444.945.490-10"));
        $this->assertSame(null, CPF::format("990.277.550-10"));
        $this->assertSame(null, CPF::format(null));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("44494549010", CPF::removeFormat("444.945.490-10"));
        $this->assertSame(null, CPF::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("44494549010", CPF::storageFormat("444.945.490-10"));
        $this->assertSame(null, CPF::storageFormat("444.945.490-11"));
    }
}
