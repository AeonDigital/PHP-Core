<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\RealType as RealType;

require_once __DIR__ . "/../phpunit.php";






class RealTypeTests extends TestCase
{





    public function test_constructor_fails_invalid_argument()
    {
        $fail = false;
        try {
            $obj = new RealType("invalid");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Argument must be a valid iRealType. Given: [ invalid ]", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }


    public function test_constructor_ok()
    {
        $testValues = [
            "", "1", "-1", 1, -1, 15.7767, 74.088
        ];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertTrue(is_a($obj, RealType::class));
        }


        $o1 = new RealType(55);
        $o2 = new RealType($o1);
        $this->assertTrue(is_a($o2, RealType::class));
    }




    public function test_property_value()
    {
        $testValues = ["0", "10", "1500000005000", "3.000000", 74.088];
        $expectedValues = ["0", "10", "1500000005000", "3", "74.088"];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expectedValues[$i], $obj->value());
        }
    }


    public function test_method_get_integer_part()
    {
        $testValues = ["0", "1.0", "165.53543", 74.088];
        $expectedValues = ["0", "1", "165", "74"];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expectedValues[$i], $obj->getIntegerPart());
        }
    }


    public function test_method_get_decimal_part()
    {
        $testValues = ["0", "1.0", "1.00", "165.53543", 74.088];
        $expectedValues = ["0", "0", "0", "53543", "088"];

        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expectedValues[$i], $obj->getDecimalPart());
        }
    }


    public function test_property_precision()
    {
        $testValues = [
            "0", "10", "1500000005000", "1500000005000.8977767"
        ];
        $expected = [
            1, 2, 13, 20
        ];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expected[$i], $obj->precision());
        }
    }


    public function test_property_integerPlaces()
    {
        $testValues = [
            "0", "10", "1500000005000", "1500000005000.8977767"
        ];
        $expected = [
            1, 2, 13, 13
        ];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expected[$i], $obj->integerPlaces());
        }
    }


    public function test_property_decimalPlaces()
    {
        $testValues = [
            "0", "10.39", "150000000500.0", "1500000005000.8977767", "74.088"
        ];
        $expected = [
            0, 2, 0, 7, 3
        ];


        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);
            $this->assertSame($expected[$i], $obj->decimalPlaces());
        }
    }




    public function test_property_global_decimal_places()
    {
        $testValues = [
            2, 4, 6, 8, -1
        ];
        $expected = [
            2, 4, 6, 8, 0
        ];


        foreach ($testValues as $i => $value) {
            RealType::defineGlobalDecimalPlaces($value);
            $this->assertSame($expected[$i], RealType::getGlobalDecimalPlaces());
        }
    }




    public function test_property_global_round_type()
    {
        $testValues = [
            [null, null],
            ["invalid", null],
            ["floor", new RealType("0.004")],
            ["floor", new RealType("0.001")],
            ["CEIL", new RealType("0.01")],
            ["floor-3", new RealType("0.01")],
            ["CEIL-5", new RealType("10")]
        ];
        $expected = [
            [null, null],
            [null, null],
            [null, null],
            ["floor", new RealType("0.001")],
            ["ceil", new RealType("0.01")],
            ["floor-3", new RealType("0.01")],
            ["ceil-5", new RealType("10")]
        ];


        foreach ($testValues as $i => $value) {
            RealType::defineGlobalRoundType($value[0], $value[1]);
            $this->assertSame($expected[$i][0], RealType::getRoundType());

            if ($expected[$i][1] === null) {
                $this->assertNull(RealType::getRoundSensibility());
            } else {
                $this->assertSame($expected[$i][1]->format(3, ".", ""), RealType::getRoundSensibility()->format(3, ".", ""));
            }
        }

        RealType::defineGlobalRoundType(null, null);
    }




    public function test_method_is_valid_RealType_number()
    {
        $sucessValues = [
            "0", "-1", "0.33", .55, new RealType("3847.888")
        ];
        $failValues = [
            false, true, new DateTime(), "a", "49384.443d"
        ];


        foreach ($sucessValues as $value) {
            $this->assertTrue(RealType::isValidRealType($value));
        }
        foreach ($failValues as $value) {
            $this->assertFalse(RealType::isValidRealType($value));
        }
    }





    public function test_method_isEqualAs()
    {
        $obj = new RealType(1);

        $this->assertTrue($obj->isEqualAs(1));
        $this->assertFalse($obj->isEqualAs(2));
    }



    public function test_method_isGreaterThan()
    {
        $obj = new RealType(2);

        $this->assertTrue($obj->isGreaterThan(1));
        $this->assertFalse($obj->isGreaterThan(2));
        $this->assertFalse($obj->isGreaterThan(3));
    }



    public function test_method_isGreaterOrEqualAs()
    {
        $obj = new RealType(2);

        $this->assertTrue($obj->isGreaterOrEqualAs(1));
        $this->assertTrue($obj->isGreaterOrEqualAs(2));
        $this->assertFalse($obj->isGreaterOrEqualAs(3));
    }



    public function test_method_isLessThan()
    {
        $obj = new RealType(2);

        $this->assertTrue($obj->isLessThan(3));
        $this->assertFalse($obj->isLessThan(2));
        $this->assertFalse($obj->isLessThan(1));
    }



    public function test_method_isLessOrEqualAs()
    {
        $obj = new RealType(2);

        $this->assertTrue($obj->isLessOrEqualAs(3));
        $this->assertTrue($obj->isLessOrEqualAs(2));
        $this->assertFalse($obj->isLessOrEqualAs(1));
    }



    public function test_method_isZero()
    {
        $obj = new RealType(0);
        $this->assertTrue($obj->isZero());

        $obj = new RealType(1);
        $this->assertFalse($obj->isZero());
    }



    public function test_method_isPositive()
    {
        $obj = new RealType(0);
        $this->assertTrue($obj->isPositive());

        $obj = new RealType(1);
        $this->assertTrue($obj->isPositive());

        $obj = new RealType(-1);
        $this->assertFalse($obj->isPositive());
    }



    public function test_method_isNegative()
    {
        $obj = new RealType(0);
        $this->assertFalse($obj->isNegative());

        $obj = new RealType(1);
        $this->assertFalse($obj->isNegative());

        $obj = new RealType(-1);
        $this->assertTrue($obj->isNegative());
    }



    public function test_method_toPositive()
    {
        $obj = new RealType(-3345);
        $pos = $obj->toPositive();

        $this->assertEquals("-3345", $obj->value());
        $this->assertEquals("3345", $pos->value());
    }



    public function test_method_toNegative()
    {
        $obj = new RealType(3345);
        $neg = $obj->toNegative();

        $this->assertEquals("3345", $obj->value());
        $this->assertEquals("-3345", $neg->value());


        $obj = new RealType(0);
        $neg = $obj->toNegative();
        $this->assertEquals("0", $neg->value());
    }



    public function test_method_invertSignal()
    {
        $obj = new RealType(3345);
        $inv1 = $obj->invertSignal();
        $inv2 = $inv1->invertSignal();

        $this->assertEquals("3345", $obj->value());
        $this->assertEquals("-3345", $inv1->value());
        $this->assertEquals("3345", $inv2->value());


        $obj = new RealType(0);
        $inv = $obj->invertSignal();
        $this->assertEquals("0", $inv->value());
    }






    public function test_method_round_to()
    {
        RealType::defineGlobalRoundType(null, null);

        // Teste de arredondamento
        $testValues         = [
            "256.2456"
        ];
        $sensibility        = [
            "0.0001", "0.001", "0.01", "0.1", "1", "10"
        ];
        $expectedRoundFloor = [
            ["256.2450", "256.2400", "256.2000", "256.0000", "250.0000", "200.0000"]
        ];
        $expectedRoundCeil = [
            ["256.2460", "256.2500", "256.3000", "257.0000", "260.0000", "300.0000"]
        ];
        $expectedRoundFloor5 = [
            ["256.2460", "256.2400", "256.2000", "256.0000", "260.0000", "200.0000"]
        ];
        $expectedRoundCeil5 = [
            ["256.2460", "256.2500", "256.2000", "256.0000", "260.0000", "300.0000"]
        ];
        $expectedRoundFloor6 = [
            ["256.2450", "256.2400", "256.2000", "256.0000", "250.0000", "200.0000"]
        ];
        $expectedRoundCeil6 = [
            ["256.2460", "256.2400", "256.2000", "256.0000", "260.0000", "200.0000"]
        ];
        $expectedRoundFloor3 = [
            ["256.2460", "256.2500", "256.3000", "256.0000", "260.0000", "300.0000"]
        ];
        $expectedRoundCeil3 = [
            ["256.2460", "256.2500", "256.3000", "256.0000", "260.0000", "300.0000"]
        ];


        foreach ($testValues as $i => $value) {
            foreach ($sensibility as $is => $sen) {
                $obj = new RealType($value);
                $objSen = new RealType($sen);
                $this->assertSame(
                    $expectedRoundFloor[$i][$is],
                    RealType::roundTo($obj, "floor", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundCeil[$i][$is],
                    RealType::roundTo($obj, "ceil", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundFloor5[$i][$is],
                    RealType::roundTo($obj, "floor-5", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundCeil5[$i][$is],
                    RealType::roundTo($obj, "ceil-5", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundFloor6[$i][$is],
                    RealType::roundTo($obj, "floor-6", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundCeil6[$i][$is],
                    RealType::roundTo($obj, "ceil-6", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundFloor3[$i][$is],
                    RealType::roundTo($obj, "ceil-3", $objSen)->format(4, ".", "")
                );

                $this->assertSame(
                    $expectedRoundCeil3[$i][$is],
                    RealType::roundTo($obj, "ceil-3", $objSen)->format(4, ".", "")
                );
            }
        }


        $testValues = new RealType("99.492055");
        $roundTo = "ceil-7";
        $sensibility = new RealType("0.0001");
        $this->assertSame(
            "99.492000",
            RealType::roundTo($testValues, $roundTo, $sensibility)->format(6, ".", "")
        );
    }





    public function test_method_sum()
    {
        $testValues = [
            ["1000000000000000000000000", "1000000000000000000000000", "2000000000000000000000000"],
            ["1500000000000000000000000", "1500000000000000000000000", "3000000000000000000000000"],
            ["1.98765432109876543210987", "1.01234567890123456789013", "3"]
        ];

        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->sum($value[1]);
            $this->assertSame($value[2], $res->value());
        }


        RealType::defineGlobalRoundType("floor-5", new RealType("0.01"));
        $this->assertSame("floor-5", RealType::getRoundType());
        $this->assertSame("0.01", RealType::getRoundSensibility()->format(2, ".", ""));

        $testValues = [
            ["100.348595", "000.3", "100.60"],
            ["100.348595", "000.2", "100.50"],
        ];
        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->sum($value[1], 2);
            $this->assertSame($value[2], $res->value());
        }


        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_sub()
    {
        $testValues = [
            ["1000000000000000000000000", "1000000000000000000000000", "0", 0],
            ["3000000000000000000000000", "1500000000000000000000000", "1500000000000000000000000", 0],
            ["3", "1.98765432109876543210987", "1.01234567890123456789013", 23],
            ["3", "1.01234567890123456789013", "1.98765432109876543210987", 23],
        ];

        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $oper = $rules[1];
            $expected = $rules[2];
            $places = $rules[3];

            $obj = new RealType($val);
            $res = $obj->sub($oper, $places);
            $this->assertSame($expected, $res->value());
        }


        RealType::defineGlobalRoundType("ceil-7", new RealType("0.001"));
        $this->assertSame("ceil-7", RealType::getRoundType());
        $this->assertSame("0.001", RealType::getRoundSensibility()->format(3, ".", ""));

        $testValues = [
            ["100.348595", "000.856540", "99.490000"],
            ["100.348595", "000.32545", "100.020000"],
        ];
        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->sub($value[1], 6);
            $this->assertSame($value[2], $res->value());
        }

        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_mul()
    {
        $testValues = [
            ["10000000000", "10000000000", "100000000000000000000", 0],
            ["22222222222222222222", "4", "88888888888888888888", 0],
            ["2222222222.2222222222", "4", "8888888888.8888888888", 10],
        ];

        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $oper = $rules[1];
            $expected = $rules[2];
            $places = $rules[3];

            $obj = new RealType($val);
            $res = $obj->mul($oper, $places);
            $this->assertSame($expected, $res->value());
        }


        RealType::defineGlobalRoundType("floor-5", new RealType("0.001"));
        $this->assertSame("floor-5", RealType::getRoundType());
        $this->assertSame("0.001", RealType::getRoundSensibility()->format(3, ".", ""));

        $testValues = [
            ["8625.425", "0.08", "690.03"],     // 690.034
            ["8625.4375", "0.08", "690.03"],    // 690.035
            ["8650.45", "0.08", "692.04"],      // 692.036
        ];
        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->mul($value[1], 2);
            $this->assertSame($value[2], $res->value());
        }

        RealType::defineGlobalRoundType(null, null);
    }




    public function test_method_div()
    {
        $testValues = [
            ["100000000000000000000", "10000000000", "10000000000", 0],
            ["88888888888888888888", "4", "22222222222222222222", 0],
            ["8888888888.8888888888", "4", "2222222222.2222222222", 10],
        ];

        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $oper = $rules[1];
            $expected = $rules[2];
            $places = $rules[3];

            $obj = new RealType($val);
            $res = $obj->div($oper, $places);
            $this->assertSame($expected, $res->value());
        }


        RealType::defineGlobalRoundType("floor-5", new RealType("0.001"));
        $this->assertSame("floor-5", RealType::getRoundType());
        $this->assertSame("0.001", RealType::getRoundSensibility()->format(3, ".", ""));

        $testValues = [
            ["848.74182", "1.23", "690.03"],    // 690.034
            ["40.02203", "0.058", "690.03"],    // 690.035
            ["595.15096", "0.86", "692.04"],    // 692.036
        ];
        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->div($value[1], 2);
            $this->assertSame($value[2], $res->value());
        }

        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_mod()
    {
        $testValues = [
            ["4", "2", "0"],
            ["2", "4", "2"],
            ["14000000000", "6000000000", "2000000000"]
        ];

        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->mod($value[1]);
            $this->assertSame($value[2], $res->value());
        }


        RealType::defineGlobalRoundType("floor-5", new RealType("1"));
        $this->assertSame("floor-5", RealType::getRoundType());
        $this->assertSame("1", RealType::getRoundSensibility()->format(0, ".", ""));

        $testValues = [
            ["18", "7", "0"],   // 4
            ["18", "13", "0"],  // 5
            ["18", "12", "10"], // 6
        ];
        foreach ($testValues as $i => $value) {
            $obj = new RealType($value[0]);
            $res = $obj->mod($value[1], 2);
            $this->assertSame($value[2], $res->value());
        }

        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_pow()
    {
        $testValues = [
            ["4.2", "3", 3, "74.088"],
            ["2", "32", 0, "4294967296"]
        ];

        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $exp = $rules[1];
            $scale = $rules[2];
            $expected = $rules[3];

            $obj = new RealType($val);
            $res = $obj->pow($exp, $scale);
            $this->assertSame($expected, $res->value());
        }


        RealType::defineGlobalRoundType("ceil-4", new RealType("1"));
        $this->assertSame("ceil-4", RealType::getRoundType());
        $this->assertSame("1", RealType::getRoundSensibility()->format(0, ".", ""));

        $testValues = [
            ["4.2", "3", 3, "80.00"],   // 74.088
        ];
        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $exp = $rules[1];
            $scale = $rules[2];
            $expected = $rules[3];

            $obj = new RealType($val);
            $res = $obj->pow($exp, $scale);
            $this->assertSame($expected, $res->format(2, ".", ""));
        }

        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_sqrt()
    {
        $testValues = [
            ["4", "2", 0],
            ["36", "6", 0],
            ["90", "9.486", 3]
        ];

        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $expected = $rules[1];
            $scale = $rules[2];

            $obj = new RealType($val);
            $res = $obj->sqrt($scale);
            $this->assertSame($expected, $res->value());
        }


        RealType::defineGlobalRoundType("ceil-4", new RealType("0.1"));
        $this->assertSame("ceil-4", RealType::getRoundType());
        $this->assertSame("0.1", RealType::getRoundSensibility()->format(1, ".", ""));

        $testValues = [
            ["90", "10", 3],   // 9.486
        ];
        foreach ($testValues as $i => $rules) {
            $val = $rules[0];
            $expected = $rules[1];
            $scale = $rules[2];

            $obj = new RealType($val);
            $res = $obj->sqrt($scale);
            $this->assertSame($expected, $res->format(0, ".", ""));
        }

        RealType::defineGlobalRoundType(null, null);
    }





    public function test_method_tostring()
    {
        $testValues = ["0", "10", "1500000005000", "3.000000", 74.088];


        foreach ($testValues as $value) {
            $obj = new RealType($value);

            $expected = (string)((float)$value);
            $this->assertSame($expected, (string)$obj);
        }
    }



    public function test_method_format()
    {
        $testValues = ["0", "10", "100", "1000", "123455678.99878"];
        $expected = ["0,000", "10,000", "100,000", "1.000,000", "123.455.678,998"];

        foreach ($testValues as $i => $value) {
            $obj = new RealType($value);

            $r = $obj->format(3, ",", ".");
            $this->assertSame($expected[$i], $r);
        }

        RealType::defineGlobalDecimalPlaces(2);
        $obj = new RealType("568.55445");
        $this->assertSame("568,55", $obj->format(null, ",", "."));
    }
}
