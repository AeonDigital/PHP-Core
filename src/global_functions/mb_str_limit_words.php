<?php
declare (strict_types=1);

/**
 * Limita a sentença à um número máximo de palavras.
 *
 * @param       string $str
 *              ``String`` original.
 *
 * @param       int $max
 *              Número máximo de palavras.
 *
 * @param       ?string $etc
 *              Será adicionado ao final da sentença, se, o número
 *              total de palavras iniciais for maior que ``$max``.
 *
 * @return      string
 */
function mb_str_limit_words(
    string $str,
    int $max,
    string $etc = ""
) : string {
    $inputArr = \array_filter(
        \array_map("trim", \explode(" ", $str)),
        fn($v) => (\is_null($v) === false && $v !== "")
    );
    $r = \implode(" ", \array_slice($inputArr, 0, $max));
    return ((\count($inputArr) > $max) ? $r . $etc : $r);
}
