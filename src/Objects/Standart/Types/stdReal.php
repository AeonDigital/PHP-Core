<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iReal as iReal;
use AeonDigital\Objects\Standart\Types\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;
use AeonDigital\Objects\Realtype as Realtype;





/**
 * Define um ``Standart\Types`` para lidar com números naturais.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdReal extends aStandartType implements iReal
{



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
        $n = Tools::toRealtype($v);
        if ($n === null) {
            return false;
        } else {
            return static::validateRange($n);
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
     * @return      ?Realtype
     */
    public static function parseIfValidate($v, ?string &$err = null)
    {
        $err = null;
        $n = Tools::toRealtype($v);
        if ($n === null) {
            $n = $v;
            $err = "error.std.type.unexpected";
        } else {
            if (static::validateRange($n) === false) {
                $n = $v;
                $err = "error.std.value.out.of.range";
            }
        }
        return $n;
    }




    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    public static function nullEquivalent() : string
    {
        return "";
    }



    /**
     * Retorna o menor valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      string
     */
    public static function min() : string
    {
        return "-999999999999999999999999999999999999";
    }



    /**
     * Retorna o maior valor possível para o tipo definido. Se for definido ``null``, não
     * haverá limites para a representação numérica a ser utilizada.
     *
     * @return      string
     */
    public static function max() : string
    {
        return "999999999999999999999999999999999999";
    }










    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       Realtype $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateRange($v) : bool
    {
        return ($v->isGreaterOrEqualAs(static::min()) === true &&
                $v->isLessOrEqualAs(static::max()) === true);
    }
}
