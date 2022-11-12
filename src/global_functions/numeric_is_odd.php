<?php

declare(strict_types=1);

/**
 * Identifica se o valor é impar.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @return      bool
 *              Retorna ``true`` caso o valor indicado seja impar.
 */
function numeric_is_odd(int|float $n): bool
{
    return ($n % 2 !== 0);
}
