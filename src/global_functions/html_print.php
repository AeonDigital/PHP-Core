<?php

declare(strict_types=1);

/**
 * Imprime na tela o valor de ``$obj`` dentro de uma tag ``<pre>``, facilitando assim a leitura
 * quando necessário o debug.
 *
 * @param mixed $obj
 * Objeto que será **impresso**.
 *
 * @param bool $o
 * Indica se a tag ``<pre>`` deve receber a propriedade css ``overflow:auto``.
 *
 * @param string $w
 * Valor da propriedade css ``width`` para definir a largura do objeto ``<pre>``.
 *
 * @param string $h
 * Valor da propriedade css ``height`` para definir a altura do objeto ``<pre>``.
 *
 * @param bool $noPrint
 * Quando ``true`` não irá printar na tela o resultado e sim retornar o mesmo
 * como uma string.
 *
 * @return void|string
 */
function html_print(
    mixed $obj,
    bool $o = false,
    string $w = "",
    string $h = "",
    bool $noPrint = false
): string {
    $s = "";
    $styles = [];

    if ($o === true) {
        $styles[] = "overflow:auto;";
    }
    if ($w !== "") {
        $styles[] = "width:$w;";
    }
    if ($h !== "") {
        $styles[] = "height:$h;";
    }

    if (\count($styles) > 0) {
        $s = " style=\"" . \implode(" ", $styles) . "\"";
    }



    $obj = \object_convert_values_to_html_entities($obj);
    $r = "<pre" . $s . ">" . \print_r($obj, true) . "</pre>";
    if ($noPrint === false) {
        echo $r;
        $r = "";
    }

    return $r;
}
