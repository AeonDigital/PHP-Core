<?php

declare(strict_types=1);

namespace AeonDigital;









/**
 * Coleção de métodos estáticos para identificação de
 * tipos ``scalar`` do PHP.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2023, Rianna Cantarelli
 * @license     MIT
 */
class Scalar
{



    /**
     * Retorna o tipo ``scalar`` do objeto passado.
     * Se não for um objeto do tipo ``scalar`` retornará ``null`` .
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return ?string
     */
    public static function getType(mixed $o): ?string
    {
        $r = null;

        if ($o === null) {
            $r = "null";
        } elseif (\is_bool($o) === true) {
            $r = "bool";
        } elseif (\is_int($o) === true) {
            $r = "int";
        } elseif (\is_float($o) === true) {
            $r = "float";
        } elseif (\is_string($o) === true) {
            $r = "string";
        } elseif (\is_array($o) === true) {
            $r = "array";
        }

        return $r;
    }

    /**
     * Verifica se o objeto passado corresponde ao tipo esperado.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @param string $type
     * Nome do tipo a ser testado.
     * Esperado um dos seguintes: null | bool | int | float | string | array
     *
     * @return bool
     */
    public static function checkType(mixed $o, string $type): bool
    {
        return (self::getType($o) === \mb_strtolower($type));
    }

    /**
     * Identifica se o objeto passado é um tipo ``scalar``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isScalar(mixed $o): bool
    {
        return (self::getType($o) !== null);
    }





    /**
     * Verifica se o objeto passado é do tipo ``null``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isNull(mixed $o): bool
    {
        return ($o === null);
    }

    /**
     * Verifica se o objeto passado é do tipo ``bool``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isBool(mixed $o): bool
    {
        return (\is_bool($o) === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``int`` ou ``float`` ou ainda se trata-se
     * de uma ``string`` numérica.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isNumeric(mixed $o): bool
    {
        return ((\is_int($o) === true) || (\is_float($o) === true) || (\is_numeric($o) === true));
    }

    /**
     * Verifica se o objeto passado é do tipo ``int``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isInt(mixed $o): bool
    {
        return (\is_int($o) === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``float``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isFloat(mixed $o): bool
    {
        return (\is_float($o) === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``string``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isString(mixed $o): bool
    {
        return (\is_string($o) === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``array``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isArray(mixed $o): bool
    {
        return (\is_array($o) === true);
    }

    /**
     * Verifica se o objeto passado um ``array`` associativo.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isArrayAssoc(mixed $o): bool
    {
        return (\array_is_assoc($o) === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``DateTime``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isDateTime(mixed $o): bool
    {
        return (\is_a($o, "\DateTime") === true);
    }

    /**
     * Verifica se o objeto passado é do tipo ``iRealType``.
     *
     * @param mixed $o
     * Objeto que será verificado.
     *
     * @return bool
     */
    public static function isRealType(mixed $o): bool
    {
        return ($o instanceof \AeonDigital\Interfaces\iRealType);
    }
}