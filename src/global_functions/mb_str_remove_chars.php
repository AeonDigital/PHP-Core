<?php
declare (strict_types=1);

/**
 * Remove da ``string`` todas as ocorrências da cadeia de caracteres informado.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @param       string $remove
 *              Coleção de caracterse que serão excluídos..
 *
 * @return      string
 */
function mb_str_remove_chars(
    string $str,
    string $remove
) : string {
    return \str_replace(\mb_str_split($remove), "", $str);
}
