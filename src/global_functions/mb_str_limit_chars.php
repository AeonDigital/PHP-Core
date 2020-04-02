<?php
declare (strict_types=1);

/**
 * Limita uma sentença à um número máximo de caracteres.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @param       int $max
 *              Número máximo de caracteres.
 *
 * @param       ?string $etc
 *              Será adicionado ao final da sentença, se, o número
 *              total de caracteres iniciais for maior que ``$max``.
 *
 * @return      string
 */
function mb_str_limit_chars(
    string $str,
    int $max,
    string $etc = ""
) : string {
    return (
        (\mb_strlen($str) >= $max) ?
        \mb_substr($str, 0, $max - \mb_strlen($etc)) . $etc :
        $str . $etc
    );
}
