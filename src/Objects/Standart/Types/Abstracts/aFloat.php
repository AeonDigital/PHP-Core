<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types\Abstracts;

use AeonDigital\Interfaces\Objects\Standart\Types\iNumeric as iNumeric;
use AeonDigital\Objects\Standart\Types\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;






/**
 * Extende a classe ``aStandartType`` para centralizar
 * funções com números inteiros de até 64 bits.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aFloat extends aStandartType implements iNumeric
{



    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     * Caso não seja possível converter o valor, retorna ``null``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @return      ?string
     */
    public static function toString($v) : ?string
    {
        $n = null;
        if (static::validate($v) === true) {
            $n = Tools::toString($v);
        }
        return $n;
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
    public static function validate($v) : bool
    {
        $n = Tools::toFloat($v);
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
     * @return      ?float
     */
    public static function parseIfValidate($v, ?string &$err = null)
    {
        $err = null;
        $n = Tools::toFloat($v);
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
     * @return      float
     */
    public static function nullEquivalent() : float
    {
        return 0;
    }
}
