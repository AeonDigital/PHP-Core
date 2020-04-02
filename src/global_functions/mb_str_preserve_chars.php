<?php
declare (strict_types=1);

/**
 * Mantém apenas os caracteres que estão na coleção de válidos.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @param       string $valid
 *              Coleção de caracterse que serão preservados.
 *
 * @return      string
 */
function mb_str_preserve_chars(
    string $str,
    string $remove
) : string {
    return \preg_replace("/[^" . \preg_quote($remove, "/") . "]/", "", $str);
}
