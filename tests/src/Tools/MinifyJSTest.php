<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Tools\MinifyJS as MinifyJS;

require_once __DIR__ . "/../../phpunit.php";







class MinifyJSTest extends TestCase
{





    public function test_method_minifyCode()
    {
        $original = file_get_contents(__DIR__ . "/files/minifyJS_original1.js");
        $final = file_get_contents(__DIR__ . "/files/minifyJS_final1.js");


        $minify = MinifyJS::getMinifyCode($original);
        $this->assertSame($final, $minify);
    }



    public function test_method_minifyFiles()
    {
        $filesToMinify = [
            __DIR__ . "/files/minifyJS_original1.js",
            __DIR__ . "/files/minifyJS_original2.js"
        ];
        $final = file_get_contents(__DIR__ . "/files/minifyJS_final2.js");


        $minify = MinifyJS::getMinifyFiles($filesToMinify);

        // Converte a versão minificada e a versão final em um array
        // levando em conta o formato UTF-8
        $chrMinify = preg_split('//u', $minify, -1, PREG_SPLIT_NO_EMPTY);
        $chrFinal = preg_split('//u', $final, -1, PREG_SPLIT_NO_EMPTY);


        // Confirma que o número de caracteres é o mesmo
        $this->assertSame(count($chrMinify), count($chrFinal));
        $this->assertSame($final, $minify);
    }



    public function test_method_createMinifyFile()
    {
        $filesToMinify = [
            __DIR__ . "/files/minifyJS_original1.js",
            __DIR__ . "/files/minifyJS_original2.js"
        ];
        $final = file_get_contents(__DIR__ . "/files/minifyJS_final2.js");


        // Remove qualquer arquivo previamente existente.
        $finalFile = __DIR__ . "/files/minifyJS_final3.js";
        if (file_exists($finalFile)) {
            unlink($finalFile);
        }


        // Gera um novo arquivo minificado
        $r = MinifyJS::createMinifyFile($filesToMinify, $finalFile);
        $this->assertTrue($r);
        $this->assertTrue(file_exists($finalFile));

        $minify = file_get_contents(__DIR__ . "/files/minifyJS_final3.js");
        $this->assertSame($final, $minify);
    }
}
