<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use AeonDigital\Tools\MinifyCSS as MinifyCSS;

require_once __DIR__ . "/../../phpunit.php";







class MinifyCSSTest extends TestCase
{





    public function test_method_minifyCode()
    {
        $original = file_get_contents(__DIR__ . "/files/minifyCSS_original1.css");
        $final = file_get_contents(__DIR__ . "/files/minifyCSS_final1.css");


        $minify = MinifyCSS::getMinifyCode($original);
        $this->assertSame($final, $minify);
    }



    public function test_method_minifyFiles()
    {
        $filesToMinify = [
            __DIR__ . "/files/minifyCSS_original1.css",
            __DIR__ . "/files/minifyCSS_original2.css"
        ];
        $final = file_get_contents(__DIR__ . "/files/minifyCSS_final2.css");


        $minify = MinifyCSS::getMinifyFiles($filesToMinify);

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
            __DIR__ . "/files/minifyCSS_original1.css",
            __DIR__ . "/files/minifyCSS_original2.css"
        ];
        $final = file_get_contents(__DIR__ . "/files/minifyCSS_final2.css");


        // Remove qualquer arquivo previamente existente.
        $finalFile = __DIR__ . "/files/minifyCSS_final3.css";
        if (file_exists($finalFile)) {
            unlink($finalFile);
        }


        // Gera um novo arquivo minificado
        $r = MinifyCSS::createMinifyFile($filesToMinify, $finalFile);
        $this->assertTrue($r);
        $this->assertTrue(file_exists($finalFile));

        $minify = file_get_contents(__DIR__ . "/files/minifyCSS_final3.css");
        $this->assertSame($final, $minify);
    }
}
