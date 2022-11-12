<?php

declare(strict_types=1);

/**
 * Converte para maiúscula o primeiro caractere de uma ``string``.
 *
 * Este método é equivalente ao ``ucfirst()`` porém, suporta ``multi-byte``.
 *
 * @param       string $string
 *              ``String`` que será alterada.
 *
 * @return      string
 *              Nova ``string`` modificada.
 */
function mb_str_uc_first(string $string): string
{
    if ($string === "" || $string === " ") {
        return $string;
    } else {
        $encoding = "UTF-8";

        $len    = \mb_strlen($string, $encoding);
        $fChar  = \mb_substr($string, 0, 1, $encoding);
        $lChars = \mb_substr($string, 1, $len - 1, $encoding);
        return \mb_strtoupper($fChar, $encoding) . $lChars;
    }
}
