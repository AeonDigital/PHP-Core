<?php
declare (strict_types=1);

/**
 * Encontra todas as ocorrências de uma ``string`` e retorna um ``array`` com as
 * respectivas posições.
 *
 * @param       string $string
 *              ``String`` original.
 *
 * @param       string $needle
 *              Valor que será procurado.
 *
 * @return      false|array
 *              Retornará ``false`` caso nenhuma ocorrência seja encontrada ou um ``array``
 *              contendo a posição de cada ocorrência de ``$needle`` encontrada.
 */
function mb_str_pos_all(string $haystack, string $needle)
{
    $r = [];
    $s = 0;
    $i = 0;

    while (\is_integer($i) === true) {
        $i = \mb_strpos($haystack, $needle, $s);

        if (\is_integer($i) === true) {
            $r[] = $i;
            $s = $i + \mb_strlen($needle);
        }
    }

    return (\count($r) === 0) ? false : $r;
}
