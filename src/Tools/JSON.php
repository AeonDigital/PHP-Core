<?php
declare (strict_types=1);

namespace AeonDigital\Tools;










/**
 * Coleção de métodos estáticos para tratamento de arquivos JSON.
 *
 * @package     AeonDigital\Tools
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class JSON
{





    /**
     * Carrega o conteúdo de um arquivo JSON na memória e retorna um Array Associativo ou
     * um objeto do tipo ``StdClass``. Caso o arquivo alvo não exista será retornado ``null``.
     *
     * Apesar do padrão JSON não assumir a possibilidade de haver comentários este método
     * irá remover os mesmos se existirem e carregará o conteúdo normalmente.
     *
     * @param       string $absoluteSystemPathToFile
     *              Caminho completo até o arquivo que será carregado.
     *
     * @param       bool $isAssoc
     *              Quando ``true`` retornará um array associativo.
     *              Se ``false``, retornará um objeto ``StdClass``
     *
     * @return      ?array|\StdClass
     */
    public static function retrieve(string $absoluteSystemPathToFile, bool $assoc = true)
    {
        $rJSON = null;

        if (file_exists($absoluteSystemPathToFile) === true) {
            $JSON = file_get_contents($absoluteSystemPathToFile);

            // Tenta converter o objeto tal qual ele se apresenta
            $rJSON = json_decode($JSON, $assoc);
            if ($rJSON === null) {
                // Remove comentários, se houverem
                $commentPattern = "/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/";
                $JSON = preg_replace($commentPattern, "", $JSON);
                $rJSON = json_decode($JSON, $assoc);
            }
        }

        return $rJSON;
    }





    /**
     * Identa adequadamente uma string representante de um objeto JSON.
     *
     * @param       string $strJSON
     *              String que será identada.
     *
     * @return      string
     */
    public static function indent(string $strJSON) : string
    {
        $strReturn = "";
        $indentLevel = 0;

        $insideQuotes = false;
        $insideEscape = false;

        $endLineLevel = null;

        $utf8split = preg_split('//u', $strJSON, -1, PREG_SPLIT_NO_EMPTY);
        for ($i = 0; $i < count($utf8split); $i++) {
            $c = $utf8split[$i];
            $newLineLevel = null;
            $post = "";

            if ($endLineLevel !== null) {
                $newLineLevel = $endLineLevel;
                $endLineLevel = null;
            }


            if ($insideEscape === true) {
                $insideEscape = false;
            } elseif ($c === '"') {
                $insideQuotes = !$insideQuotes;
            } elseif ($insideQuotes === false) {
                switch ($c) {
                    case "}":
                    case "]":
                        $indentLevel--;
                        $endLineLevel = null;
                        $newLineLevel = $indentLevel;
                        break;

                    case "{":
                    case "[":
                        $indentLevel++;
                    case ",":
                        $endLineLevel = $indentLevel;
                        break;

                    case ":":
                        $post = " ";
                        break;

                    case " ":
                    case "\t":
                    case "\n":
                    case "\r":
                        $c = "";
                        $endLineLevel = $newLineLevel;
                        $newLineLevel = null;
                        break;
                }
            } elseif ($c === "\\") {
                $insideEscape = true;
            }


            if ($newLineLevel !== null) {
                $strReturn .= "\n" . str_repeat("\t", $newLineLevel);
            }

            $strReturn .= $c . $post;
        }

        return $strReturn;
    }





    /**
     * Salva o um objeto JSON (representado por uma ``String``, ``Array Associativo``
     * ou objeto ``StdClass`` no caminho informado).
     *
     * @param       string $absoluteSystemPathToFile
     *              Caminho completo até o arquivo que será salvo.
     *
     * @param       string|array|\StdClass $JSON
     *              Objeto que será salvo como um arquivo JSON.
     *
     * @param       int $options
     *              [Flags](http://php.net/manual/pt_BR/json.constants.php)
     *              para salvar o documento JSON.
     *
     * @return      bool
     */
    public static function save(string $absoluteSystemPathToFile, $JSON, int $options = 0) : bool
    {
        $strJSON = $JSON;

        // Se o objeto passado não for uma string, converte-o
        if (is_string($JSON) === false) {
            $strJSON = json_encode($JSON, $options);
        }

        // Identa corretamente o objeto JSON
        $strJSON = self::indent($strJSON);

        // Salva-o no local definido.
        $r = file_put_contents($absoluteSystemPathToFile, $strJSON);

        return (($r === false) ? false : true);
    }
}
