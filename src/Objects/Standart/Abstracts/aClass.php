<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPClass as iPClass;
use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;







/**
 * ``Abstract Standart Class``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aClass extends aStandart implements iPClass
{



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      mixed
     */
    public static function getMin()
    {
        return static::MIN;
    }
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      mixed
     */
    public static function getMax()
    {
        return static::MAX;
    }
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      mixed
     */
    public static function getNullEquivalent()
    {
        return static::NULL_EQUIVALENT;
    }
}
