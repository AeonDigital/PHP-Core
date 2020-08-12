<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tBoolArray, tNBoolArray, tROBoolArray, tRONBoolArray,
    tByteArray, tNByteArray, tROByteArray, tRONByteArray,
    tUByteArray, tNUByteArray, tROUByteArray, tRONUByteArray,
    tShortArray, tNShortArray, tROShortArray, tRONShortArray,
    tUShortArray, tNUShortArray, tROUShortArray, tRONUShortArray,
    tIntArray, tNIntArray, tROIntArray, tRONIntArray,
    tUIntArray, tNUIntArray, tROUIntArray, tRONUIntArray,
    tLongArray, tNLongArray, tROLongArray, tRONLongArray,
    tULongArray, tNULongArray, tROULongArray, tRONULongArray,
    tFloatArray, tNFloatArray, tROFloatArray, tRONFloatArray,
    tUFloatArray, tNUFloatArray, tROUFloatArray, tRONUFloatArray,
    tDoubleArray, tNDoubleArray, tRODoubleArray, tRONDoubleArray,
    tUDoubleArray, tNUDoubleArray, tROUDoubleArray, tRONUDoubleArray,
    tRealArray, tNRealArray, tRORealArray, tRONRealArray,
    tURealArray, tNURealArray, tROURealArray, tRONURealArray,
    tDateTimeArray, tNDateTimeArray, tRODateTimeArray, tRONDateTimeArray,
    tStringArray, tNStringArray, tROStringArray, tRONStringArray,
    tNEStringArray, tNNEStringArray, tRONEStringArray, tRONNEStringArray,
};
use AeonDigital\Objects\Types\Complex\{
    tGenericArray, tNGenericArray, tROGenericArray, tRONGenericArray,
    tTypeArray, tNTypeArray, tROTypeArray, tRONTypeArray,
};

require_once __DIR__ . "/../../../../phpunit.php";



class tTypeArrayTest extends TestCase
{



