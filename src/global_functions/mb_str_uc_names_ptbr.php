<?php
declare (strict_types=1);

/**
 * Converte para maiúsculas o primeiro caractere de cada parte de uma ``string`` que representa um
 * nome próprio. Todos os demais caracteres da ``string`` passada serão revertidos para minúsculas.
 *
 * Artigos usados nos nomes próprios típicos do locale **pt-BR** serão protegidos de terem
 * seus caracteres alterados.
 *
 * @param       string $string
 *              ``String`` que será alterada.
 *
 * @return      string
 *              Nova ``string`` modificada.
 */
function mb_str_uc_names_ptbr(string $string) : string
{
    $ignore = [ "a", "as", "à", "às", "da", "das", "na", "nas", "pela", "pelas",
                "o", "os", "ao", "aos", "do", "dos", "no", "nos", "pelo", "pelos",
                "de", "em", "por", "per", "um", "uns", "dum", "duns", "num", "nums",
                "uma", "umas", "duma", "dumas", "numa", "numas"];

    return \mb_str_uc_names($string, "", $ignore);
}
