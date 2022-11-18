<?php

declare(strict_types=1);

/**
 * Substitui apenas a primeira ocorrencia de ``$search`` em ``$subject`` pelo valor
 * correspondente em ``$replace``.
 *
 * @param string $search
 * Valor que será substituido na ``string``.
 *
 * @param string $replace
 * Valor que será adicionado no lugar de ``$search``.
 *
 * @param string $subject
 * Valor original que será substituído.
 *
 * @return string
 * Nova ``string`` modificada.
 */
function mb_str_replace_once(string $search, string $replace, string $subject): string
{
    $pos = \strpos($subject, $search);
    if ($pos !== false) {
        $subject = \substr_replace($subject, $replace, $pos, \strlen($search));
    }

    return $subject;
}
