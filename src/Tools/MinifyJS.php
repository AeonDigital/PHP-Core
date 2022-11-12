<?php

declare(strict_types=1);

namespace AeonDigital\Tools;









/**
 * Coleção de métodos estáticos para minificar arquivos JS.
 *
 * @package     AeonDigital\Tools
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class MinifyJS
{





    /**
     * Minifica o código JS informado.
     *
     * @param        string $jsCode
     *               Código JS que será minificado.
     *
     * @return       string
     */
    public static function minifyCode(string $jsCode): string
    {
        // Unifica marcações de nova linha.
        $inputCode = \str_replace(["\r\n", "\r"], "\n", $jsCode);
        $outputCode = "";


        if (\trim($inputCode) !== "") {
            // Caracteres que permite eliminar os espaços existentes ao seu redor
            $NonSpaceAround = [
                ":", ";", ",", "?", "<", ">",
                "{", "}", "(", ")", "=", "+", "-", "*",
                "/", "%", "&", "|", "!"
            ];



            // Para cada caracter existênte no código original...
            $codeLength = \strlen($inputCode);
            $lastCodeIndex = $codeLength - 1;
            for ($i = 0; $i < $codeLength; $i++) {
                $CharType = "";


                // Resgata o caracter da posição atual E o próximo
                $c = $inputCode[$i];                                        // Caracter atual
                $nc = ($i < $lastCodeIndex) ? $inputCode[$i + 1] : "";      // Próximo caracter



                // Sendo um caracter sem representação gráfica...
                if ($c === "\n" || \ord($c) < 32) {
                    $CharType = "NonVisible";
                } else {
                    // Conforme o caracter atual
                    switch ($c) {
                            // Verifica a abertura de blocos de comentário ou de um Regex
                        case "/":
                            $CharType = "IgnoreBlock";

                            // Se o próximo caracter for um espaço...
                            // infere que trata-se de uma barra de divisão
                            if ($nc === " ") {
                                $CharType = "";
                            } // Identifica início de uma linha de comentário
                            elseif ($nc === "/") {
                                // Resgata a posição do caracter imediatamente após do primeiro \n identificado
                                // após o início da linha de comentário.
                                $endBlock = \strpos($inputCode, "\n", $i);
                                if ($endBlock !== false) {
                                    if ($endBlock < $lastCodeIndex) {
                                        $i = $endBlock;
                                    } else {
                                        $i = $lastCodeIndex;
                                    }
                                }
                            } // Ou o início de um bloco de comentário...
                            elseif ($nc === "*") {
                                // Resgata a posição do caracter */ encontrado a partir do início do bloco
                                // de comentário
                                $endBlock = \strpos($inputCode, "*/", $i) + 1;
                                if ($endBlock !== false) {
                                    if ($endBlock < $lastCodeIndex) {
                                        $i = $endBlock;
                                    } else {
                                        $i = $lastCodeIndex;
                                    }
                                }
                            } // Senão, infere que é uma expressão regular.
                            else {
                                // @codeCoverageIgnoreStart
                                $endRegex = false;
                                $indexRegex = $i;


                                do {
                                    $endBlock = \strpos($inputCode, "/", $indexRegex + 1);

                                    // Se não encontrar o final do regex, dispara exception
                                    if ($endBlock === false) {
                                        $msg = "The end of the regular expression was not found.";
                                        throw new \Exception($msg);
                                    } else {
                                        // Se o caracter anterior não for o caracter de "scape"
                                        // significa que a expressão regular terminou.
                                        if ($inputCode[$endBlock - 1] !== "\\") {
                                            $endRegex = true;
                                        } else {
                                            $indexRegex = $endBlock;
                                        }
                                    }
                                } while (!$endRegex);



                                if ($endBlock < $lastCodeIndex) {
                                    $outputCode .= \substr($inputCode, $i, ($endBlock - $i + 1));
                                    $i = $endBlock;
                                } else {
                                    $i = $lastCodeIndex;
                                }
                                // @codeCoverageIgnoreEnd
                            }


                            break;

                            // Identifica a abertura de uma string envolvida por aspas simples ou duplas
                        case "'":
                        case "\"":
                            $CharType = "IgnoreBlock";
                            $quote = $c;

                            // Se o próximo caracter for o fechamento da própria string
                            // sendo portanto uma string vazia...
                            if ($nc === $quote) {
                                $outputCode .= $quote . $quote;
                                $i++;
                            } else {
                                // Resgata a string que está envolvida pelas aspas
                                $quotestString = "";
                                for ($np = ($i + 1); $np < $codeLength; $np++) {
                                    $_c = $inputCode[$np];

                                    // Encontrando a próxima aspas...
                                    if ($_c === $quote) {
                                        // Identifica se a aspa está "escapada"
                                        $_scaped = ($inputCode[$np - 1] === "\\" && $inputCode[$np - 2] !== "\\");


                                        // Se a aspa não está "escapada", encerra o loop
                                        if ($_scaped === false) {
                                            break;
                                        }
                                    }

                                    $quotestString .= $_c;
                                }


                                $outputCode .= $quote . \str_replace("\\\n", "", $quotestString) . $quote;
                                $i = $np;
                            }

                            break;
                    }
                }




                switch ($CharType) {
                    case "IgnoreBlock":
                        break;

                    case "NonVisible":
                        $outputCode .= "";
                        break;

                    default:
                        // Identifica se o espaço vazio deve ser mantido ou não...
                        if ($c === " ") {
                            // Se o próximo caracter é um espaço em branco... ignora este.
                            if ($nc === " ") {
                                $c = "";
                            } else {
                                if ($outputCode !== "") {
                                    $lvc = $outputCode[\strlen($outputCode) - 1];
                                    if (\in_array($lvc, $NonSpaceAround) === true || \in_array($nc, $NonSpaceAround) === true) {
                                        $c = "";
                                    }
                                }
                            }
                        }

                        $outputCode .= $c;

                        break;
                }
            }
        }



        return \trim($outputCode);
    }





    /**
     * Minifica o conteúdo de um arquivo JS.
     *
     * @param        string $absoluteSystemPathToFile
     *               Endereço local do arquivo que será minificado.
     *
     * @return       string
     */
    public static function minifyFile(string $absoluteSystemPathToFile): string
    {
        $cssCode = \file_get_contents($absoluteSystemPathToFile);
        return self::minifyCode($cssCode);
    }





    /**
     * Minifica uma coleção de arquivos JS.
     *
     * @param        string[] $absoluteSystemPathToFiles
     *               Endereço local dos arquivos que serão minificados.
     *
     * @return       string
     */
    public static function minifyFiles(array $absoluteSystemPathToFiles): string
    {
        $str = "";

        foreach ($absoluteSystemPathToFiles as $file) {
            if (\file_exists($file) === true) {
                $str .= self::minifyFile($file) . "\n";
            }
        }

        return \trim($str);
    }





    /**
     * Minifica uma coleção de arquivos JS em um único arquivo.
     *
     * @param        string[] $absoluteSystemPathToFiles
     *               Endereço local dos arquivos que serão minificados.
     *
     * @param        string $absoluteSystemPathToMinifiedFile
     *               Endereço completo onde o arquivo minificado será armazenado.
     *
     * @return       bool
     */
    public static function createMinifyFile(
        array $absoluteSystemPathToFiles,
        string $absoluteSystemPathToMinifiedFile
    ): bool {

        $minifiedCode = self::minifyFiles($absoluteSystemPathToFiles);
        $r = \file_put_contents($absoluteSystemPathToMinifiedFile, $minifiedCode);

        return ($r !== false);
    }
}
