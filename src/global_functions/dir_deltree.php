<?php

declare(strict_types=1);

/**
 * Remove um diretório e todo seu conteúdo.
 *
 * @param       string $absoluteSystemPathToDir
 *              Diretório que será excluido.
 *
 * @return      bool
 *              Retornará ``true`` se o diretório alvo for excluído.
 */
function dir_deltree(string $absoluteSystemPathToDir): bool
{
    if (\is_dir($absoluteSystemPathToDir) === true) {
        $allObjects = \array_diff(\scandir($absoluteSystemPathToDir), [".", ".."]);

        foreach ($allObjects as $object) {
            $path = \to_system_path($absoluteSystemPathToDir . "/" . $object);
            if (\is_dir($path) === true) {
                \dir_deltree($path);
            } else {
                \unlink($path);
            }
        }

        return \rmdir($absoluteSystemPathToDir);
    }

    return false;
}
