<?php

declare(strict_types=1);

/**
 * Converte todos os arquivos alvo para o encode **UTF-8**.
 *
 * Se algum diretório for alvo desta ação, todos os seus arquivos filhos (incluindo arquivos em subdiretórios)
 * que estiverem de acordo com a lista de extenções válidas serão também convertidos.
 *
 * @param       array $absoluteSystemPaths
 *              Caminhos para os recursos que serão convertidos.
 *              Todo arquivo indicado passará pela conversão.
 *              Caminhos de diretórios serão alvo de verificação onde apenas serão convertidos os arquivos
 *              cuja extenção esteja entre as consideradas válidas.
 *
 * @param       array $validExtensions
 *              Usado quando algum caminho indicado em ``$absoluteSystemPaths`` for um diretório
 *              deve ser passado um array contendo uma coleção de extenções de arquivos que são alvo
 *              desta ação.
 *
 * @return      bool
 *              Retornará ``true`` se TODOS os recursos alvo desta ação forem corretamente convertidos.
 *              Também retornará ``true`` se não encontrar nenhum arquivo para ser convertido.
 */
function dir_convert_to_utf8(array $absoluteSystemPaths, array $validExtensions = []): bool
{
    $isOK = true;

    if (\count($absoluteSystemPaths) > 0) {
        $arrTargetFiles = [];

        // Identifica a existência dos recursos indicados e seleciona
        // todos aqueles que devem ser convertidos.
        foreach ($absoluteSystemPaths as $pathToFile) {
            $absSystemPath = \to_system_path($pathToFile);

            if (\file_exists($absSystemPath) === true) {
                if (\is_file($absSystemPath) === true) {
                    $arrTargetFiles[] = $absSystemPath;
                } elseif (\is_dir($absSystemPath) === true) {
                    $childResources = new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($absSystemPath),
                        \RecursiveIteratorIterator::SELF_FIRST
                    );

                    foreach ($childResources as $childFiles) {
                        $strPath = (string)$childFiles;
                        if (\str_ends_with($strPath, ".") === false && \str_ends_with($strPath, "..") === false) {
                            if (\is_file($strPath) === true) {
                                $ext = \strtolower(\pathinfo($strPath, PATHINFO_EXTENSION));

                                if (\in_array($ext, $validExtensions) === true) {
                                    $arrTargetFiles[] = $strPath;
                                }
                            }
                        }
                    }
                }
            }
        }



        if (\count($arrTargetFiles) > 0) {
            foreach ($arrTargetFiles as $strTargetPathFile) {
                if ($isOK === true) {
                    $isOK = \file_convert_to_utf8($strTargetPathFile);
                }
            }
        }
    }


    return $isOK;
}
