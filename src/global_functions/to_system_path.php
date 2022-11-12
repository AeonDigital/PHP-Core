<?php

declare(strict_types=1);

/**
 * Corrige um caminho para um diretório ou arquivo interno ajustando os separadores de
 * diretório e eliminando duplicação dos mesmos. Qualquer ``\\`` ou ``/`` no final do caminho
 * será removida.
 *
 * @param       ?string $systemPath
 *              Caminho que será ajustado.
 *
 * @return      ?string
 *              Caminho corrigido.
 */
function to_system_path(?string $systemPath): ?string
{
    if ($systemPath === null) {
        return null;
    } else {
        $wrong = (DS === "/") ? "\\" : "/";

        // Substitui separadores errados
        $systemPath = \str_replace($wrong, DS, $systemPath);

        // Remove duplicação dos separadores
        while (\mb_strpos($systemPath, DS . DS) !== false) {
            $systemPath = \str_replace(DS . DS, DS, $systemPath);
        }

        return \rtrim($systemPath, DS);
    }
}
