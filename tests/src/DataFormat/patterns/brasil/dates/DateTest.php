<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\Dates\Date as Date;

require_once __DIR__ . "/../../../../../phpunit.php";






class BrasilDateTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Date::check("29/02/2012"));
        $this->assertTrue(Date::check("01-01-2010"));
        $this->assertFalse(Date::check("2012/02/29"));
        $this->assertFalse(Date::check("2012/29/02"));
        $this->assertFalse(Date::check("01-15-2010"));
    }



    public function test_method_format()
    {
        $this->assertSame("17-05-1980", Date::format("1980-05-17", ["Y-m-d"]));
        $this->assertSame("17-05-1980", Date::format("1980-05-17", ["DateMask" => "Y-m-d"]));
        $this->assertSame(null, Date::format("1980-05-17"));
        $this->assertSame(null, Date::format("100", ["d-m-Y"]));
        $this->assertSame(null, Date::format("", ["d-m-Y"]));
        $this->assertSame(null, Date::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17";
        $objectDate = new DateTime($dateTest);
        $resultDate = Date::removeFormat("17-05-1980");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
