<?php
declare (strict_types=1);

/**
 * Converte o encode de um arquivo para **UTF-8**.
 *
 * O processo consiste em resgatar todo o conteúdo e verificar caracter à caracter convertendo
 * aqueles que não forem unicode e então remontando todo o arquivo.
 *
 * @param       string $absoluteSystemPathToFile
 *              Caminho para o arquivo que será convertido.
 *
 * @return      bool
 *              Retornará ``true`` caso o documento seja convertido sem falhas.
 */
function file_convert_to_utf8(string $absoluteSystemPathToFile) : bool
{
    $isOK = false;

    if (\file_exists($absoluteSystemPathToFile) === true) {
        $content = \file_get_contents($absoluteSystemPathToFile);

        // Verifica se o arquivo já é UTF-8
        if (\utf8_encode(\utf8_decode($content)) === $content) {
            $isOK = true;
        } else {
            $ncontent = "";
            // Para cada caracter...
            for ($i = 0; $i < \strlen($content); $i++) {
                $c = $content[$i];

                // Se o caracter atual já é unicode...
                if (\utf8_encode(\utf8_decode($c)) === $c) {
                    $ncontent .= $c;
                } else {
                    $ncontent .= \utf8_encode($c);
                }
            }

            $isOK = \file_put_contents($absoluteSystemPathToFile, $ncontent);
        }
    }

    return ($isOK === false) ? false : true;
}
