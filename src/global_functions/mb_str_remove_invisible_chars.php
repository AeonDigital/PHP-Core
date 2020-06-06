<?php
declare (strict_types=1);

/**
 * Remove da ``string`` todas as ocorrências de caracteres não visíveis.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @return      string
 */
function mb_str_remove_invisible_chars(string $str) : string
{
    return \preg_replace(
        '/[\x00-\x1F\x7F]/u',
        "",
        $str
    );
}
