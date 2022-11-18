<?php

declare(strict_types=1);

/**
 * Converte para maiúsculas o primeiro caractere de cada palavra.
 *
 * Este método é equivalente ao ``ucwords()`` porém, suporta ``multi-byte``.
 *
 * @param string $string
 * ``String`` que será alterada.
 *
 * @param array $ignore
 * Se definido, deve ser um ``array de strings`` contendo palavras que devem escapar
 * da transformação.
 *
 * @return string
 * Nova ``string`` modificada.
 */
function mb_str_uc_words(string $string, array $ignore = []): string
{
    if (\trim($string) === "") {
        return $string;
    } else {
        $split  = \explode(" ", $string);
        $nStr   = [];

        foreach ($split as $i => $str) {
            if (\in_array_ci($str, $ignore) === true) {
                $nStr[] = $str;
            } else {
                $nStr[] = \mb_str_uc_first($str);
            }
        }

        return \implode(" ", $nStr);
    }
}
