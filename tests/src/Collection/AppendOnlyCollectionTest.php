<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\BasicCollection as BasicCollection;
use AeonDigital\Interfaces\Collection\iAppendOnlyCollection as iAppendOnlyCollection;

require_once __DIR__ . "/../../phpunit.php";






class AppendOnlyCollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new AppendOnlyCollectionMockClass();
        $this->assertTrue(is_a($nMock, AppendOnlyCollectionMockClass::class));
    }



    public function test_check_implementations()
    {
        $nMock = new AppendOnlyCollectionMockClass();
        $this->assertFalse($nMock->isProtected());
        $this->assertTrue($nMock->isAppendOnly());
        $this->assertFalse($nMock->isReadOnly());
        $this->assertFalse($nMock->isCaseInsensitive());
    }




    public function test_method_set()
    {
        $nMock = new AppendOnlyCollectionMockClass();

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
        $nMock = new AppendOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->set("k3", "v3"));
        $this->assertFalse($nMock->set("k2", "nv2"));
    }



    public function test_method_get()
    {
        $nMock = new AppendOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertSame("v1", $nMock->get("k1"));
        $this->assertSame("v2", $nMock->get("k2"));

        // Teste de chaves definidas em uppercase
        $this->assertNull($nMock->get("K1"));
        $this->assertNull($nMock->get("K2"));
        $this->assertNull($nMock->get("k3"));
    }



    public function test_method_remove()
    {
        $nMock = new AppendOnlyCollectionMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->set("k3", "v3"));
        $this->assertFalse($nMock->remove("k2"));
    }
}



// Constroi uma classe concreta que implementa
// a interface alvo
class AppendOnlyCollectionMockClass extends BasicCollection implements iAppendOnlyCollection
{
    function __construct(array $initialValues = [])
    {
        parent::__construct($initialValues);
    }
}
