<?php
declare (strict_types=1);

/**
 * Retorna o resto da divisão entre o valor atual e o divisor passado.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @param       int|float $div
 *              Divisor.
 *
 * @return      ?int
 *              Retornará ``null`` caso um dos valores passados não seja numérico.
 */
function numeric_mod($n, $div) : ?int
{
    $r = null;
    if ((\is_int($n) === true || \is_float($n) === true) &&
        (\is_int($div) === true || \is_float($div) === true))
    {
        $r = ($n % $div);
    }
    return $r;
}
