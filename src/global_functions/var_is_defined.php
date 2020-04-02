<?php
declare (strict_types=1);

/**
 * Verifica se a variável indicada está definida.
 *
 * Uma variável é considerada definida quando NÃO FOR um ``array`` vazio ou um objeto ``\stdClass``
 * vazio, ou, quando tratar-se de um tipo escalar, for diferente de ``null``, ``undefined``
 * e ``''``.
 *
 * @param       mixed $o
 *              Objeto que será testado.
 *
 * @param       ?string $k
 *              Quando indicado, ``$o`` deve ser um ``array`` ou um objeto ``\stdClass`` e ``$k``
 *              será a chave cuja existência e valor será verificado.
 *
 * @return      bool
 *              Retornará ``true`` SE a variável ESTA definida E SE seu valor é diferente de
 *              ``null``, ``undefined`` e ``''``.
 *              Objetos do tipo ``array`` e ``\stdClass`` retornarão ``true`` SE não forem vazios
 *              quando ``$k`` não for definido.
 */
function var_is_defined(&$o, ?string $k = null) : bool
{
    $r = false;

    if (\is_array($o) === true) {
        if (\count($o) > 0) {
            if ($k === null) {
                $r = true;
            }
            else {
                if (\key_exists($k, $o) === true) {
                    $r = \var_is_defined($o[$k]);
                }
            }
        }
    }
    elseif (\is_a($o, "stdClass") === true) {
        if (\count((array)$o) > 0) {
            if ($k === null) {
                $r = true;
            }
            else {
                if (isset($o->{$k}) === true) {
                    $r = \var_is_defined($o->{$k});
                }
            }
        }
    }
    else {
        if (\is_scalar($o) === true) {
            $r = ($o !== null && $o !== undefined && $o !== "");
        }
    }

    return $r;
}
