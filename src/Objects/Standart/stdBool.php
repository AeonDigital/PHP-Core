<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iBool as iBool;
use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;







/**
 * Define um ``Standart`` para o tipo ``bool``
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdBool extends aStandartType implements iBool
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?bool
     */
    public function get() : ?bool
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent()``.
     *
     * @return      bool
     */
    public function getNotNull() : bool
    {
        return parent::stdGetNotNull();
    }










    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    public static function nullEquivalent() : bool
    {
        return false;
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
