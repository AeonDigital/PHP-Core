<?php

declare(strict_types=1);

/**
 * Verifica se a string corresponde à expressão regular definida.
 *
 * @param       string $string
 *              ``String`` original.
 *
 * @param       string $regx
 *              RegExp que será usada para validar a string.
 *
 * @return      bool
 */
function mb_str_pattern_match(string $str, string $regx): bool
{
    $result = \preg_match($regx, $str);
    return (\is_integer($result) === true && $result === 1);
}
