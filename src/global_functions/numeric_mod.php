<?php

declare(strict_types=1);

/**
 * Retorna o resto da divisão entre o valor atual e o divisor passado.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @param       int|float $div
 *              Divisor.
 *
 * @return      int
 *              Resto da divisão.
 */
function numeric_mod(int|float $n, int|float $div): int
{
    return ($n % $div);
}
