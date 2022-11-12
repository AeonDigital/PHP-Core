<?php

declare(strict_types=1);

/**
 * Identifica se o valor é par.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @return      bool
 *              Retorna ``true`` caso o valor indicado seja par.
 */
function numeric_is_even(int|float $n): bool
{
    return ($n % 2 === 0);
}
