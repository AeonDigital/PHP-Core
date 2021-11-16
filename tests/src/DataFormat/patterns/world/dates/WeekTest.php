<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\World\Dates\Week as Week;

require_once __DIR__ . "/../../../../../phpunit.php";







class WorldWeekTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Week::check("2017-W08-5"));
        $this->assertTrue(Week::check("2017-33-5"));
        $this->assertTrue(Week::check("2017-08"));
        $this->assertFalse(Week::check("2017-08-8"));
        $this->assertFalse(Week::check("2017-54-1"));
        $this->assertFalse(Week::check("testes"));
        $this->assertFalse(Week::check("1:0:0"));
        $this->assertFalse(Week::check(null));
    }



    public function test_method_format()
    {
        $d = new \DateTime("2017-08-20");
        $this->assertSame("2017-W33-7", Week::format($d));
        $this->assertSame("2017-W33-7", Week::format("2017-W33-7"));
        $this->assertSame("2017-W03-7", Week::format("2017-03-7"));
        $this->assertSame("2017-W03-1", Week::format("2017-03"));
        $this->assertSame(null, Week::format("2017-54"));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "2000-05-24";
        $objectDate = new \DateTime($dateTest);
        $resultDate = Week::removeFormat("2000-W21-3");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));


        $this->assertNull(Week::removeFormat(null));
    }
}
