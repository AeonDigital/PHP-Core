<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Standart\stdDateTime as stdDateTime;

require_once __DIR__ . "/../../../phpunit.php";







class stdDateTimeTest extends TestCase
{



    public function test_method_toString()
    {
        $originalValues = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $expectedValues = [
            "1980-05-17 09:45:15",
            "2000-01-01 00:00:00"
        ];

        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDateTime::toString($originalValues[$i]);
            $this->assertEquals($result, $expectedValues[$i]);
        }
    }



    public function test_method_validate()
    {
        $validateTrue = [
            "1980-05-17 09:45",
            "1980-05-17 09:45:15",
            "1980-05-17",
            new \DateTime("1980-05-17 9:45:15")
        ];

        $validateFalse = [
            null,
            [],
            new StdClass(),
            "17/05/1980"
        ];


        foreach ($validateTrue as $dt) {
            $this->assertTrue(stdDateTime::validate($dt));
        }

        foreach ($validateFalse as $dt) {
            $this->assertFalse(stdDateTime::validate($dt));
        }
    }



    public function test_method_parseIfValidate()
    {
        $originalValues = [
            "1980-05-17 09:45:15",
            "2000-01-01"
        ];
        $resultConvert = [
            new \DateTime("1980-05-17 09:45:15"),
            new \DateTime("2000-01-01 00:00:00")
        ];
        $convertFalse = [
            undefined, null, []
        ];
        $convertFalseError = [
            "error.std.type.unexpected", "error.std.type.not.nullable", "error.std.type.unexpected"
        ];


        for ($i = 0; $i < count($originalValues); $i++) {
            $result = stdDateTime::parseIfValidate($originalValues[$i]);
            $this->assertEquals($result, $resultConvert[$i]);
        }

        for ($i = 0; $i < count($convertFalse); $i++) {
            $err = null;
            $result = stdDateTime::parseIfValidate($convertFalse[$i], false, false, $err);
            $this->assertSame($result, $convertFalse[$i]);
            $this->assertSame($convertFalseError[$i], $err);
        }

        $this->assertSame(null, stdDateTime::parseIfValidate(null, true));

        $dtExpe = new \DateTime("0001-01-01 00:00:00");
        $nulEqu = stdDateTime::parseIfValidate(null, false, true);
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }



    public function test_method_nullEquivalent()
    {
        $dtExpe = new \DateTime("0001-01-01 00:00:00");
        $nulEqu = stdDateTime::nullEquivalent();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }



    public function test_method_min()
    {
        $dtExpe = new \DateTime("-9999-12-31 23:59:59");
        $nulEqu = stdDateTime::min();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }



    public function test_method_max()
    {
        $dtExpe = new \DateTime("9999-12-31 23:59:59");
        $nulEqu = stdDateTime::max();
        $this->assertSame($dtExpe->format("Y-m-d H:i:s"), $nulEqu->format("Y-m-d H:i:s"));
    }










    public function test_instance()
    {
        $this->assertSame("DateTime", stdDateTime::TYPE);

        $nulEqu = stdDateTime::nullEquivalent();


        // Testa a inicialização simples.
        $obj = new stdDateTime();
        $this->assertTrue(is_a($obj, stdDateTime::class));
        $this->assertFalse($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isUndefined());
        $this->assertSame($nulEqu, $obj->get());


        // Testa a inicialização de um tipo nullable
        $obj = new stdDateTime(null, true);
        $this->assertTrue(is_a($obj, stdDateTime::class));
        $this->assertTrue($obj->isNullable());
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isUndefined());
        $this->assertSame(null, $obj->get());
        $this->assertSame($nulEqu, $obj->getNotNull());


        // Testa a alteração do valor atualmente definido
        $obj = new stdDateTime(null, true);
        $this->assertSame(null, $obj->get());

        $this->assertTrue($obj->set(new \DateTime("2020-02-02 22:22:22")));
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertTrue($obj->set(new \DateTime("2010-01-01 11:11:11")));
        $this->assertSame("2010-01-01 11:11:11", $obj->get()->format("Y-m-d H:i:s"));


        // Testa uma instância readonly
        $obj = new stdDateTime(new \DateTime("2020-02-02 22:22:22"), true, true);
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));

        $this->assertFalse($obj->set(new \DateTime("2010-01-01 11:11:11"), true, $err));
        $this->assertSame("2020-02-02 22:22:22", $obj->get()->format("Y-m-d H:i:s"));
        $this->assertSame("error.std.type.readonly", $err);


        // Testa uma atribuição que dispara uma exception.
        $fail = false;
        try {
            $obj = new stdDateTime(true, true);
            $obj->set("throws an error");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid given value to instance of \"?stdDateTime\"", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }
}
