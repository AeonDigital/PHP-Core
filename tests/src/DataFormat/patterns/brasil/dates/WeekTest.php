<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\DataFormat\Patterns\Brasil\Dates\Week as Week;

require_once __DIR__ . "/../../../../../phpunit.php";






class BrasilWeekTest extends TestCase
{





    public function test_method_check()
    {
        $this->assertTrue(Week::check("5-08W-2017"));
        $this->assertTrue(Week::check("5-33-2017"));
        $this->assertTrue(Week::check("08-2017"));
        $this->assertFalse(Week::check("8-08-2017"));
        $this->assertFalse(Week::check("1-54-2017"));
        $this->assertFalse(Week::check("testes"));
        $this->assertFalse(Week::check("1:0:0"));
        $this->assertFalse(Week::check(null));
    }



    public function test_method_format()
    {
        $d = new \DateTime("2017-08-20");
        $this->assertSame("7-33W-2017", Week::format($d));
        $this->assertSame("7-33W-2017", Week::format("7-33W-2017"));
        $this->assertSame("7-03W-2017", Week::format("7-03-2017"));
        $this->assertSame("1-03W-2017", Week::format("03-2017"));
        $this->assertSame(null, Week::format("54-2017"));
    }



    public function test_method_removeFormat()
    {
        $dateTest = "2000-05-24";
        $objectDate = new \DateTime($dateTest);
        $resultDate = Week::removeFormat("3-21W-2000");

        $this->assertTrue(is_a($resultDate, "DateTime"));
        $this->assertSame($objectDate->format("Y-m-d H:i:s"), $resultDate->format("Y-m-d H:i:s"));
        $this->assertSame(null, Week::removeFormat(null));
    }
}
