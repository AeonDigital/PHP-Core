<?php
declare (strict_types=1);

/**
 * Identifica se o valor é impar.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @return      ?bool
 *              Retornará ``null`` caso o valor indicado não seja numérico.
 */
function numeric_is_odd($n) : ?bool
{
    $r = null;
    if (\is_int($n) === true || \is_float($n) === true) {
        $r = ($n % 2 !== 0);
    }
    return $r;
}
