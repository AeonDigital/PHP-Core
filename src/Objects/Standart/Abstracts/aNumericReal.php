<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Extende a classe ``aStandart`` para atender tipos numéricos reais.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericReal extends aStandart
{



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      Realtype
     */
    static function getMin() : Realtype
    {
        if (isset(static::$stdMIN) === false) {
            static::$stdMIN = new Realtype(static::MIN);
        }
        return static::$stdMIN;
    }
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      Realtype
     */
    static function getMax() : Realtype
    {
        if (isset(static::$stdMAX) === false) {
            static::$stdMAX = new Realtype(static::MAX);
        }
        return static::$stdMAX;
    }
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      Realtype
     */
    static function getNullEquivalent() : Realtype
    {
        if (isset(static::$stdNULL) === false) {
            static::$stdNULL = new Realtype(static::NULL_EQUIVALENT);
        }
        return static::$stdNULL;
    }
}
