<?php
declare (strict_types=1);

/**
 * Versão ``case-insensitive`` para o método ``in_array()``.
 *
 * @param       string $needle
 *              Valor que será procurado.
 *
 * @param       array $haystack
 *              ``Array`` onde o valor será procurado.
 *
 * @return      bool
 *              Retornará ``true`` se o valor de ``$needle`` for encontrado em um dos valores
 *              contidos no ``array $haystack``.
 */
function array_in_ci(string $needle, array $haystack) : bool
{
    return \in_array(\strtolower($needle), \array_map("strtolower", $haystack));
}
