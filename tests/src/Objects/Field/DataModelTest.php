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
        $obj = new DataModel("TestModel", "tm Description", []);
        $this->assertTrue(is_a($obj, DataModel::class));
        $this->assertSame("TestModel", $obj->getName());
        $this->assertSame("tm Description", $obj->getDescription());
        /*
        $obj = new fBool("validName", "description");
        $this->assertTrue(is_a($obj, fBool::class));
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isDefined());


        $this->assertTrue($obj->set(true));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertTrue($obj->isCurrentFieldStateValid());
        $this->assertSame("valid", $obj->getCurrentFieldState());
        $this->assertSame(true, $obj->get());


        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastValidateError());
        $this->assertFalse($obj->isCurrentFieldStateValid());
        $this->assertSame("error.obj.type.unexpected", $obj->getCurrentFieldState());
        $this->assertSame(true, $obj->get());



        $obj = fBool::fromArray([
            "name" => "checked"
        ]);
        $this->assertTrue(is_a($obj, fBool::class));
        $this->assertSame("checked", $obj->getName());



        $obj = new fStringArray("fieldName", "", [], null, null, null, ["v1", "v2", "v3", "v4"]);
        $this->assertTrue(is_a($obj, fStringArray::class));
        $this->assertSame("fieldName", $obj->getName());
        $this->assertSame("", $obj->getDescription());
        $this->assertTrue($obj->isCurrentFieldStateValid());
        $this->assertSame("valid", $obj->getCurrentFieldState());

        $this->assertTrue($obj->setKeyValue("p1", "v1"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertTrue($obj->isCurrentFieldStateValid());
        $this->assertSame("valid", $obj->getCurrentFieldState());

        $this->assertFalse($obj->setKeyValue("p2", "v11"));
        $this->assertSame("error.obj.value.not.in.enumerator", $obj->getLastValidateError());
        $this->assertFalse($obj->isCurrentFieldStateValid());
        $this->assertSame(["p1" => "valid", "p2" => "error.obj.value.not.in.enumerator"], $obj->getCurrentFieldState());*/
    }

}
