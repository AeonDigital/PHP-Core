<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;
use AeonDigital\Objects\Tools as Tools;







/**
 * Classe abstrata básica para a criação de tipos ``Standart``.
 *
 * @package     AeonDigital\Objects
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
        $s = null;
        if (static::TYPE === "iPGeneric") {
            if (\is_object($v) === true && \method_exists($v, "__toString") === true) {
                $s = (string)$v;
            }
        }
        else {
            if (static::validate($v) === true) {
                if (static::TYPE === "Bool") { $v = Tools::toBool($v); }
                $s = Tools::toString($v);
            }
        }
        return $s;
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
    static function validate($v) : bool
    {
        $r = false;
        if ($v === null && static::NULLABLE === true) {
            $r = true;
        }
        else {
            $n = static::stdTryParseForThisType($v);
            $r = (($n === null) ? false : static::validateRange($n));
        }
        return $r;
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
     * @param       string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(
        $v,
        string &$err = ""
    ) {
        $err = "";

        if ($v === null) {
            if (static::NULLABLE === false) {
                if (static::toString($v) === static::NULL_EQUIVALENT) {
                    $v = static::getNullEquivalent();
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
        $r = (static::HAS_LIMIT === false || (static::MIN === null && static::MAX === null));
        if ($r === false) {
            $min = static::getMin();
            $max = static::getMax();

            if (static::TYPE === "String") {
                $len = \mb_strlen($v);
                $r = (($min === null || $len >= $min) && ($max === null || $len <= $max));
            }
            else {
                if (static::TYPE === "AeonDigital\Objects\Realtype") {
                    $r = ($v->isGreaterOrEqualAs($min) === true && $v->isLessOrEqualAs($max) === true);
                }
                else {
                    $r = ($v >= $min && $v <= $max);
                }
            }
        }
        return $r;
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
                $r = "toReal";
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
        $r = null;

        $toType = static::stdGetToolsTryParserForThisType();
        if ($toType === "") {
            if (static::IS_CLASS === true && \is_object($v) === true) {
                if (\is_a($v, static::TYPE) === true) {
                    $r = $v;
                }
                else {
                    $className = \get_class($v);
                    $interfaces = \class_implements($className);

                    if ($interfaces !== false && \in_array(static::TYPE, $interfaces) === true) {
                        $r = $v;
                    }
                }
            }
        }
        else {
            $r = Tools::$toType($v);
        }

        return $r;
    }
}
