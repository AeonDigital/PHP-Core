<?php
declare (strict_types=1);

/**
 * Converte uma ``string`` para um ``array``.
 * Este método é equivalente ao ``str_split()`` porém, suporta ``multi-byte``.
 *
 * @param       string $string
 *              String que será convertida.
 *
 * @param       int $string_length
 *              Tamanho máximo de cada pedaço.
 *
 * @return      array
 *              Objeto ``array`` que será retornado contendo cada caracter da ``string``
 *              original em uma posição.
 *              Se ``$string_length`` for definido, cada item do ``array`` trará uma parte da
 *              ``string`` original de tamanho igual ao que foi definido.
 */
function mb_str_split(string $string, int $string_length = 1) : array
{
    $arr    = [];
    $length = \mb_strlen($string, "UTF-8");

    if ($string !== "" && $string_length >= 1) {
        for ($i = 0; $i < $length; $i += $string_length) {
            $arr[] = \mb_substr($string, $i, $string_length, "UTF-8");
        }
    }

    return $arr;
}
