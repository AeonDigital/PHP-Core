<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Password as Password;

require_once __DIR__ . "/../../../../phpunit.php";







class WorldPasswordTest extends TestCase
{





    public function test_method_check()
    {
        $strValidPass = ['password1!', 'quertyu+', 'p@ssw0rd!'];

        $strInvalidPass = ['q', 'qw', 'qwe', 'qwer', 'qwert', 'qwerty', 'qwerty', 'querty ', 'quertyyy§'];

        for ($i = 0; $i < count($strValidPass); $i++) {
            $result = Password::check($strValidPass[$i]);
            if (!$result) {
                echo $i . " = " . $strValidPass[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidPass); $i++) {
            $result = Password::check($strInvalidPass[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidPass[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("31f88741c850331188d23e6e0067730e13c92809", Password::format("senhateste"));
        $this->assertSame("de49976a2b77283d2dfc0100c02ba266184dfc1a", Password::format("testesenha"));
        $this->assertSame(null, Password::format(1555));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("senhateste", Password::removeFormat("senhateste"));
        $this->assertSame(null, Password::removeFormat(null));
    }



    public function test_method_checkStrength()
    {
        $this->assertSame(60, Password::checkStrength("senhateste"));
        $this->assertSame(115, Password::checkStrength("S3nh@t³stE"));
        $this->assertSame(115, Password::checkStrength("S3nh4t³5tE"));
    }



    public function test_method_generate()
    {
        $genPass = [];
        for ($i = 0; $i < 10; $i++) {
            $genPass[] = Password::generate();
        }

        $genPass = array_unique($genPass);
        $this->assertSame(10, count($genPass));
    }



    public function test_method_checkPassword()
    {
        $wrongPasswords = [
            "error.df.password.invalid.value"   => null,
            "error.df.password.invalid.chars"   => "senha§teste",
            "error.df.password.too.short"       => "senha",
            "error.df.password.too.long"        => "senhadetestemuitomaiordoqueocamponormalmenteaceita"
        ];

        foreach ($wrongPasswords as $key => $value) {
            $err = null;
            $this->assertFalse(Password::checkPassword($value, null, $err));
            $this->assertSame($key, $err);
        }
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("31f88741c850331188d23e6e0067730e13c92809", Password::storageFormat("senhateste"));
        $this->assertSame(null, Password::storageFormat("a"));
    }
}
