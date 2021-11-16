<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Color as Color;

require_once __DIR__ . "/../../../../phpunit.php";







class WorldColorTest extends TestCase
{





    public function test_method_check()
    {
        $strValidColors = [
            "#000000", "#FFFFFF", "FFFFFF"
        ];
        $strInvalidColors = [
            "#000", "#GGGGGG", null
        ];


        for ($i = 0; $i < count($strValidColors); $i++) {
            $result = Color::check($strValidColors[$i]);
            if (!$result) {
                echo $i . " = " . $strValidColors[$i] . "<br />";
            }
            $this->assertTrue($result);
        }


        for ($i = 0; $i < count($strInvalidColors); $i++) {
            $result = Color::check($strInvalidColors[$i]);
            if ($result) {
                echo $i . " = " . $strInvalidColors[$i] . "<br />";
            }
            $this->assertFalse($result);
        }
    }



    public function test_method_format()
    {
        $this->assertSame("#FFFFFF", Color::format("#ffffff"));
        $this->assertSame("#FFFFFF", Color::format("ffffff"));
        $this->assertSame("#00EE44", Color::format("00ee44"));
        $this->assertSame(null, Color::format("00GG44"));
        $this->assertSame(null, Color::format(10));
    }



    public function test_method_removeFormat()
    {
        $this->assertSame("#ffffff", Color::removeFormat("#ffffff"));
        $this->assertSame(null, Color::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $this->assertSame("#FFFFFF", Color::storageFormat("ffffff"));
        $this->assertSame(null, Color::storageFormat("t"));
    }
}
