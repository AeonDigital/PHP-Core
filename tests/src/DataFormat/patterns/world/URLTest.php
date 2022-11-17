<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\URL as URL;

require_once __DIR__ . "/../../../../phpunit.php";






class WorldURLTest extends TestCase
{





    public function test_method_check()
    {
        $strValidURL = [
            "http://aeondigital.com.br",
            "https://aeondigital.com.br",
            "ftp://aeondigital.com.br",
            "ftps://aeondigital.com.br",
            "http://www.aeondigital.com.br",
            "https://www.aeondigital.com.br",
            "http://www.aeondigital.com.br?param1=value1&param2=value2",
            "http://a.e",
            "http://a.e.o",
            "http://a.e.o.n",
            "aeondigital.com.br"
        ];


        $strInvalidURL = [
            "http",
            "http:",
            "http:/",
            "http://",
            "http://a",
            "://aeondigital.com.br",
            "//aeondigital.com.br",
            "/aeondigital.com.br"
        ];


        for ($i = 0; $i < count($strValidURL); $i++) {
            $result = URL::check($strValidURL[$i]);
            if (!$result) {
                echo $i . " = " . $strValidURL[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidURL); $i++) {
            $result = URL::check($strInvalidURL[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidURL[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("http://www.aeondigital.com.br?param1=value1&param2=value2", URL::format("www.aeondigital.com.br?param1=value1&param2=value2"));
        $this->assertSame("http://www.aeondigital.com.br?PARAM1=value1&param2=value2", URL::format("www.aeondigital.com.br?PARAM1=value1&param2=value2"));
        $this->assertSame(null, URL::format("aeon@digital.com"));
        $this->assertSame(null, URL::format(100));
        $this->assertSame(null, URL::format(new \DateTime()));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("http://www.aeondigital.com.br", URL::removeFormat("http://www.aeondigital.com.br"));
        $this->assertSame(null, URL::removeFormat("aeon@digital.com"));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("http://aeondigital.com.br", URL::storageFormat("aeondigital.com.br"));
        $this->assertSame(null, URL::storageFormat("a"));
    }
}
