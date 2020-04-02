<?php
declare (strict_types=1);

/**
 * Identifica se a ``string`` passada inicia com a sentença indicada.
 *
 * @param       string $haystack
 *              ``String`` original.
 *
 * @param       string $needle
 *              Caracteres iniciais.
 *
 * @return      bool
 *              Retornará ``true`` se ``$haystack`` é uma ``string`` que inicia com ``$needle``.
 */
function mb_str_starts_with(string $haystack, string $needle) : bool
{
    if (\mb_strlen($haystack) >= \mb_strlen($needle)) {
        return (\mb_substr($haystack, 0, \mb_strlen($needle)) === $needle);
    }
    return false;
}
