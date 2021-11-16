<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\BasicCollection as BasicCollection;

require_once __DIR__ . "/../../phpunit.php";







class BasicCollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new BasicCollection();
        $this->assertTrue(is_a($nMock, BasicCollection::class));
    }



    public function test_check_implementations()
    {
        $nMock = new BasicCollection();
        $this->assertFalse($nMock->isProtected());
        $this->assertFalse($nMock->isAppendOnly());
        $this->assertFalse($nMock->isReadOnly());
        $this->assertFalse($nMock->isCaseInsensitive());
    }





    public function test_method_has()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));

        // Teste de chaves definidas em uppercase
        $this->assertFalse($nMock->has("K1"));
        $this->assertFalse($nMock->has("K2"));
        $this->assertFalse($nMock->has("k3"));
    }



    public function test_method_set()
    {
        $nMock = new BasicCollection();

        $this->assertFalse($nMock->has("k1"));
        $this->assertTrue($nMock->set("k1", null));
        $this->assertTrue($nMock->has("k1"));

        $this->assertFalse($nMock->has("k2"));
        $this->assertTrue($nMock->set("k2", true));
        $this->assertTrue($nMock->has("k2"));

        $this->assertFalse($nMock->has("k3"));
        $this->assertTrue($nMock->set("k3", 1));
        $this->assertTrue($nMock->has("k3"));

        $this->assertFalse($nMock->has("k4"));
        $this->assertTrue($nMock->set("k4", 1.1));
        $this->assertTrue($nMock->has("k4"));

        $this->assertFalse($nMock->has("k5"));
        $this->assertTrue($nMock->set("k5", "string value"));
        $this->assertTrue($nMock->has("k5"));

        $this->assertFalse($nMock->has("k6"));
        $this->assertTrue($nMock->set("k6", new \DateTime()));
        $this->assertTrue($nMock->has("k6"));

        $this->assertFalse($nMock->has("k7"));
        $this->assertTrue($nMock->set("k7", ["array", "uni", "dimensional"]));
        $this->assertTrue($nMock->has("k7"));

        $this->assertFalse($nMock->has("k8"));
        $this->assertTrue($nMock->set("k8", ["array" => "assoc"]));
        $this->assertTrue($nMock->has("k8"));
    }



    public function test_method_get()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $this->assertSame("v1", $nMock->get("k1"));
        $this->assertSame("v2", $nMock->get("k2"));

        // Teste de chaves definidas em uppercase
        $this->assertNull($nMock->get("K1"));
        $this->assertNull($nMock->get("K2"));
        $this->assertNull($nMock->get("k3"));
    }



    public function test_method_remove()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));

        $this->assertTrue($nMock->remove("k1"));
        $this->assertFalse($nMock->has("k1"));
        $this->assertTrue($nMock->remove("k1"));
    }




    public function test_autoincrement()
    {
        $nMock = new BasicCollection(null, true);
        $this->assertTrue($nMock->isAutoIncrement());
        $this->assertTrue($nMock->set("", "v1"));
        $this->assertTrue($nMock->set("", "v2"));
        $this->assertTrue($nMock->set("", "v3"));
        $this->assertTrue($nMock->set("", "v4"));
        $this->assertTrue($nMock->set("", "v5"));

        $this->assertSame("v1", $nMock->get("0"));
        $this->assertSame("v2", $nMock->get("1"));
        $this->assertSame("v3", $nMock->get("2"));
        $this->assertSame("v4", $nMock->get("3"));
        $this->assertSame("v5", $nMock->get("4"));

        $this->assertTrue($nMock->remove("1"));
        $this->assertSame("v1", $nMock->get("0"));
        $this->assertSame("v3", $nMock->get("1"));
        $this->assertSame("v4", $nMock->get("2"));
        $this->assertSame("v5", $nMock->get("3"));

        $this->assertTrue($nMock->remove("3"));
        $this->assertTrue($nMock->remove("0"));
        $this->assertSame("v3", $nMock->get("0"));
        $this->assertSame("v4", $nMock->get("1"));




        $nMock = new BasicCollection(null, true);
        $this->assertTrue($nMock->isAutoIncrement());
        $this->assertTrue($nMock->set("0", "0"));
        $this->assertSame("0", $nMock->get("0"));
    }










    public function test_like_array_isset()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);
        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));
        $this->assertTrue($nMock->has("k3"));
        $this->assertFalse($nMock->has("k4"));

        $this->assertTrue(isset($nMock["k1"]));
        $this->assertTrue(isset($nMock["k2"]));
        $this->assertTrue(isset($nMock["k3"]));
        $this->assertFalse(isset($nMock["k4"]));
    }


    public function test_like_array_get()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $this->assertSame("v1", $nMock["k1"]);
        $this->assertSame("v2", $nMock["k2"]);

        // Teste de chaves definidas em uppercase
        $this->assertNull($nMock["K1"]);
        $this->assertNull($nMock["K2"]);
        $this->assertNull($nMock["k3"]);
    }


    public function test_like_array_set()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $nMock["k3"] = "v3";

        $this->assertTrue(isset($nMock["k3"]));
        $this->assertTrue($nMock->has("k3"));
    }


    public function test_like_array_unset()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2"]);
        $this->assertTrue(isset($nMock["k1"]));
        $this->assertTrue(isset($nMock["k2"]));

        unset($nMock["k1"]);
        $this->assertFalse(isset($nMock["k1"]));
    }


    public function test_like_array_count()
    {
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);
        $this->assertSame(3, count($nMock));

        $nMock["k4"] = "new";
        $this->assertSame(4, count($nMock));
    }


    public function test_like_array_iterate()
    {
        $keys = ["k1", "k2", "k3"];
        $values = ["v1", "v2", "v3"];
        $nMock = new BasicCollection(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);

        $c = 0;
        foreach ($nMock as $k => $v) {
            $this->assertSame($keys[$c], $k);
            $this->assertSame($values[$c], $v);

            $c++;
        }
    }
}
