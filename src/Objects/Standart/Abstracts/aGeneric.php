<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPGeneric as iPGeneric;
use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;







/**
 * ``Abstract Standart Generic``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneric extends aStandart implements iPGeneric
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
    public static function getNullEquivalent() : mixed
    {
        return static::NULL_EQUIVALENT;
    }
}
