<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iDateTime as iDateTime;
use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;






/**
 * Define um ``Standart do tipo \DateTime``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdDateTime extends aStandartType implements iDateTime
{
    /**
     * Nome deste tipo.
     * Namespace completa para quando tratar-se de uma classe.
     */
    const TYPE = "DateTime";



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?\DateTime
     */
    public function get() : ?\DateTime
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      \DateTime
     */
    public function getNotNull() : \DateTime
    {
        return parent::stdGetNotNull();
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
            $d = Tools::toDateTime($v);
            if ($d === null) {
                return false;
            } else {
                return static::validateRange($d);
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
     *              ``static::nullEquivalent()``. Se ``$nullable`` for definido esta opção
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
        return static::stdParseIfValidate($v, $nullable, $nullEquivalent, $err, "toDateTime");
    }



    /**
     * Data compatível com o valor ``null`` para fins de comparação
     *
     * @var         \DateTime
     */
    private static \DateTime $stdNull;
    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    public static function nullEquivalent() : \DateTime
    {
        if (isset(self::$stdNull) === false) {
            self::$stdNull = new \DateTime("0001-01-01 00:00:00");
        }
        return self::$stdNull;
    }



    /**
     * Menor data possível aceita como válida.
     *
     * @var         \DateTime
     */
    private static \DateTime $stdMin;
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function min() : \DateTime
    {
        if (isset(self::$stdMin) === false) {
            self::$stdMin = new \DateTime("-9999-12-31 23:59:59");
        }
        return self::$stdMin;
    }



    /**
     * Maior data possível aceita como válida.
     *
     * @var         \DateTime
     */
    private static \DateTime $stdMax;
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public static function max() : \DateTime
    {
        if (isset(self::$stdMax) === false) {
            self::$stdMax = new \DateTime("9999-12-31 23:59:59");
        }
        return self::$stdMax;
    }
}
