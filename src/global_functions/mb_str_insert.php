<?php

declare(strict_types=1);

/**
 * Insere a nova ``string`` na posição indicada em ``$pos``.
 *
 * @param       string $str
 *              Valor de entrada.
 *
 * @param       string $insert
 *              ``String`` que será adicionada.
 *
 * @param       int $pos
 *              Posição em que a ``string`` será adicionada.
 *              Se negativo, irá adicionar a nova ``string`` na respectiva posição contando a
 *              partir do final da ``string`` original.
 *
 * @return      string
 */
function mb_str_insert(
    string $str,
    string $insert,
    int $pos
): string {
    return \mb_substr_replace($str, $insert, $pos, 0);
}
