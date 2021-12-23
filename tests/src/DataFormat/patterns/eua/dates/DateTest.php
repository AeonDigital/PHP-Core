<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\EUA\Dates\Date as Date;

require_once __DIR__ . "/../../../../../phpunit.php";







class EUADateTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Date::check("02/29/2012"));
        $this->assertTrue(Date::check("01-01-2010"));
        $this->assertFalse(Date::check("2012/29/02"));
        $this->assertFalse(Date::check("2012/02/29"));
        $this->assertFalse(Date::check("15-01-2010"));
    }



    public function test_method_format()
    {
        $this->assertSame("05-17-1980", Date::format("1980-17-05", ["Y-d-m"]));
        $this->assertSame("05-17-1980", Date::format("1980-17-05", ["DateMask" => "Y-d-m"]));
        $this->assertSame(null, Date::format("1980-17-05"));
        $this->assertSame(null, Date::format("100", ["m-d-Y"]));
        $this->assertSame(null, Date::format("", ["m-d-Y"]));
        $this->assertSame(null, Date::format("aeondigital@gmail.com", ["m-d-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17";
        $objectDate = new DateTime($dateTest);
        $resultDate = Date::removeFormat("05-17-1980");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
