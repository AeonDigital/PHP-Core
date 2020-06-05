<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Traits\MainCheckArgumentException as MainCheckArgumentException;

require_once __DIR__ . "/../../phpunit.php";







class MainCheckArgumentExceptionTest extends TestCase
{



    public function test_check_not_null()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass(null);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg01\". Expected not null value. Given: [ ``null`` ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_string()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass(1);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg01\". Expected string. Given: [ 1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_string_not_empty()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg01\". Expected non empty string.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_string_matches_pattern()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("invalid|");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg01\". Expected string that matches the ``a-zA-Z0-9_`` pattern. Given: [ invalid| ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_numeric()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", null);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg02\". Expected numeric. Given: [ ``null`` ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_numeric_greather_than_or_equal_to_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", -1);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg02\". Expected numeric greather than or equal to zero. Given: [ -1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_numeric_greather_than_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 0);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg02\". Expected numeric greather than zero. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_integer()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, null);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg03\". Expected integer. Given: [ ``null`` ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_integer_greather_than_or_equal_to_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, -1);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg03\". Expected integer greather than or equal to zero. Given: [ -1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_integer_greather_than_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 0);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg03\". Expected integer greather than zero. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_float()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, "0");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg04\". Expected float. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_float_greather_than_or_equal_to_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, -0.0001);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg04\". Expected float greather than or equal to zero. Given: [ 0.0001 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_float_greather_than_zero()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.0);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg04\". Expected float greather than zero. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_array()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1, "");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg05\". Expected array.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_array_not_empty()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1, []);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg05\". Expected a non-empty array.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_array_assoc()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1, [1, 2]);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg05\". Expected array assoc. Given: [ 1 2 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_not_array_assoc()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"], ["p1" => "v1"]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg06\". Expected simple array (not assoc). Given: [ v1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_array_with_x_values()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3, 4]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg06\". Expected an array with exact 3 itens. Given: [ 1 2 3 4 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_has_array_assoc_required_keys()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                [
                    "val01" => "str",
                    "val02" => 0
                ]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg07['val02']\". Expected integer greather than zero. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_foreach_array_child()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02(
                "arg01", 1, 1,
                [
                    "key1" => 1
                ]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg04['key1']\". Expected string. Given: [ 1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");



        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02(
                "arg01", 1, 1,
                [
                    "key1" => ""
                ]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg04\". Expected only the HTTP Methods \"HEAD, OPTIONS, TRACE, DEV, CONNECT\".",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_allowed_value()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "ddd"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg08\". Expected [ aaa, bbb, ccc, 111 ]. Given: [ ddd ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_allowed_key()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02(
                "arg01", 1, 1, null,
                [
                    "invalid" => ""
                ]
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid key defined for \"arg05\". Expected keys [ HEAD, OPTIONS, TRACE, DEV, CONNECT ]. Given: [ invalid ].",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_closure()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "1"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg09\". Given: [ 1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_callable()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                ""
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg10\". Expected callable.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_class_exists()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                function() { return true; },
                "\NonExists"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg11\". The given class name does not exists. Given: [ \NonExists ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_class_implements_interface()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                function() { return true; },
                "\DateTime",
                "\stdClass",
            );
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg12\". Expected Namespace of class thats implements the interface DateTimeInterface. Given: [ \stdClass ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_is_resource_exists()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                function() { return true; },
                "\DateTime",
                "\DateTime",
                __DIR__ . "/nonexists"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $failPath = __DIR__ . "/nonexists";
            $this->assertSame(
                "Invalid value defined for \"arg13\". Resource does not exists. Given: [ $failPath ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_dir_exists()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                function() { return true; },
                "\DateTime",
                "\DateTime",
                __DIR__,
                __DIR__ . "/nonexists"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $failPath = __DIR__ . "/nonexists";
            $this->assertSame(
                "Invalid value defined for \"arg14\". Directory does not exists. Given: [ $failPath ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_is_file_exists()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass("arg01", 1, 1, 0.1,
                ["p1" => "v1"],
                [1, 2, 3],
                ["val01" => "str", "val02" => 1],
                "aaa",
                "123",
                function() { return true; },
                "\DateTime",
                "\DateTime",
                __DIR__,
                __DIR__,
                __DIR__ . "/nonexists.php"
            );
        } catch (\Exception $ex) {
            $fail = true;
            $failPath = __DIR__ . "/nonexists.php";
            $this->assertSame(
                "Invalid value defined for \"arg15\". File does not exists. Given: [ $failPath ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }




    public function test_check_simple_text_instruction()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02(null);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg01\". Expected not null value. Given: [ ``null`` ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }
    public function test_check_custom_error_message()
    {
        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02("", null);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Mensagem customizada.",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");
    }





    public function test_check_executeBeforeConditions_executeBeforeValidate_executeBeforeReturn()
    {
        $obj = new MainCheckArgumentExceptionMockClass02("", "", null);
        $this->assertTrue(true, "Test must pass");

        $obj = new MainCheckArgumentExceptionMockClass02("", "", "this will pass without validate");
        $this->assertTrue(true, "Test must pass");



        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02("", "", 0);
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg03\". Expected numeric greather than zero. Given: [ 0 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");



        $fail = false;
        try {
            $obj = new MainCheckArgumentExceptionMockClass02("", "", "-1");
        } catch (\Exception $ex) {
            $fail = true;
            $this->assertSame(
                "Invalid value defined for \"arg03\". Expected numeric greather than zero. Given: [ -1 ]",
                $ex->getMessage()
            );
        }
        $this->assertTrue($fail, "Test must fail");


        $obj = new MainCheckArgumentExceptionMockClass02("", "", "1");
        $this->assertEquals("Sucess!", $obj->getResult());
    }
}










