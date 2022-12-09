<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\Month as Month;

require_once __DIR__ . "/../../../../../phpunit.php";






class WorldMonthTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Month::check("2012/02"));
        $this->assertTrue(Month::check("2010-01"));
        $this->assertFalse(Month::check("02/2012"));
        $this->assertFalse(Month::check("29/2012"));
        $this->assertFalse(Month::check("2010-15"));
    }



    public function test_method_format()
    {
        $this->assertSame("1980-05", Month::format("17-05-1980", ["d-m-Y"]));
        $this->assertSame("1980-05", Month::format("17-05-1980", ["DateMask" => "d-m-Y"]));
        $this->assertSame(null, Month::format("05-1980"));
        $this->assertSame(null, Month::format("100", ["d-m-Y"]));
        $this->assertSame(null, Month::format("", ["d-m-Y"]));
        $this->assertSame(null, Month::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-01 00:00:00";
        $objectDate = new \DateTime($dateTest);
        $resultDate = Month::removeFormat("1980-05");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
