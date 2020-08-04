<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;








/**
 * Extende a classe ``aStandart`` para atender tipos ``DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aDateTime extends aStandart
{



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      \DateTime
     */
    static function getMin() : \DateTime
    {
        if (isset(static::$stdMIN) === false) {
            static::$stdMIN = new \DateTime(static::MIN);
        }
        return static::$stdMIN;
    }
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      \DateTime
     */
    static function getMax() : \DateTime
    {
        if (isset(static::$stdMAX) === false) {
            static::$stdMAX = new \DateTime(static::MAX);
        }
        return static::$stdMAX;
    }
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      \DateTime
     */
    static function getNullEquivalent() : \DateTime
    {
        if (isset(static::$stdNULL) === false) {
            static::$stdNULL = new \DateTime(static::NULL_EQUIVALENT);
        }
        return static::$stdNULL;
    }
}
