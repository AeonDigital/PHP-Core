<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Tools\JSON as JSON;

require_once __DIR__ . "/../../phpunit.php";







class JSONTest extends TestCase
{





    public function test_method_retrieve()
    {
        $jsonFileOne = JSON::retrieve(__DIR__ . "/files/file_one.json");
        $jsonFileTwo = JSON::retrieve(__DIR__ . "/files/file_two.json");
        $jsonFileThree = JSON::retrieve(__DIR__ . "/files/file_three.json");


        $this->assertNotNull($jsonFileOne);
        $this->assertNotNull($jsonFileTwo);
        $this->assertNull($jsonFileThree);


        $this->assertEquals($jsonFileOne, $jsonFileTwo);
    }


    public function test_method_indent()
    {
        $strJSON = "{
	        \"Prop1\": \"value1\" ,
	        \"Prop2\": \"value2\" \t,
            \"Prop3\": \"value3\" \n,
            \"Prop4\": \"value4\" \r,
        }";

        $strExpected = "";
        $strExpected .= "{\n";
        $strExpected .= "	\"Prop1\": \"value1\",\n";
        $strExpected .= "	\"Prop2\": \"value2\",\n";
        $strExpected .= "	\"Prop3\": \"value3\",\n";
        $strExpected .= "	\"Prop4\": \"value4\",\n";
        $strExpected .= "}";

        $strResult = JSON::indent($strJSON);
        $this->assertSame($strExpected, $strResult);
    }



    function test_method_save()
    {
        $newJSON = null;
        $newJSON["Prop1"] = "value1";
        $newJSON["Prop2"] = "value2";
        $newJSON["Prop3"] = "value3";
        $newJSON["PropArray"] = [0, 1, 2, 3, 4, 5, 6, 7, 8];


        $propObj = null;
        $propObj["SubProp1"] = "subvalue1";
        $propObj["SubProp2"] = "subvalue2";
        $propObj["SubProp3"] = "subvalue3";


        $newJSON["PropObj"] = $propObj;

        $newJSON["escapeChar"] = "teste \"isso\" \n\r e isso daqui.";


        // Remove o arquivo de teste se ele existir
        $file_savejson = __DIR__ . "/files/file_savejson.json";
        if (is_file($file_savejson)) {
            unlink($file_savejson);
        }

        JSON::save($file_savejson, $newJSON);
        $load_savejson = JSON::retrieve($file_savejson);


        $this->assertNotNull($load_savejson);
        $this->assertEquals($newJSON, $load_savejson);
    }
}
