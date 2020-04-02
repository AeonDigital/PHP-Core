<?php
declare (strict_types=1);

/**
 * Copia todo o conteúdo de um diretório para outro local.
 *
 * @param       string $absoluteSystemPathToDir_source
 *              Caminho para o diretório de conteúdo que será copiado.
 *
 * @param       string $absoluteSystemPathToDir_dest
 *              Caminho para o diretório de destino.
 *
 * @param       int $permissions
 *              As permissões que devem ser setadas no novo diretório.
 *
 * @return      bool
 *              Retornará ``true`` se a cópia do conteúdo ocorrer sem erros.
 */
function dir_copy(
    string $absoluteSystemPathToDir_source,
    string $absoluteSystemPathToDir_dest,
    int $permissions = 700
) : bool {

    $isOK = true;

    // Apenas se trata-se de um diretório real.
    if (\is_dir($absoluteSystemPathToDir_source) === true) {
        // Se o diretório de destino não existir, cria-o
        if (\is_dir($absoluteSystemPathToDir_dest) === false) {
            $isOK = \mkdir($absoluteSystemPathToDir_dest, $permissions);
        }

        // Se está ok
        if ($isOK === true) {
            // Itera os itens do diretório.
            $dir = \scandir($absoluteSystemPathToDir_source);
            foreach ($dir as $key => $fileName) {
                if (\in_array($fileName, [".", ".."]) === false && $isOK === true) {
                    $origin = $absoluteSystemPathToDir_source . "/" . $fileName;
                    $target = $absoluteSystemPathToDir_dest . "/" . $fileName;

                    // Se for um diretório
                    if (\is_dir($origin) === true) {
                        $isOK = \dir_copy($origin, $target, $permissions);
                    } else {
                        $isOK = \copy($origin, $target);
                    }
                }
            }
        }
    }

    return $isOK;
}
