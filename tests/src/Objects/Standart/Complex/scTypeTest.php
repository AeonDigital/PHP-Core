<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Complex\scType as scType;
use AeonDigital\Objects\Standart\Complex\scNType as scNType;
use AeonDigital\Objects\Standart\Complex\scROType as scROType;
use AeonDigital\Objects\Standart\Complex\scRONType as scRONType;
use AeonDigital\Objects\Types\Commom\{
    tBool, tString
};

require_once __DIR__ . "/../../../../phpunit.php";







class scTypeTest extends TestCase
{



    public function test_scType_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", scType::TYPE);
        $this->assertSame(false, scType::NULLABLE);
        $this->assertSame(false, scType::READONLY);

        $this->assertSame(true, scType::IS_CLASS);

        $this->assertSame(null, scType::SIGNED);
        $this->assertSame(null, scType::UNSIGNED);
        $this->assertSame(null, scType::EMPTY);
        $this->assertSame(false, scType::HAS_LIMIT);
        $this->assertSame(null, scType::MIN);
        $this->assertSame(null, scType::MAX);
        $this->assertSame(null, scType::NULL_EQUIVALENT);
    }
    public function test_scNType_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", scNType::TYPE);
        $this->assertSame(true, scNType::NULLABLE);
        $this->assertSame(false, scNType::READONLY);
    }
    public function test_scROType_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", scROType::TYPE);
        $this->assertSame(false, scROType::NULLABLE);
        $this->assertSame(true, scROType::READONLY);
    }
    public function test_scRONType_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", scRONType::TYPE);
        $this->assertSame(true, scRONType::NULLABLE);
        $this->assertSame(true, scRONType::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [new \DateTime("2020-01-01 00:00:00")];
        $expectedValues = [null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scType::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        // scType
        $validateTrue = [new tBool(), new tString()];
        $validateFalse = ["", null, undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scType::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scType::validate($validateFalse[$i]));
        }



        // scNType
        $validateTrue = [new tBool(), new tString(), null];
        $validateFalse = ["", undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scNType::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scNType::validate($validateFalse[$i]));
        }
    }
}
