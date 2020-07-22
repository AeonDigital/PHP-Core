<?php
declare (strict_types=1);

/**
 * Verifica se o objeto ``iterable`` indicado possui a chave de nome passada, caso
 * possua retorna seu valor, caso contrário, retorna o valor definido em ``$default``.
 *
 * @param       array $iterable
 *              Objeto que implementa a interface ``iterable``.
 *
 * @param       string $key
 *              Nome da chave que será conferida.
 *
 * @param       mixed $default
 *              Valor padrão a ser retornado caso a chave não exista.
 *
 * @return      mixed
 */
function iterable_check_default(iterable $iterable, string $key, $default)
{
    return ((\key_exists($key, $iterable) === true) ? $iterable[$key] : $default);
}
