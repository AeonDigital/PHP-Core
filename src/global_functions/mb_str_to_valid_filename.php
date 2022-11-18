<?php

declare(strict_types=1);

/**
 * Verifica a string original passada e remove dela qualquer caracter que a torne um nome
 * de arquivo invalido (tanto em sistemas Unix quando em Windows).
 *
 * Espaços serão removidos do início e do final da string.
 * Caracteres não visiveis serão excluidos.
 * Caracteres com glifos serão substiuidos por suas versões simples.
 * Os caracteres "\\", "/", "*", "?", "<", ">", "|", "\"", "'", ":" serão convertidos em "_".
 * Espaços serão convertidos em "_".
 *
 * @param string $str
 * ``String`` original.
 *
 * @return string
 */
function mb_str_to_valid_filename(string $str): string
{
    $str = \mb_str_remove_glyphs(
        \preg_replace(
            '/[\x00-\x1F\x7F\\/\*\?<>|"\': ]/u',
            "_",
            \trim($str)
        )
    );

    while (\strpos($str, "__") !== false) {
        $str = \str_replace("__", "_", $str);
    }

    return $str;
}