class MainCheckArgumentExceptionMockClass
{
    use MainCheckArgumentException;

    function __construct(
        $arg01 = "valid",
        $arg02 = 1,
        $arg03 = 1,
        $arg04 = 0.1,
        $arg05 = ["p1" => "v1"],
        $arg06 = [1, 2, 3],
        $arg07 = ["val01" => "str", "val02" => 1],
        $arg08 = "AAA",
        $arg09 = null,
        $arg10 = null,
        $arg11 = null,
        $arg12 = null,
        $arg13 = null,
        $arg14 = null,
        $arg15 = null
    ) {
        $this->mainCheckForInvalidArgumentException(
            "arg01", $arg01, [
                [
                    "validate" => "not null"
                ],
                [
                    "validate" => "is string"
                ],
                [
                    "validate" => "is string not empty"
                ],
                [
                    "validate" => "is string matches pattern",
                    "patternPregMatch" => "/^[a-zA-Z0-9_]+$/",
                    "errorShowPattern" => "a-zA-Z0-9_"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg02", $arg02, [
                [
                    "validate" => "is numeric"
                ],
                [
                    "validate" => "is numeric greather than or equal to zero"
                ],
                [
                    "validate" => "is numeric greather than zero"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg03", $arg03, [
                [
                    "validate" => "is integer"
                ],
                [
                    "validate" => "is integer greather than or equal to zero"
                ],
                [
                    "validate" => "is integer greather than zero"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg04", $arg04, [
                [
                    "validate" => "is float"
                ],
                [
                    "validate" => "is float greather than or equal to zero"
                ],
                [
                    "validate" => "is float greather than zero"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg05", $arg05, [
                [
                    "validate" => "is array"
                ],
                [
                    "validate" => "is array not empty"
                ],
                [
                    "validate" => "is array assoc"
                ],
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg06", $arg06, [
                [
                    "validate" => "is not array assoc"
                ],
                [
                    "validate" => "is array with x values",
                    "expectedCountValues" => 3
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg07", $arg07, [
                [
                    "validate" => "has array assoc required keys",
                    "requiredKeys" => [
                        "val01" => [
                            [
                                "validate" => "is string not empty"
                            ]
                        ],
                        "val02" => [
                            [
                                "validate" => "is integer greather than zero"
                            ]
                        ]
                    ]
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg08", $arg08, [
                [
                    "validate" => "is allowed value",
                    "allowedValues" => ["aaa", "bbb", "ccc", 111],
                    "caseInsensitive" => true
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg09", $arg09, [
                [
                    "validate" => "closure or null",
                    "closure" => function($arg) { return ($arg === "123"); }
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg10", $arg10, [
                [
                    "validate" => "is callable or null"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg11", $arg11, [
                [
                    "validate" => "is class exists or null"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg12", $arg12, [
                [
                    "validate" => "is class implements interface or null",
                    "interface" => "DateTimeInterface"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg13", $arg13, [
                [
                    "validate" => "is resource exists or null"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg14", $arg14, [
                [
                    "validate" => "is dir exists or null"
                ]
            ]
        );


        $this->mainCheckForInvalidArgumentException(
            "arg15", $arg15, [
                [
                    "validate" => "is file exists or null"
                ]
            ]
        );
    }
}


class MainCheckArgumentExceptionMockClass02
{
    use MainCheckArgumentException;



    function __construct(
        $arg01 = "",
        $arg02 = "",
        $arg03 = "",
        $arg04 = null,
        $arg05 = null
    ) {

        $this->mainCheckForInvalidArgumentException(
            "arg01", $arg01, ["not null"]
        );

        $this->mainCheckForInvalidArgumentException(
            "arg02", $arg02, [
                [
                    "validate" => "not null",
                    "executeBeforeConditions" => "",
                    "customErrorMessage" => "Mensagem customizada.",
                    "showArgumentInMessage" => false
                ],
            ]
        );

        $this->result = $this->mainCheckForInvalidArgumentException(
            "arg03", $arg03, [
                [
                    "executeBeforeConditions" => function($args) {
                        //echo $args["argValue"] . "-- \n";
                        return (($args["argValue"] === null) ? 1 : $args["argValue"]);
                    },
                    "conditions" => "is numeric",
                    "executeBeforeValidate" => function($args) {
                        //echo $args["argValue"] . "-- \n";
                        return (int)$args["argValue"];
                    },
                    "validate" => "is numeric greather than zero",
                    // Forma de passar os argumentos externos para as funções acima.
                    "subArg01" => $arg01,
                    "subArg02" => $arg02,
                    "executeBeforeReturn" => function($args) {
                        return "Sucess!";
                    }
                ],
            ]
        );

        $this->mainCheckForInvalidArgumentException(
            "arg04", $arg04, [
                [
                    "conditions" => ["not null", "is array assoc"],
                    "validate" => "foreach array child",
                    "foreachChild" => [
                        ["validate" => 'is string']
                    ]
                ],
                [
                    "conditions" => ["not null", "is array assoc"],
                    "validate" => "foreach array child",
                    "foreachChild" => function($key, $value) {
                        $allowed = ["HEAD", "OPTIONS", "TRACE", "DEV", "CONNECT"];
                        if (\in_array($key, $allowed) === false) {
                            $this->invalidArgumentExceptionMessage = "Invalid value defined for \"arg04\". Expected only the HTTP Methods \"" . implode(", ", $allowed) . "\".";

                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                ]
            ]
        );

        $this->mainCheckForInvalidArgumentException(
            "arg05", $arg05, [
                [
                    "conditions" => ["not null", "is array assoc"],
                    "validate" => "is allowed key",
                    "allowedValues" => ["HEAD", "OPTIONS", "TRACE", "DEV", "CONNECT"],
                    "caseInsensitive" => false,
                ]
            ]
        );


    }



    private $result = null;
    public function getResult() {
        return $this->result;
    }
}
