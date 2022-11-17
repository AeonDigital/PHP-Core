<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Email as Email;

require_once __DIR__ . "/../../../../phpunit.php";






class WorldEmailTest extends TestCase
{





    public function test_method_check()
    {
        $strValidEmails = [
            "v@a.li",
            "v.a@a.li",
            "va@l.idmail",
            "va@li.dmail",
            "va@lid.mail",
            "va@lidm.ail",
            "va@lidma.il",
            "v.a@lidma.il"
        ];

        $strInvalidEmails = [
            "i",
            "i@",
            "i@n",
            "i@n.v",
            "i.n@n.v",
            "@",
            "@invalid",
            "@inva.lid",
            "v.a@lid,ma.il"
        ];


        for ($i = 0; $i < count($strValidEmails); $i++) {
            $result = Email::check($strValidEmails[$i]);
            if (!$result) {
                echo $i . " = " . $strValidEmails[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidEmails); $i++) {
            $result = Email::check($strInvalidEmails[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidEmails[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("rianna@aeondigital.com.br", Email::format("RIANNA@aeonDigital.com.br"));
        $this->assertSame(null, Email::format("aeonDigital.com.br"));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("RIANNA@aeonDigital.com.br", Email::removeFormat("RIANNA@aeonDigital.com.br"));
        $this->assertSame(null, Email::removeFormat("aeonDigital.com.br"));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("rianna@aeondigital.com.br", Email::storageFormat("RIANNA@aeonDigital.com.br"));
        $this->assertSame(null, Email::storageFormat("aeonDigital.com.br"));
    }
}
