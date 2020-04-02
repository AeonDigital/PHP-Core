<?php
declare (strict_types=1);

/**
 * Encontra a última ocorrencia de ``$search`` em ``$str``.
 *
 * @param       string $str
 *              Valor de entrada.
 *
 * @param       string $search
 *              Valor que deve ser procurado.
 *
 * @param       int $start
 *              Posição a partir da qual a pesquisa deve ser feita.
 *
 * @return      false|int
 *              Retornará ``false`` caso a ``string`` não exista.
 */
function mb_str_last_pos(
    string $str,
    string $search,
    int $start = 0
) {
    return \mb_strrpos($str, $search, $start);
}
