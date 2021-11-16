<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Collection\Collection as Collection;

require_once __DIR__ . "/../../phpunit.php";







class CollectionTest extends TestCase
{



    public function test_constructor_ok()
    {
        $nMock = new Collection();
        $this->assertTrue(is_a($nMock, Collection::class));
    }



    public function test_method_to_array()
    {
        $keys = ["k1", "k2", "k3"];
        $values = ["v1", "v2", "v3"];
        $nMock = new Collection(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);
        $rMock = $nMock->toArray();

        $c = 0;
        foreach ($rMock as $k => $v) {
            $this->assertSame($keys[$c], $k);
            $this->assertSame($values[$c], $v);

            $c++;
        }
    }



    public function test_method_to_array_with_autoincrement()
    {
        $nMock = new Collection(null, true);
        $this->assertTrue($nMock->isAutoIncrement());
        $nMock->set("", "v1");
        $nMock->set("", "v2");
        $nMock->set("", "v3");
        $nMock->set("", "v4");
        $nMock->set("", "v5");

        $this->assertSame("v1", $nMock->get("0"));
        $this->assertSame("v2", $nMock->get("1"));
        $this->assertSame("v3", $nMock->get("2"));
        $this->assertSame("v4", $nMock->get("3"));
        $this->assertSame("v5", $nMock->get("4"));

        $nMock->remove("1");
        $this->assertSame("v1", $nMock->get("0"));
        $this->assertSame("v3", $nMock->get("1"));
        $this->assertSame("v4", $nMock->get("2"));
        $this->assertSame("v5", $nMock->get("3"));

        $nMock->remove("3");
        $nMock->remove("0");
        $this->assertSame("v3", $nMock->get("0"));
        $this->assertSame("v4", $nMock->get("1"));

        $nMock->toArray();
    }


    public function test_method_insert()
    {
        $nMock = new Collection();
        $this->assertFalse($nMock->has("k1"));
        $this->assertFalse($nMock->has("k2"));
        $this->assertFalse($nMock->has("k3"));


        $nMock->insert(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);


        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));
        $this->assertTrue($nMock->has("k3"));
    }



    public function test_method_clean()
    {
        $nMock = new Collection();
        $nMock->insert(["k1" => "v1", "k2" => "v2", "k3" => "v3"]);


        $this->assertTrue($nMock->has("k1"));
        $this->assertTrue($nMock->has("k2"));
        $this->assertTrue($nMock->has("k3"));

        $this->assertTrue($nMock->clean());

        $this->assertFalse($nMock->has("k1"));
        $this->assertFalse($nMock->has("k2"));
        $this->assertFalse($nMock->has("k3"));
    }
}
