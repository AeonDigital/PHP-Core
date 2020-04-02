<?php
declare (strict_types=1);

/**
 * Converte todo conteúdo de um ``Array Associativo`` ou objeto ``\stdClass`` em um valor do tipo
 * ``string`` que pode ser apresentado normalmente em um documento HTML.
 *
 * @param       mixed $o
 *              Objeto original, que será convertido.
 *
 * @return      mixed
 *              Retornará o mesmo tipo de objeto inicialmente passado em ``$o``, mas com todos
 *              seus valores convertidos para ``strings`` representáveis em um documento HTML.
 */
function object_convert_values_to_html_entities($o)
{
    $nO = null;

    if (\is_array($o) === true) {
        foreach ($o as $i => $v) {
            $nO[$i] = \object_convert_values_to_html_entities($v);
        }
    }
    elseif (\is_a($o, "\stdClass") === true) {
        $nO = new \stdClass();
        foreach ($o as $k => $v) {
            $nO->{$k} = \object_convert_values_to_html_entities($v);
        }
    }
    elseif (\is_a($o, "\DateTime") === true) {
        $nO = $o->format("Y-m-d H:i:s");
    }
    elseif (\is_object($o) === true) {
        if (\method_exists($val, "__toString") === true) {
            $nO = (string)$o;
        }
        else {
            $nO = get_class($o);
        }
    }
    elseif (\is_string($o) === true) {
        $nO = \htmlentities($o);
    }
    else {
        $nO = $o;
    }

    return $nO;
}
