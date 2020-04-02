<?php
declare (strict_types=1);

/**
 * Se a variável indicada não estiver definida, irá iniciá-la com o valor padrão passado.
 *
 * @param       mixed $o
 *              Objeto a ser iniciado.
 *
 * @param       mixed $d
 *              Valor padrão a ser definido.
 *
 * @param       bool $u
 *              Se ``true`` testa apenas se o valor é ``undefined``.
 *              Se ``false`` testa usando ``var_is_defined()``.
 *
 * @return      void
 */
function var_initi_set(&$o, $d = null, bool $u = false) : void
{
    if ($u === true) {
        $o = ($o === undefined) ? $d : $o;
    } else {
        $o = ((\var_is_defined($o) === true) ? $o : $d);
    }
}
