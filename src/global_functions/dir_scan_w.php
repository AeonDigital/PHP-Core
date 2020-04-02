<?php
declare (strict_types=1);

/**
 * Retorna a listagem do conteúdo do diretório alvo já ordenado adequadamente conforme o
 * padrão Windows.
 *
 * @param       string $absoluteSystemPathToDir
 *              Diretório que será listado.
 *
 * @return      array
 *              Lista de diretórios e arquivos encontrados no local indicado.
 */
function dir_scan_w(string $absoluteSystemPathToDir) : array
{
    $dirContent = \scandir($absoluteSystemPathToDir);

    $dotFiles = [];
    $underFiles = [];
    $normalFiles = [];

    foreach ($dirContent as $fileName) {
        if ($fileName[0] === ".") {
            $dotFiles[] = $fileName;
        } elseif ($fileName[0] === "_") {
            $underFiles[] = $fileName;
        } else {
            $normalFiles[] = $fileName;
        }
    }

    // Reordena os itens e refaz o index dos elementos.
    \natcasesort($dotFiles);
    \natcasesort($underFiles);
    \natcasesort($normalFiles);

    $dirContent = \array_merge($dotFiles, $underFiles, $normalFiles);

    return $dirContent;
}
