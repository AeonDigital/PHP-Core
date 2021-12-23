<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\Interfaces\SimpleType\iDateTime as iDateTime;
use AeonDigital\SimpleType\Abstracts\aBasic as aBasic;
use AeonDigital\Tools as Tools;






/**
 * Definições para o tipo ``DateTime``.
 *
 * Os valores mínimos e máximos são definidos para estarem dentro de um intervalo que
 * abrange a imensa maior parte das aplicações comerciais.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stDateTime extends aBasic implements iDateTime
{





    /**
     * Retorna o menor valor possível para este tipo de data. Se for definido ``null``,
     * o limite será dado pelo próprio sistema.
     *
     * @return      ?\DateTime
     */
    public static function min() : ?\DateTime
    {
        return null;
    }



    /**
     * Retorna o maior valor possível para este tipo de data. Se for definido ``null``,
     * o limite será dado pelo próprio sistema.
     *
     * @return      ?\DateTime
     */
    public static function max() : ?\DateTime
    {
        return null;
    }





    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * É esperado uma string usando o formato **Y-m-d H:i:s**, um inteiro
     * representando um **timestamp** ou um objeto ``DateTime`` dentro dos limites
     * especificados.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    public static function validate($v) : bool
    {
        $d = Tools::toDateTime($v);
        if ($d === null) {
            return false;
        } else {
            return static::validateDateTimeValue($d);
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
    public static function parseIfValidate($v, ?string &$err = null)
    {
        $err = null;

        if (static::validate($v) === false) {
            $f = Tools::toDateTime($v);
            if ($f === null) {
                $err = "error.st.unexpected.type";
            } else {
                $err = "error.st.value.out.of.range";
            }
        } else {
            $v = Tools::toDateTime($v);
        }

        return $v;
    }



    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       \DateTime $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateDateTimeValue(\DateTime $v) : bool
    {
        $min = static::min();
        $max = static::max();
        return (($min === null || $v >= $min) && ($max === null || $v <= $max));
    }

}
