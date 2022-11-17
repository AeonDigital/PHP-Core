<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\BasicCollection as BasicCollection;
use AeonDigital\Interfaces\Collection\iProtectedCollection as iProtectedCollection;

require_once __DIR__ . "/../../phpunit.php";





class ProtectedCollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new ImmutableCollectionMockClass();
        $this->assertTrue(is_a($nMock, ImmutableCollectionMockClass::class));
    }



    public function test_check_implementations()
    {
        $nMock = new ImmutableCollectionMockClass();
        $this->assertTrue($nMock->isProtected());
        $this->assertFalse($nMock->isAppendOnly());
        $this->assertFalse($nMock->isReadOnly());
        $this->assertFalse($nMock->isCaseInsensitive());
    }




    public function test_method_set()
    {
        $nMock = new ImmutableCollectionMockClass();

        $this->assertFalse($nMock->has("k1"));
        $nMock->set("k1", null);
        $this->assertTrue($nMock->has("k1"));

        $this->assertFalse($nMock->has("k2"));
        $nMock->set("k2", true);
        $this->assertTrue($nMock->has("k2"));

        $this->assertFalse($nMock->has("k3"));
        $nMock->set("k3", 1);
        $this->assertTrue($nMock->has("k3"));

        $this->assertFalse($nMock->has("k4"));
        $nMock->set("k4", 1.1);
        $this->assertTrue($nMock->has("k4"));

        $this->assertFalse($nMock->has("k5"));
        $nMock->set("k5", "string value");
        $this->assertTrue($nMock->has("k5"));

        $this->assertFalse($nMock->has("k6"));
        $nMock->set("k6", new \DateTime());
        $this->assertTrue($nMock->has("k6"));

        $this->assertFalse($nMock->has("k7"));
        $nMock->set("k7", ["array", "uni", "dimensional"]);
        $this->assertTrue($nMock->has("k7"));

        $this->assertFalse($nMock->has("k8"));
        $nMock->set("k8", ["array" => "assoc"]);
        $this->assertTrue($nMock->has("k8"));
    }



    public function test_method_set_fail()
    {
        $nMock = new ImmutableCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->set("k3", "v3"));
        $this->assertFalse($nMock->set("k2", "nv2"));
    }



    public function test_method_get()
    {
        $nMock = new ImmutableCollectionMockClass(["k1" => "v1", "k2" => "v2", "k3" => [1, 2, 3]]);
        $this->assertSame("v1", $nMock->get("k1"));
        $this->assertSame("v2", $nMock->get("k2"));
        $this->assertSame([1, 2, 3], $nMock->get("k3"));

        // Teste de chaves definidas em uppercase
        $this->assertNull($nMock->get("K1"));
        $this->assertNull($nMock->get("K2"));
        $this->assertNull($nMock->get("K3"));
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



        $immutableValue = "this is immutable";
        $nMock = new ImmutableCollectionMockClass(["k1" => $immutableValue]);

        $immutableValue = "is this immutable?";
        $this->assertSame("this is immutable", $nMock->get("k1"));
        $this->assertSame("is this immutable?", $immutableValue);



        $immutableValue = DateTime::createFromFormat("Y-m-d", "2000-10-10");
        $nMock = new ImmutableCollectionMockClass(["k1" => $immutableValue]);

        $immutableValue->setDate(1980, 5, 17);
        $this->assertSame("2000-10-10", $nMock->get("k1")->format("Y-m-d"));
        $this->assertSame("1980-05-17", $immutableValue->format("Y-m-d"));
    }



    public function test_method_remove()
    {
        $nMock = new ImmutableCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));

        $nMock->remove("k1");
        $this->assertFalse($nMock->has("k1"));
    }
}



// Constroi uma classe concreta que implementa
// a interface alvo
class ImmutableCollectionMockClass extends BasicCollection implements iProtectedCollection
{
    function __construct(array $initialValues = [])
    {
        parent::__construct($initialValues);
    }
}
