<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Data\Field\fBool as fBool;
use AeonDigital\Objects\Data\Field\fStringArray as fStringArray;

require_once __DIR__ . "/../../../phpunit.php";







class t01FieldTest extends TestCase
{





    public function test_constructor_ok()
    {
        $obj = new fBool("validName", "description");
        $this->assertTrue(is_a($obj, fBool::class));
        $this->assertFalse($obj->isReadOnly());
        $this->assertFalse($obj->isDefined());

        $this->assertSame("validName", $obj->getName());
        $this->assertSame("description", $obj->getDescription());

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
        $this->assertSame(["p1" => "valid", "p2" => "error.obj.value.not.in.enumerator"], $obj->getCurrentFieldState());
    }





    public function test_constructor_fails_name_empty()
    {
        $fail = false;
        try {
            $obj = new fBool("");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"name\". Expected string that matches the ``a-zA-Z0-9_`` pattern. Given: [  ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_constructor_fails_name_invalid()
    {
        $fail = false;
        try {
            $obj = new fBool("invalid|");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame("Invalid value defined for \"name\". Expected string that matches the ``a-zA-Z0-9_`` pattern. Given: [ invalid| ]", $ex->getMessage());
        }
        $this->assertTrue($fail, "Test must fail");
    }


    /*

    //
    // ISREFERENCE | ISCOLLECTION
    //

    public function test_constructor_isreference()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "Int"
        ]);
        $this->assertFalse($obj->isReference());
    }


    public function test_constructor_iscollection()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "Int"
        ]);
        $this->assertFalse($obj->isCollection());
    }





    //
    // VALIDATEVALUE
    //

    public function test_method_validatevalue_invalidvalue_undefined()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10
        ]);

        $val            = undefined;
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.dm.field.value.not.allow.undefined", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_allownull()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10,
            "allowNull"                 => false
        ]);

        $val            = null;
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.dm.field.value.not.allow.null", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_allowempty()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10,
            "allowEmpty"                => false
        ]);

        $val            = "";
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.dm.field.value.not.allow.empty", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_array()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10
        ]);

        $val            = [];
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.dm.field.value.not.allow.array", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_object()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10
        ]);

        $val            = new StdClass();
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.dm.field.value.invalid.type", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_inputformat()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "inputFormat"               => "Brasil.CPF"
        ]);

        $val            = "invalid";
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertTrue($validateCanSet);
        $this->assertSame("error.dm.field.value.invalid.input.format", $validateState);
    }


    public function test_method_validatevalue_invalidvalue_notparsetotype()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "DateTime",
        ]);

        $val            = "invalid";
        $r              = $obj->validateValue($val);
        $validateState  = $obj->getLastValidateState();
        $validateCanSet = $obj->getLastValidateCanSet();

        $this->assertFalse($r);
        $this->assertFalse($validateCanSet);
        $this->assertSame("error.st.unexpected.type", $validateState);
    }






    //
    // SETVALUE | GETVALUE
    //

    public function test_method_setvalue_invalidvalue_undefined()
    {
        $obj = new DataField([
            "name"                      => "validName",
            "type"                      => "String",
            "length"                    => 10
        ]);

        $val            = undefined;
        $r              = $obj->setValue($val);
        $v              = $obj->isValid();
        $realState      = $obj->getState();
        $validateState  = $obj->getLastValidateState();

        $this->assertFalse($r);
        $this->assertTrue($v);
        $this->assertSame("valid", $realState);
        $this->assertSame("error.dm.field.value.not.allow.undefined", $validateState);

        $rawExpected        = undefined;
        $formatedExpected   = undefined;
        $storageExpected    = null;

        $this->assertSame($rawExpected, $obj->getRawValue());
        $this->assertSame($formatedExpected, $obj->getValue());
        $this->assertSame($storageExpected, $obj->getStorageValue());
    }*/
}
