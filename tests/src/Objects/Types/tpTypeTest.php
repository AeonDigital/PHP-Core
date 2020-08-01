<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\tpType as tpType;
use AeonDigital\Objects\Types\tpString as tpString;

require_once __DIR__ . "/../../../phpunit.php";







class tpTypeTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", tpType::standart()::TYPE);
        $this->assertSame(true, tpType::standart()::IS_CLASS);
        $this->assertSame(false, tpType::standart()::HAS_LIMIT_RANGE);


        $valueDefault = new tpString("Instância Filha");

        // Testes de inicialização
        $obj = new tpType(null, false, true, false, $valueDefault, null, null, null, "DateTime");
        $this->assertSame("AeonDigital\Interfaces\Objects\iType", $obj->getType());
        $this->assertSame($valueDefault, $obj->get());


        $this->assertFalse($obj->set(""));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastSetError());
    }
}
