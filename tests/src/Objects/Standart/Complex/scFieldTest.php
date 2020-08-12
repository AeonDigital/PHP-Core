<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\Complex\scField as scField;
use AeonDigital\Objects\Standart\Complex\scNField as scNField;
use AeonDigital\Objects\Standart\Complex\scROField as scROField;
use AeonDigital\Objects\Standart\Complex\scRONField as scRONField;
use AeonDigital\Objects\Field\Commom\{
    fBool, fString
};

require_once __DIR__ . "/../../../../phpunit.php";







class scFieldTest extends TestCase
{



    public function test_scField_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", scField::TYPE);
        $this->assertSame(false, scField::NULLABLE);
        $this->assertSame(false, scField::READONLY);

        $this->assertSame(true, scField::IS_CLASS);

        $this->assertSame(null, scField::SIGNED);
        $this->assertSame(null, scField::UNSIGNED);
        $this->assertSame(null, scField::EMPTY);
        $this->assertSame(false, scField::HAS_LIMIT);
        $this->assertSame(null, scField::MIN);
        $this->assertSame(null, scField::MAX);
        $this->assertSame(null, scField::NULL_EQUIVALENT);
    }
    public function test_scNField_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", scNField::TYPE);
        $this->assertSame(true, scNField::NULLABLE);
        $this->assertSame(false, scNField::READONLY);
    }
    public function test_scROField_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", scROField::TYPE);
        $this->assertSame(false, scROField::NULLABLE);
        $this->assertSame(true, scROField::READONLY);
    }
    public function test_scRONField_constants()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iField", scRONField::TYPE);
        $this->assertSame(true, scRONField::NULLABLE);
        $this->assertSame(true, scRONField::READONLY);
    }





    public function test_method_toString()
    {
        $originalValues = [new \DateTime("2020-01-01 00:00:00")];
        $expectedValues = [null];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = scField::toString($originalValues[$i]);
            $this->assertSame($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        // scField
        $validateTrue = [new fBool("n"), new fString("n")];
        $validateFalse = ["", null, undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scField::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scField::validate($validateFalse[$i]));
        }



        // scNField
        $validateTrue = [new fBool("n"), new fString("n"), null];
        $validateFalse = ["", undefined];


        for ($i = 0; $i < count($validateTrue); $i++) {
            $this->assertTrue(scNField::validate($validateTrue[$i]));
        }

        for ($i = 0; $i < count($validateFalse); $i++) {
            $this->assertFalse(scNField::validate($validateFalse[$i]));
        }
    }
}
