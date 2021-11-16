<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType\Abstracts;

use AeonDigital\Interfaces\SimpleType\iFloat as iFloat;
use AeonDigital\SimpleType\Abstracts\aBasic as aBasic;
use AeonDigital\Tools as Tools;






/**
 * Extende a classe ``aBasic`` dando funções de controle para lidar com números inteiros.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aFloat extends aBasic implements iFloat
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      float
     */
    abstract public static function min() : float;


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      float
     */
    abstract public static function max() : float;





    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    public static function validate($v) : bool
    {
        $n = Tools::toFloat($v);
        if ($n === null) {
            return false;
        } else {
            return static::validateFloatValue($n);
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
            $n = Tools::toFloat($v);
            $err = "unknown";

            if ($n === null) {
                $err = "error.st.unexpected.type";
            } else {
                if (static::validateFloatValue($n) === false) {
                    $err = "error.st.value.out.of.range";
                }
            }
        } else {
            $v = Tools::toFloat($v);
        }
        return $v;
    }





    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       float $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateFloatValue(float $v) : bool
    {
        return ($v >= static::min() && $v <= static::max());
    }
}
