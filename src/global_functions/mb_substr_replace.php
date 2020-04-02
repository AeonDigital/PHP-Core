<?php
declare (strict_types=1);

/**
 * Substitui o texto em uma parte da ``string`` por outro.
 *
 * Este método é equivalente ao ``substr_replace()`` porém, suporta ``multi-byte``.
 *
 * @param       string $string
 *              ``String`` original.
 *
 * @param       string $replacement
 *              ``String`` que será adicionada.
 *
 * @param       int $start
 *              Posição inicial para inserir a nova ``string``.
 *
 * @param       ?int $length
 *              Tamanho da porção da ``string`` original que será substituída.
 *
 * @param       ?string $encoding
 *              Quando usado indica que codificação a ``string`` original está usando.
 *
 * @return      string
 *              Nova ``string`` com o novo valor.
 */
function mb_substr_replace(
    string $string,
    string $replacement,
    int $start,
    ?int $length = null,
    ?string $encoding = null
) : string {

    $string_length = (\is_null($encoding) === true) ? \mb_strlen($string) : \mb_strlen($string, $encoding);

    // Identifica a posição em que a string começará a ser substituída
    if ($start < 0) {
        $start = \max(0, $string_length + $start);
    } elseif ($start > $string_length) {
        $start = $string_length;
    }

    // Identifica o tamanho da porção da string que será substituída
    if ($length < 0) {
        $length = \max(0, $string_length - $start + $length);
    } elseif ((\is_null($length) === true) || ($length > $string_length)) {
        $length = $string_length;
    }

    if (($start + $length) > $string_length) {
        $length = $string_length - $start;
    }

    if (\is_null($encoding) === true) {
        return \mb_substr($string, 0, $start) . $replacement . \mb_substr($string, $start + $length, $string_length - $start - $length);
    }

    return \mb_substr($string, 0, $start, $encoding) . $replacement . \mb_substr($string, $start + $length, $string_length - $start - $length, $encoding);
}
