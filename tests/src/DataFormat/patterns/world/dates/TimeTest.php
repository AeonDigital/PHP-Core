<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\Time as Time;

require_once __DIR__ . "/../../../../../phpunit.php";







class WorldTimeTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Time::check("12:12:12"));
        $this->assertTrue(Time::check("12:12"));
        $this->assertFalse(Time::check("25:30:30"));
        $this->assertFalse(Time::check("10:60:00"));
        $this->assertFalse(Time::check("1:0:0"));
    }



    public function test_method_format()
    {
        $this->assertSame("20:40:00", Time::format("17-05-1980 20:40:00", ["d-m-Y H:i:s"]));
        $this->assertSame("20:40:00", Time::format("17-05-1980 20:40", ["d-m-Y H:i"]));
        $this->assertSame("22:33:44", Time::format("17-05-1980 22:33:44", ["DateMask" => "d-m-Y H:i:s"]));
        $this->assertSame(null, Time::format("20:40"));
        $this->assertSame(null, Time::format("100", ["d-m-Y H:i:s"]));
        $this->assertSame(null, Time::format("", ["d-m-Y H:i:s"]));
        $this->assertSame(null, Time::format("aeondigital@gmail.com", ["d-m-Y H:i:s"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "2000-01-01 12:23:45";
        $objectDate = new \DateTime($dateTest);
        $resultDate = Time::removeFormat("12:23:45");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
