<?php
declare (strict_types=1);

/**
 * Efetua a clonagem de um objeto.
 *
 * @param       mixed $obj
 *              Objeto que será clonado.
 *
 * @return      mixed
 */
function object_clone($obj)
{
    if ($obj === null ||
        \is_scalar($obj) === true ||
        (\is_array($obj) === true && \array_is_assoc($obj) === false))
    {
        return $obj;
    }
    else {
        $clone = null;
        $type = null;

        if (\array_is_assoc($obj) === true) {
            $type = "assoc";
            $clone = [];
        }
        elseif (\is_a($obj, "\stdClass") === true) {
            $type = "stdClass";
            $clone = new \stdClass();
        }
        else {
            $clone = clone $obj;
        }


        if ($type !== null) {
            foreach ($obj as $k => $v) {
                if ($type === "assoc") {
                    $clone[$k] = \object_clone($v);
                } elseif ($type === "stdClass") {
                    $clone->{$k} = \object_clone($v);
                }
            }
        }

        return $clone;
    }
}
