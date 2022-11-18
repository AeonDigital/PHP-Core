<?php

declare(strict_types=1);

/**
 * Efetua alteração nas permissões de um diretório e em todos seus itens filhos.
 *
 * @param string $absoluteSystemPathToDir
 * Diretório que terá suas alterações alteradas.
 *
 * @param int $permissions
 * As permissões que serão setadas.
 *
 * @return bool
 * Retornará ``true`` se TODOS os itens alvo tiverem suas permissões alteradas.
 */
function dir_chmod_r(string $absoluteSystemPathToDir, int $permissions): bool
{
    $isOK = \chmod($absoluteSystemPathToDir, $permissions);

    if ($isOK === true) {
        $dir = \scandir($absoluteSystemPathToDir);
        foreach ($dir as $key => $fileName) {
            if (\in_array($fileName, [".", ".."]) === false && $isOK === true) {
                $tgt = \to_system_path($absoluteSystemPathToDir . "/" . $fileName);
                if (\is_file($tgt) === true) {
                    $isOK = \chmod($tgt, $permissions);
                } else {
                    $isOK = \dir_chmod_r($tgt, $permissions);
                }
            }
        }
    }

    return $isOK;
}
