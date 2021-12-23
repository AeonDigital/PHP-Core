<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\DateTime as DateTime;

require_once __DIR__ . "/../../../../../phpunit.php";







class WorldDateTimeTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(DateTime::check("2012/02/29 12:45:00"));
        $this->assertTrue(DateTime::check("2010-01-01 12:45:00"));
        $this->assertFalse(DateTime::check("29/02/2012 12:45:00"));
        $this->assertFalse(DateTime::check("02/29/2012 12:45:00"));
        $this->assertFalse(DateTime::check("2010-15-01 12:45:00"));
    }



    public function test_method_format()
    {
        $this->assertSame("1980-05-17 00:00:00", DateTime::format("17-05-1980", ["d-m-Y"]));
        $this->assertSame("1980-05-17 00:00:00", DateTime::format("17-05-1980", ["DateMask" => "d-m-Y"]));
        $this->assertSame(null, DateTime::format("17-05-1980"));
        $this->assertSame(null, DateTime::format("100", ["d-m-Y"]));
        $this->assertSame(null, DateTime::format("", ["d-m-Y"]));
        $this->assertSame(null, DateTime::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17 05:15:00";
        $objectDate = new \DateTime($dateTest);
        $resultDate = DateTime::removeFormat($dateTest);

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
