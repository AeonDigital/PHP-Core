<?php

declare(strict_types=1);

/**
 * Verifica se o objeto passado é um ``Array Associativo``.
 *
 * @param mixed $o
 * Objeto que será testado.
 *
 * @return bool
 * Retornará ``true`` se ``$o`` for mesmo um ``Array Associativo``.
 * Um ``array`` vazio retornará ``false``.
 */
function array_is_assoc(mixed $o): bool
{
    if (\is_array($o) === true && $o !== []) {
        return \array_keys($o) !== \range(0, \count($o) - 1);
    }
    return false;
}
