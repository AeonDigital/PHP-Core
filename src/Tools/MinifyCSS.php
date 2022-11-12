<?php

declare(strict_types=1);

namespace AeonDigital\Tools;









/**
 * Coleção de métodos estáticos para minificar arquivos CSS.
 *
 * @package     AeonDigital\Tools
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class MinifyCSS
{





    /**
     * Minifica o código CSS informado.
     *
     * @param        string $cssCode
     *               Código CSS que será minificado.
     *
     * @return       string
     */
    public static function minifyCode(string $cssCode): string
    {
        if (\trim($cssCode) !== "") {
            // Remove comentários
            $cssCode = \preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $cssCode);

            // Remove tabs, espaços e novas linhas
            $cssCode = \preg_replace("/(\s\s+|\t|\n)/", " ", $cssCode);

            // Remove espaços antes e depois de ";"
            $cssCode = \preg_replace(["(( )+{)", "({( )+)"], "{", $cssCode);
            $cssCode = \preg_replace(["(( )+})", "(}( )+)", "(;( )*})"], "}", $cssCode);
            $cssCode = \preg_replace(["(;( )+)", "(( )+;)"], ";", $cssCode);

            $NonSpaceAround = [":", ",", ">", "+"];
            foreach ($NonSpaceAround as $char) {
                $arr = [" " . $char, $char . " "];
                $cssCode = \str_replace($arr, $char, $cssCode);
            }
        }

        return \trim($cssCode);
    }





    /**
     * Minifica o conteúdo de um arquivo CSS.
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
     * Minifica uma coleção de arquivos CSS.
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
     * Minifica uma coleção de arquivos CSS em um único arquivo.
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
