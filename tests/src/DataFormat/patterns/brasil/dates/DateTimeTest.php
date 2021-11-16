<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\Dates\DateTime as DateTime;

require_once __DIR__ . "/../../../../../phpunit.php";







class BrasilDateTimeTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(DateTime::check("29/02/2012 12:45:00"));
        $this->assertTrue(DateTime::check("01-01-2010 12:45:00"));
        $this->assertFalse(DateTime::check("2012/02/29 12:45:00"));
        $this->assertFalse(DateTime::check("2012/29/02 12:45:00"));
        $this->assertFalse(DateTime::check("01-15-2010 12:45:00"));
    }



    public function test_method_format()
    {
        $this->assertSame("17-05-1980 00:00:00", DateTime::format("1980-05-17", ["Y-m-d"]));
        $this->assertSame("17-05-1980 00:00:00", DateTime::format("1980-05-17", ["DateMask" => "Y-m-d"]));
        $this->assertSame(null, DateTime::format("1980-05-17"));
        $this->assertSame(null, DateTime::format("100", ["d-m-Y"]));
        $this->assertSame(null, DateTime::format("", ["d-m-Y"]));
        $this->assertSame(null, DateTime::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17 05:15:00";
        $objectDate = new \DateTime($dateTest);
        $resultDate = DateTime::removeFormat("17-05-1980 05:15:00");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