    public function test_static()
    {
        $types = [
            "Bool" => [
                "TYPE" => "Bool",
                "IS_CLASS" => false,
                "HAS_LIMIT" => false,
                "prefix" => ["t", "tN", "tRO", "tRON"],
                "value" => [true],
            ],
            "Byte" => [
                "TYPE" => "Byte",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Short" => [
                "TYPE" => "Short",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Int" => [
                "TYPE" => "Int",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Long" => [
                "TYPE" => "Long",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Float" => [
                "TYPE" => "Float",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Double" => [
                "TYPE" => "Double",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "Real" => [
                "TYPE" => "AeonDigital\Objects\Realtype",
                "IS_CLASS" => true,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tU", "tNU", "tROU", "tRONU"],
                "value" => [1],
            ],
            "DateTime" => [
                "TYPE" => "DateTime",
                "IS_CLASS" => true,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON"],
                "value" => ["2020-01-01 00:00:00"],
            ],
            "String" => [
                "TYPE" => "String",
                "IS_CLASS" => false,
                "HAS_LIMIT" => true,
                "prefix" => ["t", "tN", "tRO", "tRON", "tNE", "tNNE", "tRONE", "tRONNE"],
                "value" => ["initial"],
            ],
        ];


        foreach ($types as $typeName => $rules) {
            foreach ($rules["prefix"] as $prefix) {
                $cName = "AeonDigital\\Objects\\Types\\Commom\\" . $prefix . $typeName . "Array";
                $this->assertSame($rules["TYPE"],       $cName::getStandart()::TYPE);
                $this->assertSame($rules["IS_CLASS"],   $cName::getStandart()::IS_CLASS);
                $this->assertSame($rules["HAS_LIMIT"],  $cName::getStandart()::HAS_LIMIT);

                if ($typeName !== "Generic") {
                    $obj = new $cName($rules["value"]);
                    $this->assertSame($cName::getStandart()::TYPE, $obj->getType());
                }
            }
        }
    }



    public function test_instance()
    {
        // Testes de inicialização
        $obj = new tByteArray();
        $this->assertSame(tByteArray::getStandart()::TYPE, $obj->getType());
        $this->assertTrue($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertNull($obj->isAllowEmpty());
        $this->assertSame(0, $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(-128, $obj->getMin());
        $this->assertSame(127, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(0, $obj->get());
        $this->assertSame(0, $obj->getNotNull());
        $this->assertSame("", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame(0, $obj->get());




        // Teste dos métodos específicos para uso como um array
        $obj = new tNByteArray(null);
        $this->assertTrue($obj->setCaseInsensitive());
        $this->assertFalse($obj->setCaseInsensitive());
        $this->assertFalse($obj->isCaseSensitive());
        $this->assertFalse($obj->isLocked());
        $this->assertFalse($obj->hasKeyValue("first"));
        $this->assertTrue($obj->setKeyValue("first", 1));
        $this->assertTrue($obj->hasKeyValue("first"));
        $this->assertSame(1, $obj->getKeyValue("first"));
        $this->assertSame(undefined, $obj->getKeyValue("sec"));
        $this->assertTrue($obj->unsetKeyValue("first"));
        $this->assertTrue($obj->unsetKeyValue("undef"));
        $this->assertFalse($obj->hasKeyValue("first"));


        $this->assertTrue($obj->setKeyValue("PROP1", 1));
        $this->assertTrue($obj->setKeyValue("PROP2", 2));
        $this->assertTrue($obj->setKeyValue("prop3", null));
        $this->assertTrue($obj->setKeyValue("PrOP4", 4));
        $this->assertTrue(isset($obj["prop4"]));
        $this->assertSame(4, $obj->count());

        $notNull = $obj->getKeyValuesNotNull();
        $this->assertTrue(is_a($notNull, tNByteArray::class));
        $this->assertSame(3, $notNull->count());

        $toArray = $obj->toArray(true, true);
        $this->assertSame(3, count($toArray));
        $this->assertSame(1, $toArray["PROP1"]);
        $this->assertSame(2, $toArray["PROP2"]);
        $this->assertSame(4, $toArray["PrOP4"]);


        $this->assertTrue($obj->clean());
        $this->assertSame(0, $obj->count());




        // Teste do uso do objeto como um array associativo
        $obj["P_1"] = 1;
        $obj["P_2"] = 2;
        $obj["P_3"] = 3;
        $obj["P_4"] = 4;
        $obj["P_5"] = null;
        $obj["P_6"] = null;
        $obj["P_7"] = null;
        $this->assertSame(7, count($obj));
        $this->assertSame(2, $obj["P_2"]);
        unset($obj["P_7"]);
        $this->assertSame(6, count($obj));

        foreach ($obj as $key => $value) {
            $k = str_replace("p_", "", $key);
            if ((int)$k <= 4) {
                $this->assertSame((int)$k, $value);
            }
            else {
                $this->assertNull($value);
            }
        }

        $obj["P_7"] = null;
        $obj["P_8"] = null;
        $this->assertSame(8, count($obj));
        $obj->lockArray();
        $obj["P_9"] = null;
        $obj["P_10"] = null;
        $this->assertSame(8, count($obj));
        $this->assertTrue($obj->isLocked());



        // Teste de inicialização com um valor no construtor
        $obj = new tByteArray([
            "f1" => 1,
            "f2" => 2,
            "f3" => 3,
            "f4" => 4,
            "f5" => 5,
        ]);
        $this->assertSame(5, count($obj));

    }



    public function test_generic()
    {
        $obj = new tGenericArray([], "DateTime");
        $this->assertSame("DateTime", $obj->getType());

        $nDT = new \DateTime();
        $this->assertTrue($obj->setKeyValue("first", $nDT));
        $this->assertFalse($obj->setKeyValue("last", "not DateTime"));
    }



    public function test_type()
    {
        $obj = new tTypeArray();
        $this->assertSame("AeonDigital\\Interfaces\\Objects\\iType", tTypeArray::getStandart()::TYPE);
        $this->assertSame("AeonDigital\\Interfaces\\Objects\\iType", $obj->getType());


        $prop1 = new \AeonDigital\Objects\Types\Commom\tBool(true);
        $prop2 = new \AeonDigital\Objects\Types\Commom\tByte(10);
        $prop3 = new \AeonDigital\Objects\Types\Commom\tString("initial");

        $this->assertTrue($obj->setKeyValue("prop1", $prop1));
        $this->assertTrue($obj->setKeyValue("prop2", $prop2));
        $this->assertTrue($obj->setKeyValue("prop3", $prop3));
        $this->assertFalse($obj->setKeyValue("prop4", new \DateTime()));
    }



    public function test_string_inputformat()
    {
        $obj = new tStringArray([], null, null, null, null, "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode");
        $this->assertSame("String", tStringArray::getStandart()::TYPE);
        $this->assertSame("String", $obj->getType());

        $this->assertTrue($obj->setKeyValue("prop1", "11.111111"));
        $this->assertFalse($obj->setKeyValue("prop2", "9988877a"));
        $this->assertSame("error.obj.value.invalid.input.format", $obj->getLastValidateError());
        $this->assertTrue($obj->setKeyValue("prop2", "22222-222"));
        $this->assertTrue($obj->setKeyValue("prop3", "33.333333"));
        $this->assertTrue($obj->setKeyValue("prop4", "44.444-444"));

        $this->assertSame("11.111-111", $obj->getKeyValue("prop1"));
        $this->assertSame("11111111", $obj->getStorageKeyValue("prop1"));
        $this->assertSame("11.111111", $obj->getRawKeyValue("prop1"));

        $this->assertSame([
            "prop1" => "11111111",
            "prop2" => "22222222",
            "prop3" => "33333333",
            "prop4" => "44444444",
        ], $obj->toArray(true, false, true));

        $this->assertSame([
            "prop1" => "11.111111",
            "prop2" => "22222-222",
            "prop3" => "33.333333",
            "prop4" => "44.444-444",
        ], $obj->toArray(true, false, false, true));
    }

}
