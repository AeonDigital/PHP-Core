<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\ArrayOf\Abstracts\ArrayOfObject as ArrayOfObject;
/*use AeonDigital\ArrayOf\Type\{
    ArrayOfBool, ArrayOfBoolNullable,
    ArrayOfCallable, ArrayOfCallableNullable,
    ArrayOfDateTime, ArrayOfDateTimeNullable,
    ArrayOfFloat, ArrayOfFloatNullable,
    ArrayOfInt, ArrayOfIntNullable,
    ArrayOfIterable, ArrayOfIterableNullable,
    ArrayOfResource, ArrayOfResourceNullable,
    ArrayOfString, ArrayOfStringNullable,
};*/

require_once __DIR__ . "/../../../phpunit.php";


class ArrayOfObjectsTests extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new MockArrayOfObjectBasic();
        $this->assertTrue(is_a($nMock, MockArrayOfObjectBasic::class));
    }



    public function test_fail_set_non_string_key()
    {
        $fail = false;
        try {
            $nMock = new MockArrayOfObjectBasic();
            $nMock[] = new \DateTime("2020-07-07");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid given key. Expected an non empty \"string\".",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_fail_set_null()
    {
        $fail = false;
        try {
            $nMock = new MockArrayOfObjectBasic();
            $nMock["first"] = null;
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid given object. Not allow \"null\" values.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_fail_set_invalid_type()
    {
        $fail = false;
        try {
            $nMock = new MockArrayOfObjectBasic();
            $nMock["first"] = "unexpected type";
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid given object. Expected \"\DateTime\" object.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_fail_set_invalid_interface()
    {
        $fail = false;
        $nMock = new MockArrayOfObjectInterface();
        $nMock[] = new MockArrayOfObjectBasic();
        $nMock[] = null;
        try {
            $nMock[] = "need to be countable";
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid given object. Expected object thats implements the interface \"\Countable\".",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }



    public function test_method_subSetNotNull()
    {
        $fail = false;
        $nMock = new MockArrayOfObjectNullable();
        $nMock[] = "primeiro";
        $nMock[] = "segundo";
        $nMock[] = null;
        $nMock[] = "terceiro";
        $nMock[] = "quarto";

        $subSet = $nMock->subSetNotNull();
        $this->assertTrue(is_a($subSet, MockArrayOfObjectNullable::class));

        $this->assertSame(5, count($nMock));
        $this->assertSame(4, count($subSet));

        $countNull = 0;
        foreach ($nMock as $key => $value) {
            if ($value === null) { $countNull++; }
        }
        $this->assertSame(1, $countNull);

        foreach ($subSet as $key => $value) {
            $this->assertNotNull($value);
        }
    }



    /*
    public function test_ArrayOfBool()
    {
        $nMock = new ArrayOfBoolNullable(true);
        $this->assertTrue(is_a($nMock, ArrayOfBoolNullable::class));
        $this->assertSame(true, $nMock[0]);

        $this->assertNotNull(ArrayOfBoolNullable::getNull());
        $this->assertSame(false, ArrayOfBoolNullable::getNull());
    }

    public function test_ArrayOfCallable()
    {
        $nMock = new ArrayOfCallableNullable(function() {return true;});
        $this->assertTrue(is_a($nMock, ArrayOfCallableNullable::class));
        $this->assertSame(true, $nMock[0]());

        $this->assertNotNull(ArrayOfCallableNullable::getNull());
        $this->assertEquals(false, ArrayOfCallableNullable::getNull()());
    }
    public function test_ArrayOfDateTime()
    {
        $nMock = new ArrayOfDateTimeNullable();
        $this->assertTrue(is_a($nMock, ArrayOfDateTimeNullable::class));

        $nMock[] = new \DateTime("01-01-2001");
        $nMock[] = new \DateTime("02-02-2002");
        $nMock[] = new \DateTime("03-03-2003");
        $nMock[] = new \DateTime("04-04-2004");
        $nMock[] = new \DateTime("05-05-2005");
        $nMock[] = null;
        $nMock[] = null;
        $nMock[] = new \DateTime("08-08-2008");
        $nMock[] = new \DateTime("09-09-2009");


        $this->assertSame("01-01-2001", $nMock[0]->format("d-m-Y"));


        $this->assertSame(9, count($nMock));
        $subSet = $nMock->subSetNotNull();
        $this->assertSame(7, count($subSet));

        $countNull = 0;
        foreach ($nMock as $i => $val) {
            $val = $nMock->get($i);

            if ($val === ArrayOfDateTimeNullable::getNull()) {
                $this->assertSame("0001-01-01", $val->format("Y-m-d"));
                $countNull++;
            }
            else {
                $d = ($i + 1);
                $this->assertSame("200$d-0$d-0$d", $val->format("Y-m-d"));
            }
        }
        $this->assertSame(2, $countNull);
    }
    public function test_ArrayOfFloat()
    {
        $nMock = new ArrayOfFloatNullable(1.1);
        $this->assertTrue(is_a($nMock, ArrayOfFloatNullable::class));
        $this->assertSame(1.1, $nMock[0]);

        $this->assertNotNull(ArrayOfFloatNullable::getNull());
        $this->assertEquals(0, ArrayOfFloatNullable::getNull());
    }
    public function test_ArrayOfInt()
    {
        $nMock = new ArrayOfIntNullable(1);
        $this->assertTrue(is_a($nMock, ArrayOfIntNullable::class));
        $this->assertSame(1, $nMock[0]);

        $this->assertNotNull(ArrayOfIntNullable::getNull());
        $this->assertSame(0, ArrayOfIntNullable::getNull());
    }
    public function test_ArrayOfIterable()
    {
        $nMock = new ArrayOfIterableNullable([0,1]);
        $this->assertTrue(is_a($nMock, ArrayOfIterableNullable::class));
        $this->assertSame([0,1], $nMock[0]);

        $this->assertNotNull(ArrayOfIterableNullable::getNull());
        $this->assertSame([], ArrayOfIterableNullable::getNull());
    }
    public function test_ArrayOfResource()
    {
        $nMock = new ArrayOfResourceNullable();
        $this->assertTrue(is_a($nMock, ArrayOfResourceNullable::class));
    }
    public function test_ArrayOfString()
    {
        $nMock = new ArrayOfStringNullable("valid");
        $this->assertTrue(is_a($nMock, ArrayOfStringNullable::class));
        $this->assertSame("valid", $nMock[0]);

        $this->assertNotNull(ArrayOfStringNullable::getNull());
        $this->assertSame("", ArrayOfStringNullable::getNull());
    }*/
}





class MockArrayOfObjectBasic extends ArrayOfObject
{
    const TYPE_OF_ARRAY = "\DateTime";
    const ONLY_STRING_KEYS = true;
    const CASE_SENSITIVE_KEYS = false;
}

class MockArrayOfObjectInterface extends ArrayOfObject
{
    const TYPE_OF_ARRAY = "";
    const INTERFACE_OF_ARRAY = "\Countable";
    const NULLABLE = true;
}

class MockArrayOfObjectNullable extends ArrayOfObject
{
    const TYPE_OF_ARRAY = "string";
    const NULLABLE = true;
}
