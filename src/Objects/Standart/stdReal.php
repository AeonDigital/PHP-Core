<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iReal as iReal;
use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;
use AeonDigital\Objects\Tools as Tools;
use AeonDigital\Objects\Realtype as Realtype;





/**
 * Define um ``Standart`` para lidar com números naturais.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdReal extends aStandartType implements iReal
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?Realtype
     */
    public function get() : ?Realtype
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      Realtype
     */
    public function getNotNull() : Realtype
    {
        return parent::stdGetNotNull();
    }










    /**
     * Indica quando este tipo é ``comparable``, ou seja, os operadores matemáticos
     * naturais do PHP podem ser utilizados.
     *
     * @var         bool
     */
    protected static bool $isComparable = false;



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
            $n = Tools::toRealtype($v);
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
        return static::stdParseIfValidate($v, $nullable, $nullEquivalent, $err, "toRealtype");
    }



    /**
     * Data compatível com o valor ``null`` para fins de comparação
     *
     * @var         Realtype
     */
    private static Realtype $stdNull;
    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      mixed
     */
    public static function nullEquivalent() : Realtype
    {
        if (isset(self::$stdNull) === false) {
            self::$stdNull = new Realtype("0");
        }
        return self::$stdNull;
    }



    /**
     * Menor data possível aceita como válida.
     *
     * @var         Realtype
     */
    private static Realtype $stdMin;
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      Realtype
     */
    public static function min() : Realtype
    {
        if (isset(self::$stdMin) === false) {
            self::$stdMin = new Realtype("-999999999999999999999999999999999999");
        }
        return self::$stdMin;
    }



    /**
     * Maior data possível aceita como válida.
     *
     * @var         Realtype
     */
    private static Realtype $stdMax;
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      Realtype
     */
    public static function max() : Realtype
    {
        if (isset(self::$stdMax) === false) {
            self::$stdMax = new Realtype("999999999999999999999999999999999999");
        }
        return self::$stdMax;
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
