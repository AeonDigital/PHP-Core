<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\TypeList as TypeList;

require_once __DIR__ . "/../../phpunit.php";






class TypeListTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new TypeList();
        $this->assertTrue(is_a($nMock, TypeList::class));

        $nMock = new TypeList("?[string, [string => [?string, ?mixed, [string => [[int, int], [float, string]] ]]]]");
        $this->assertTrue(is_a($nMock, TypeList::class));
    }



    public function test_constructor_fails()
    {
        $fail = false;
        try {
            $nMock = new TypeList("[string");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid type [ \"[string\" ].", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_method_get_type()
    {
        $strType = "?[string, [string => [?string, ?mixed, [string => [[int, int], [float, string]] ]]]]";
        $nMock = new TypeList($strType);
        $this->assertSame($strType, $nMock->getType());
    }



    public function test_method_is_nullable()
    {
        $nMock = new TypeList("string");
        $this->assertFalse($nMock->isNullable());


        $nMock = new TypeList("[?string, ?int]");
        $this->assertFalse($nMock->isNullable());


        $nMock = new TypeList("?string");
        $this->assertTrue($nMock->isNullable());


        $nMock = new TypeList("?[string, int]");
        $this->assertTrue($nMock->isNullable());
    }



    public function test_check_initial_values()
    {
        $typeOfEntry = "?[string, ?[string => ?[?string, ?mixed, ?[string => ?[[int, int], [float, ?string, ?bool]] ]]]]";
        $initialValue = [
            "entry_01" => null,
            "entry_02" => ["strVal01", null],
            "entry_03" => ["strVal01", ["strKey01" => null]],
            "entry_04" => ["strVal01", ["strKey01" => ["strVal02", new \DateTime(), null]]],
            "entry_05" => ["strVal01", ["strKey01" => ["strVal02", new \DateTime(), ["strKey02" => null]]]],
            "entry_06" => ["strVal01", ["strKey01" => ["strVal02", new \DateTime(), ["strKey02" => [[10, 20], [10.5, "strVal03", true]]]]]]
        ];

        $nMock = new TypeList($typeOfEntry, $initialValue);
        $this->assertTrue(is_a($nMock, TypeList::class));
    }



    public function test_check_initial_values_fail()
    {
        $typeOfEntry = "?[string, ?[string => ?[?string, ?mixed, ?[string => ?[[int, int], [float, string]] ]]]]";
        $initialValue = [
            "entry_01" => [null, null],
        ];
        $nMock = new TypeList($typeOfEntry, $initialValue);
        $this->assertFalse($nMock->has("entry_01"));
    }



    public function test_method_set_value()
    {
        $typeOfEntry = "?[string, ?[string => ?[?string, ?mixed, ?[string => ?[[int, int], [float, string]] ]]]]";
        $nMock = new TypeList($typeOfEntry);

        $value = ["strVal01", ["strKey01" => ["strVal02", new \DateTime(), ["strKey02" => [[10, 20], [10.5, "strVal03"]]]]]];
        $nMock->set("entry", $value);

        $this->assertSame($value, $nMock->get("entry"));
    }



    public function test_method_set_value_special()
    {
        $typeOfEntry = "?string";
        $nMock = new TypeList($typeOfEntry);

        $value = null;
        $nMock->set("entry", $value);

        $this->assertSame($value, $nMock->get("entry"));



        $typeOfEntry = "[?string, ?string, stdClass]";
        $nMock = new TypeList($typeOfEntry);

        $value = ["echo", null, new \stdClass()];
        $nMock->set("entry", $value);

        $this->assertSame($value, $nMock->get("entry"));
    }
}
