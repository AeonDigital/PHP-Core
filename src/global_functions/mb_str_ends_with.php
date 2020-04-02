<?php
declare (strict_types=1);

/**
 * Identifica se a ``string`` passada termina com a sentença indicada.
 *
 * Esta função é ``multi-byte``.
 *
 * @param       string $haystack
 *              ``String`` original.
 *
 * @param       string $needle
 *              Caracteres finais.
 *
 * @return      bool
 *              Retornará ``true`` se ``$haystack`` é uma ``string`` que termina com ``$needle``.
 */
function mb_str_ends_with(string $haystack, string $needle) : bool
{
    if (\mb_strlen($haystack) >= \mb_strlen($needle)) {
        return (\mb_substr($haystack, (\mb_strlen($needle) * -1)) === $needle);
    }
    return false;
}
