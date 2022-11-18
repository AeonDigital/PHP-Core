<?php

declare(strict_types=1);

/**
 * Converte para maiúsculas o primeiro caractere de cada parte de uma ``string`` que representa um
 * nome próprio. Todos os demais caracteres da ``string`` passada serão revertidos para minúsculas.
 *
 * @param string $str
 * ``String`` que será alterada.
 *
 * @param string $locale
 * Locale que deve ser usado.
 *
 * @param array $ignore
 * Se definido, deve ser um ``array de strings`` contendo palavras que devem escapar
 * da transformação.
 *
 * @return string
 * Nova ``string`` modificada.
 */
function mb_str_uc_names(string $str, string $locale = "", array $ignore = []): string
{
    $locale = \mb_strtolower(\str_replace("-", "", $locale));
    if ($locale === "" || \function_exists("mb_str_uc_names_$locale") === false) {
        return \ucfirst(\mb_str_uc_words(\mb_strtolower($str), $ignore));
    } else {
        $f = "mb_str_uc_names_$locale";
        return $f($str);
    }
}
