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
            "24728035000100",

            // --- Novo Formato Alfanumérico ---
            "1A.2B3.C4D/0001-79",
            "1A2B3C4D000179",
            "12.ABC.345/0123-56",
            "12ABC345012356",
            "AB.CDE.FGH/0001-95",
            "ABCDEFGH000195",
            "1A.2B3.C4D/00A1-00",
            "1A2B3C4D00A100",
            "1A.2B3.C4D/E0F1-15",
            "1a.2b3.c4d/e0f1-15" // Aceitar letras minúsculas
        ];


        $strInValidCNPJ = [
            "24.728.035/0001-01",
            "24.728.035/000101",
            "24.728.035000101",
            "24.728035000101",
            "24728035000101",
            "00.000.000/0000-00", // Padrão repetido

            // --- Novo Formato Alfanumérico ---
            "1A.2B3.C4D/0001-80", // Dígito verificador errado
            "1A.2B3.C4D/0001-A9", // Letras no dígito verificador
            "@@.2B3.C4D/0001-79", // Caracteres especiais
            "AA.AAA.AAA/AAAA-AA", // Padrão repetido
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
        $this->assertSame("1A.2B3.C4D/E0F1-15", CNPJ::format("1A2B3C4DE0F115"));
        $this->assertSame("1A.2B3.C4D/E0F1-15", CNPJ::format("1a2b3c4de0f115"));
        $this->assertSame(null, CNPJ::format("1A.2B3.C4D/0001-80"));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("24728035000100", CNPJ::removeFormat("24.728.035/0001-00"));
        $this->assertSame(null, CNPJ::removeFormat(null));
        $this->assertSame("1A2B3C4DE0F115", CNPJ::removeFormat("1A.2B3.C4D/E0F1-15"));
        $this->assertSame("1A2B3C4DE0F115", CNPJ::removeFormat("1a.2b3.c4d/e0f1-15"));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("24728035000100", CNPJ::storageFormat("24.728.035/0001-00"));
        $this->assertSame(null, CNPJ::storageFormat("24.728.035/0001-01"));
        $this->assertSame("1A2B3C4DE0F115", CNPJ::storageFormat("1A.2B3.C4D/E0F1-15"));
        $this->assertSame("1A2B3C4DE0F115", CNPJ::storageFormat("1a.2b3.c4d/e0f1-15"));
        $this->assertSame(null, CNPJ::storageFormat("1A.2B3.C4D/0001-80"));
    }
}
