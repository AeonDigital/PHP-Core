<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\Standart\iNumeric as iNumeric;
use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;






/**
 * Extende a classe ``aStandartType`` para centralizar
 * funções com números inteiros de até 32 bits.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aInt extends aStandartType implements iNumeric
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?int
     */
    public function get() : ?int
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      int
     */
    public function getNotNull() : int
    {
        return parent::stdGetNotNull();
    }










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
     * A não ser que seja explicitado o contrário, o valor ``null`` não será aceito.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo.
     *
     * @return      bool
     */
    public static function validate($v, bool $nullable = false) : bool
    {
        if ($v === null && $nullable === true) {
            return true;
        }
        else {
            $n = Tools::toInt($v);
            if ($n === null) {
                return false;
            } else {
                return static::validateRange($n);
            }
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
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo
     *              e não será convertido.
     *
     * @param       bool $nullEquivalent
     *              Quando ``true``, converterá ``null`` para o valor existente em
     *              ``self::nullEquivalent()``. Se ``$nullable`` for definido esta opção
     *              será ignorada.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(
        $v,
        bool $nullable = false,
        bool $nullEquivalent = false,
        ?string &$err = null
    ) {
        $err = null;

        if ($v === null) {
            if ($nullable === false) {
                if ($nullEquivalent === true) {
                    $v = self::nullEquivalent();
                }
                else {
                    $err = "error.std.type.not.nullable";
                }
            }
        }
        else {
            $n = Tools::toInt($v);
            if ($n === null) {
                $err = "error.std.type.unexpected";
            } else {
                if (static::validateRange($n) === false) {
                    $err = "error.std.value.out.of.range";
                }
                else {
                    $v = $n;
                }
            }
        }

        return $v;
    }



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      int
     */
    public static function nullEquivalent() : int
    {
        return 0;
    }
}
