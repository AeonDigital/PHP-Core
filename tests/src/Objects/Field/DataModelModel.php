<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Objects\Data\DataModel as DataModel;
use AeonDigital\Objects\Field\Commom\{
    fBool, fByte, fString
};

require_once __DIR__ . "/../../../phpunit.php";







class DataModelModel extends TestCase
{

// 54f7b4992f5a9311fc8f62aeec2ffc4fc27e90c2 | primeira alteração deste refactory
// 54dd48dcf15997c41a52e1030e24822a077d8ff8 | última alteração antes do refactory

    // Seguir daqui:
    // Criar um ``standart`` para iDataModel
    // seguir com ``iType`` e ``iField``
    // Quando um modelo de dados exigir que um ``iField`` referencie-se a um modelo de dados
    // usar a classe ``FieldDataModel`` ou ``FieldDataModelArray`` para casos de coleções.
    // Ver forma de validar o nome do modelo de dados ao inserir um valor deste tipo em um
    // destes campos.

    public function test_constructor_ok()
    {
        $fields = [
            new fBool("Enabled"),
            new fByte("Range", "", undefined, 50, 0, 100),
            new fString("Definition", "", undefined, "medium", null, null, ["low", "medium", "high"]),
            [
                "name" => "ZipCode",
                "type" => "String",
                "inputFormat" => "AeonDigital\\DataFormat\\Patterns\\Brasil\\ZipCode"
            ],
            [
                "name" => "subModel",
                "modelName" => "Aplicacao"
            ]
        ];

        $obj = new DataModel("TestModel", "tm Description", $fields);

    }
}
