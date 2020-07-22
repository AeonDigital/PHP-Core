<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iDateTime as iDateTime;
use AeonDigital\Objects\Standart\Types\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;






/**
 * Define um ``Standart\Types do tipo \DateTime``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdDateTime extends aStandartType implements iDateTime
{



    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * É esperado uma ``string`` usando o formato **Y-m-d H:i:s**, um inteiro
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
            return static::validateRange($d);
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
     * @return      ?\DateTime
     */
    public static function parseIfValidate($v, ?string &$err = null)
    {
        $err = null;
        $n = Tools::toDateTime($v);
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
     * Data compatível com o valor ``null`` para fins de comparação
     *
     * @var         \DateTime
     */
    private static \DateTime $dtNull;
    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    public static function nullEquivalent() : \DateTime
    {
        if (isset(self::$dtNull) === false) {
            self::$dtNull = new \DateTime("0001-01-01 00:00:00");
        }
        return self::$dtNull;
    }



    /**
     * Menor data possível aceita como válida.
     *
     * @var         \DateTime
     */
    private static \DateTime $dtMin;
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function min() : \DateTime
    {
        if (isset(self::$dtMin) === false) {
            self::$dtMin = new \DateTime("-9999-12-31 23:59:59");
        }
        return self::$dtMin;
    }



    /**
     * Maior data possível aceita como válida.
     *
     * @var         \DateTime
     */
    private static \DateTime $dtMax;
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function max() : \DateTime
    {
        if (isset(self::$dtMax) === false) {
            self::$dtMax = new \DateTime("9999-12-31 23:59:59");
        }
        return self::$dtMax;
    }
}
