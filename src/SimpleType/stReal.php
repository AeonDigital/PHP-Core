<?php

declare(strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\Interfaces\iRealType as iRealType;
use AeonDigital\Interfaces\SimpleType\iReal as iReal;
use AeonDigital\SimpleType\Abstracts\aBasic as aBasic;
use AeonDigital\Tools as Tools;




/**
 * Definições para o tipo ``real``.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stReal extends aBasic implements iReal
{





    /**
     * Retorna o menor valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      ?string
     */
    public static function min(): ?string
    {
        return null;
    }


    /**
     * Retorna o maior valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      ?string
     */
    public static function max(): ?string
    {
        return null;
    }





    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    public static function validate(mixed $v): bool
    {
        $n = Tools::toRealType($v);
        if ($n === null) {
            return false;
        } else {
            return static::validateRealValue($n);
        }
    }





    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe retornará um código que identifica o erro ocorrido na variável
     * ``$err``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(mixed $v, ?string &$err = null): mixed
    {
        $err = null;
        if (static::validate($v) === false) {
            $n = Tools::toRealType($v);
            $err = "unknown";

            if ($n === null) {
                $err = "error.st.unexpected.type";
            }
        } else {
            $v = Tools::toRealType($v);
        }
        return $v;
    }





    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       iRealType $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateRealValue(iRealType $v): bool
    {
        $min = static::min();
        $max = static::max();
        return (($min === null || $v->isGreaterOrEqualAs(static::min()) === true) &&
            ($max === null || $v->isLessOrEqualAs(static::max()) === true));
    }
}
