<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;
use AeonDigital\Objects\Tools as Tools;







/**
 * Classe abstrata básica para a criação de ``Standart``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aStandart implements iStandart
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
        if (static::TYPE === "iGeneric") {
            if (\is_object($v) === true && \method_exists($v, "__toString") === true) {
                return (string)$v;
            }
        }
        else {
            if (static::validate($v) === true) {
                if (static::TYPE === "Bool") { $v = Tools::toBool($v); }
                return Tools::toString($v);
            }
        }
        return null;
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
     * @param       bool $allowNull
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo.
     *
     * @return      bool
     */
    public static function validate(
        $v,
        bool $allowNull = false
    ) : bool {
        if ($v === null && $allowNull === true) {
            return true;
        }
        else {
            $n = static::stdTryParseForThisType($v);
            if ($n === null) {
                return false;
            }
            else {
                return ((static::HAS_LIMIT_RANGE === false) ? true : static::validateRange($n));
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
     * @param       bool $allowNull
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo
     *              e não será convertido.
     *
     * @param       bool $nullEquivalent
     *              Quando ``true``, converterá ``null`` para o valor existente em
     *              ``static::nullEquivalent()``. Se ``$allowNull`` for definido esta opção
     *              será ignorada.
     *
     * @param       string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(
        $v,
        bool $allowNull = false,
        bool $nullEquivalent = false,
        string &$err = ""
    ) {
        $err = "";

        if ($v === null) {
            if ($allowNull === false) {
                if ($nullEquivalent === true) {
                    $v = static::nullEquivalent();
                }
                else {
                    $err = "error.obj.type.not.allow.null";
                }
            }
        }
        else {
            $n = static::stdTryParseForThisType($v);
            if ($n === null) {
                $err = "error.obj.type.unexpected";
            } else {
                if (static::validateRange($n) === false) {
                    $err = "error.obj.value.out.of.range";
                }
                else {
                    $v = $n;
                }
            }
        }

        return $v;
    }










    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateRange($v) : bool
    {
        return (static::HAS_LIMIT_RANGE === false || ($v >= static::min() && $v <= static::max()));
    }
    /**
     * Retorna o nome do método a ser usado para efetuar a tentativa de conversão
     * de um dado em outro tipo.
     *
     * O método informado deve existir em ``AeonDigital\Objects\Tools``
     *
     * @return      string
     */
    protected static function stdGetToolsTryParserForThisType() : string
    {
        $r = "";

        switch(static::TYPE) {
            case "Bool":
                $r = "toBool";
                break;

            case "Byte":
            case "Short":
            case "Int":
            case "Long":
                $r = "toInt";
                break;

            case "Float":
            case "Double":
                $r = "toFloat";
                break;

            case "DateTime":
                $r = "toDateTime";
                break;

            case "AeonDigital\Objects\Realtype":
                $r = "toRealtype";
                break;

            case "String":
                $r = "toString";
                break;
        }

        return $r;
    }
    /**
     * Tenta converter o tipo do valor passado para o tipo atual desta classe.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $v
     *              valor que será convertido.
     *
     * @return      ?bool
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    protected static function stdTryParseForThisType($v)
    {
        if (static::TYPE === "iGeneric") {
            return ((\is_object($v) === true) ? $v : null);
        }
        else {
            $toType = static::stdGetToolsTryParserForThisType();
            return Tools::$toType($v);
        }
    }
}
