<?php
declare (strict_types=1);

/**
 * Indica se o valor de entrada possui ``$search`` em alguma posição.
 *
 * @param       string $str
 *              Valor de entrada.
 *
 * @param       string  $search
 *              Valor a ser procurado.
 *
 * @return      bool
 */
function mb_str_contains(string $str, string $search) : bool {
    return (\mb_strrpos($str, $search) !== false);
}
