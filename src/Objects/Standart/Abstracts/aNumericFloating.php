<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;








/**
 * Extende a classe ``aStandart`` para atender tipos numéricos de ponto flutuante.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericFloating extends aStandart
{



    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      float
     */
    static function getMin() : float
    {
        return (float)static::MIN;
    }
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      int
     */
    static function getMax() : float
    {
        return (float)static::MAX;
    }
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      float
     */
    static function getNullEquivalent() : float
    {
        return (float)static::NULL_EQUIVALENT;
    }
}
