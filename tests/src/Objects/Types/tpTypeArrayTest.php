<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpBoolArray as tpBoolArray;
use AeonDigital\Objects\Types\tpByteArray as tpByteArray;
use AeonDigital\Objects\Types\tpShortArray as tpShortArray;
use AeonDigital\Objects\Types\tpIntArray as tpIntArray;
use AeonDigital\Objects\Types\tpLongArray as tpLongArray;
use AeonDigital\Objects\Types\tpFloatArray as tpFloatArray;
use AeonDigital\Objects\Types\tpDoubleArray as tpDoubleArray;
use AeonDigital\Objects\Types\tpRealArray as tpRealArray;
use AeonDigital\Objects\Types\tpDateTimeArray as tpDateTimeArray;
use AeonDigital\Objects\Types\tpStringArray as tpStringArray;

require_once __DIR__ . "/../../../phpunit.php";



class tpTypeArrayTest extends TestCase
{



    public function test_static() {
        $this->assertSame("Bool", tpBoolArray::standart()::TYPE);
        $this->assertSame(false, tpBoolArray::standart()::IS_CLASS);
        $this->assertSame(false, tpBoolArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Byte", tpByteArray::standart()::TYPE);
        $this->assertSame(false, tpByteArray::standart()::IS_CLASS);
        $this->assertSame(true, tpByteArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Short", tpShortArray::standart()::TYPE);
        $this->assertSame(false, tpShortArray::standart()::IS_CLASS);
        $this->assertSame(true, tpShortArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Int", tpIntArray::standart()::TYPE);
        $this->assertSame(false, tpIntArray::standart()::IS_CLASS);
        $this->assertSame(true, tpIntArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Long", tpLongArray::standart()::TYPE);
        $this->assertSame(false, tpLongArray::standart()::IS_CLASS);
        $this->assertSame(true, tpLongArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Float", tpFloatArray::standart()::TYPE);
        $this->assertSame(false, tpFloatArray::standart()::IS_CLASS);
        $this->assertSame(true, tpFloatArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("Double", tpDoubleArray::standart()::TYPE);
        $this->assertSame(false, tpDoubleArray::standart()::IS_CLASS);
        $this->assertSame(true, tpDoubleArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("AeonDigital\Objects\Realtype", tpRealArray::standart()::TYPE);
        $this->assertSame(true, tpRealArray::standart()::IS_CLASS);
        $this->assertSame(true, tpRealArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("DateTime", tpDateTimeArray::standart()::TYPE);
        $this->assertSame(true, tpDateTimeArray::standart()::IS_CLASS);
        $this->assertSame(true, tpDateTimeArray::standart()::HAS_LIMIT_RANGE);

        $this->assertSame("String", tpStringArray::standart()::TYPE);
        $this->assertSame(false, tpStringArray::standart()::IS_CLASS);
        $this->assertSame(false, tpStringArray::standart()::HAS_LIMIT_RANGE);
    }



    public function test_instance()
    {
        // Testes de inicialização
        $obj = new tpByteArray();
        $this->assertSame(tpByteArray::standart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->default());
        $this->assertSame(-128, $obj->min());
        $this->assertSame(127, $obj->max());

        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isAllowEmpty());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isIterable());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastSetError());
        $this->assertSame(null, $obj->get());
        $this->assertSame("", $obj->toString());



        // Teste dos métodos específicos para uso como um array
        $obj = new tpByteArray(null, true, true, false, null, null, null, null, "", false);
        $this->assertFalse($obj->isCaseSensitive());
        $this->assertFalse($obj->isLocked());
        $this->assertFalse($obj->hasValue("first"));
        $this->assertTrue($obj->setValue("first", 1));
        $this->assertTrue($obj->hasValue("first"));
        $this->assertSame(1, $obj->getValue("first"));
        $this->assertSame(undefined, $obj->getValue("sec"));
        $this->assertTrue($obj->unsetValue("first"));
        $this->assertFalse($obj->hasValue("first"));


        $this->assertTrue($obj->setValue("PROP1", 1));
        $this->assertTrue($obj->setValue("PROP2", 2));
        $this->assertTrue($obj->setValue("prop3", null));
        $this->assertTrue($obj->setValue("Prop4", 4));
        $this->assertTrue(isset($obj["prop4"]));
        $this->assertSame(4, $obj->count());

        $notNull = $obj->getValuesNotNull();
        $this->assertTrue(is_a($notNull, tpByteArray::class));
        $this->assertSame(3, $notNull->count());

        $toArray = $obj->toArray(true, true);
        $this->assertSame(3, count($toArray));
        $this->assertSame(1, $toArray["PROP1"]);
        $this->assertSame(2, $toArray["PROP2"]);
        $this->assertSame(4, $toArray["Prop4"]);


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
    }



}
