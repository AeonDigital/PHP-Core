<?php
declare (strict_types=1);

/**
 * Converte todos os arquivos alvo para o encode **UTF-8**.
 *
 * Se algum diretório for alvo desta ação, todos os seus arquivos filhos (incluindo subdiretórios)
 * serão também convertidos.
 * Ocorrendo qualquer falha durante o processamento das conversões, o processamento parará imediatamente.
 *
 * @param       array $absoluteSystemPaths
 *              Caminhos para os recursos que serão convertidos.
 *              Podem ser apontados diretórios ou arquivos.
 *
 * @param       array $validExtensions
 *              Coleção de extenções válidas para executar a conversão.
 *
 * @return      bool
 *              Retornará ``true`` se TODOS os recursos indicados em ``$absoluteSystemPaths``
 *              existirem e forem corretamente convertidos.
 */
function dir_convert_to_utf8(array $absoluteSystemPaths, array $validExtensions) : bool
{
    $isOK = false;


    // Verifica se todos os recursos indicados existem.
    for ($i = 0; $i < \count($absoluteSystemPaths); $i++) {
        $absSystemPath = \to_system_path($absoluteSystemPaths[$i]);

        if (\file_exists($absSystemPath) === true) {
            $absoluteSystemPaths[$i] = $absSystemPath;
        } else {
            $isOK = false;
            break;
        }
    }



    // Se todos os recursos indicados existem...
    if ($isOK) {
        foreach ($absoluteSystemPaths as $key => $resource) {
            if ($isOK === true) {
                // Tratando-se de um arquivo comum...
                if (\is_file($resource) === true) {
                    $ext = \strtolower(\pathinfo($resource, PATHINFO_EXTENSION));

                    // Se a extenção do arquivo é uma das válidas,
                    // efetua a conversão do mesmo.
                    if (\in_array($ext, $validExtensions) === true) {
                        $isOK = \file_convert_to_utf8($resource);
                    }
                } // Senão, se for um diretório...
                else {
                    $childResources = new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($resource),
                        \RecursiveIteratorIterator::SELF_FIRST
                    );

                    foreach ($childResources as $child) {
                        if ($isOK === true && \mb_str_ends_with($child, ".") === false &&
                            \mb_str_ends_with($child, "..") === false)
                        {
                            if (\is_file($child) === true) {
                                $ext = \strtolower(\pathinfo($child, PATHINFO_EXTENSION));

                                if (\in_array($ext, $validExtensions) === true) {
                                    $isOK = \file_convert_to_utf8($child);
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    return $isOK;
}
