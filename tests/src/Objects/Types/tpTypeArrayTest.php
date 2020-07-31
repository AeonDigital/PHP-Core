<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpBoolArray as tpBoolArray;

require_once __DIR__ . "/../../../phpunit.php";







class tpTypeArrayTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("Bool", tpBoolArray::standart()::TYPE);
        $this->assertSame(false, tpBoolArray::standart()::IS_CLASS);
        $this->assertSame(false, tpBoolArray::standart()::HAS_LIMIT_RANGE);


        // Testes de inicialização
        $obj = new tpBoolArray();
        $this->assertSame(tpBoolArray::standart()::TYPE, $obj->getType());
        $this->assertSame(null, $obj->default());
        $this->assertSame(null, $obj->min());
        $this->assertSame(null, $obj->max());

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
        $obj = new tpBoolArray(null, true);
        $this->assertTrue($obj->isCaseSensitive());
        $this->assertFalse($obj->isLocked());
        $this->assertFalse($obj->hasValue("first"));
        $this->assertTrue($obj->setValue("first", true));
        $this->assertTrue($obj->hasValue("first"));
        $this->assertSame(true, $obj->getValue("first"));
        $this->assertTrue($obj->unsetValue("first"));
        $this->assertFalse($obj->hasValue("first"));


        $this->assertTrue($obj->setValue("prop1", true));
        $this->assertTrue($obj->setValue("prop2", false));
        $this->assertTrue($obj->setValue("prop3", null));
        $this->assertTrue($obj->setValue("prop4", true));
        $this->assertSame(4, $obj->count());

        $notNull = $obj->getValuesNotNull();
        $this->assertTrue(is_a($notNull, tpBoolArray::class));
        $this->assertSame(3, $notNull->count());

        $toArray = $obj->toArray(true, true);
        $this->assertSame(3, count($toArray));
        $this->assertSame(true, $toArray["prop1"]);
        $this->assertSame(false, $toArray["prop2"]);
        $this->assertSame(true, $toArray["prop4"]);


        $this->assertTrue($obj->clean());
        $this->assertSame(0, $obj->count());



        // Teste do uso do objeto como um array associativo
        $obj["P_1"] = false;
        $obj["P_2"] = true;
        $obj["P_3"] = false;
        $obj["P_4"] = true;
        $obj["P_5"] = null;
        $obj["P_6"] = null;
        $obj["P_7"] = null;
        $this->assertSame(7, count($obj));
        $this->assertSame(true, $obj["P_2"]);
        unset($obj["P_7"]);
        $this->assertSame(6, count($obj));

        foreach ($obj as $key => $value) {
            $k = str_replace("P_", "", $key);
            if ((int)$k <= 4) {
                if ((int)$k % 2 === 0) {
                    $this->assertTrue($value);
                }
                else {
                    $this->assertFalse($value);
                }
            }
            else {
                $this->assertNull($value);
            }
        }



        // Testar outros métodos como:
        // isCaseSensitive
        // lockArray
    }
}
