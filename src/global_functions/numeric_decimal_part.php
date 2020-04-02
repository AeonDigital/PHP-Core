<?php
declare (strict_types=1);

/**
 * Retorna unicamente a parte decimal de um numeral.
 *
 * Por questões internas referentes a forma como os numerais de ponto flutuantes funcionam, a
 * maior precisão possível de ser encontrada é a de números de até 15 dígitos, independente do
 * local onde está o ponto decimal.
 *
 * @param       int|float $n
 *              Valor numérico de entrada.
 *
 * @param       int $l
 *              Tamanho da parte decimal a ser retornada.
 *              Se não for informado, será usado o valor **2**.
 *
 * @return      ?float
 *              Retornará ``null`` caso o valor de entrada não seja numérico.
 */
function numeric_decimal_part($n, int $l = 2) : ?float
{
    $r = null;

    if (\is_int($n) === true ||
        \is_float($n) === true)
    {
        if (\is_int($n) === true) {
            $n = (float)$n;
        }

        $str = null;
        $str = \explode(".", \number_format($n, $l, ".", ""));
        $str = "0." . $str[1];
        $r = (float)$str;
    }

    return $r;
}
