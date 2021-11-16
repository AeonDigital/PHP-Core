<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\BasicCollection as BasicCollection;
use AeonDigital\Interfaces\Collection\iCaseInsensitiveCollection as iCaseInsensitiveCollection;

require_once __DIR__ . "/../../phpunit.php";






class CaseInsensitiveCollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new CaseInsensitiveMockClass();
        $this->assertTrue(is_a($nMock, CaseInsensitiveMockClass::class));
    }



    public function test_check_implementations()
    {
        $nMock = new CaseInsensitiveMockClass();
        $this->assertFalse($nMock->isProtected());
        $this->assertFalse($nMock->isAppendOnly());
        $this->assertFalse($nMock->isReadOnly());
        $this->assertTrue($nMock->isCaseInsensitive());
    }




    public function test_method_has()
    {
        $nMock = new CaseInsensitiveMockClass(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));

        // Teste de chaves definidas em uppercase
        $this->assertTrue($nMock->has("K1"));
        $this->assertTrue($nMock->has("K2"));
        $this->assertFalse($nMock->has("k3"));
    }


    public function test_method_set_and_get()
    {
        $nMock = new CaseInsensitiveMockClass();

        $this->assertFalse($nMock->has("key1"));
        $nMock->set("key1", "val1");
        $this->assertTrue($nMock->has("key1"));
        $this->assertSame("val1", $nMock->get("key1"));
        $this->assertSame("val1", $nMock->get("Key1"));
        $this->assertSame("val1", $nMock->get("KEy1"));
        $this->assertSame("val1", $nMock->get("KEY1"));
        $this->assertSame("val1", $nMock->get("kEY1"));
        $this->assertSame("val1", $nMock->get("keY1"));

        $nMock->set("KEY1", "nval1");
        $this->assertTrue($nMock->has("key1"));
        $this->assertSame("nval1", $nMock->get("key1"));
        $this->assertSame("nval1", $nMock->get("Key1"));
        $this->assertSame("nval1", $nMock->get("KEy1"));
        $this->assertSame("nval1", $nMock->get("KEY1"));
        $this->assertSame("nval1", $nMock->get("kEY1"));
        $this->assertSame("nval1", $nMock->get("keY1"));
    }



    public function test_method_set_check_mantain_keyname()
    {
        $nMock = new CaseInsensitiveMockClass();

        $nMock->set("k1", null);
        $nMock->set("k2", true);
        $nMock->set("k3", 1);
        $nMock->set("k4", 1.1);
        $nMock->set("k5", "string value");
        $nMock->set("k6", new \DateTime());
        $nMock->set("k7", ["array", "uni", "dimensional"]);
        $nMock->set("k8", ["array" => "assoc"]);

        $existKeys = ["k1", "k2", "k3", "k4", "k5", "k6", "k7", "k8"];
        $c = 0;
        foreach ($nMock as $key => $value) {
            $this->assertSame($existKeys[$c], $key);
            $nMock->set(strtoupper($key), null);
            $c++;
        }

        $c = 0;
        foreach ($nMock as $key => $value) {
            $this->assertSame($existKeys[$c], $key);
            $c++;
        }
    }



    public function test_method_remove()
    {
        $nMock = new CaseInsensitiveMockClass(["key1" => "v1", "key2" => "v2"]);
        $this->assertTrue($nMock->has("KEY1"));

        $nMock->set("Key1", "val1");

        $nMock->remove("KEY1");
        $this->assertFalse($nMock->has("key1"));
    }
}



// Constroi uma classe concreta que implementa
// a interface alvo
class CaseInsensitiveMockClass extends BasicCollection implements iCaseInsensitiveCollection
{
    function __construct(array $initialValues = [])
    {
        parent::__construct($initialValues);
    }
}
