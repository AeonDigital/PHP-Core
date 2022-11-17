<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\DateTimeGlobalZone as DateTimeGlobalZone;

require_once __DIR__ . "/../../../../../phpunit.php";






class WorldDateTimeGlobalZoneTest extends TestCase
{




    public function test_method_check()
    {
        $this->assertTrue(DateTimeGlobalZone::check("2012/02/29T12:45:00Z"));
        $this->assertTrue(DateTimeGlobalZone::check("2010-01-01T12:45:00Z"));
        $this->assertFalse(DateTimeGlobalZone::check("29/02/2012T12:45:00Z"));
        $this->assertFalse(DateTimeGlobalZone::check("02/29/2012T12:45:00Z"));
        $this->assertFalse(DateTimeGlobalZone::check("2010-15-01T12:45:00Z"));
    }



    public function test_method_format()
    {
        $this->assertSame("1980-05-17T00:00:00Z", DateTimeGlobalZone::format("17-05-1980", ["d-m-Y"]));
        $this->assertSame("1980-05-17T00:00:00Z", DateTimeGlobalZone::format("17-05-1980", ["DateMask" => "d-m-Y"]));
        $this->assertSame(null, DateTimeGlobalZone::format("17-05-1980"));
        $this->assertSame(null, DateTimeGlobalZone::format("100", ["d-m-Y"]));
        $this->assertSame(null, DateTimeGlobalZone::format("", ["d-m-Y"]));
        $this->assertSame(null, DateTimeGlobalZone::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17T05:15:00Z";
        $objectDate = new \DateTime($dateTest);
        $resultDate = DateTimeGlobalZone::removeFormat($dateTest);

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
