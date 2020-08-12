<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Types\Commom\{
    tString, tNString, tROString, tRONString, tNEString, tNNEString, tRONEString, tRONNEString
};

require_once __DIR__ . "/../../../phpunit.php";




class tStringTest extends TestCase
{



    public function test_instance()
    {
        $this->assertSame("String", tString::getStandart()::TYPE);
        $this->assertSame(false, tString::getStandart()::IS_CLASS);
        $this->assertSame(true, tString::getStandart()::HAS_LIMIT);



        // Testes Not Nullable
        $obj = new tString();
        $this->assertSame(tString::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isAllowEmpty());
        $this->assertSame("", $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(null, $obj->getMin());
        $this->assertSame(null, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame(null, $obj->getEnumerator());

        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("", $obj->get());
        $this->assertSame("", $obj->getNotNull());
        $this->assertSame("", $obj->toString());

        $this->assertFalse($obj->set(null));
        $this->assertSame("error.obj.type.not.allow.null", $obj->getLastValidateError());
        $this->assertSame("", $obj->get());

        $this->assertTrue($obj->set("1"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("1", $obj->get());


        // Define um valor no construtor
        $obj = new tString("1");
        $this->assertFalse($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("1", $obj->get());


        // "undefined" no construtor e "default" definido
        $obj = new tString(undefined, "1");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("1", $obj->get());


        // "null" no construtor, sem default
        $obj = new tString(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("", $obj->get());


        // "null" no construtor e "default" definido
        $obj = new tString(null, "1");
        $this->assertTrue($obj->isUndefined());
        $this->assertTrue($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame("", $obj->get());




        // Testes Nullable

        // Teste de inicialização com um tipo arbitrário para "default" e que
        // aceita "null" como válido.
        // Passando "undefined" o valor será definido como o "default"
        $obj = new tNString(undefined, "10");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame("10", $obj->get());


        // Passando "null" o valor será definido como "null".
        $obj = new tNString(null, "10");
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());
        $this->assertSame(null, $obj->get());


        // Teste de alteração de valor atualmetne setado.
        // Feito com uma instância "allowNull"
        $obj = new tNString(null);
        $this->assertTrue($obj->isUndefined());
        $this->assertNull($obj->get());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertTrue($obj->isNullOrEquivalent());

        $this->assertTrue($obj->set("10"));
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("10", $obj->get());

        $this->assertTrue($obj->set("-10"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("-10", $obj->get());

        // Tenta setar um valor inválido e verifica que a mensagem de erro
        // informa a natureza do mesmo alem do valor ser mantido o mesmo.
        $this->assertFalse($obj->set(new \stdClass()));
        $this->assertSame("error.obj.type.unexpected", $obj->getLastValidateError());
        $this->assertSame("-10", $obj->get());




        // Testes Read Only

        // Teste de uma instância do tipo "readonly", ou seja, uma instância que
        // não permite a alteração de seu valor após "isUndefined = false"
        $obj = new tROString("10");
        $this->assertFalse($obj->isUndefined());
        $this->assertSame("10", $obj->get());

        $this->assertFalse($obj->set("-10"));
        $this->assertSame("error.obj.type.readonly", $obj->getLastValidateError());
        $this->assertSame("10", $obj->get());




        // Testes Min Max
        $obj = new tString(undefined, "valid", 4, 16);
        $this->assertTrue($obj->isUndefined());
        $this->assertFalse($obj->isNullEquivalent());
        $this->assertFalse($obj->isNullOrEquivalent());
        $this->assertSame(4, $obj->getMin());
        $this->assertSame(16, $obj->getMax());
        $this->assertSame(16, $obj->getLength());
        $this->assertSame("valid", $obj->get());
        $this->assertTrue($obj->set("valid value"));
        $this->assertSame("valid value", $obj->get());


        $this->assertFalse($obj->set("invalid value set; exceed"));
        $this->assertSame("error.obj.value.max.length.exceeded", $obj->getLastValidateError());
        $this->assertSame("valid value", $obj->get());

        $this->assertFalse($obj->set("inv"));
        $this->assertSame("error.obj.value.min.length.expected", $obj->getLastValidateError());
        $this->assertSame("valid value", $obj->get());

        $this->assertTrue($obj->set("valid again"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("valid again", $obj->get());










        // Teste de uma instância em que "allowEmpty" é "false" e
        // onde há um valor padrão definido.
        $obj = new tNEString("", "notEmpty");
        $this->assertSame("notEmpty", $obj->getDefault());
        $this->assertSame("notEmpty", $obj->get());

        $this->assertFalse($obj->set(""));
        $this->assertSame("error.obj.type.not.allow.empty", $obj->getLastValidateError());
        $this->assertSame("notEmpty", $obj->get());

        $obj = new tNEString("");
        $this->assertSame(" ", $obj->get());



        // Teste de uma instância em que "allowEmpty" é "false" e
        // "allowNull" é "true" contendo também um valor especificado.
        // Demonstra assim que nestes casos, como "" não é válido, na construção
        // ele será substituido pelo valor "default"
        $obj = new tNNEString(null, "notEmpty");
        $this->assertSame("notEmpty", $obj->getDefault());
        $this->assertSame(null, $obj->get());

        $this->assertFalse($obj->set(""));
        $this->assertSame("error.obj.type.not.allow.empty", $obj->getLastValidateError());
        $this->assertSame(null, $obj->get());


        $obj = new tNNEString("");
        $this->assertSame(null, $obj->get());










        // Testes Enumerator
        $enum = [
            ["val1", "lbl01"],
            ["val2", "lbl02"],
            ["val3", "lbl03"],
        ];
        $obj = new tString(undefined, null, null, null, $enum);
        $this->assertSame(tString::getStandart()::TYPE, $obj->getType());
        $this->assertFalse($obj->isIterable());
        $this->assertFalse($obj->isAllowNull());
        $this->assertFalse($obj->isReadOnly());
        $this->assertTrue($obj->isAllowEmpty());
        $this->assertSame("", $obj->getNullEquivalent());

        $this->assertSame(null, $obj->getDefault());
        $this->assertSame(null, $obj->getMin());
        $this->assertSame(null, $obj->getMax());
        $this->assertSame(null, $obj->getLength());
        $this->assertSame($enum, $obj->getEnumerator());
        $this->assertSame(["val1", "val2", "val3"], $obj->getEnumerator(true));

        $this->assertFalse($obj->set("invalid"));
        $this->assertSame("error.obj.value.not.in.enumerator", $obj->getLastValidateError());
        $this->assertSame("", $obj->get());

        $this->assertTrue($obj->set("val2"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("val2", $obj->get());










        // Testes DataFormat
        $obj = new tString(undefined, null, null, null, null, "Brasil.ZipCode");
        $this->assertSame("AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode", $obj->getInputFormat());
        $this->assertFalse($obj->set("invalid zipcode"));
        $this->assertSame("error.obj.value.invalid.input.format", $obj->getLastValidateError());
        $this->assertSame("", $obj->get());

        $this->assertFalse($obj->validateValue("11111"));
        $this->assertSame("error.obj.value.invalid.input.format", $obj->getLastValidateError());

        $this->assertTrue($obj->validateValue("96080150"));
        $this->assertTrue($obj->validateValue("96.080-150"));
        $this->assertSame("", $obj->getLastValidateError());

        $this->assertTrue($obj->set("96080-150"));
        $this->assertSame("", $obj->getLastValidateError());
        $this->assertSame("96.080-150", $obj->get());
        $this->assertSame("96080150", $obj->getStorageValue());
        $this->assertSame("96080-150", $obj->getRawValue());
    }
}
