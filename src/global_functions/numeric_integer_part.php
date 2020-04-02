<?php
declare (strict_types=1);

/**
 * Retorna unicamente a parte inteira de um numeral.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @return      ?int
 *              Retornará ``null`` caso o valor de entrada não seja numérico.
 */
function numeric_integer_part($n) : ?int
{
    $r = null;

    if (\is_int($n) === true) {
        $r = (int)$n;
    }
    elseif (\is_float($n) === true) {
        $str = \number_format($n, 10, ".", "");
        $str = \explode(".", $str);
        $r = (int)$str[0];
    }

    return $r;
}
