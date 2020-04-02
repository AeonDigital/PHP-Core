<?php
declare (strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../phpunit.php";








class global_functionsTest extends TestCase
{





    public function test_method_array_check_required_keys()
    {
        $requiredKeys = ["Prop1", "Prop2", "Prop4"];

        $toTest1 = null;
        $toTest1["Prop1"] = "a";
        $toTest1["Prop2"] = "a";
        $toTest1["Prop3"] = "a";
        $toTest1["Prop4"] = "a";
        $toTest1["Prop5"] = "a";

        $toTest2 = null;
        $toTest2["Prop1"] = "a";


        $returnedA = array_check_required_keys($requiredKeys, $toTest1);
        $returnedB = array_check_required_keys($requiredKeys, $toTest2);


        $this->assertEquals($returnedA, []);
        $this->assertEquals($returnedB, ["Prop2", "Prop4"]);
    }



    public function test_method_array_in_ci()
    {
        $testArray = ["Rianna", "Cantarelli", "Schellin", "Aeon", "DIGiTAL"];

        foreach ($testArray as $s) {
            $alter = strtoupper($s);

            $this->assertTrue(in_array($s, $testArray));
            $this->assertFalse(in_array($alter, $testArray));
            $this->assertTrue(array_in_ci($alter, $testArray));
        }
    }



    public function test_method_array_is_assoc()
    {
        $commomArray = [];
        $anotherArray = [1, 1, 1];
        $assocArray = ["k1" => 1, "k2" => 2, "k3" => 3];
        $anotherAssocArray = ["k1" => 1, 2, 3];


        $this->assertFalse(array_is_assoc($commomArray));
        $this->assertFalse(array_is_assoc($anotherArray));

        $this->assertTrue(array_is_assoc($assocArray));
        $this->assertTrue(array_is_assoc($anotherAssocArray));
    }










    public function test_method_date_to_first_month_day()
    {
        $strTest = [
            "1900-01-01 12:12:31" => "1900-01-01 00:00:00",
            "2000-02-28 06:12:44" => "2000-02-01 00:00:00",
            "2000-09-15 22:30:41" => "2000-09-01 00:00:00",
            "2012-06-24 23:59:59" => "2012-06-01 00:00:00",
            "2015-12-31" => "2015-12-01 00:00:00",
            "2200-02-27" => "2200-02-01 00:00:00",
        ];

        foreach ($strTest as $originalDate => $resultDate) {
            $result = date_to_first_month_day(new \DateTime($originalDate));
            $this->assertEquals($result->format("Y-m-d H:i:s"), $resultDate);
        }
    }



    public function test_method_date_to_last_month_day()
    {
        $strTest = [
            "1900-01-01 12:12:31" => "1900-01-31 23:59:59",
            "2000-02-28 06:12:44" => "2000-02-29 23:59:59",
            "2000-09-15 22:30:41" => "2000-09-30 23:59:59",
            "2012-06-24 23:59:59" => "2012-06-30 23:59:59",
            "2015-12-31" => "2015-12-31 23:59:59",
            "2200-02-27" => "2200-02-28 23:59:59",
        ];

        foreach ($strTest as $originalDate => $resultDate) {
            $result = date_to_last_month_day(new \DateTime($originalDate));
            $this->assertEquals($result->format("Y-m-d H:i:s"), $resultDate);
        }
    }










    //
    // Cria uma coleção de diretórios aninhados e adiciona alguns arquivos no
    // nível mais interno para que testes possam ser feitos com estes recursos.
    //
    private function provider_createResources()
    {
        $tgtDir = __DIR__ . DS . "one";
        if (is_dir($tgtDir) === false) {
            $this->test_createResourcesToTest(false);
        }
    }



    //
    // Cria uma coleção de diretórios aninhados e adiciona alguns arquivos no
    // nível mais interno para que testes possam ser feitos com estes recursos.
    //
    public function test_createResourcesToTest($makeAssertation = true)
    {
        $strNewDirs = ["one", "two", "tree"];
        $newFiles = ["file1.txt", "file2.txt", "file3.txt", "_underFile.txt"];
        $now = new DateTime();


        // Cria uma estrutura de pastas para o teste
        $atualPath = __DIR__;
        foreach ($strNewDirs as $dir) {
            $atualPath .= DS . $dir;

            if (!file_exists($atualPath)) {
                mkdir($atualPath, 777);
            }
        }


        // Adiciona os arquivos de teste no último diretório.
        foreach ($newFiles as $file) {
            $newFilePath = $atualPath . DS . $file;

            if (!file_exists($newFilePath)) {
                file_put_contents($newFilePath, $now->format("Y-m-d H:i:s"));
            }
        }


        if ($makeAssertation === true) {
            // Verifica se os diretórios de teste foram criados
            $atualPath = __DIR__;
            foreach ($strNewDirs as $dir) {
                $atualPath .= DS . $dir;
                $this->assertTrue(file_exists($atualPath));
            }


            // Verifica se os arquivos de teste foram criados.
            foreach ($newFiles as $file) {
                $newFilePath = $atualPath . DS . $file;

                $this->assertTrue(file_exists($newFilePath));
            }
        }
    }



    public function test_method_dir_chmod_r()
    {

        // Este método deve ser ignorado em ambiente windows mas deve ser testado
        // em ambiente Linux
        if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
            $this->assertTrue(true);
        } else {
            $this->provider_createResources();

            $strNewDirs = ["one", "two", "tree"];
            $newFiles = ["_underFile.txt", "file1.txt", "file2.txt", "file3.txt"];


            // Este teste deve ser feito apenas em ambientes Linux
            $isWindowsSO = (strtoupper(substr(PHP_OS, 0, 3)) === "WIN");
            if (!$isWindowsSO) {
                // Verifica os diretórios da estrutura de teste
                $atualPath = __DIR__;
                foreach ($strNewDirs as $dir) {
                    $atualPath .= DS . $dir;

                    $this->assertEquals(777, fileperms($atualPath));
                }


                // Verifica os arquivos de teste no último diretório.
                foreach ($newFiles as $file) {
                    $newFilePath = $atualPath . DS . $file;

                    $this->assertEquals(777, fileperms($newFilePath));
                }



                // Efetua a alteração
                $targetPath = __DIR__ . DS . "one";
                $this->assertTrue(dir_chmod_r($targetPath, 700));




                // Verifica os diretórios da estrutura de teste
                $atualPath = __DIR__;
                foreach ($strNewDirs as $dir) {
                    $atualPath .= DS . $dir;

                    $this->assertEquals(700, fileperms($atualPath));
                }


                // Verifica os arquivos de teste no último diretório.
                foreach ($newFiles as $file) {
                    $newFilePath = $atualPath . DS . $file;

                    $this->assertEquals(700, fileperms($newFilePath));
                }



                // Altera novamente as permissões para o valor inicial
                $this->assertTrue(dir_chmod_r($targetPath, 777));
            }
        }
    }



    public function test_method_dir_copy()
    {
        $this->provider_createResources();

        // Identifica o diretório de origem e o nome do novo diretório
        $pathToCopy_origin = __DIR__ . DS . "one";
        $pathToCopy_destiny = $pathToCopy_origin . "_copy";

        // Testa a existencia da origem e a ausencia do destino
        $this->assertTrue(file_exists($pathToCopy_origin));
        $this->assertFalse(file_exists($pathToCopy_destiny));


        // Efetua a cópia do novo diretório
        $this->assertTrue(dir_copy($pathToCopy_origin, $pathToCopy_destiny, 777));

        // Testa a existencia da origem e a ausencia do destino
        $this->assertTrue(file_exists($pathToCopy_origin));
        $this->assertTrue(file_exists($pathToCopy_destiny));
    }



    public function test_method_dir_scan_w()
    {
        $this->provider_createResources();

        $strNewDirs = ["one", "two", "tree"];
        $files = [".", "..", "_underFile.txt", "file1.txt", "file2.txt", "file3.txt"];

        $targetPath = __DIR__ . DS . implode(DS, $strNewDirs);
        $contentDir = dir_scan_w($targetPath);

        $this->assertEquals($files, $contentDir);
    }



    public function test_method_file_convert_to_utf8()
    {
        $strFilePath = __DIR__ . DS . "testEncode.txt";
        $strContent = "Informação utilizando o encoding ISO-8859-1 [ também chamado de Windows-1252 ]";

        // Converte o conteúdo para ISO-8859-1
        $strContent_ISO_8859_1 = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $strContent);


        // Primeiramente remove o arquivo se ele existir
        if (file_exists($strFilePath)) {
            unlink($strFilePath);
        }
        $this->assertFalse(file_exists($strFilePath));



        // Cria o arquivo com o conteúdo usando o encoding UTF-8.
        file_put_contents($strFilePath, $strContent);
        $this->assertTrue(file_exists($strFilePath));

        // Resgata o conteúdo do arquivo e compara-o
        $fileContent = file_get_contents($strFilePath);
        $this->assertEquals($strContent, $fileContent);

        // Converte o arquivo e então compara novamente seu conteúdo
        $this->assertTrue(file_convert_to_utf8($strFilePath));
        $fileContent = file_get_contents($strFilePath);
        $this->assertEquals($strContent, $fileContent);





        // Cria o arquivo com o conteúdo no encoding definido diferente do UTF-8.
        file_put_contents($strFilePath, $strContent_ISO_8859_1);
        $this->assertTrue(file_exists($strFilePath));


        // Resgata o conteúdo do arquivo e compara-o
        $fileContent = file_get_contents($strFilePath);
        $this->assertNotEquals($strContent, $fileContent);
        $this->assertEquals($strContent_ISO_8859_1, $fileContent);


        // Converte o arquivo e então compara novamente seu conteúdo
        $this->assertTrue(file_convert_to_utf8($strFilePath));
        $fileContent = file_get_contents($strFilePath);
        $this->assertEquals($strContent, $fileContent);
        $this->assertNotEquals($strContent_ISO_8859_1, $fileContent);


        // Exclui o arquivo de teste
        unlink($strFilePath);
    }



    public function test_method_dir_deltree()
    {
        $this->provider_createResources();

        // Executa a exclusão da cadeia de diretórios
        $pathToDelete_original = __DIR__ . DS . "one";
        $pathToDelete_copy = $pathToDelete_original . "_copy";

        $this->assertFalse(dir_deltree($pathToDelete_original . "nonexist"));
        $this->assertTrue(dir_deltree($pathToDelete_original));
        $this->assertTrue(dir_deltree($pathToDelete_copy));

        // Verifica se foram realmente excluidos
        $this->assertFalse(file_exists($pathToDelete_original));
        $this->assertFalse(file_exists($pathToDelete_copy));
    }












    public function test_method_mb_str_contains()
    {
        $input = "Mais um framework para PHP.";
        $search = "work";
        $expected = true;
        $result = mb_str_contains($input, $search);
        $this->assertEquals($result, $expected);

        $search = "less";
        $expected = false;
        $result = mb_str_contains($input, $search);
        $this->assertEquals($result, $expected);
    }




    public function test_method_mb_str_ends_with()
    {
        $strTrue = ["one_sufix", "two_sufix", "tree_sufix"];
        $strFalse = ["sufix_not", "another_word", "expression_false", "lit"];


        foreach ($strTrue as $s) {
            $this->assertTrue(mb_str_ends_with($s, "sufix"));
        }


        foreach ($strFalse as $s) {
            $this->assertFalse(mb_str_ends_with($s, "sufix"));
        }
    }



    public function test_method_mb_str_insert()
    {
        $input = "Mais um framework para PHP.";
        $result = mb_str_insert($input, "work", 13);
        $expected = "Mais um frameworkwork para PHP.";
        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_last_pos()
    {
        $input = "Mais um framework para PHP.";
        $search = "m";
        $expected = 11;
        $result = mb_str_last_pos($input, $search);
        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_limit_chars()
    {
        $str = 'Das várias palavras que há nesta sentença, apenas 5 permanecerão.';
        $result = mb_str_limit_chars($str, 35);
        $expected = 'Das várias palavras que há nesta se';

        $this->assertEquals($result, $expected);


        $str = 'Das várias palavras que há nesta sentença, apenas 5 permanecerão.';
        $result = mb_str_limit_chars($str, 35, "...");
        $expected = 'Das várias palavras que há nesta...';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_limit_words()
    {
        $str = 'Das várias  palavras que há nesta  sentença, apenas 5 permanecerão.';
        $result = mb_str_limit_words($str, 5);
        $expected = 'Das várias palavras que há';

        $this->assertEquals($result, $expected);


        $str = 'Das várias  palavras que há nesta  sentença, apenas 5 permanecerão.';
        $result = mb_str_limit_words($str, 5, " ...");
        $expected = 'Das várias palavras que há ...';

        $this->assertEquals($result, $expected);


        $str = 'Das várias  palavras.';
        $result = mb_str_limit_words($str, 5, " ...");
        $expected = 'Das várias palavras.';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_pos_all()
    {
        $test = "1.000.111.333,00";
        $expected = [1, 5, 9];
        $result = mb_str_pos_all($test, ".");

        $this->assertSame($expected, $result);


        $test = "1.000.111.333,00";
        $expected = false;
        $result = mb_str_pos_all($test, "e");

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_str_remove()
    {
        $str = 'Uma sequencia desta sentença deverá desaparecer';
        $result = mb_str_remove($str, 4, 9);
        $expected = 'Uma  desta sentença deverá desaparecer';

        $this->assertEquals($result, $expected);


        // Teste UTF-8
        $str = 'Uma sequência desta sentença deverá desaparecer';
        $result = mb_str_remove($str, 4, 9);
        $expected = 'Uma  desta sentença deverá desaparecer';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_preserve_chars()
    {
        $str = 'Todas vogais desta sentença de teste deverão desaparecer';
        $result = mb_str_preserve_chars($str, 'bcçdfghjklmnpqrstvwxyzBCÇDFGHJKLMNPQRSTVWXYZ .ãÃ');
        $expected = 'Tds vgs dst sntnç d tst dvrã dsprcr';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_remove_chars()
    {
        $str = 'Todas vogais desta sentença de teste deverão desaparecer';
        $result = mb_str_remove_chars($str, 'áaeiou');
        $expected = 'Tds vgs dst sntnç d tst dvrã dsprcr';

        $this->assertEquals($result, $expected);


        $str = 'yyyy-MM-ddTHH:mm:ssZ';
        $result = mb_str_remove_chars($str, '-/.:wWzZ');
        $expected = 'yyyyMMddTHHmmss';


        $this->assertEquals($result, $expected);


        // Teste UTF-8
        $str = 'Todás vogais desta sentença de teste deverão desaparecer';
        $result = mb_str_remove_chars($str, 'áaeiouç');
        $expected = 'Tds vgs dst sntn d tst dvrã dsprcr';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_remove_glyphs()
    {
        $str = 'Cáchôrrãoà grandão confusão, há acentuação ❤.';
        $result = mb_str_remove_glyphs($str);
        $expected = 'Cachorraoa grandao confusao, ha acentuacao ❤.';

        $this->assertEquals($result, $expected);
    }



    public function test_method_mb_str_replace_once()
    {
        $search = "passará";
        $replace = "passou";
        $subject = "Esta string passará por uma substituição, Será removido \"passará\" por \"passou\".";
        $expected = "Esta string passou por uma substituição, Será removido \"passará\" por \"passou\".";
        $this->assertSame($expected, mb_str_replace_once($search, $replace, $subject));
    }



    public function test_method_mb_str_split()
    {
        $original = "Hello World";
        $expected = ["H", "e", "l", "l", "o", " ", "W", "o", "r", "l", "d"];
        $result = mb_str_split($original);

        $this->assertSame($expected, $result);


        $original = "Hello World";
        $expected = ["Hello Wo", "rld"];
        $result = mb_str_split($original, 8);

        $this->assertSame($expected, $result);


        $original = "Acentuação";
        $expected = ["A", "c", "e", "n", "t", "u", "a", "ç", "ã", "o"];
        $result = str_split($original);

        $this->assertNotSame($expected, $result);


        $original = "Acentuação";
        $expected = ["A", "c", "e", "n", "t", "u", "a", "ç", "ã", "o"];
        $result = mb_str_split($original);

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_str_starts_with()
    {
        $strTrue = ["prefix_one", "prefix_two", "prefix_tree"];
        $strFalse = ["not_prefix", "another_word", "expression_false", "lit"];


        foreach ($strTrue as $s) {
            $this->assertTrue(mb_str_starts_with($s, "prefix"));
        }


        foreach ($strFalse as $s) {
            $this->assertFalse(mb_str_starts_with($s, "prefix"));
        }
    }



    public function test_method_mb_str_uc_first()
    {
        $original = " ";
        $expected = " ";
        $result = mb_str_uc_first($original);

        $this->assertSame($expected, $result);


        $original = "hello world";
        $expected = "Hello world";
        $result = mb_str_uc_first($original);

        $this->assertSame($expected, $result);


        $original = "Hello World";
        $expected = "Hello World";
        $result = mb_str_uc_first($original);

        $this->assertSame($expected, $result);


        $original = "acentuação";
        $expected = "Acentuação";
        $result = mb_str_uc_first($original);

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_str_uc_names_ptbr()
    {
        $original = " ";
        $expected = " ";
        $result = mb_str_uc_names_ptbr($original);

        $this->assertSame($expected, $result);


        $original = "PAULO DA SILVA";
        $expected = "Paulo da Silva";
        $result = mb_str_uc_names_ptbr($original);

        $this->assertSame($expected, $result);


        $original = "rio GRANDE do SUL";
        $expected = "Rio Grande do Sul";
        $result = mb_str_uc_names_ptbr($original);

        $this->assertSame($expected, $result);


        $original = "pero vaz de caminha";
        $expected = "Pero Vaz de Caminha";
        $result = mb_str_uc_names_ptbr($original);

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_str_uc_names()
    {
        $original = " ";
        $expected = " ";
        $result = mb_str_uc_names($original);

        $this->assertSame($expected, $result);


        $original = "own name hello world";
        $expected = "Own Name Hello World";
        $result = mb_str_uc_names($original);

        $this->assertSame($expected, $result);


        $original = "Own Name Hello World";
        $expected = "Own Name Hello World";
        $result = mb_str_uc_names($original);

        $this->assertSame($expected, $result);


        $original = "own name hello world da acentuação";
        $expected = "Own Name Hello World da Acentuação";
        $result = mb_str_uc_names($original, "", ["da"]);

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_str_uc_words()
    {
        $original = " ";
        $expected = " ";
        $result = mb_str_uc_words($original);

        $this->assertSame($expected, $result);


        $original = "hello world";
        $expected = "Hello World";
        $result = mb_str_uc_words($original);

        $this->assertSame($expected, $result);


        $original = "Hello World";
        $expected = "Hello World";
        $result = mb_str_uc_words($original);

        $this->assertSame($expected, $result);


        $original = "hello da acentuação";
        $expected = "Hello Da Acentuação";
        $result = mb_str_uc_words($original);

        $this->assertSame($expected, $result);


        $original = "hello da acentuação";
        $ignore = ["hello", "da"];
        $expected = "hello da Acentuação";
        $result = mb_str_uc_words($original, $ignore);

        $this->assertSame($expected, $result);
    }



    public function test_method_mb_substr_replace()
    {
        $var = "ABCDÉFGH:/MNRPQR/";
        $r1 = mb_substr_replace($var, 'bob', 10, -1);
        $r2 = mb_substr_replace($var, 'bob', -7, -1);
        $expected = "ABCDÉFGH:/bob/";

        $this->assertSame($expected, $r1);
        $this->assertSame($expected, $r2);


        $r3 = mb_substr_replace($var, 'bob', 30);
        $this->assertSame($var . "bob", $r3);

        $r4 = mb_substr_replace($var, 'bob', 30, null, "ISO-8859-1");
        $this->assertSame($var . "bob", $r4);
    }










    public function test_method_numeric_decimal_part()
    {
        // Este teste coloca a prova (de forma simples) a experiência de
        // tentar obter precisão representativa de números de ponto flutuante
        // (que por padrão não tem esta prerrogativa)
        // Não tem um objetivo prático além de do teste do "get_decimal_part" mas
        // serve para explicitar que, se você deseja obter uma precisão maior para
        // seus valores numéricos, precisa encontrar uma outra forma ;)

        // key => chave identificadora do teste
        // value => array contendo os valores e as regras do teste
        //     [
        //         0 => valor que será passado para testar o retorno
        //         1 => valor que será comparado com o retornado
        //              [sempre um string para garantir a representação numérica equivalente ao esperado]
        //         2 => Identifica se é para comparar "Same" ou "NotSame"
        //              Quando for "NotSame" indica quando a precisão não foi suficiente para
        //              retornar a representação adequada do numeral.
        //         3 => Número total de digitos que compõe o numeral testado.
        //         4 => Quantidade de casas decimais da resposta esperada
        //    ]

        $valuesAndExpected = [
            // Testando o maior númeral até onde o PHP não perde o
            // resultado esperado do ponto flutuante
            "a1" => [0, "0.0", "Same", 1, 1],
            "b1" => [9, "0.0", "Same", 1, 1],
            "c1" => [9.9, "0.9", "Same", 2, 1],
            "d1" => [99.9, "0.9", "Same", 3, 1],
            "e1" => [999.9, "0.9", "Same", 4, 1],
            "f1" => [9999.9, "0.9", "Same", 5, 1],
            "g1" => [99999.9, "0.9", "Same", 6, 1],
            "h1" => [999999.9, "0.9", "Same", 7, 1],
            "i1" => [9999999.9, "0.9", "Same", 8, 1],
            "j1" => [99999999.9, "0.9", "Same", 9, 1],
            "k1" => [999999999.9, "0.9", "Same", 10, 1],
            "l1" => [9999999999.9, "0.9", "Same", 11, 1],
            "m1" => [99999999999.9, "0.9", "Same", 12, 1],
            "n1" => [999999999999.9, "0.9", "Same", 13, 1],
            "o1" => [9999999999999.9, "0.9", "Same", 14, 1],
            "p1" => [99999999999999.9, "0.9", "Same", 15, 1],
            "q1" => [987654321234567.9, "0.9", "Same", 16, 1],
            "r1" => [999999999999999.9, "0.9", "Same", 16, 1],
            "s1" => [9999999999999999.9, "0.9", "NotSame", 17, 1],

            // Testando a maior quantidade de casas decimais até
            // o limite onde o PHP consegue representa-la conforme o esperado
            "a2" => [9.99, "0.99", "Same", 3, 2],
            "b2" => [9.999, "0.999", "Same", 4, 3],
            "c2" => [9.9999, "0.9999", "Same", 5, 4],
            "d2" => [9.99999, "0.99999", "Same", 6, 5],
            "e2" => [9.999999, "0.999999", "Same", 7, 6],
            "f2" => [9.9999999, "0.9999999", "Same", 8, 7],
            "g2" => [9.99999999, "0.99999999", "Same", 9, 8],
            "h2" => [9.999999999, "0.999999999", "Same", 10, 9],
            "i2" => [9.9999999999, "0.9999999999", "Same", 11, 10],
            "j2" => [9.99999999999, "0.99999999999", "Same", 12, 11],
            "k2" => [9.999999999999, "0.999999999999", "Same", 13, 12],
            "l2" => [9.9999999999999, "0.9999999999999", "Same", 14, 13],
            "m2" => [9.01234567890123, "0.01234567890123", "Same", 15, 14],
            "n2" => [9.99999999999999, "0.99999999999999", "Same", 15, 14],
            "o2" => [9.999999999999999, "0.999999999999999", "NotSame", 16, 15],

            // Testando pegar a maior quantidade de casas decimais em que o PHP
            // ainda apresenta uma representação conforme esperado
            // e então aumentar 1 digito na parte inteira até que ele se perca
            "a3" => [99.99999999999999, "0.99999999999999", "Same", 16, 14],
            "b3" => [98.76543212345678, "0.76543212345678", "Same", 16, 14],
            "c3" => [999.99999999999999, "0.99999999999999", "NotSame", 17, 14],

            // Verificando se, ao aumentar 1 casa entre os inteiros e,
            // removendo 1 casa decimal o PHP continua sem se perder.
            "a4" => [999.9999999999999, "0.9999999999999", "Same", 16, 13],
            "b4" => [9999.999999999999, "0.999999999999", "NotSame", 16, 12],
            "c4" => [99999.99999999999, "0.99999999999", "Same", 16, 11],
            "d4" => [999999.9999999999, "0.9999999999", "Same", 16, 10],
            "e4" => [9999999.999999999, "0.999999999", "NotSame", 16, 9],
            "f4" => [99999999.99999999, "0.99999999", "Same", 16, 8],
            "g4" => [999999999.9999999, "0.9999999", "Same", 16, 7],
            "h4" => [9999999999.999999, "0.999999", "NotSame", 16, 6],
            "i4" => [99999999999.99999, "0.99999", "NotSame", 16, 5],
            "j4" => [999999999999.9999, "0.9999", "Same", 16, 4],
            "k4" => [9999999999999.999, "0.999", "NotSame", 16, 3],
            "l4" => [99999999999999.99, "0.99", "NotSame", 16, 2],
            "m4" => [999999999999999.9, "0.9", "Same", 16, 1],

            // O teste abaixo mostra que mantendo o mesmo numero de dígitos
            // mas movendo o ponto decimal para frente ou para traz
            // acaba por acarregar em perda de precisão.
            "a5" => [99999999.99999999, "0.99999999", "Same", 16, 8],
            "b5" => [9999999.999999999, "0.999999999", "NotSame", 16, 9],
            "c5" => [999999999.9999999, "0.9999999", "Same", 16, 7],

            // Devido a inconstância encontrada no teste anterior,
            // foi reduzido em 1 dígito e o teste permaneceu o mesmo
            // para verificar se com este limite a representação se mantém estável
            // Aparentemente, mantendo 15 dígitos ao todo a precisão é mantida.
            "a6" => [999.999999999999, "0.999999999999", "Same", 15, 12],
            "b6" => [999.987654321234, "0.987654321234", "Same", 15, 12],
            "c6" => [9999.99999999999, "0.99999999999", "Same", 15, 11],
            "d6" => [9999.01234567899, "0.01234567899", "Same", 15, 11],
            "e6" => [99999.9999999999, "0.9999999999", "Same", 15, 10],
            "f6" => [98765.9876543212, "0.9876543212", "Same", 15, 10],
            "g6" => [999999.999999999, "0.999999999", "Same", 15, 9],
            "h6" => [123456.789876543, "0.789876543", "Same", 15, 9],
            "i6" => [9999999.99999999, "0.99999999", "Same", 15, 8],
            "j6" => [9876543.09812523, "0.09812523", "Same", 15, 8],
            "k6" => [99999999.9999999, "0.9999999", "Same", 15, 7],
            "l6" => [12345678.9876542, "0.9876542", "Same", 15, 7],
            "m6" => [999999999.999999, "0.999999", "Same", 15, 6],
            "n6" => [123456789.987654, "0.987654", "Same", 15, 6],
            "o6" => [9999999999.99999, "0.99999", "Same", 15, 5],
            "p6" => [9876543210.01234, "0.01234", "Same", 15, 5],
            "q6" => [99999999999.9999, "0.9999", "Same", 15, 4],
            "r6" => [12345678901.9876, "0.9876", "Same", 15, 4],
            "s6" => [999999999999.999, "0.999", "Same", 15, 3],
            "t6" => [987456123332.001, "0.001", "Same", 15, 3],
            "u6" => [9999999999999.99, "0.99", "Same", 15, 2],
            "v6" => [9000876543200.05, "0.05", "Same", 15, 2],
            "y6" => [99999999999999.9, "0.9", "Same", 15, 1],
            "w6" => [95487856541258.6, "0.6", "Same", 15, 1],


            // Testa se os zeros a direita da casa decimal serão mantidos
            // conforme indicação do parametro "$l"
            "a7" => [954878258.600000, "0.600000", "Same", 15, 6]
        ];


        foreach ($valuesAndExpected as $test => $rules) {
            $num        = $rules[0];
            $exp        = $rules[1];
            $typ        = $rules[2];
            $digitos    = $rules[3];
            $decimais   = $rules[4];

            $r = numeric_decimal_part($num, $decimais);
            $str = number_format($r, $decimais, ".", "");

            if ($typ === "Same") {
                $this->assertSame($exp, $str);
            } else if ($typ === "NotSame") {
                $this->assertNotSame($exp, $str);
            }
        }


        $this->assertSame(null, numeric_decimal_part("22.22"));
    }



    public function test_method_numeric_integer_part()
    {
        $valuesAnstIntegers = [
            "9" => 9,
            "9.0" => 9,
            "9.987654321" => 9,
            "99.987654321" => 99,
            "999.987654321" => 999,
            "9999.987654321" => 9999,
            "99999.987654321" => 99999,
            "999999.987654321" => 999999,
            "9999999.987654321" => 9999999,
            "99999999.987654321" => 99999999,
            "999999999.987654321" => 999999999,
            "9999999999.987654321" => 9999999999,
            "99999999999.987654321" => 99999999999,
            "999999999999.987654321" => 999999999999,
            "9999999999999.987654321" => 9999999999999,
            "99999999999999.987654321" => 99999999999999
        ];

        foreach ($valuesAnstIntegers as $oVal => $expected) {
            $this->assertSame($expected, numeric_integer_part((float)$oVal));
        }


        $invalidValues = [
            undefined, null, []
        ];

        foreach ($invalidValues as $oVal) {
            $this->assertNull(numeric_integer_part($oVal));
        }

        $this->assertSame(12, numeric_integer_part(12.998));
        $this->assertSame(null, numeric_integer_part("12"));
    }



    public function test_method_numeric_is_even()
    {
        $this->assertFalse(numeric_is_even(1));
        $this->assertTrue(numeric_is_even(2));


        $this->assertFalse(numeric_is_even(1.0));
        $this->assertTrue(numeric_is_even(2.0));
        $this->assertTrue(numeric_is_even(2.2));

        $this->assertNull(numeric_is_even("1"));
    }



    public function test_method_numeric_is_odd()
    {
        $this->assertTrue(numeric_is_odd(1));
        $this->assertFalse(numeric_is_odd(2));


        $this->assertTrue(numeric_is_odd(1.0));
        $this->assertFalse(numeric_is_odd(2.0));
        $this->assertFalse(numeric_is_odd(2.2));

        $this->assertNull(numeric_is_odd("1"));
    }



    public function test_method_numeric_mod()
    {
        $this->assertEquals(numeric_mod(4, 3), 1);
        $this->assertEquals(numeric_mod(9, 9), 0);
        $this->assertEquals(numeric_mod(-3, 3), 0);
    }










    public function test_method_object_clone()
    {
        $obj = [1, 2, 3, 4, 5, 6];
        $clone = object_clone($obj);

        $this->assertSame($clone, $obj);


        $obj = new \stdClass();
        $obj->prop1 = "val1";
        $obj->prop2 = [1, 2, 3, 4, 5];
        $obj->prop3 = ["bla", "ble", "bli", "blo", "blu"];
        $obj->prop4 = ["subprop1" => "subval1", "subprop2" => 20, "date" => new \DateTime()];
        $obj->prop5 = new \stdClass();
        $obj->prop5->newprop = null;
        $clone = object_clone($obj);

        $this->assertNotSame($clone, $obj);
        $this->assertSame($obj->prop1, $clone->prop1);
        $this->assertSame($obj->prop2, $clone->prop2);
        $this->assertSame($obj->prop3, $clone->prop3);

        $this->assertNotSame($obj->prop4, $clone->prop4);
        $this->assertSame($obj->prop4["subprop1"], $clone->prop4["subprop1"]);
        $this->assertSame($obj->prop4["subprop2"], $clone->prop4["subprop2"]);

        $this->assertNotSame($obj->prop4["date"], $clone->prop4["date"]);
        $this->assertEquals($obj->prop4["date"], $clone->prop4["date"]);

        $this->assertNotSame($obj->prop5, $clone->prop5);
        $this->assertSame($obj->prop5->newprop, $clone->prop5->newprop);
    }



    public function test_method_to_system_path()
    {
        $ds = DIRECTORY_SEPARATOR;

        $str = ["C:\\Windows", "Linux//Usrs/", "/path\\to/an/directory/", null];
        $strResult = [
            "C:" . $ds . "Windows",
            "Linux" . $ds . "Usrs",
            $ds . "path" . $ds . "to" . $ds . "an" . $ds . "directory",
            null
        ];


        foreach ($str as $k => $s) {
            $r = to_system_path($s);
            $this->assertEquals($strResult[$k], $r);
        }
    }



    public function test_method_var_initi_set()
    {
        $testObjects = [undefined, null, "", 1];
        $initialValues = ["1", "2", "3", "4"];
        $expectedValuesA = ["1", "2", "3", 1];
        $expectedValuesB = ["1", null, "", 1];


        for ($i = 0; $i < count($testObjects); $i++) {
            $objToTest = $testObjects[$i];
            $initialValue = $initialValues[$i];
            $expectedValueA = $expectedValuesA[$i];
            $expectedValueB = $expectedValuesB[$i];

            var_initi_set($objToTest, $initialValue);
            $this->assertSame($expectedValueA, $objToTest);

            $objToTest = $testObjects[$i];
            var_initi_set($objToTest, $initialValue, true);
            $this->assertSame($expectedValueB, $objToTest);
        }
    }



    public function test_method_var_is_defined()
    {
        $int = 0;
        $str = "0";
        $vFalse = false;
        $vUndefined = undefined;
        $vNull = null;
        $vEmpty = "";

        $this->assertTrue(var_is_defined($int));
        $this->assertTrue(var_is_defined($str));
        $this->assertTrue(var_is_defined($vFalse));

        $this->assertFalse(var_is_defined($vUndefined));
        $this->assertFalse(var_is_defined($vNull));
        $this->assertFalse(var_is_defined($vEmpty));


        $arr = [];
        $this->assertFalse(var_is_defined($arr));
        $this->assertFalse(var_is_defined($arr, "unknow"));
        $arr = ["know" => null];
        $this->assertFalse(var_is_defined($arr, "know"));
        $arr = ["know" => 1];
        $this->assertTrue(var_is_defined($arr, "know"));

        $std = new \stdClass();
        $this->assertFalse(var_is_defined($std));
        $this->assertFalse(var_is_defined($std, "unknow"));
        $std->know = null;
        $this->assertFalse(var_is_defined($std, "know"));
        $std->know = 1;
        $this->assertTrue(var_is_defined($std, "know"));

        $this->assertTrue(var_is_defined($std, "know"));
    }










    public function test_method_weekdate_get_first_week()
    {
        $tests = [
            "2000" => new \DateTime("2000-01-03"),
            "2001" => new \DateTime("2001-01-01"),
            "2002" => new \DateTime("2001-12-31"),
            "2003" => new \DateTime("2002-12-30"),
            "2010" => new \DateTime("2010-01-04"),
            "2020" => new \DateTime("2019-12-30")
        ];


        foreach ($tests as $y => $d) {
            $fW = weekdate_get_first_week($y);
            $this->assertSame($d->format("Y-m-d"), $fW->format("Y-m-d"));
        }
    }



    public function test_method_weekdate_get_last_week()
    {
        $tests = [
            "2000" => new \DateTime("2000-12-31"),
            "2001" => new \DateTime("2001-12-30"),
            "2002" => new \DateTime("2002-12-29"),
            "2003" => new \DateTime("2003-12-28"),
            "2010" => new \DateTime("2011-01-02"),
            "2020" => new \DateTime("2021-01-03")
        ];


        foreach ($tests as $y => $d) {
            $fW = weekdate_get_last_week($y);
            $this->assertSame($d->format("Y-m-d"), $fW->format("Y-m-d"));
        }
    }



    public function test_method_weekdate_count_weeks()
    {
        $tests = [
            "2000" => 52,
            "2001" => 52,
            "2002" => 52,
            "2003" => 52,
            "2010" => 52,
            "2020" => 53
        ];


        foreach ($tests as $y => $totalWeeks) {
            $w = weekdate_count_weeks($y);
            $this->assertSame($totalWeeks, $w);
        }
    }



    public function test_method_weekdate_to_array()
    {
        $testsTrue = [
            "2000-W21-3" => ["year" => 2000, "week" => 21, "day" => 3],
            "2000-21-3" => ["year" => 2000, "week" => 21, "day" => 3],
            "2000-21" => ["year" => 2000, "week" => 21, "day" => 1],
            "2000-w21" => ["year" => 2000, "week" => 21, "day" => 1],
            "7-17W-2010" => ["year" => 2010, "week" => 17, "day" => 7],
            "7-17-2010" => ["year" => 2010, "week" => 17, "day" => 7],
            "17w-2010" => ["year" => 2010, "week" => 17, "day" => 1],
            "17-2010" => ["year" => 2010, "week" => 17, "day" => 1],
        ];
        foreach ($testsTrue as $week => $members) {
            $m = weekdate_to_array($week);
            $this->assertSame($members["year"], $m["year"]);
            $this->assertSame($members["week"], $m["week"]);
            $this->assertSame($members["day"], $m["day"]);
        }



        $testsDateTimeTrue = [
            [new \DateTime("2013-12-28"), 2013, 52, 6],
            [new \DateTime("2013-12-29"), 2013, 52, 7],
            [new \DateTime("2013-12-30"), 2014, 1, 1],
            [new \DateTime("2013-12-31"), 2014, 1, 2],
            [new \DateTime("2014-01-01"), 2014, 1, 3],
            [new \DateTime("2014-01-02"), 2014, 1, 4]
        ];
        foreach ($testsDateTimeTrue as $values) {
            $m = weekdate_to_array($values[0]);
            $this->assertSame($values[1], $m["year"]);
            $this->assertSame($values[2], $m["week"]);
            $this->assertSame($values[3], $m["day"]);
        }



        $testsFalse = [
            "53-2010" => null,
        ];
        foreach ($testsFalse as $week => $members) {
            $this->assertNull(weekdate_to_array($week));
        }
    }



    public function test_method_weekdate_to_datetime()
    {
        $tests = [
            "2000-W21-3" => new \DateTime("2000-05-24"),
            "2000-21-3" => new \DateTime("2000-05-24"),
            "2000-21" => new \DateTime("2000-05-22"),
            "2000-w21" => new \DateTime("2000-05-22"),
            "7-17W-2010" => new \DateTime("2010-05-02"),
            "7-17-2010" => new \DateTime("2010-05-02"),
            "17w-2010" => new \DateTime("2010-04-26"),
            "17-2010" => new \DateTime("2010-04-26"),
            "53-2010" => null,
        ];


        foreach ($tests as $week => $date) {
            $d = weekdate_to_datetime($week);
            if ($date === null) {
                $this->assertSame(null, $d);
            } else {
                $this->assertSame($date->format("Y-m-d"), $d->format("Y-m-d"));
            }
        }
    }
}
