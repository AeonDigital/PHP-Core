<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Tools;










/**
 * Coleção de métodos estáticos para uso de arquivos ``Zip``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Zip
{





    /**
     * Zipa um conjunto de arquivos e diretórios e gera um pacote com os dados no local indicado.
     *
     * @param       string[] $absoluteSystemPaths
     *              Coleção de endereços dos arquivos e diretórios que serão zipados.
     *
     * @param       string $absoluteSystemPathToFile
     *              Endereço completo onde o novo arquivo zip será gerado.
     *
     * @return      boolean
     */
    public static function packTargets(array $absoluteSystemPaths, string $absoluteSystemPathToFile) : bool
    {
        $isOK = true;


        // Verifica se todos os recursos indicados existem e organiza-os
        // definindo o grupo de arquivos antes do grupo de diretórios
        $targetFiles = [];
        $targetDirs = [];


        for ($i = 0; $i < \count($absoluteSystemPaths); $i++) {
            // Corrige o endereço do recurso alvo conforme o padrão do sistema
            $sysPath = \to_system_path($absoluteSystemPaths[$i]);

            // Se o arquivo não existir, encerra o processamento
            if (\file_exists($sysPath) === false) {
                $isOK = false;
                break;
            } else {
                // Se for um arquivo...
                if (\is_file($sysPath) === true) {
                    $targetFiles[] = $sysPath;
                } // Senão, se for um diretório...
                else {
                    $targetDirs[] = $sysPath;
                }
            }
        }



        // Se todos os recursos indicados existem...
        if ($isOK === true) {
            $zip = new \ZipArchive();


            if ($zip->open($absoluteSystemPathToFile, \ZIPARCHIVE::CREATE | \ZIPARCHIVE::OVERWRITE) === true) {
                $absoluteSystemPaths = \array_merge($targetFiles, $targetDirs);


                // Para cada item que deve ser comprimido...
                foreach ($absoluteSystemPaths as $key => $resource) {
                    $rParts = \explode(DS, $resource);
                    $rName = $rParts[\count($rParts) - 1];


                    // Tratando-se de um arquivo normal...
                    if (\is_file($resource) === true) {
                        $zip->addFile($resource, $rName);
                    } else {
                        $useContainer = "";
                        if (\count($absoluteSystemPaths) > 1) {
                            $useContainer = $rName;
                            $zip->addEmptyDir($useContainer);
                            $useContainer .= DS;
                        }


                        $childResources = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($resource), \RecursiveIteratorIterator::SELF_FIRST);
                        foreach ($childResources as $child) {
                            $childName = (string)$child;
                            if (\mb_str_ends_with($childName, ".") === false &&
                                \mb_str_ends_with($childName, "..") === false
                            ) {
                                $recName = $useContainer . \str_replace($resource . DS, "", $childName);

                                if (\is_dir($childName) === true) {
                                    $zip->addEmptyDir($recName);
                                } else {
                                    $zip->addFile($childName, $recName);
                                }
                            }
                        }
                    }
                }
            }


            $zip->close();
        }


        return $isOK;
    }





    /**
     * Zipa um arquivo ou diretório (e todo seu conteúdo) gerando um pacote com os dados
     * encontrados no mesmo local onde estão os dados apontados.
     *
     * @param       string $absoluteSystemPaths
     *              Endereço completo do arquivo ou diretório que será zipado.
     *
     * @param       ?string $absoluteSystemPathToFile
     *              Quando definido, deve indicar o local de destino do pacote
     *              gerado e seu respectivo nome.
     *
     * @return      bool
     */
    public static function pack(string $absoluteSystemPaths, ?string $absoluteSystemPathToFile = null) : bool
    {
        $useTgtPath = (($absoluteSystemPathToFile === null) ? \dirname(\to_system_path($absoluteSystemPaths)) : $absoluteSystemPathToFile);
        $useTgtFileName = \basename(\to_system_path($absoluteSystemPaths));
        $useTgtPathToFile = $useTgtPath . DS . $useTgtFileName;
        if (\strpos($useTgtPathToFile, ".zip") === false) {
            $useTgtPathToFile .= ".zip";
        }

        return self::packTargets([$absoluteSystemPaths], $useTgtPathToFile);
    }





    /**
     * Deszipa um pacote e adiciona seu conteúdo no local indicado.
     * SE o local não existir, cria-o.
     *
     * @param       string $absoluteSystemPathToFile
     *              Caminho completo até o arquivo zipado.
     *
     * @param       ?string $absoluteSystemPathToDir
     *              Caminho completo até o diretório onde o pacote será descompactado.
     *              Caso não seja definido, criará um diretório no mesmo local onde o
     *              arquivo **.zip** se encontra. O novo diretório terá como nome:
     *              **dirname_unpacked** e, caso já exista, será adicionado um index.
     *
     * @return      bool
     */
    public static function unpack(string $absoluteSystemPathToFile, ?string $absoluteSystemPathToDir = null) : bool
    {
        $isOK = false;

        // Apenas se o arquivo existir...
        if (\is_file($absoluteSystemPathToFile) === true) {

            // Caso o destino da versão descompactada não seja definida...
            $useTargetDir = $absoluteSystemPathToDir;
            if ($useTargetDir === null) {
                $countDir = 0;

                $fileInfo = \pathinfo($absoluteSystemPathToFile);
                $fName = $fileInfo["filename"];
                $dName = $fileInfo["dirname"];

                $baseDirName = $dName . DS . $fName . "_unpacked";
                $useTargetDir = $baseDirName;

                while (\file_exists($useTargetDir) === true) {
                    $countDir++;
                    $useTargetDir = $baseDirName . "_" . $countDir;
                }
            }


            $zip = new \ZipArchive();

            if ($zip->open($absoluteSystemPathToFile) === true) {
                $useTargetDir = \to_system_path($useTargetDir);
                $existLocal = (\file_exists($useTargetDir) && \is_dir($useTargetDir));

                // Se o caminho final não existir...
                if ($existLocal === false) {
                    if (\file_exists($useTargetDir) === false) {
                        $existLocal = \mkdir($useTargetDir, 0700);
                    }
                }


                if ($existLocal === true) {
                    $isOK = $zip->extractTo($useTargetDir);
                }
            }

            $zip->close();
        }


        return $isOK;
    }





    /**
     * Extrai um ou mais arquivos ou diretórios de dentro de um arquivo zipado e aloca-os
     * em seus respectivos destinos.
     *
     * @param       string $absoluteSystemPathToFile
     *              Caminho completo até o arquivo zipado.
     *
     * @param       array $targets
     *              Array de arrays associativos onde:
     *
     *              **key** : Deve ser o caminho para o arquivo ou diretório dentro do
     *              zip (a partir da raiz do zip).
     *
     *              **value** : Deve ser o caminho completo do diretório onde o arquivo
     *              ou diretório será extraído.
     *
     * @return      bool
     */
    static function unpackTargets(string $absoluteSystemPathToFile, array $targets) : bool
    {
        $isOK = false;


        // Apenas se o arquivo alvo existir...
        if (\is_file($absoluteSystemPathToFile) === true) {
            $zip = new \ZipArchive();

            if ($zip->open($absoluteSystemPathToFile) === true) {
                // Cria um diretório temporário para explorar o conteúdo do zip
                $tempDirName = \pathinfo($absoluteSystemPathToFile, PATHINFO_FILENAME) . "_temp";
                $tempDirName = \pathinfo($absoluteSystemPathToFile, PATHINFO_DIRNAME) . DS . $tempDirName;
                $tempDirName = \to_system_path($tempDirName);


                if (\mkdir($tempDirName, 0700, true) === true) {
                    // Extrai todo o conteúdo para o diretório temporário.
                    if ($zip->extractTo($tempDirName) === true) {
                        $zip->close();


                        $allResourcesExists = true;

                        // Certifica-se de que todos os recursos alvo existem...
                        foreach ($targets as $key => $value) {
                            $absolutePathToResource = $tempDirName . DS . $key;

                            // Se algum dos recursos alvo não existir...
                            if (\file_exists($absolutePathToResource) === false) {
                                $allResourcesExists = false;

                                $msg = "Request resource not found : \"" . $absoluteSystemPathToFile . DS . $key . "\"";
                                throw new \Exception($msg);
                                break;
                            }
                        }



                        // Garantindo que todos os recursos existem...
                        if ($allResourcesExists === true) {
                            $isOK = true;

                            // Para cada recurso que deve ser resgatado do zip...
                            foreach ($targets as $key => $value) {
                                $absolutePathToTempResource = $tempDirName . DS . $key;
                                $absolutePathToFinalResource = $value;


                                // Se for um arquivo, adiciona o nome do recurso ao caminho
                                if (\is_file($absolutePathToTempResource) === true) {
                                    $absolutePathToFinalResource .= DS . \pathinfo($key, PATHINFO_BASENAME);
                                } else {
                                    $absolutePathToFinalResource .= DS . $key;
                                }


                                // Se o caminho ainda não existe...
                                $tgtPathToFinalResource = \dirname($absolutePathToFinalResource);
                                if (\is_dir($tgtPathToFinalResource) === false) {
                                    \mkdir($tgtPathToFinalResource, 0700, true);
                                }

                                if (\is_dir($absolutePathToTempResource) === true) {
                                    if (\dir_copy($absolutePathToTempResource, $absolutePathToFinalResource) === false) {
                                        // @codeCoverageIgnoreStart
                                        $isOK = false;
                                        // @codeCoverageIgnoreEnd
                                        break;
                                    }
                                } else {
                                    if (\copy($absolutePathToTempResource, $absolutePathToFinalResource) === false) {
                                        // @codeCoverageIgnoreStart
                                        $isOK = false;
                                        // @codeCoverageIgnoreEnd
                                        break;
                                    }
                                }
                            }
                        }
                    }




                    // Remove o diretório temporário e todo seu conteúdo
                    \dir_deltree($tempDirName);
                }
            }
        }


        return $isOK;
    }
}
