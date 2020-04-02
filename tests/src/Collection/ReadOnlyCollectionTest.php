<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\BasicCollection as BasicCollection;
use AeonDigital\Interfaces\Collection\iReadOnlyCollection as iReadOnlyCollection;

require_once __DIR__ . "/../../phpunit.php";






class ReadOnlyCollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new ReadOnlyCollectionMockClass();
        $this->assertTrue(is_a($nMock, ReadOnlyCollectionMockClass::class));
    }



    public function test_check_implementations()
    {
        $nMock = new ReadOnlyCollectionMockClass();
        $this->assertTrue($nMock->isProtected());
        $this->assertFalse($nMock->isAppendOnly());
        $this->assertTrue($nMock->isReadOnly());
        $this->assertFalse($nMock->isCaseInsensitive());
    }




    public function test_method_set_new_value_fail()
    {
        $nMock = new ReadOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertFalse($nMock->set("k3", "v3"));
    }




    public function test_method_set_update_value_fail()
    {
        $nMock = new ReadOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertFalse($nMock->set("k2", "nv2"));
    }



    public function test_method_get_check_immutability()
    {
        $oTest = ["k1" => "v1"];
        $nColl = new BasicCollection($oTest);

        $oTest["k1"] = new \DateTime();
        $this->assertSame("v1", $nColl->get("k1"));



        $muttableValue = new DateTime();
        $nColl = new BasicCollection(["k1" => $muttableValue]);

        $muttableValue->setDate(1980, 5, 17);
        $this->assertSame("1980-05-17", $nColl->get("k1")->format("Y-m-d"));



        $immutableValue = DateTime::createFromFormat("Y-m-d", "2000-10-10");
        $nMock = new ReadOnlyCollectionMockClass(["k1" => $immutableValue]);

        $immutableValue->setDate(1980, 5, 17);
        $this->assertSame("2000-10-10", $nMock->get("k1")->format("Y-m-d"));
        $this->assertSame("1980-05-17", $immutableValue->format("Y-m-d"));
    }



    public function test_method_remove()
    {
        $nMock = new ReadOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertFalse($nMock->remove("k2"));
    }
}



// Constroi uma classe concreta que implementa
// a interface alvo
class ReadOnlyCollectionMockClass extends BasicCollection implements iReadOnlyCollection
{
    function __construct(array $initialValues = [])
    {
        parent::__construct($initialValues);
    }
}
