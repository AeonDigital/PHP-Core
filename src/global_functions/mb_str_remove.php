<?php
declare (strict_types=1);

/**
 * Remove uma cadeia de caracteres dentro dos limites indicados.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @param       int $start
 *              Posição inicial para inserir a nova ``string``.
 *
 * @param       ?int $length
 *              Tamanho da porção da ``string`` original que será substituída.
 *
 * @return      string
 */
function mb_str_remove(
    string $str,
    int $start,
    ?int $length = null
) : string {
    return \mb_substr_replace($str, "", $start, $length);
}
