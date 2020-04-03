<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\DateTimeLocal as DateTimeLocal;

require_once __DIR__ . "/../../../../../phpunit.php";







class WorldDateTimeLocalTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(DateTimeLocal::check("2012/02/29T12:45:00"));
        $this->assertTrue(DateTimeLocal::check("2010-01-01T12:45:00"));
        $this->assertFalse(DateTimeLocal::check("29/02/2012 12:45:00"));
        $this->assertFalse(DateTimeLocal::check("02/29/2012T12:45:00"));
        $this->assertFalse(DateTimeLocal::check("2010-15-01 12:45:00"));
    }



    public function test_method_format()
    {
        $this->assertSame("1980-05-17T00:00:00", DateTimeLocal::format("17-05-1980", ["d-m-Y"]));
        $this->assertSame("1980-05-17T00:00:00", DateTimeLocal::format("17-05-1980", ["DateMask" => "d-m-Y"]));
        $this->assertSame(null, DateTimeLocal::format("17-05-1980"));
        $this->assertSame(null, DateTimeLocal::format("100", ["d-m-Y"]));
        $this->assertSame(null, DateTimeLocal::format("", ["d-m-Y"]));
        $this->assertSame(null, DateTimeLocal::format("aeondigital@gmail.com", ["d-m-Y"]));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "1980-05-17T05:15:00";
        $objectDate = new \DateTime($dateTest);
        $resultDate = DateTimeLocal::removeFormat($dateTest);

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
    }
}
