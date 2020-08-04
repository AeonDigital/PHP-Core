<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPBool as iPBool;
use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;







/**
 * ``Abstract Standart Bool``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aBool extends aStandart implements iPBool
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
     * @return      bool
     */
    public static function getNullEquivalent() : bool
    {
        return (bool)static::NULL_EQUIVALENT;
    }
}
