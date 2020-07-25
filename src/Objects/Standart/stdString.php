<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iString as iString;
use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;







/**
 * Define um ``Standart do tipo string``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdString extends aStandartType implements iString
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?string
     */
    public function get() : ?string
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      string
     */
    public function getNotNull() : string
    {
        return parent::stdGetNotNull();
    }










    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      string
     */
    public static function nullEquivalent() : string
    {
        return "";
    }



    /**
     * Retorna o menor valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      null
     */
    public static function min()
    {
        return null;
    }



    /**
     * Retorna o maior valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      null
     */
    public static function max()
    {
        return null;
    }
}
