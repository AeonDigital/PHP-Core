<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Data\DataModel as DataModel;
use AeonDigital\Objects\Field\Commom\{
    fBool, fByte, fString
};

require_once __DIR__ . "/../../../phpunit.php";







class DataModelTest extends TestCase
{





    public function test_constructor_ok()
    {
        $fields = [
            new fBool("Enabled"),
            new fByte("Range", "", undefined, 50, 0, 100),
            new fString("Definition", "", undefined, "medium", null, null, ["low", "medium", "high"]),
            [
                "name" => "ZipCode",
                "type" => "String",
                "inputFormat" => "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
            ]
        ];

        $obj = new DataModel("TestModel", "tm Description", $fields);
        $this->assertTrue(is_a($obj, DataModel::class));
        $this->assertSame("TestModel", $obj->getName());
        $this->assertSame("tm Description", $obj->getDescription());
        $this->assertTrue($obj->isDataModel());
        $this->assertFalse($obj->isValid());

        $this->assertTrue($obj->hasField("Enabled"));
        $this->assertTrue($obj->hasField("Range"));
        $this->assertTrue($obj->hasField("Definition"));
        $this->assertTrue($obj->hasField("ZipCode"));
        $this->assertFalse($obj->hasField("NonField"));
        $this->assertSame(4, $obj->countFields());
        $this->assertSame(["Enabled", "Range", "Definition", "ZipCode"], $obj->getFieldNames());
        $this->assertSame([
            "Enabled" => false,
            "Range" => 50,
            "Definition" => "medium",
            "ZipCode" => ""
        ], $obj->getInitialDataModel());
        $this->assertSame([
            "Enabled" => "valid",
            "Range" => "valid",
            "Definition" => "valid",
            "ZipCode" => "error.obj.value.invalid.input.format",
        ], $obj->getCurrentModelState());
        $this->assertSame([
            "Enabled" => false,
            "Range" => 50,
            "Definition" => "medium",
            "ZipCode" => "",
        ], $obj->getValues());


        $this->assertTrue($obj->setFieldValue("ZipCode", "78888-000"));
        $this->assertSame("78.888-000", $obj->getFieldValue("ZipCode"));
        $this->assertSame("78888000", $obj->getFieldStorageValue("ZipCode"));
        $this->assertSame("78888-000", $obj->getFieldRawValue("ZipCode"));
        $this->assertTrue($obj->isValid());

        $this->assertSame([
            "Enabled" => false,
            "Range" => 50,
            "Definition" => "medium",
            "ZipCode" => "78.888-000",
        ], $obj->getValues());
        $this->assertSame([
            "Enabled" => false,
            "Range" => 50,
            "Definition" => "medium",
            "ZipCode" => "78888000",
        ], $obj->getStorageValues());
        $this->assertSame([
            "Enabled" => false,
            "Range" => 50,
            "Definition" => "medium",
            "ZipCode" => "78888-000",
        ], $obj->getRawValues());



        $validateExpected = [
            "Enabled" => "error.obj.type.unexpected",
            "Range" => "error.obj.value.out.of.range",
            "ZipCode" => "error.obj.value.invalid.input.format",
        ];
        $validateValues = [
            "Enabled" => "invalid",
            "Range" => 101,
            "ZipCode" => "11a22333"
        ];
        $this->assertFalse($obj->validateValues($validateValues));
        $this->assertSame($validateExpected, $obj->getLastValidateValuesState());



        $validateExpected = [
            "Enabled" => "error.obj.type.unexpected",
            "Range" => "valid",
            "ZipCode" => "error.obj.value.invalid.input.format",
        ];
        $validateValues = [
            "Enabled" => "invalid",
            "Range" => 100,
            "ZipCode" => "11a22333"
        ];
        $this->assertFalse($obj->validateValues($validateValues));
        $this->assertSame($validateExpected, $obj->getLastValidateValuesState());



        $validateExpected = "valid";
        $validateValues = [
            "Enabled" => true,
            "Range" => 100,
            "ZipCode" => "11122333"
        ];
        $this->assertTrue($obj->validateValues($validateValues));
        $this->assertSame($validateExpected, $obj->getLastValidateValuesState());







        $fields = [
            new fBool("Enabled"),
            new fByte("Range", "", undefined, 50, 0, 100),
            new fString("Definition", "", undefined, "medium", null, null, ["low", "medium", "high"]),
            new fString("ZipCode", "", undefined,
                null, null, null, null,
                "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
            )
        ];

        $obj = new DataModel("TestModel", "tm Description", $fields);
        $this->assertFalse($obj->isValid());
        $validateExpected = [
            "Enabled" => "valid",
            "Range" => "valid",
            "Definition" => "valid",
            "ZipCode" => "error.obj.value.invalid.input.format",
            "NonExists" => "error.obj.field.does.not.exists"
        ];
        $validateValues = [
            "Enabled" => false,
            "Range" => 12,
            "NonExists" => "-"
        ];
        $this->assertFalse($obj->validateValues($validateValues, true));
        $this->assertSame($validateExpected, $obj->getLastValidateValuesState());


    }



    public function test_access_like_array()
    {
        $fields = [
            new fBool("Enabled"),
            new fByte("Range", "", undefined, 50, 0, 100),
            new fString("Definition", "", undefined, "medium", null, null, ["low", "medium", "high"]),
            [
                "name" => "ZipCode",
                "type" => "String",
                "inputFormat" => "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
            ]
        ];

        $obj = new DataModel("TestModel", "tm Description", $fields);

        $obj["Enabled"] = true;
        $obj["ZipCode"] = "99888777";
        $this->assertSame("valid", $obj->getCurrentModelState());
    }
}
