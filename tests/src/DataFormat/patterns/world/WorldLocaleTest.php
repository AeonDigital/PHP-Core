<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Locale as Locale;

require_once __DIR__ . "/../../../../phpunit.php";






class WorldLocaleTest extends TestCase
{





    public function test_method_check()
    {
        $strValidLocales = [
            'pt-br', 'pt-BR', 'en-us', 'ppee'
        ];


        $strInvalidLocales = [
            'pt', 'br', 'pt-B', 'en'
        ];


        for ($i = 0; $i < count($strValidLocales); $i++) {
            $result = Locale::check($strValidLocales[$i]);
            if (!$result) {
                echo $i . " = " . $strValidLocales[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidLocales); $i++) {
            $result = Locale::check($strInvalidLocales[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidLocales[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("pt-BR", Locale::format("pt-br"));
        $this->assertSame("pt-BR", Locale::format("PT-BR"));
        $this->assertSame("pt-BR", Locale::format("PTBR"));
        $this->assertSame(null, Locale::format(10));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("pt-BR", Locale::removeFormat("pt-BR"));
        $this->assertSame(null, Locale::removeFormat("pt-BRR"));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("pt-BR", Locale::storageFormat("ptbr"));
        $this->assertSame(null, Locale::storageFormat("pt-BRR"));
    }
}
