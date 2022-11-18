<?php

declare(strict_types=1);

/**
 * Converte o encode de um arquivo para **UTF-8**.
 *
 * O processo consiste em resgatar todo o conteúdo e verificar caracter à caracter convertendo
 * aqueles que não forem unicode e então remontando todo o arquivo.
 *
 * @param string $absoluteSystemPathToFile
 * Caminho para o arquivo que será convertido.
 *
 * @return bool
 * Retornará ``true`` caso o documento seja convertido sem falhas.
 */
function file_convert_to_utf8(string $absoluteSystemPathToFile): bool
{
    $isOK = false;

    if (\file_exists($absoluteSystemPathToFile) === true) {
        $content = \file_get_contents($absoluteSystemPathToFile);
        $utf8Content = \mb_convert_encoding($content, "UTF-8", \mb_list_encodings());

        // Verifica se o arquivo já é UTF-8
        if ($utf8Content === $content) {
            $isOK = true;
        } else {
            $isOK = \file_put_contents($absoluteSystemPathToFile, $utf8Content);
        }
    }

    return ($isOK === false) ? false : true;
}
