<?php

declare(strict_types=1);

/**
 * Retorna um array contendo todos os ``mimetype`` que estão correlacionados
 * com a extensão do arquivo de nome indicado passado.
 *
 * Se for usada uma extensão desconhecida, será retornado ``null``.
 *
 * @param string $fileName
 * Caminho (completo ou relativo) ou nome do arquivo alvo.
 *
 * @return null|array
 * Array contendo os mimes que correspondem à extensão do arquivo.
 * Retornará ``null`` caso a extensão não seja conhecida.
 */
function file_get_mimetypes(string $fileName): null|array
{
    $ext = \explode(".", $fileName);
    $ext = \strtolower($ext[\count($ext) - 1]);
    return (
        (key_exists($ext, \AeonDigital\Iana\Iana::MimeExtension) === true) ?
        \AeonDigital\Iana\Iana::MimeExtension[$ext] :
        null
    );
}
