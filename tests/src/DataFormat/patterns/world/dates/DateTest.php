<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\Date as Date;

require_once __DIR__ . "/../../../../../phpunit.php";







class WorldDateTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Date::check("2012/02/29"));
        $this->assertTrue(Date::check("2010-01-01"));
        $this->assertFalse(Date::check("29/02/2012"));
        $this->assertFalse(Date::check("02/29/2012"));
        $this->assertFalse(Date::check("2010-15-01"));
        $this->assertFalse(Date::check(null));
    }



    public function test_method_format()
    {
        $this->assertSame("1980-05-17", Date::format("17-05-1980", ["d-m-Y"]));
        $this->assertSame("1980-05-17", Date::format("17-05-1980", ["DateMask" => "d-m-Y"]));
        $this->assertSame("1980-05-17", Date::format(new DateTIme("1980-05-17"), ["DateMask" => "d-m-Y"]));
        $this->assertSame(null, Date::format("17-05-1980"));
        $this->assertSame(null, Date::format("100", ["d-m-Y"]));
        $this->assertSame(null, Date::format("", ["d-m-Y"]));
        $this->assertSame(null, Date::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17";
        $objectDate = new DateTime($dateTest);
        $resultDate = Date::removeFormat($dateTest);

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
        $this->assertSame(null, Date::removeFormat(null));
    }



    public function test_method_storageFormat()
    {
        $dateTest = "1980-05-17";
        $objectDate = new DateTime($dateTest);
        $resultDate = Date::storageFormat($dateTest);

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
